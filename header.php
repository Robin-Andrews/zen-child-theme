<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package Accessible_Zen
 * @since Accessible Zen 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv-printshiv.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site cf">
	<?php do_action( 'before' ); ?>
	<div class="skip-container cf">
		<a class="skip-link screen-reader-text focusable" href="#main"><?php esc_html_e( '&darr; Skip to Main Content', 'accessible-zen' ); ?></a>
	</div><!-- .skip-container -->
	<header id="masthead" class="site-header cf" role="banner">
  
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav role="navigation" class="main-navigation cf top-navigation" aria-labelledby="main-menu-heading">
				<h2 id="main-menu-heading" class="screen-reader-text"><?php esc_html_e( 'Main Menu', 'accessible-zen' ); ?></h2>

				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav', 'depth' => 1 ) ); ?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>  
  
		<div class="site-banner">
			<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="site-logo" src="<?php echo esc_url( get_header_image() ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</a>
		<?php endif; ?>
		<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif;
		?>
		<?php if( get_theme_mod( 'displayblogname' ) == '') : ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		<?php endif; // end if ?>
		</div><!-- .site-banner -->   
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-content cf">
