<?php
	function tema_customize_register($wp_customize) {
		// bikin panel karna belum ada khusus untuk pengaturan custom desain
		$wp_customize->add_panel('tema_design_options', array(
			'description'	=> __('Ubah desain tema disini', 'temaku'),
			'title'			=> __('Pengaturan Desain', 'temaku'),
			'priority'		=> 500
		));

		// untuk toggle search form (checkbox)
		$wp_customize->add_section('tema_search_form_section', array(
			'title'			=> __('Form Pencarian', 'temaku'),
			'panel'			=> 'tema_design_options'
		));
		$wp_customize->add_setting('tema_search_form', array(
			'default'		=> 1,
			'transport'		=> 'refresh'
		));
		$wp_customize->add_control('tema_search_form', array(
			'type'			=> 'checkbox',
			'label'			=> __('Tampilkan form pencarian pada menu utama', 'temaku'),
			'section'		=> 'tema_search_form_section',
			'setting'		=> 'tema_search_form'
		));
		//---

		// untuk kontrol teks pencarian
		$wp_customize->add_section('tema_search_text_section', array(
			'title'			=> __('Teks Pencarian', 'temaku'),
			'panel'			=> 'tema_design_options'
		));
		$wp_customize->add_setting('tema_search_text', array(
			'default'		=> 'Search...',
			'transport'		=> 'postMessage'
		));
		$wp_customize->add_control('tema_search_text', array(
			'label'			=> __('Teks pencarian', 'temaku'),
			'section'		=> 'tema_search_text_section',
			'setting'		=> 'tema_search_text'
		));
		$wp_customize->get_setting('tema_search_text')->transport = 'postMessage';
	}
	add_action('customize_register', 'tema_customize_register');
?>