<?php
// Add extra styles for red line and hoover colors (red)
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', 20);

function my_theme_enqueue_styles(){
  wp_enqueue_style('blackoot-lite-child-custom-style', get_stylesheet_directory_uri().'/css/blackoot-child-style.css');
}
