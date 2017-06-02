<div class="row">

	<div class="mt-10 mb-3 col-12 col-md-6 offset-md-4">
		<h1 class="ml-md--5 display-3 mb-md-3 font-weight-bold page-headline"><?= get_field('headline'); ?></h1>
	</div>
	
	<div class="col-12 col-md-3 mb-2 page-ft-img-wrap">
		<?php $secondImage = get_field('featured_image_background'); ?>
		<img src="<?= $secondImage['url']; ?>" alt="" class="img-fluid page-ft-img-bg">
		<?= the_post_thumbnail('large', array('class'=>'img-fluid page-ft-img')); ?>
	</div>

	<div class="col-12 col-md-7 mb-2 offset-md-1 page-main-content">
		<div class="column-1">
			<?php the_content(); ?>
		</div><div class="column-2">
			<?php the_field('services'); ?>

			<div class="mt-5 page-footer">
				<?= get_field('footer_text'); ?>
				<a href="<?= get_permalink(getIdBySlug('clients')); ?>" class="btn btn-simple"><?= get_field('footer_next_button_text'); ?></a>
			</div>

		</div>

	</div>

</div>