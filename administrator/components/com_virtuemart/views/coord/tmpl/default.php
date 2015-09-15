<?php
/**
*
* Description
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
* @version $Id: default.php 8670 2015-01-27 14:10:38Z Milbo $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

AdminUIHelper::startAdminArea($this);

$product_id = JRequest::getInt('product_id',0);

$targetFolder = JURI::root().'images/upload';
$vpath = JURI::root().'templates/rhuk_milkyway/';

$db = JFactory::getDBO();
$q = "SELECT p1.product_name, p.coord_image FROM #__virtuemart_products p INNER JOIN #__virtuemart_products_en_gb p1 ON p.virtuemart_product_id=p1.virtuemart_product_id WHERE p.virtuemart_product_id = $product_id";
$db->setQuery($q);
$prod = $db->loadObject();

$size = array();
$coords = array();
if(count($prod)){
	if(!empty($prod->coord_image)){
		$size = getimagesize(JPATH_ROOT.DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$prod->coord_image);
	}
	$q = "SELECT * FROM #__virtuemart_product_coord WHERE `product_id` = $product_id ORDER BY `order` ASC";
	$db->setQuery($q);
	$coords = $db->loadObjectList();
}
//var_dump($coords);			//$temp_path.$prod->product_full_image;
?>

<style>
.stick {
	background: none repeat scroll 0 0 #E10000;
	border-radius: 20px 20px 20px 20px;
	color: #FFFFFF;
	font-size: 16px;
	font-weight: bold;
	height: 22px;
	line-height: 22px;
	position: absolute;
	text-align: center;
	width: 22px;
}
</style>
<div style="margin-left:20px;">
<h2>Product name: <?php echo $prod->product_name; ?></h2>
<form name="pointform" method="post" action="index.php?option=com_virtuemart&controller=coord&task=fnc_save&product_id=<?php echo $product_id; ?>" enctype="multipart/form-data">
  <div id="pointer_div" onclick="point_it(event)" style = "position: relative;background-image:url('<?php echo $targetFolder."/".$prod->coord_image;?>');width:<?php echo $size[0]?>px;height:<?php echo $size[1]?>px;border:solid 1px;">
    <input type="hidden" id="counter" value="<?php echo count($coords) + 1; ?>" />
    <div id="star" class="stick" style="display:none;top:120px; left:50px;">O</div>
   
    <?php 
			$i = 0;
			if(count($coords) > 0){
				foreach($coords as $coord){
					?>
    <div id="coord_<?php echo $i + 1; ?>" class="stick" style="top:<?php echo $coord->y ?>px; left:<?php echo $coord->x ?>px;"><?php echo $i+1; ?></div>
    <?php
					$i++;
				}
				
			}
		?>
  </div>
  
   <p>
    <input type="file" name="filename" />
  </p>
  <p><b>You pointed on</b><br />
    x =
    <input type="text" id="form_x" name="form_x" size="4" />
    - y =
    <input type="text" id="form_y" name="form_y" size="4" />
    <br/>
    <br/>
    <b>Description</b>
    <textarea style="padding: 5px; display:block; width:<?php echo $size[0]?>px; height:50px;" id="txt_description"></textarea>
    <br/>
    <input type="button" style="padding: 5px;" id="btn_save" onclick="saveCoord();" value="Add Coordinate" />
  </p>
  <br/>
  
  
  <br/>
  <b>Saved coordinate:</b><br/>
  <div id = "div_saved">
    <?php 
			$i = 0;
			if(count($coords) > 0){
				foreach($coords as $coord){
					echo '<div><br/><b>X</b> = <input type="text" name="x[]" value="' . $coord->x . '" /> - <b>Y</b> = <input type="text" name="y[]" value="' . $coord->y . '" /><br/><br /> <b>Description:</b><input style="width:413px;" type="text" name="description[]" value="' . $coord->description . '" /><br/>
					<input id="" type="button" value="remove" onclick="deleteCoord(\''.$coord->product_id.'\',\''.$coord->id.'\');"/><hr/></div>';
					echo '<input type="hidden" name="croodid[]" value="'.$coord->id.'" />';
					$i++;
				}
				
			}
		?>
  </div>
  <br />
  <input type="submit" value="SAVE" />
</form>
</div>
<script language="JavaScript">
	
function point_it(event){
	var top = 0, left = 0; 
	if (!event) { event = window.event; } 
	var myTarget = event.currentTarget; 
	if (!myTarget) { 
		myTarget = event.srcElement; 
	} 
	else if (myTarget == "undefined") { 
		myTarget = event.srcElement; 
	} 
	while(myTarget!= document.body) { 
		top += myTarget.offsetTop; 
		left += myTarget.offsetLeft; 
		myTarget = myTarget.offsetParent; 
	} 

	document.pointform.form_x.value = event.offsetX?event.offsetX - 10:event.pageX - left - 10;
	document.pointform.form_y.value = event.offsetY?event.offsetY - 10:event.pageY - top - 10;
	var star = document.getElementById('star');
	//alert(event.pageX - 10);
	var x = String(event.offsetX?event.offsetX - 10:event.pageX - left - 10) + "px";
	var y = String(event.offsetY?event.offsetY - 10:event.pageY - top - 10) + "px";

	star.style.left = x;
	star.style.top = y;
	star.style.display = "block";
	//star.class="display:block;top:" + y + ";left:" + "x;";

}
function saveCoord(){
	var pos_x = document.getElementById("form_x").value;
	var pos_y = document.getElementById("form_y").value;
	var description = document.getElementById("txt_description").value;
	var div_saved = document.getElementById("div_saved");
	var star = document.getElementById('star');
	var pointer_div = document.getElementById("pointer_div");
	var counter = document.getElementById("counter");
	var coord = document.createElement('div');
	coord.innerHTML = counter.value;
	pointer_div.appendChild(coord);
	
	coord.setAttribute("id","coord_" + counter.value);
	coord.style.left = star.style.left;
	
	coord.style.top = star.style.top;
	
	coord.className = "stick";
	//alert(coord.cssName);
	star.style.display = "none";
	div_saved.innerHTML += '<div><br/><b>X</b> = <input type="text" name="x[]" value="' + pos_x + '" /> - <b>Y</b> = <input type="text" name="y[]" value="' + pos_y + '" /><br/><br /> <b>Description:</b><input type="text" name="description[]" value="' + description + '" /><br/><input id="" type="button" value="remove" onclick="removeCoord(this.parentNode,\'coord_'+counter.value+'\');"/><hr/></div>' ;
	counter.value = parseInt(counter.value) + 1;
}
function removeCoord(e, target){
	
		var coord = document.getElementById(target);
		var pointer_div = document.getElementById("pointer_div");
		pointer_div.removeChild(coord); 
		e.parentNode.removeChild(e);
	
}
function deleteCoord(productid, id){
	location.href = "index.php?option=com_virtuemart&controller=coord&task=delete&product_id=" + productid + "&id=" + id;
}
function findPosX(obj)
{
	var curleft = 0;
	if(obj.offsetParent)
		while(1) 
		{
		  curleft += obj.offsetLeft;
		  if(!obj.offsetParent)
			break;
		  obj = obj.offsetParent;
		}
	else if(obj.x)
		curleft += obj.x;
	return curleft;
}
function findPosY(obj)
{
	var curtop = 0;
	if(obj.offsetParent)
		while(1)
		{
		  curtop += obj.offsetTop;
		  if(!obj.offsetParent)
			break;
		  obj = obj.offsetParent;
		}
	else if(obj.y)
		curtop += obj.y;
	return curtop;
}
</script>
<?php AdminUIHelper::endAdminArea(); ?>