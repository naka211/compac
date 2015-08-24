<?php
error_reporting(0);
/*------------------------------------------------------------------------
* Netbase Virtuemart Multiupload Attachment Plugin
* author: Netbase Team
* copyright Copyright (C) 2012 www.cms-extensions.net All Rights Reserved.
* @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* Websites: www.cms-extensions.net
* Technical Support: Forum - www.cms-extensions.net
-------------------------------------------------------------------------*/
define( '_JEXEC', 1 );
header("HTTP/1.0 200 OK");	
	global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_lang, $database,
    $mosConfig_mailfrom, $mosConfig_fromname;

        $my_path = dirname(__FILE__);        
        if( file_exists($my_path."/../../../../../../configuration.php")) {
            $absolute_path = dirname( $my_path."/../../../../../../configuration.php" );
            require_once($my_path."/../../../../../../configuration.php");
        }
        elseif( file_exists($my_path."/../../../../../configuration.php")){
            $absolute_path = dirname( $my_path."/../../../../../configuration.php" );
            require_once($my_path."/../../../../../configuration.php");
        }
        elseif( file_exists($my_path."/configuration.php")){
            $absolute_path = dirname( $my_path."/configuration.php" );
            require_once( $my_path."/configuration.php" );
        }
        else {
            die( "Joomla Configuration File not found!" );
        }
        $absolute_path = realpath( $absolute_path );

    	define( 'JPATH_BASE', $absolute_path );
		define( 'DS', DIRECTORY_SEPARATOR );
	    require_once ( JPATH_BASE . DS . 'includes' . DS . 'defines.php' );
		require_once ( JPATH_BASE . DS . 'includes' . DS . 'framework.php' );    

JDEBUG ? $_PROFILER->mark( 'afterLoad' ) : null;
$mainframe = JFactory::getApplication('site');
///echo "<pre>".print_r($mainframe,1)."</pre>";die;
$mainframe->initialise();
JPluginHelper::importPlugin('system');
JDEBUG ? $_PROFILER->mark('afterInitialise') : null;
$mainframe->triggerEvent('onAfterInitialise');
//$mainframe->route();

// authorization
$Itemid = JRequest::getInt( 'Itemid');
//$mainframe->authorize($Itemid);

// trigger the onAfterRoute events
JDEBUG ? $_PROFILER->mark('afterRoute') : null;
$mainframe->triggerEvent('onAfterRoute');
  
/* end add cms framework*/


/**
 * Handle file uploads via XMLHttpRequest
 */
 //jimport('joomla.application.component.view');
class qqUploadedFileXhr {

/**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path,$filename) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        //insert data into attachment table
        if (!class_exists( 'VmConfig' )) require(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart'.DS.'helpers'.DS.'config.php');

        $thumb_width = VmConfig::loadConfig()->get('img_width');
        $user_s =& JFactory::getUser();
        $user_id = $user_s->id; 

        $product_vm_id = JRequest::getInt('virtuemart_product_id');
        $database = &JFactory::getDBO();
        $gallery = new stdClass(); 
        $gallery->id = 0;
        $gallery->virtuemart_user_id = $user_id;
        $gallery->virtuemart_product_id = $product_vm_id;	
        $gallery->file_name  = $filename;
        $gallery->created_on = date('Y-m-d,H:m:s');
        
				if (!$database->insertObject( '#__virtuemart_product_attachments', $gallery, 'id' )) {
	   		 		echo $database->stderr();
	    			return false;
	 			}
        // end of insert data
       
        return true;
    }
    function getName() {
        return $_GET['qqfile'];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];            
        } else {
            throw new Exception('Getting content length is not supported.');
        }      
    }   
}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {
        print_r($_FILES['qqfile']);die;
        
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
            return false;
        }
        return true;
    }
    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

class qqFileUploader {
    private $allowedExtensions = array();
    //private $sizeLimit = 10485760;
	//T.Trung
	private $sizeLimit = 52428800;
	//T.Trung end
    private $file;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 52428800){        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
        
    }
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */ 
     
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){

        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory isn't writable.");
        }
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }
        
        $pathinfo = pathinfo($this->file->getName());
        $filename = $pathinfo['filename'];
        //$filename = md5(uniqid());
        $ext = $pathinfo['extension'];

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
        
        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename .= rand(10, 99);
            }
        }
                
        if ($this->file->save($uploadDirectory . $filename . '.' . $ext,$filename.'.'.$ext)){
            return array('success'=>true);
        } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
    }    
}

// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array();
// max file size in bytes
$sizeLimit = 50 * 1024 * 1024;

$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
//path for upload file
$result = $uploader->handleUpload('../../../../../../plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/');

// to pass data through iframe you will need to encode all html tags
echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
