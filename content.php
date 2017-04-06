<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(is_single()): ?>
			<h3 class="entry-title"><?php the_title(); ?></h3>
		<?php else: ?>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<?php endif; ?>
		<div class="entry-meta">
			<span class="meta_author"><?php _e('oleh ', 'temaku'); the_author_posts_link(); ?></span>
			<span class="meta_date"><?php _e('pada ', 'temaku'); the_time('d F Y'); ?></span>
			<span class="meta_comments"><a href="<?php comments_link(); ?>">
				<?php comments_number('0 Komentar', '1 Komentar', '% Komentar'); ?>
			</a></span>
			<?php edit_post_link(__('Edit', 'temaku'), '<span class="edit-link">', '</span>'); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php
			if(is_single()):
				the_content();
			else:
				the_excerpt();
		?>
				<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-xs">
					<?php _e('Selengkapnya', 'temaku'); ?>
				</a>
		<?php
			endif;
		?>
		<!-- versi awal untuk post yang panjang
		<?php the_content(sprintf(__('Selengkapnya', 'temaku'), the_title('<span class="read-more">', '</span>', false))); ?>
		-->
	</div>
</article>