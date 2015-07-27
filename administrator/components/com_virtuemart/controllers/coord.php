<?php
/**
*
* State controller
*
* @package	VirtueMart
* @subpackage State
* @author RickG, Max Milbers
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @version $Id: state.php 8618 2014-12-10 22:45:48Z Milbo $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

if(!class_exists('VmController'))require(VMPATH_ADMIN.DS.'helpers'.DS.'vmcontroller.php');

/**
 * Product Controller
 *
 * @package    VirtueMart
 * @subpackage State
 * @author RickG, Max Milbers
 */
class VirtuemartControllerCoord extends VmController {

	function uploadfile(){
		$targetFolder = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'upload'; // Relative to the root
		if (!empty($_FILES)) {
			$tempFile = $_FILES['filename']['tmp_name'];
			$targetPath = $targetFolder;
			$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['filename']['name'];
	
			// Validate the file type
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($_FILES['filename']['name']);
			//echo $targetFile;
			if (in_array($fileParts['extension'],$fileTypes)) {
				if(move_uploaded_file($tempFile,$targetFile)){
					return basename($_FILES['filename']['name']);
				}else{
					return '0';
				}
			}
		}		
		return "-1";
		
	}
	
	function fnc_save(){
		$product_id = JRequest::getVar('product_id');
		$x = $_POST['x'];
		$y = $_POST['y'];
		$description = $_POST['description'];		
		$filename = $this->uploadfile();
		$image = "";
		$hadb =& JFactory::getDBO();
		if($filename!='0' && $filename!='-1'){		
			$image = $filename;
			$q = "UPDATE #__virtuemart_products SET `coord_image` = '$image' WHERE virtuemart_product_id=$product_id";
			$hadb->setQuery($q);
			$hadb->query();
		}
		if(count($x) > 0){
			
			$q = "DELETE FROM #__virtuemart_product_coord WHERE `product_id` = $product_id ";
			$hadb->setQuery($q);
			$hadb->query();
			
			for($i = 0; $i < count($x); $i++){
				
				$q = "INSERT INTO #__virtuemart_product_coord(`product_id`,`x`,`y`,`description`,`order`) VALUES($product_id,".$x[$i].",".$y[$i].",'".$description[$i]."',$i); ";
				//echo $q;	
				$hadb->setQuery($q);
				$result = $hadb->query();
			}				
		}
		$this->setRedirect(JRoute::_('index.php?option=com_virtuemart&view=product', false));
	}
	
	function delete(){
		$product_id = JRequest::getInt('product_id',0);
		$id = JRequest::getInt('id',0);
		
		if($id>0){
		$hadb =& JFactory::getDBO();
		$q = "DELETE FROM #__virtuemart_product_coord WHERE product_id=$product_id AND id= $id";
		$hadb->setQuery($q);
		$hadb->query();
		}
		
		$q = "SELECT @row:=0;";
		$hadb->setQuery($q);
		$hadb->query();
		$q = " UPDATE #__virtuemart_product_coord SET `order` = (@row:=@row+1) WHERE product_id = $product_id ORDER BY `order`";
		$hadb->setQuery($q);
		$hadb->query();
		
		$this->setRedirect(JRoute::_('index.php?option=com_virtuemart&view=coord&layout=add&product_id='.$product_id, false));
	}
}

