<?php
/*------------------------------------------------------------------------
# vm_migrate - Virtuemart 2 Migrator
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.tooltip');
jimport( 'joomla.html.html' );

$tick 		= JHTML::_('image','admin/tick.png', '', array('border' => 0), true);
$publish_x 	= JHTML::_('image','admin/publish_x.png', '', array('border' => 0), true);
$publish_y 	= JHTML::_('image','admin/publish_y.png', '', array('border' => 0), true);

$params = JComponentHelper::getParams('com_vmmigrate');
$show_disclaimer = $params->get('show_disclaimer', 1);
$show_not_installed = $params->get('show_not_installed', 1);

$doc = JFactory::getDocument();
$js = 'var warning_message_label="'.JText::_('VMMIGRATE_WARNING_LABEL').'";';
$js .= 'var confirm_message_label="'.JText::_('VMMIGRATE_WARNING_CONFIRM_PROCEED').'";';
$doc->addScriptDeclaration($js);

?>
    <div>
        <div class="col width-40 fltlft">
        	<?php
			echo JHtml::_('sliders.start', 'vmmigrate',array('useCookie'=>true));
			if ($show_disclaimer) {
				echo JHtml::_('sliders.panel', JText::_('VMMIGRATE_IMPORTANT_INFO'), 'disclaimer');
				?>
				<fieldset class="adminform">
					<?php
						echo JHTML::_('image.administrator', 'stop.png','/components/com_vmmigrate/assets/images/');
						echo JText::_('VMMIGRATE_DISCLAIMER');
					?>
				</fieldset>
				<?php
			}
			foreach ($this->extensions as $extension) {
				$steps = $this->steps;
				$extensionSteps = $steps[$extension];
				if (count($extensionSteps)) {
					echo JHtml::_('sliders.panel', JText::_($extension), $extension);
					?>
					<form style="position:relative;" action="index.php" method="post" name="vmMigrateForm_<?php echo $extension; ?>" id="vmMigrateForm_<?php echo $extension; ?>">
						<input type="hidden" name="task" value="upgrade" />
						<input type="hidden" name="option" value="com_vmmigrate" />
						<input type="hidden" name="view" value="upgrade" />
						<?php echo JHTML::_( 'form.token' ); ?>
						<table class="adminlist">
                            <thead class="progressbars">
                                <tr>
                                    <th width="1%">
                                        <input type="checkbox" id="cbktoggle_<?php echo $extension; ?>" class="checkall-toggle" rel="<?php echo $extension; ?>" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" />
                                    </th>
                                    <th class="left" width="150">
                                        <label for="cbktoggle_<?php echo $extension; ?>"><?php echo JText::_('VMMIGRATE_STEPS'); ?></label>
                                    </th>
                                    <th class="left" width="*">
                                        <?php echo JText::_('VMMIGRATE_PROGRESS'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="progressbars" id="<?php echo $extension; ?>">
                                <?php 
                                foreach ($extensionSteps as $i => $step) { 
									$tooltiptext = (JText::_($step['name'].'_desc') != ($step['name'].'_desc') && JText::_($step['name'].'_desc')) ? JText::_($step['name'].'_desc') : '';
									if (isset($step['joomfish']) && $step['joomfish']) {
										//$tooltiptext .= JHTML::_('image.administrator', 'icon-16-joomfish.png','/components/com_vmmigrate/assets/images/');
										$tooltiptext .= ' '.JText::_('JOOMFISH_TOOLTIP');
									}
                                    $tooltip = ($tooltiptext) ? 'class="hasTip" title="'.$tooltiptext.'"' : '';
									if (isset($step['warning']) && $step['warning']) {
										$warning = ',"warning":"'.addslashes($step['warning']).'"';
									} else {
										$warning = '';
									}
									
                                ?>
                                <tr <?php echo $tooltip; ?>>
                                    <td width="1%">
                                        <input type="checkbox" id="cbk_<?php echo $extension; ?>_<?php echo $step['name']; ?>" class="stepcbk" name="steps_<?php echo $extension; ?>[]" value="<?php echo $step['name']; ?>" rel='{"extension":"<?php echo $extension; ?>","step":"step_<?php echo $step['name']; ?>"<?php echo $warning; ?>}' <?php echo ($step['default']) ? 'checked="checked"' : '' ?> />
                                    </td>
                                    <td class="left <?php echo (isset($step['joomfish']) && $step['joomfish']) ? 'joomfish' : ''; ?>">
                                        <label for="cbk_<?php echo $extension; ?>_<?php echo $step['name']; ?>"><?php echo JText::_($step['name']); ?>
                                        	<?php //if (isset($step['joomfish']) && $step['joomfish']) {echo JHTML::_('image.administrator', 'icon-16-joomfish.png','/components/com_vmmigrate/assets/images/');} ?>
										</label>
                                    </td>
                                    <td class="left">
                                      <div class="pg" default="<?php echo ($step['default']) ? '-1' : '0' ?>" id="step_<?php echo $step['name']; ?>"><em class="pg-label"><?php echo ($step['default']) ? JText::_('VMMIGRATE_WAITING') : JText::_('VMMIGRATE_SKIP') ?></em></div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="15">
                                        <input type="button" value="<?php echo JText::_('VMMIGRATE_STOP'); ?>" class="btn_stop" />
                                        <input type="button" value="<?php echo JText::sprintf('VMMIGRATE_MIGRATE_EXTENSION_NOW',JText::_($extension)); ?>" class="btn_run" rel="<?php echo $extension; ?>" />
                                    </td>
                                </tr>
                            </tfoot>
						</table>
						<?php
                        if (!$this->isPro[$extension]) { ?>
                            <div class="block_disabled">
                                <br />
                                <a class="btn_getaddon" href="https://www.daycounts.com/shop/migrator-addons/" target="new"><?php echo JText::_('VMMIGRATE_GET_PRO_MIGRATOR') ?></a>
                            </div>
                            
                        <?php
                        }
                        ?>
					</form>
					<?php
				} else if ($show_not_installed) {
					echo JHtml::_('sliders.panel', JText::_($extension), $extension);
				?>
                <div style="text-align:center;">
                    <h3><?php echo JText::_('VMMIGRATE_EXTENSION_NOT_FOUND'); ?></h3>
                    <p><?php echo JText::_('VMMIGRATE_EXTENSION_NOT_FOUND_DESC'); ?></p>
                </div>
	            <?php
				}
			}
			foreach ($this->demoextensions as $extension) {
				$steps = $this->demosteps;
				$extensionSteps = $steps[$extension];
				if (count($extensionSteps)) {
					echo JHtml::_('sliders.panel', JText::_($extension), $extension);
					?>
					<form style="position:relative;" action="index.php" method="post" name="vmMigrateForm_<?php echo $extension; ?>" id="vmMigrateForm_<?php echo $extension; ?>">
						<input type="hidden" name="task" value="upgrade" />
						<input type="hidden" name="option" value="com_vmmigrate" />
						<input type="hidden" name="view" value="upgrade" />
						<?php echo JHTML::_( 'form.token' ); ?>
						<table class="adminlist">
                            <thead class="progressbars">
                                <tr>
                                    <th width="1%">
                                        <input type="checkbox" id="cbktoggle_<?php echo $extension; ?>" class="checkall-toggle" rel="<?php echo $extension; ?>" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" />
                                    </th>
                                    <th class="left" width="150">
                                        <label for="cbktoggle_<?php echo $extension; ?>"><?php echo JText::_('VMMIGRATE_STEPS'); ?></label>
                                    </th>
                                    <th class="left" width="*">
                                        <?php echo JText::_('VMMIGRATE_PROGRESS'); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="progressbars" id="<?php echo $extension; ?>">
                                <?php 
                                foreach ($extensionSteps as $i => $step) { 
                                    $tooltip = (JText::_($step['name'].'_desc') != ($step['name'].'_desc') && JText::_($step['name'].'_desc')) ? 'class="hasTip" title="'.JText::_($step['name'].'_desc').'"' : '';
                                ?>
                                <tr <?php echo $tooltip; ?>>
                                    <td width="1%">
                                        <input type="checkbox" id="cbk_<?php echo $extension; ?>_<?php echo $step['name']; ?>" class="stepcbk" name="steps_<?php echo $extension; ?>[]" value="<?php echo $step['name']; ?>" rel='{"extension":"<?php echo $extension; ?>","step":"step_<?php echo $step['name']; ?>"}' <?php echo ($step['default']) ? 'checked="checked"' : '' ?> />
                                    </td>
                                    <td class="left">
                                        <label for="cbk_<?php echo $extension; ?>_<?php echo $step['name']; ?>"><?php echo JText::_($step['name']); ?></label>
                                    </td>
                                    <td class="left">
                                      <div class="pg" default="<?php echo ($step['default']) ? '-1' : '0' ?>" id="step_<?php echo $step['name']; ?>"><em class="pg-label"><?php echo ($step['default']) ? JText::_('VMMIGRATE_WAITING') : JText::_('VMMIGRATE_SKIP') ?></em></div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="15">
                                        <input type="button" value="<?php echo JText::_('VMMIGRATE_STOP'); ?>" class="btn_stop" />
                                        <input type="button" value="<?php echo JText::sprintf('VMMIGRATE_MIGRATE_EXTENSION_NOW',JText::_($extension)); ?>" class="btn_run" rel="<?php echo $extension; ?>" />
                                    </td>
                                </tr>
                            </tfoot>
						</table>
                        <div class="block_disabled">
                            <br />
                            <a class="btn_getaddon" href="https://www.daycounts.com/shop/migrator-addons/" target="new"><?php echo JText::_('VMMIGRATE_GET_PRO_MIGRATOR') ?></a>
                        </div>
					</form>
					<?php
				} else if ($show_not_installed) {
					echo JHtml::_('sliders.panel', JText::_($extension), $extension);
				?>
                <div style="text-align:center;">
                    <h3><?php echo JText::_('VMMIGRATE_EXTENSION_NOT_FOUND'); ?></h3>
                    <p><?php echo JText::_('VMMIGRATE_EXTENSION_NOT_FOUND_DESC'); ?></p>
                </div>
	            <?php
				}
			}
			echo JHtml::_('sliders.end');
			?>
        </div>
        <div class="col width-60 fltrt">
        	<fieldset class="adminform">
            	<legend><?php echo JText::_('LOG'); ?></legend>
                <div id="live_log_filters">
                    <input type="button" id="toggleLogInfo" value="<?php echo JText::_('VMMIGRATE_INFO'); ?>" />
                    <input type="button" id="toggleLogWarnings" value="<?php echo JText::_('VMMIGRATE_WARNING'); ?>" />
                    <input type="button" id="toggleLogErrors" value="<?php echo JText::_('VMMIGRATE_ERROR'); ?>" />
                    <input type="button" id="toggleLogTranslations" value="<?php echo JText::_('VMMIGRATE_TRANSLATIONS'); ?>" />
                    <input type="button" id="toggleLogSystemErrors" class="off" value="<?php echo JText::_('VMMIGRATE_SYSTEM_ERRORS'); ?>" />
                </div>
            	<div id="live_log_container">
	            	<div id="live_log"></div>
                </div>
            </fieldset>
	        <? echo $this->loadTemplate('addons'); ?>
        </div>
    </div>
