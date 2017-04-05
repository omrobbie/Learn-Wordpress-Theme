<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<header class="page-header">
					<h1 class="page-title"><?php _e('Tidak ditemukan!', 'temaku'); ?></h1>
				</header>
				<p><?php _e('Halaman yang dicari tidak ditemukan!', 'temaku'); ?></p>
				<?php get_search_form(); ?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>