<?php
/**
 * Element: Block
 * Displays a block with optionally a title and description
 *
 * @package         NoNumber Framework
 * @version         15.5.5
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2015 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

require_once JPATH_PLUGINS . '/system/nnframework/helpers/field.php';

class JFormFieldNN_Block extends nnFormField
{
	public $type = 'Block';

	protected function getLabel()
	{
		return '';
	}

	protected function getInput()
	{
		$this->params = $this->element->attributes();

		JHtml::stylesheet('nnframework/style.min.css', false, true);

		$title = $this->get('label');
		$description = $this->get('description');
		$class = $this->get('class');
		$showclose = $this->get('showclose', 0);

		$start = $this->get('start', 0);
		$end = $this->get('end', 0);

		$html = array();

		if ($start || !$end)
		{
			$html[] = '</div>';
			if (strpos($class, 'alert') !== false)
			{
				$html[] = '<div class="alert ' . $class . '">';
			}
			else
			{
				$html[] = '<div class="well well-small ' . $class . '">';
			}
			if ($showclose && JFactory::getUser()->authorise('core.admin'))
			{
				$html[] = '<button type="button" class="close nn_remove_assignment">&times;</button>';
			}
			if ($title)
			{
				$title = nnText::html_entity_decoder(JText::_($title));
				$html[] = '<h4>' . $title . '</h4>';
			}
			if ($description)
			{
				// variables
				$v1 = JText::_($this->get('var1'));
				$v2 = JText::_($this->get('var2'));
				$v3 = JText::_($this->get('var3'));
				$v4 = JText::_($this->get('var4'));
				$v5 = JText::_($this->get('var5'));

				$description = nnText::html_entity_decoder(trim(JText::sprintf($description, $v1, $v2, $v3, $v4, $v5)));
				$description = str_replace('span style="font-family:monospace;"', 'span class="nn_code"', $description);
				$html[] = '<div>' . $description . '</div>';
			}
			$html[] = '<div><div>';
		}
		if (!$start && !$end)
		{
			$html[] = '</div>';
		}

		return '</div>' . implode('', $html);
	}
}
