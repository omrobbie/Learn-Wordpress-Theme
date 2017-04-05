<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(is_single()): ?>
			<h3 class="entry-title"><?php the_title(); ?></h3>
		<?php else: ?>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<?php endif; ?>
		<div class="entry-meta">
			<?php edit_post_link(__('Edit', 'temaku'), '<span class="edit-link">', '</span>'); ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_content(sprintf(__('Selengkapnya', 'temaku'), the_title('<span class="read-more">', '</span>', false))); ?>
	</div>
</article>