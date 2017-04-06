<?php
	function tema_enqueue() {
		wp_enqueue_script(
			'bootstrap',
			get_template_directory_uri().'/js/bootstrap.min.js',
			array('jquery')
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
?>