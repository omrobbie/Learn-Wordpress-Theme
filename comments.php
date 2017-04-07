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
				<ul class="media-list">
					<?php
						// versi tanpa callback
						// wp_list_comments(array(
						// 	'style'			=> 'ol',
						// 	'short_ping'	=> true,
						// 	'avatar_size'	=> 64
						// ));

						wp_list_comments(array(
							'callback'		=> 'tema_list_komentar',
							'short_ping'	=> true
						));
					?>
				</ul>
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
		// modifikasi form komentar
		// comment_form();
	?>

	<div class="comment-form">
		<?php
			$comment_form = array(
				'fields' => apply_filters(
					'comment_form_default_fields',
					array(
						'author' =>
							'<div class="form-group">'.
								'<label for="author">Nama (*)</label>'.
								'<input type="text" id="author" class="form-control" name="author" placeholder="Nama Anda..." value="'. esc_attr($commenter['comment_author']) .'" required />'.
							'</div>',
						'email' =>
							'<div class="form-group">'.
								'<label for="email">Email (*)</label>'.
								'<input type="text" id="email" class="form-control" name="email" placeholder="Email..." value="'. esc_attr($commenter['comment_author_email']) .'" required />'.
							'</div>',
						'url' =>
							'<div class="form-group">'.
								'<label for="url">Website (*)</label>'.
								'<input type="text" id="url" class="form-control" name="url" placeholder="Website..." value="'. esc_attr($commenter['comment_author_url']) .'" required />'.
							'</div>'
					)
				),
				'comment_field' =>
					'<div class="form-group">'.
						'<label for="comment">Komentar (*)</label>'.
						'<textarea id="comment" class="form-control" name="comment" rows="5" placeholder="Komentar Anda..." required></textarea>'.
					'</div>',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'title_reply' => __('<h3 class="form-title">Tulis Komentar</h3>', 'temaku'),
			);
			comment_form($comment_form, $post->ID);
		?>
	</div>
</div>