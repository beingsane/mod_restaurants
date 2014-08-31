<?php
defined('_JEXEC') or die;

?>
<div class="restaurants<?php echo $moduleclass_sfx ?>">
	<div class="row-striped">
		<?php foreach ($list as $item) : ?>
			<div class="row-fluid">
				<div class="span3">
					<strong class="row-title">
						<?php echo $item->neighborhood; ?>
					</strong>
				</div>
				<div class="span3">
					<?php echo $item->restaurant; ?>
				</div>
				<div class="span3">
					<a href="<?php echo $item->website; ?>" target="_blank"><?php echo $item->website; ?></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>