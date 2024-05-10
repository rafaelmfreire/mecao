<?php

function mecao_files()
{
	wp_enqueue_style('tailwindcss_build', get_theme_file_uri('/build/style.css'), [], '0.1.0');
	wp_enqueue_style('mecao_custom_fonts', get_theme_file_uri('/css/font-face.css'));
	wp_enqueue_script('mecaoScripts', get_theme_file_uri('/js/main.js'));
	wp_enqueue_script('alpinejs', '//unpkg.com/alpinejs');
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

function mecao_head_code()
{ ?>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-MP289NB7');
	</script>
	<!-- End Google Tag Manager -->
<?
}
add_action('wp_head', 'mecao_head_code');

function mecao_body_code()
{ ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MP289NB7" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php
}
add_action('wp_body_open', 'mecao_body_code');
