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
?>