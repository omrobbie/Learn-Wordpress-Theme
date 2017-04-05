<?php get_header(); ?>
<div class="section">
	<div class="container" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php
					while(have_posts()):
						the_post();
				?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<h3 class="entry-title"><?php the_title(); ?></h3>
							</header>

							<div class="entry-content">
								<?php the_content(); ?>
							</div>

							<footer class="entry-meta">
								<?php edit_post_link(__('Edit', 'temaku'), '<span class="edit-link">', '</span>'); ?>
							</footer>
						</article>
				<?php
					endwhile;
				?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>