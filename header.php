<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <?php benedicta_favicon(); ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<?php global $post; ?>
	
	<?php benedicta_preloader(); ?>
	
	<?php
	$header_search = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_search') : 0;
	if( $header_search == 1 ) {
		get_template_part( 'templates/header/search_block' );
	} ?>
	
	<div id="page-wrap">
		
		<?php benedicta_render_header(); ?>

		<?php get_template_part( 'templates/page_title' ); ?>
		
		<div id="page-content">