<div class="row">
	
	<div class="col-12 col-md-4 offset-md-1 mt-10 page-main-content">
		<h1 class="ml--5 display-3 mb-3 font-weight-bold page-headline"><?= get_field('headline'); ?></h1>
		<?php the_content(); ?>

		<div class="mt-5 page-footer">
			<?= get_field('footer_text'); ?>
			<a href="<?= get_permalink(getIdBySlug('services')); ?>" class="btn btn-simple"><?= get_field('footer_next_button_text'); ?></a>
		</div>
	</div>


	<div class="col-12 col-md-6 mt-5 page-ft-img-wrap">
		<?php $secondImage = get_field('featured_image_background'); ?>
		<img src="<?= $secondImage['url']; ?>" alt="" class="img-fluid mt-5 ml-md-4 page-ft-img-bg">
		<?= the_post_thumbnail('large', array('class'=>'img-fluid ml-md-3 page-ft-img')); ?>
	</div>

</div>