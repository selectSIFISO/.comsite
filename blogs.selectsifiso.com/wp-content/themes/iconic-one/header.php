<?php
/*
 * Header Section of Iconic One
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
			<?php if ( get_theme_mod( 'themonic_logo' ) ) : ?>
		
		<div class="themonic-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'themonic_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div>
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>	
		<div class="socialmedia">
			<?php if( get_theme_mod( 'twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'twitter_url', 'https://twitter.com/selectsifiso' ) ); ?>
				" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> 
			<?php } ?>
			<?php if( get_theme_mod( 'facebook_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'facebook_url', 'https://www.facebook.com/select-SIFISO-652751321424822' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'plus_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url(get_theme_mod( 'plus_url', 'https://plus.google.com/u/0/103041474356156114889' ) ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'link_url' ) !== '' ) { ?>
			<a class="rss" href="http://www.linkedin.com/company/3505445" target="_blank"><img src="http://blogs.selectsifiso.com/wp-content/uploads/2015/05/linkedin_321.png" alt="Connect with us on LinkedIn"/></a>			
			<?php } ?>
			<?php if( get_theme_mod( 'tube_url' ) !== '' ) { ?>
			<a class="rss" href="https://www.youtube.com/channel/UCjloZMqHJaRiXXlnt3y7ZKQ" target="_blank"><img src="http://blogs.selectsifiso.com/wp-content/uploads/2015/05/youtube_logo.png" alt="Tune into our YouTube channel"/></a>			
			<?php } ?>
			<?php if( get_theme_mod( 'rss_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo esc_url( get_theme_mod( 'rss_url', 'http://blogs.selectsifiso.com/feed/' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Follow us on rss"/></a>			
			<?php } ?>
			<div class="widget widget_search">
				<?php get_search_form(); ?>
			</div>
		</div>
	<?php } ?>	

		<?php else : ?>
		<hgroup>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<br .../> <a class="site-description"><?php bloginfo( 'description' ); ?></a>
		</hgroup>
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>
		<div class="socialmedia">
			<?php if( get_theme_mod( 'twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'twitter_url', 'https://twitter.com/selectsifiso' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> 
			<?php } ?>
			<?php if( get_theme_mod( 'facebook_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'facebook_url', 'https://www.facebook.com/select-SIFISO-652751321424822' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'plus_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url(get_theme_mod( 'plus_url', 'https://plus.google.com/u/0/103041474356156114889' ) ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'link_url' ) !== '' ) { ?>
			<a class="rss" href="http://www.linkedin.com/company/3505445" target="_blank"><img src="http://blogs.selectsifiso.com/wp-content/uploads/2015/05/linkedin_321.png" alt="Connect with us on LinkedIn"/></a>			
			<?php } ?>
			<?php if( get_theme_mod( 'tube_url' ) !== '' ) { ?>
			<a class="rss" href="https://www.youtube.com/channel/UCjloZMqHJaRiXXlnt3y7ZKQ" target="_blank"><img src="http://blogs.selectsifiso.com/wp-content/uploads/2015/05/youtube_logo.png" alt="Tune into our YouTube channel"/></a>			
			<?php } ?>
			<?php if( get_theme_mod( 'rss_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo esc_url( get_theme_mod( 'rss_url', 'http://blogs.selectsifiso.com/feed/' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Follow us on rss"/></a>			
			<?php } ?>
		</div>
	<?php } ?>	
		<?php endif; ?>

		<nav id="site-navigation" class="themonic-nav" role="navigation">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'themonic' ); ?>"><?php _e( 'Skip to content', 'themonic' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu', 'container' => 'ul' ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="clear"></div>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">