<?php
/**
* @version		$Id:default_25.php 1 2015-12-09 05:18:21Z  $
* @copyright	Copyright (C) 2015, . All rights reserved.
* @license 		
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
  JFactory::getDocument()->addStyleSheet(JURI::base().'/components/com_pfmobileappws/assets/lists-j25.css');
  $user		= JFactory::getUser();
  $userId		= $user->get('id');
  $listOrder	= $this->escape($this->state->get('list.ordering'));
  $listDirn	= $this->escape($this->state->get('list.direction'));    
?>

<form action="index.php?option=com_pfmobileappws&amp;view=note" method="post" name="adminForm" id="adminForm">
	<table>
		<tr>
			<td align="left" width="100%">
				<div id="filter-bar" class="btn-toolbar">
					<div class="filter-search btn-group pull-left">
						<label class="element-invisible" for="filter_search"><?php echo JText::_( 'Filter' ); ?>:</label>
						<input type="text" name="search" id="search" value="<?php  echo $this->escape($this->state->get('filter.search'));?>" class="text_area" onchange="document.adminForm.submit();" />
					</div>
					<div class="btn-group pull-left">
						<button class="btn" onclick="this.form.submit();"><?php if(version_compare(JVERSION,'3.0','lt')): echo JText::_( 'Go' ); else: ?><i class="icon-search"></i><?php endif; ?></button>
						<button type="button" class="btn" onclick="document.getElementById('search').value='';this.form.submit();"><?php if(version_compare(JVERSION,'3.0','lt')): echo JText::_( 'Reset' ); else: ?><i class="icon-remove"></i><?php endif; ?></button>
					</div>
				</div>					
			</td>
			<td nowrap="nowrap">
				<?php
 				  	echo JHTML::_('grid.state', $this->state->get('filter.state'), 'Published', 'Unpublished', 'Archived', 'Trashed');
  				?>
		
			</td>
		</tr>		
	</table>
<div id="editcell">
	<table class="adminlist table table-striped">
		<thead>
			<tr>
				<th width="5">
					<?php echo JText::_( 'NUM' ); ?>
				</th>
				<th width="20">				
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', 'Subject', 'a.subject', $listDirn, $listOrder ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', 'Created_time', 'a.created_time', $listDirn, $listOrder ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', 'State', 'a.state', $listDirn, $listOrder ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', 'Id', 'a.id', $listDirn, $listOrder ); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
		<tr>
			<td colspan="12">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
<?php
  $k = 0;
  if (count( $this->items ) > 0 ):
  
  for ($i=0, $n=count( $this->items ); $i < $n; $i++):
  
  	$row = $this->items[$i];
 	$onclick = "";

    if (JFactory::getApplication()->input->get('function', null)) {
    	$onclick= "onclick=\"window.parent.jSelectNote_id('".$row->id."', '".$this->escape($row->subject)."', '','id')\" ";
    }  	
    
 	$link = JRoute::_( 'index.php?option=com_pfmobileappws&view=note&task=note.edit&id='. $row->id );
 	$row->id = $row->id;
 	$checked = JHTML::_('grid.checkedout', $row, $i );
	
  	
 	
  ?>
	<tr class="<?php echo "row$k"; ?>">
		
		<td align="center"><?php echo $this->pagination->getRowOffset($i); ?>.</td>
        
        <td><?php echo $checked  ?></td>
		
	<td>
      
        		<?php
				if ( JTable::isCheckedOut($user->get ('id'), $row->checked_out ) ):
							echo $row->subject;
						else:
							?>
						
							<a <?php echo $onclick; ?>href="<?php echo $link; ?>"><?php echo $row->subject; ?></a>
							
							<?php	
				endif;			
				?>
								
		</td>	
	
			<td><?php echo $row->created_time; ?></td>		
	
		<td><?php echo $state; ?></td>
	
			<td><?php echo $row->id; ?></td>		
	
	</tr>		
<?php
  $k = 1 - $k;
  endfor;
  else:
  ?>
	<tr>
		<td colspan="12">
			<?php echo JText::_( 'NO_ITEMS_PRESENT' ); ?>
		</td>
	</tr>
	<?php
  endif;
  ?>
</tbody>
</table>
</div>
<input type="hidden" name="option" value="com_pfmobileappws" />
<input type="hidden" name="task" value="note" />
<input type="hidden" name="view" value="notes" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>  	