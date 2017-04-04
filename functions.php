<?php
    function tema_enqueue() {
        wp_enqueue_script(
            'bootstrap',
            get_template_directory_uri().'/js/bootstrap.min.js',
            array('jquery')
        );
    }
    add_action('wp_footer', 'tema_enqueue');
?>