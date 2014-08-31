<?php
defined('_JEXEC') or die;

?>
<div class="restaurants<?php echo $moduleclass_sfx ?>">
	<?php $currentNeighborhoodId = -1; ?>
	<div id="neighborhoods-acc" class="accordion">
		<?php foreach($list as $item) : ?>
			<?php if($item->nid != $currentNeighborhoodId): ?> 
				<!--start a new neighborhood-->
				<?php $currentNeighborhoodId = $item->nid; ?>
				<?php if($item->nid != -1): ?> 
					<!--not the first neighborhood so close the previous accordion-group, accordion-body, and accordion-inner-->
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle neighborhood" style="background-color: #<?php echo $item->bgcolor ?>; color: #<?php echo $item->color ?>;" href="#collapse<?php echo $item->color ?>" data-toggle="collapse" data-parent="#neighborhoods-acc"> <?php echo $item->neighborhood ?> </a>
					</div>
					<div id="collapse<?php echo $item->color ?>" class="accordion-body collapse">
						<div class="accordion-inner">
			<?php endif; ?>
			
			<div class="row-fluid bottom-dotted">
				<!--
					todo: display-logo
					todo: bottom-dotted
					todo: published
					todo: blank/missing fields
				-->
				<div class="span2 restaurant-name<?php if($item->display_logo == 1): ?> display-logo<?php endif; ?>"><?php echo $item->restaurant ?></div>
				<div class="span2"><a href="<?php echo $item->website; ?>" target="_blank"><?php echo $item->website; ?></a><br /> <?php echo $item->address1; ?></div>
				<div class="span7 offset1"><?php echo $item->blurb; ?></div>
			</div>
			
			
		<?php endforeach; ?>
	</div>
</div>