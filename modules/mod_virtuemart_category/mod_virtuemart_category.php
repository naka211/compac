<?php
defined('_JEXEC') or  die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
/*
* Best selling Products module for VirtueMart
* @version $Id: mod_virtuemart_category.php 1160 2014-05-06 20:35:19Z milbo $
* @package VirtueMart
* @subpackage modules
*
* @copyright (C) 2011-2015 The Virtuemart Team
*
*
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* VirtueMart is Free Software.
* VirtueMart comes with absolute no warranty.
*
* www.virtuemart.net
*----------------------------------------------------------------------
* This code creates a list of the bestselling products
* and displays it wherever you want
*----------------------------------------------------------------------
*/

defined('DS') or define('DS', DIRECTORY_SEPARATOR);
if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');

/* Setting */
$categoryModel = VmModel::getModel('Category');
$category_id = $params->get('Parent_Category_id', 0);
$class_sfx = $params->get('class_sfx', '');
$moduleclass_sfx = $params->get('moduleclass_sfx','');
$layout = $params->get('layout','default');
$active_category_id = vRequest::getInt('virtuemart_category_id', '0');
$vendorId = '1';
$level = $params->get('level','2');

$db = JFactory::getDBO();
$query = "SELECT c.virtuemart_category_id, c.category_name, m.file_url FROM #__virtuemart_categories_en_gb c 
		INNER JOIN #__virtuemart_category_medias cm ON c.virtuemart_category_id = cm.virtuemart_category_id 
		INNER JOIN #__virtuemart_medias m ON cm.virtuemart_media_id = m.virtuemart_media_id 
		WHERE c.virtuemart_category_id = ".$category_id;
$db->setQuery($query);
$category = $db->loadObject();

/* Load tmpl default */
require(JModuleHelper::getLayoutPath('mod_virtuemart_category',$layout));
?>