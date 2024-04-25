<?php 

function mecao_files() {
	wp_enqueue_style('tailwindcss_build', get_theme_file_uri('/build/style.css'));
}

add_action('wp_enqueue_scripts', 'mecao_files');

function mecao_features() {
	add_theme_support('title-tag');
}

add_action('after_setup_theme', 'mecao_features');