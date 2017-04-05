<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php
					if(have_posts()):
				?>
						<header class="page-header">
							<h2 class="page-title">
								<?php
									printf(__('Hasil pencarian untuk %s', 'temaku'), get_search_query());
								?>
							</h2>
						</header>
				<?php
						while(have_posts()):
							the_post();
							get_template_part('content', get_post_format());
						endwhile;
					endif;
				?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>