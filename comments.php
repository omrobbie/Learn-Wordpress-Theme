<?php if(post_password_required()) return; ?>
<div id="comments" class="comments-area">
	<?php
		if(have_comments()):
	?>
			<br><br>
			<h4 class="comments-title">
				<?php printf(
					_n(' 1 komentar.', '%1s komentar.', get_comments_number(), 'temaku'),
					number_format_i18n(get_comments_number())); ?>
			</h4>

			<ol class="comment-list">
				<?php
					wp_list_comments(array(
						'style'			=> 'ol',
						'short_ping'	=> true,
						'avatar_size'	=> 64
					));
				?>
			</ol>
	<?php
			if(get_comment_pages_count() > 1 && get_option('page_comments')):
	?>
				<ul class="pager" role="navigation">
					<li class="previous"><?php previous_comments_link(__('&larr; Komentar Lama', 'temaku')); ?></li>
					<li class="next"><?php next_comments_link(__('Komentar Baru &rarr;', 'temaku')) ?></li>
				</ul>
	<?php
			endif;
			if(!comments_open() && get_comments_number()):
	?>
				<p class="no-comments"><?php _e('Komentar ditutup.', 'temaku') ?></p>
	<?php
			endif;
		endif;
		comment_form();
	?>
</div>