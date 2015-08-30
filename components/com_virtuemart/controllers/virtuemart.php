<?php
/**
*
* Base controller Frontend
*
* @package		VirtueMart
* @subpackage
* @author Max Milbers
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2011-2014 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @version $Id: virtuemart.php 8709 2015-02-16 12:05:39Z Milbo $
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// Load the controller framework
jimport('joomla.application.component.controller');

/**
 * VirtueMart Component Controller
 *
 * @package		VirtueMart
 */
class VirtueMartControllerVirtuemart extends JControllerLegacy
{

	function __construct() {
		parent::__construct();
		if (VmConfig::get('shop_is_offline') == '1') {
		    vRequest::setVar( 'layout', 'off_line' );
	    }
	    else {
		    vRequest::setVar( 'layout', 'default' );
	    }
	}

	/**
	 * Override of display to prevent caching
	 *
	 * @return  JController  A JController object to support chaining.
	 */
	public function display($cachable = false, $urlparams = false){

		$document = JFactory::getDocument();
		$viewType = $document->getType();
		$viewName = vRequest::getCmd('view', 'virtuemart');
		$viewLayout = vRequest::getCmd('layout', 'default');

		//vmdebug('basePath is NOT VMPATH_SITE',$this->basePath,VMPATH_SITE);
		$view = $this->getView($viewName, $viewType);
		$view->assignRef('document', $document);

		$view->display();

		return $this;
	}

	public function keepalive(){
		jExit();
	}
	
	function set_session(){
		$session = JFactory::getSession();
        $session->set('notify', 1);
        die(true);
	}
	
	function accessDistribute(){
		$pass = JRequest::getVar('pass');
		
		$db = JFactory::getDBO();
		$db->setQuery("SELECT introtext FROM #__content WHERE id = 113");
		$savedPass = $db->loadResult();
		
		$session = JFactory::getSession();
		
		if($pass == strip_tags($savedPass)){
			$session->set('accessDis', 1);
			$this->setRedirect("index.php?option=com_virtuemart&view=category&layout=distributor&virtuemart_category_id=20&Itemid=1001");
		} else {
			echo '<script>alert("Password is incorrect, please contact us."); history.back();</script>';
		}
	}
	
	function setScreenWidth(){
		$width = JRequest::getVar("width");
		$session = JFactory::getSession();
        $session->set('screenWidth', $width);
        die(true);
	}
}
 //pure php no closing tag
