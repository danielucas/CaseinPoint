<div class="site-pages">
	<?php $pages = get_posts(array('post_type'=>'page','post_status'=>'publish', 'posts_per_page'=>-1)); ?>
	<?php foreach($pages as $post): setup_postdata( $post ); $backgroundImage = get_field('background_image'); ?>
	<div id="<?= $post->post_name; ?>" class="container site-page" style="background-image: url(<?= $backgroundImage['url']; ?>)">
		<?php get_template_part('templates/pages/'.$post->post_name); ?>
	</div>		
	<?php wp_reset_postdata(); endforeach; ?>
</div>