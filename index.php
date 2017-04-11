<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
		<?php
			function tema_content() {
		?>
				<div class="col-md-8">
					<?php
						get_template_part('carousel');
						if(have_posts()):
							while(have_posts()):
								the_post();
					?>
								<div class="row">
									<div class="col-md-4">
										<?php tema_image_post(); ?>
									</div>
									<div class="col-md-8">
										<?php get_template_part('content',get_post_format()); ?>
									</div>
								</div><br>
					<?php
							endwhile;
					?>
							<div class="pagination">
								<?php tema_pagination(); ?>
							</div>
					<?php
						endif;
					?>
				</div>
		<?php
			}

			function tema_sidebar() {
		?>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
		<?php
			}

			if(get_theme_mod('tema_sidebar', 0) == 'kanan') {
				tema_content();
				tema_sidebar();
			} else {
				tema_sidebar();
				tema_content();
			}
		?>
		</div>
	</div>
</div>
<?php get_footer(); ?>