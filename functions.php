<?php
	function tema_enqueue() {
		wp_enqueue_script(
			'bootstrap',
			get_template_directory_uri().'/js/bootstrap.min.js',
			array('jquery')
		);

		// untuk mengaktifkan customizer
		wp_enqueue_script(
			get_template_directory_uri().'/js/customizer.js',
			array('customize-preview'),
			'20170407',
			'true'
		);
	}
	add_action('wp_footer', 'tema_enqueue');

	function tema_setup_nav() {
		register_nav_menu('primary', __('Navigation Menu', 'temaku'));

		// tampilkan fitur foto pada post
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(604, 270, true);
	}
	add_action('after_setup_theme', 'tema_setup_nav');

	function tema_widget_init() {
		register_sidebar(array(
			'name'			=> __('Area Widget Utama', 'temaku'),
			'id'			=> 'kanan',
			'description'	=> __('Tampil pada bagian kanan website', 'temaku'),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>'
		));
	}
	add_action('widgets_init', 'tema_widget_init');

	// aktifkan support html5 untuk modifikasi form pencarian
	add_theme_support('html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		)
	);

	// tampilkan fitur foto pada post
	function tema_image_post() {
		if(has_post_thumbnail()) {
?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumbnail">
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'temaku'); ?>
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="100%" />
			</a>
<?php
		} else {
?>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/default-image.png" alt="<?php the_title(); ?>" width="100%">
			</a>
<?php
		}
	};

	// tampilkan fitur foto pada halaman single
	function tema_image_single() {
		if(has_post_thumbnail() && is_single()) {
?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumbnail">
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'temaku'); ?>
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="100%">
			</a><br><br>
<?php
		}
	};

	// membuat pagination
	function tema_pagination() {
		global $wp_query;
		$big = 999999999;
		echo paginate_links(array(
			'base'			=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format'		=> '?paged=%#%',
			'prev_next'		=> true,
			'prev_text'		=> '< Sebelumnya',
			'next_text'		=> 'Selanjutnya >',
			'current'		=> max(1, get_query_var('paged')),
			'total'			=> $wp_query->max_num_pages
		));
	}

	// modifikasi tampilan daftar komentar
	function tema_list_komentar($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type):
			case 'pingback':
			case 'trackback':
?>
				<li class="media">
					<p><?php _e('Pingback: ', 'temaku'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('Edit', 'temaku'), '<span>', '</span>'); ?></p>
				</li>
<?php
				break;
			default:
?>
				<li class="media" id="comment-<?php comment_ID(); ?>">
					<div class="media-left">
						<?php
							$avatar_size = 65;
							echo get_avatar($comment, $avatar_size);
						?>
					</div>
					<div class="media-body">
						<div class="comment-header">
							<?php
								printf(
									'%1$s %2$s ',
									sprintf(
										'<div class="author"><b>%s</b></div>',
										get_comment_author_link()
									),
									sprintf(
										'%2$s <a href="%1$s"><span class="time">%3$s</span></a>',
										esc_url(
											get_comment_link($comment->comment_ID)
										),
										get_comment_time(),
										get_comment_date()
									)
								);
							?>
						</div>

						<?php
							edit_comment_link(__('Edit', 'temaku'), '<span>', '</span>');
							if($comment->comment_approved == '0'):
						?>
								<em class="comment-awaiting">
									<?php _e('Komentar anda menunggu disetujui.', 'temaku'); ?>
								</em><br>
						<?php
							endif;
						?>
						<div class="comment_content">
							<?php comment_text(); ?>
							<div class="reply-link">
								<span class="glyphicon glyphicon-share-alt"></span>
								<?php
									comment_reply_link(
										array_merge(
											$args,
											array(
												'reply-text'	=> __('Balas', 'temaku'),
												'depth'			=> $depth,
												'max_depth'		=> $args['max_depth']
											)
										)
									);
								?>
							</div>
						</div>
					</div>
				</li>
<?php
				break;
		endswitch;
	}

	// import file customizer.php
	require get_template_directory().'/inc/customizer.php';
?>