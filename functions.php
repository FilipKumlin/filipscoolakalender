<?php
//enqueue scripts
wp_enqueue_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js", array(), false, false );
wp_enqueue_script( 'javascript', get_template_directory_uri() . '/js/script.js', array(), false, false );