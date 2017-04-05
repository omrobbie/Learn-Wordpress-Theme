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
?>