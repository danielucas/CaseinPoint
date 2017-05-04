<div class="col-12 slider">
	<?php if($slides = get_field('slides')): ?>
		<ul class="list-unstyled slides">
		<?php foreach($slides as $slide): ?>
			<li style="background-image: url(<?= $slide['image']['url']; ?>)" class="slider-slide">
				<div class="slide-header">
					<div class="mb-2 slide-header-logo">
						<?= print_svg('logo-background'); ?>
					</div>
					<h3 class="slide-header-title"><?= $slide['text'] ?></h3>
					<hr class="mb-3">
					<a href="<?= get_permalink(getIdBySlug('mission')); ?>" class="btn btn-simple">start learning</a>
				</div>
			</li>
			<pre><?php print_r($slide); ?></pre>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>