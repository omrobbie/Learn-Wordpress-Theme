<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php
					if(have_posts()):
						while(have_posts()):
							the_post();
							get_template_part('content',get_post_format());
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