<div class="site-pages">
	<div id="error" class="container site-page">

		<div class="row">

			<div class="col-12 col-md-4 offset-md-1 mt-10 page-main-content">
				<h1 class="display-3 mb-3 font-weight-bold page-headline"><?php _e('Oh, curd! Seems like you\'ve gone the wrong whey.', 'sage'); ?></h1>
				<p>It seems you’ve stumbled on a link that no longer works!<br>Maybe one of these links has what you’re seeking:</p>
				<ul class="list-unstyled pt-1 pb-1">
					<?php foreach(get_posts(array('post_type'=>'page','post_status'=>'publish', 'posts_per_page'=>-1)) as $page): ?>
						<li><a href="<?= get_permalink($page->ID); ?>"><?= $page->post_title; ?></a></li>
					<?php endforeach; ?>
				</ul>
				<p>xo<br>Sam</p>
			</div>

			<div class="col-12 col-md-6 offset-md-1 mt-5 page-ft-img-wrap">
				<?php $secondImage = get_field('featured_image_background'); ?>
				<img src="<?= $secondImage['url']; ?>" alt="" class="img-fluid mt-5 ml-5 page-ft-img-bg">
				<?= the_post_thumbnail('large', array('class'=>'img-fluid ml-3 page-ft-img')); ?>
			</div>

		</div>

	</div>
</div>


  
