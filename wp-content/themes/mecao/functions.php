<?php

function mecao_files()
{
	wp_enqueue_style('tailwindcss_build', get_theme_file_uri('/build/style.css'));
	wp_enqueue_script('mecaoScripts', get_theme_file_uri('/js/main.js'));
}

add_action('wp_enqueue_scripts', 'mecao_files');

function mecao_features()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_image_size('homeNewsPhoto', 452, 300, true);
	add_image_size('featuredPhoto', 900, 600, true);
}

add_action('after_setup_theme', 'mecao_features');

function mecao_remove_default_images($sizes)
{
	unset($sizes['thumbnail']); // 150px
	unset($sizes['medium']); // 300px
	unset($sizes['medium_large']); // 768px
	unset($sizes['large']); // 1024px
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'mecao_remove_default_images');
