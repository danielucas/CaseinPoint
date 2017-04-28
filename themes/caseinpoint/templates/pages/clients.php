<div class="row">

	<div class="mb-3 col-12 col-md-8 offset-md-1">
		<h1 class="display-3 font-weight-bold page-headline"><?= get_field('headline'); ?></h1>
	</div>
	
	<div class="col-12 col-md-4 offset-md-1 page-main-content">
		<div class="page-footer">
			<?= get_field('footer_text'); ?>
			<a href="#next" class="btn btn-simple"><?= get_field('footer_next_button_text'); ?></a>
		</div>
	</div>

</div>