<?php

function daily_news_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('daily-news-main-style') );
}
add_action( 'wp_enqueue_scripts', 'daily_news_parent_theme_enqueue_styles' );