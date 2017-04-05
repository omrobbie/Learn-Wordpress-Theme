<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php
					while(have_posts()):
						the_post();
						get_template_part('content', get_post_format());
						comments_template();
					endwhile;
				?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar('kanan'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>