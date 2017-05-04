<div class="row">

	<div class="mb-3 col-12 col-md-6 offset-md-1">
		<h1 class="display-3 font-weight-bold page-headline"><?= get_field('headline'); ?></h1>
	</div>
	
	<div class="col-12 col-md-6 offset-md-1 page-main-content">
		<div class="page-footer">
			<?= get_field('footer_text'); ?>
			<a href="<?= get_permalink(getIdBySlug('contact')); ?>" class="btn btn-simple"><?= get_field('footer_next_button_text'); ?></a>
		</div>
	</div>
	
	<?php if($locations = get_field('locations')): ?>
		<div class="hidden-xs-up map-markers">
			<?php foreach($locations as $location): ?>
	            <div class="marker" data-lat="<?= $location['location']['lat']; ?>" data-lng="<?= $location['location']['lng']; ?>" data-icon="<?= ($location['location_hidden'] ? 'marker-special' : 'marker'); ?>">
	                <header class="marker-header"><?= $location['location_title']; ?></header>
	            </div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

</div>