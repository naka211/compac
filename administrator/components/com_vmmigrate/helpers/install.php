<?php
/*------------------------------------------------------------------------
# vm_inventory - Virtuemart 2 Inventory management
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.installer.installer');
jimport('joomla.installer.helper');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.archive');
jimport('joomla.filesystem.path');
jimport('joomla.plugin.helper');

abstract class VmmigrateHelperInstall {

	public static function CleanupOldVersionFiles($oldfolders=array(), $oldfiles = array()) {

		//$oldfolders[] = JPATH_ADMINISTRATOR."/components/com_vm_bonus/assets/vmfiles";
		foreach ($oldfolders as $oldfolder) {
			if (JFolder::exists($oldfolder))
				JFolder::delete($oldfolder);
		}

		//$oldfiles[] = JPATH_ADMINISTRATOR."/components/com_vm_bonus/toolbar.vm_bonus.php";
		foreach ($oldfiles as $oldfile) {
			if (JFile::exists($oldfile))
				JFile::delete($oldfile);
		}

		echo "<br>".JText::_('INSTALLATION_FILES_CLEANUP')."....<span style='color:green'>OK</span>";
	}

	public static function upgradeSchema() {
		$errorMsg = '';
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "id", "int(10) unsigned NOT NULL AUTO_INCREMENT" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "extension", "VARCHAR( 50 ) NOT NULL" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "task", "VARCHAR( 50 ) NOT NULL" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "note", "mediumtext NOT NULL" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "source_id", "VARCHAR( 10 ) NOT NULL" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "state", "int(4) unsigned NOT NULL DEFAULT '1'" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "destination_id", "int(10) unsigned NOT NULL DEFAULT '1'" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_log", "created", "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP" );

		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_temp", "id", "int(10) unsigned NOT NULL AUTO_INCREMENT" );
		VMMigrateHelperDatabase::AddColumnIfNotExists( $errorMsg, "#__vmmigrate_temp", "path", "varchar(255) NOT NULL" );
		
		echo "<br>".JText::_('UPGRADING_TABLE')."....<span style='color:green'>OK</span>";
	}
		

}

?>