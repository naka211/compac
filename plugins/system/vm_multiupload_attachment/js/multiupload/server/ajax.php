<?php
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
$mainframe =& JFactory::getApplication('site');
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
// delete files attachment
$db = &JFactory::getDBO();
$idFile = JRequest::getInt('mod');

$path_files = JPATH_SITE . DS . 'plugins' . DS . 'system' . DS . 'vm_multiupload_attachment'. DS .'js'. DS .'multiupload'.DS.'server'.DS.'uploads'.DS;
$qry = "SELECT file_name FROM #__virtuemart_product_attachments WHERE id = ".$idFile;
$db->setQuery($qry);
$rows = $db->loadObject();
@unlink ($path_files . $rows->file_name);

$query='DELETE FROM #__virtuemart_product_attachments WHERE id="'.$idFile.'"';
$db->setQuery($query);
$db->query();
?>