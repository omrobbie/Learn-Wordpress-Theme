<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php
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
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>