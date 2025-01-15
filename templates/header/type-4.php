<?php

$benedicta_header_wrap_class = 'header_wrap ';

$benedicta_header_sticky = benedicta_options('header_sticky');
$benedicta_header_wrap_class .= $benedicta_header_sticky .' ';

$nav_args = array(
    'theme_location' => 'primary',
    'container' => 'none',
    'menu_class' => 'nav-menu clearfix',
    'depth' => 3,
    'fallback_cb' => 'benedictaMegaMenuFrontendWalker::fallback',
    'walker' => new benedictaMegaMenuFrontendWalker(),
);
?>
		
		<div class="<?php echo esc_attr( $benedicta_header_wrap_class ); ?>">
			<div class="container">
				<?php benedicta_logo(); ?>
				<div class="menu-primary-menu-container-wrap text-center">
					<?php if ( has_nav_menu( 'primary' ) )
						wp_nav_menu( $nav_args );
					?>
				</div>
			</div>
		</div>
		<div class="header_bg"></div>