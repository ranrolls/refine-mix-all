<?php
/**
* @version		$Id:default.php 1 2015-12-09 05:18:21Z  $
* @copyright	Copyright (C) 2015, . All rights reserved.
* @license 		
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="componentheading<?php echo $this->escape($this->get('pageclass_sfx')); ?>"><h2><?php echo $this->params->get('page_title');  ?></h2></div>

<div class="contentpane">
	<h3>Some Items, if present</h3>
	<ul>
<?php foreach ($this->items as $i => $item) : 
				//you may want to do this anywhere else					
				$link = JRoute::_('index.php?option=com_pfmobileappws&view=note&id='. $item->id);				
	?>
	<li><a href="<?php echo $link ?>"><?php  echo $item->subject ?></a></li>
<?php endforeach; ?>
</ul>		
</div>
 