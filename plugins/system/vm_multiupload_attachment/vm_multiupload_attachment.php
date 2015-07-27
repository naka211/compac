<?php
error_reporting(E_ALL & ~ E_NOTICE);
error_reporting(0);
/*------------------------------------------------------------------------
* Netbase Virtuemart Multiupload Attachment Plugin
* author: Netbase Team
* copyright Copyright (C) 2012 www.cms-extensions.net All Rights Reserved.
* @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* Websites: www.cms-extensions.net
* Technical Support: Forum - www.cms-extensions.net
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access'); 
jimport( 'joomla.plugin.plugin' );

/**
 * Virtemart Multiupload system plugin
 */
class plgSystemVm_multiupload_attachment extends JPlugin {
	/**
	 *
	 * @param	object	$subject The object to observe
	 * @param 	array   $config  An array that holds the plugin configuration
	 */
	function plgSystemTest( &$subject, $config ) {
		parent::__construct( $subject, $config );
	}

	function onAfterDispatch() {

	    $option = JRequest :: getCmd('option');
        $view = JRequest :: getCmd('view');
        $task = JRequest :: getCmd('task');
        $p_id =JRequest::getVar('virtuemart_product_id');
		
		if(is_array($p_id) == 1) $p_id = $p_id[0];
        
        if($p_id){
	    $document = JFactory::getDocument();
        $db = JFactory::getDBO();
        $document->addStyleSheet(JURI::root(true) . '/plugins/system/vm_multiupload_attachment/js/multiupload/client/fileuploader.css');
        $document->addScript    (JURI::root(true) . '/plugins/system/vm_multiupload_attachment/js/multiupload/client/fileuploader.js');
		
		/* show form upload */
        $form_ele ='<fieldset id="cms-upload-attachment"><legend>Click to upload</legend>';        
        $form_ele .='<div id="file-uploader2">';
    	$form_ele .='<p></p>';
    	$form_ele .='</div>';
        $form_ele .='<ul style="clear: both;" id="separate-list2"></ul>';
        $form_ele .='</fieldset>';
        
        $base_path = JURI::root();
        
        $product_vm_id = $p_id;
		//echo is_array($product_vm_id);
        if($product_vm_id){
        $js = "jQuery(document).ready(function(){var a=jQuery('#product_s_desc').parent();a.parent().append('".$form_ele."');});
            
			var iCount1=0;
            function createUploader(){
            var uploader = new qq.FileUploader2({
            
                element: document.getElementById('file-uploader2'),
                listElement: document.getElementById('separate-list2'),
                action:'".$base_path."plugins/system/vm_multiupload_attachment/js/multiupload/server/php.php',
                debug: false,
                params: {virtuemart_product_id:".$product_vm_id."},
                onComplete:function(id, fileName,result){
				
					iCount1 = iCount1+1;
					var li=jQuery('#separate-list2').find('li');
					var iTotal=li.length;
						if(iCount1==iTotal){
							window.location.reload();
						}
                }
            });  
        }  
				window.onload = createUploader;
	";                 

                $sql = "SELECT * from #__virtuemart_product_attachments WHERE virtuemart_product_id = ".$product_vm_id;
                $db->setQuery( $sql );
        	    $rs = $db->loadObjectList();
                if(is_array($rs) && !empty($rs)) {
                    $str_files ='<form style="clear: both;padding-top: 5px;" name="attchmentForm" id="attchmentForm">';
                    $str_files .= '<div id="attchment" style="margin-top:8px;"><table class="cms-attachment" style="border-collapse:collapse;width: 500px;border: 1px solid #dedede;"><b style="background: none repeat scroll 0 0 #1e90ff;color: white;display: block; margin-left: 1px;width: 500px;height: 20px;padding-top: 2px;">Attachments:</b><thead>';
                    $str_files .='<tr style="border-bottom: 1px solid #dedede;"><th style="width: 30px;border-right: 1px solid #dedede;" class="at_filename">Id</th><th style="border-right: 1px solid #dedede;" class="at_description">File name</th><th style="border-right: 1px solid #dedede;"class="at_creator_name">Create</th><th style="border-right: 1px solid #dedede;">Delete</th></tr>';
                    $str_files .='</thead>';
                    foreach ($rs as $rss) { 
                        $link_att = JURI::root().'plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/'.$rss->file_name;
                        $link_icons = JURI::root().'plugins/system/vm_multiupload_attachment/js/multiupload/client/add_attachment.gif';
                        $link_delete = JURI::root().'plugins/system/vm_multiupload_attachment/js/multiupload/client/delete.gif';
                        $str_files .= '<tr style="border-bottom: 1px solid #dedede;"><td style="text-align: center;border-right: 1px solid #dedede;">'.$rss->id.'</td><td style="border-right: 1px solid #dedede;">'.'<a href='.'"'.$link_att.'"'.'>'.'<img src='.'"'.$link_icons.'"'.'>&nbsp;'.$rss->file_name.'</a></td><td style="text-align: center;border-right: 1px solid #dedede;">'.substr($rss->created_on,0,10).'</td><td style="text-align: center;border-right: 1px solid #dedede;">'.'<a title="Delete file" href="#" onclick="delete_files('.$rss->id.');">'.'<img style="padding-left: 40%;" src='.'"'.$link_delete.'"'.'></a></td></tr>'; 
                    }
                    $str_files .='</table></div></form>';
                }

                $listing_file = "jQuery(document).ready(function(){var b=jQuery('#cms-upload-attachment');b.append('".$str_files."');});";
                $delete = "function delete_files(id){
                    var base_url='".$base_path."plugins/system/vm_multiupload_attachment/js/multiupload/server/ajax.php';
            		var str_data = 'mod=' + id;
					
					var answer = confirm('Are you sure you want to delete this?');
					if (answer)
					{
						jQuery.ajax({
							type: 'POST',
							url: base_url,
							data: str_data,
							success: function(html_data){
								window.location.reload();
							}
						});	
					}else { return false;}
                    };"; 
             
            if(($option == 'com_virtuemart') && ($view == 'product') && ($task == 'edit') && ($p_id > 0)) {
                    $document->addScriptDeclaration($js);
                    $document->addScriptDeclaration($listing_file);
                    $document->addScriptDeclaration($delete);
                }
        }      
		}
	}
    
    
    function onAfterRoute() {
    	if(JFactory::getApplication()->isAdmin()) {
    		return;
    	}
	    $db = &JFactory::getDBO();
	    $option = JRequest :: getCmd('option');
        $view = JRequest :: getCmd('view');
        $task = JRequest :: getCmd('task');
        $p_id =JRequest::getVar('virtuemart_product_id');
	    $document = &JFactory::getDocument();
	    
	    $loadjs		= $this->params->get('loadjs');
	    $position		= $this->params->get('position');
	    $width		= $this->params->get('width');
	    $width2   = $width/100*70;
	    $width3  = $width/100*30;
	    if($loadjs)
	    	$document->addScript('plugins/system/vm_multiupload_attachment/js/jquery-1.8.2.min.js');
	
	    if($p_id){
	        $sql = "SELECT * from #__virtuemart_product_attachments WHERE virtuemart_product_id = ".(int)$p_id;
	        $db->setQuery( $sql );
		    $rs = $db->loadObjectList();

	        if(is_array($rs) && !empty($rs)) {
	            $str_files = '<div id="attchment" style="margin-top:8px;"><table style="max-width: none !important;border-collapse:collapse; border: 1px solid #dedede;display: block;width: '.$width.'px"><b style="background: none repeat scroll 0 0 #1e90ff;color: white;display: block;height: 22px;margin-left: 1px;padding-top: 2px;width: '.$width.'px;">Attachments:</b><thead style="width: 100%">';
	            $str_files .='<tr style="width: 100%;border-bottom: 1px solid #dedede;"><th class="at_description" style="width: '.$width2.'px;border-right: 1px solid #dedede;text-align: left;text-align: center;">File name</th><th style="text-align: center;width: '.$width3.'px" class="at_creator_name">Update</th></tr>';
	            $str_files .='</thead>';
	    
	            foreach ($rs as $rss) {
	                $link_att = JURI::base().'plugins/system/vm_multiupload_attachment/js/multiupload/server/uploads/'.$rss->file_name;
	                $link_icons = JURI::base().'plugins/system/vm_multiupload_attachment/js/multiupload/client/add_attachment.gif';
	                $str_files .= '<tr style="text-align: left;border-bottom: 1px solid #dedede;"><td style="border-right: 1px solid #dedede;">'.'<a title="Download file" href='.'"'.$link_att.'"'.'>'.'<img src='.'"'.$link_icons.'"'.'>&nbsp;<b>'.$rss->file_name.'</b></a></td><td style="text-align: center;">'.substr($rss->created_on,0,10).'</td></tr>'; 
	            }
	            $str_files .='</table></div>';
	        }
	        
	        $js = "jQuery(document).ready(function(){
	        			jQuery('".$position."').append('".$str_files."');
	    			});
	        ";
	        if(($option == 'com_virtuemart') && ($view == 'productdetails') && ($p_id > 0)) {
	                $document->addScriptDeclaration($js);
	        }     
	    }    
	}
}
