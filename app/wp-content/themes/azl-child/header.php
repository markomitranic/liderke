<?php
/**
 * The Header template for our theme
 * Displays all of the <head> section and everything up till <div id="main">
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>-child/custom.css' type='text/css' media='all' />
<link href='https://fonts.googleapis.com/css?family=Dosis:400,500,600,700,800,300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1747549182144334');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1747549182144334&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>
<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<header id="header-top">
		<?php if ( is_active_sidebar( 'top_widget_area' ) ) : ?>
			<div id="top-widget-area" class="top-widget-area" role="complementary"><?php dynamic_sidebar( 'top_widget_area' ); ?></div>
		<?php endif; ?>
	</header>

	<header id="masthead" class="site-header" role="banner">

		<hgroup>
			<div class='site-logo'>
				<?php
					$currentLang = qtrans_getLanguage();
					if($currentLang =='sr') : ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="Site logo"></a>

				<?php elseif ($currentLang =='en') : ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-english.png" alt="Site logo"></a>

				<?php endif; ?>
			</div>

			<div class='mobile-logo'>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-mob.png" alt="Site logo"></a>
			</div>
		</hgroup>

		<div id="side-navigation">
			<!-- Secondary navigation -->
			<?php if ( has_nav_menu( 'side_secondary_menu' ) ) : ?>
				<nav class="secondary-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'side_secondary_menu', 'menu_class' => 'nav-menu' ) ); ?>
					<!-- Navigation widget area -->
					<?php if ( is_active_sidebar( 'alumni_widget' ) ) : ?>
						<div class="alumni-sidebar">
							<?php dynamic_sidebar( 'alumni_widget' ); ?>

		                    <?php if ( is_user_logged_in() ) : ?>

		                   <a href="/alumni" class="button-forumi"><?php _e('Forums', 'twentytwelve'); ?></a>

		                   <?php endif; ?>

						</div>

					<?php endif; ?>
       				<!-- END Navigation widget area -->
				</nav>
			<?php endif; ?>
		</div>

		<!-- Sub navigation -->
		<?php if ( has_nav_menu( 'side_sub_menu' ) ) : ?>
			<nav class="sub-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'side_sub_menu', 'menu_class' => 'custom-sub-menu' ) ); ?>
			</nav>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'side_sub_menu_1' ) && is_page(5)) : ?>
			<nav class="sub-navigation" role="navigation">
			     <?php wp_nav_menu( array( 'theme_location' => 'side_sub_menu_1', 'menu_class' => 'custom-sub-menu' ) ); ?>
			</nav>
		<?php endif; ?>

       <?php if ( is_bbpress() ) : ?>

		<?php elseif ( ( has_nav_menu( 'side_sub_menu_2') && ( is_home() || is_archive() || is_single() ) ) ) : ?>

			<nav class="sub-navigation" role="navigation">
			     <?php wp_nav_menu( array( 'theme_location' => 'side_sub_menu_2', 'menu_class' => 'custom-sub-menu' ) ); ?>
			</nav>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'azl-child' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		<?php endif;?>

		<?php if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="main" class="wrapper">
