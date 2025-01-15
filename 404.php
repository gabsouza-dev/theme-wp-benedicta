<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>
	
	<div id="error404_container">
		<div class="container text-center clearfix">
			<h1 class="theme_color"><?php echo esc_html__('404', 'benedicta'); ?></h1>
			<?php if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('page404_subtitle') != '' ) { ?>
				<h2><?php echo benedicta_options('page404_subtitle'); ?></h2>
			<?php } else { ?>
				<h2><?php echo esc_html__('Page not found', 'benedicta'); ?></h2>
			<?php } ?>
			<?php if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('page404_descr') != '' ) { ?>
				<p><?php echo benedicta_options('page404_descr'); ?></p>
			<?php } ?>
			<div class="clearfix"></div>
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html_e('back to home page', 'benedicta'); ?></a>
		</div>
	</div>

<?php get_footer(); ?>
