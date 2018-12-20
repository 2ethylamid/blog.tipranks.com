<?php

function daily_news_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('daily-news-main-style') );
}
add_action( 'wp_enqueue_scripts', 'daily_news_parent_theme_enqueue_styles' );

function run_autocomplete_js() {
    wp_enqueue_script('autocomplete', get_stylesheet_directory_uri(). '/js/autocomplete.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'run_autocomplete_js');