<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php
					if(have_posts()):
				?>
						<header class="archive-header">
							<h2 class="archive-title">
								<?php
									printf(__('Kategori: %s', 'temaku'), single_cat_title('', false));
								?>
							</h2>
							<?php
								if(category_description()):
							?>
									<div class="archive-meta">
										<?php echo category_description(); ?>
									</div>
							<?php
								endif;
							?>
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