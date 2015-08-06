<?php
defined('_JEXEC') or die;
?>
<div class="container contact">
	<div class="row">
		<div class="col-md-12">
			<h2 class="no-span"><?php echo JText::_('CONTACT'); ?></h2>
			<div class="row mt20">
				<div class="col-xs-12">
					<h3>{article 1115}{title}{/article}</h3>
				</div>
				<div class="col-xs-6">
					{article 1115}{introtext}{/article}
				</div>
				<div class="col-xs-6">
					{article 1115}{fulltext}{/article}
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a class="btn btnContact" href="index.php?option=com_content&view=category&layout=contact&id=50&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT_INFO');?> <i class="fa fa-angle-double-right fa-lg"></i></a>
				</div>
				<div class="col-xs-6">
					<a class="btn btnContact" href="index.php?option=com_contact&view=contact&id=1&Itemid=1003&lang=<?php echo JRequest::getVar('lang');?>"><?php echo JText::_('CONTACT');?> <i class="fa fa-angle-double-right fa-lg"></i></a>
				</div>
			</div>
			<div class="line-hr clearfix"></div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th><?php echo JText::_('EXHIBITIONS');?></th>
							<th><?php echo JText::_('DATE');?></th>
							<th><?php echo JText::_('VENUE');?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($this->items as $item){?>
						<tr>
							<td><?php echo $item->title;?></td>
							<td><?php echo $item->introtext;?></td>
							<td><?php echo $item->fulltext;?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
