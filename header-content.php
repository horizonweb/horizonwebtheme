<?php
/**
 * The header for our theme.
 *
 * @package horizonweb
 */
?><!DOCTYPE html>
<!--[if IE 8]><html <?php language_attributes(); ?> class="no-js ltie9"> <![endif]-->
<!--[if IE 9]><html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js ie1"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<div id="header">

	<header id="masthead" class="site-header container" role="banner">
		<div class="site-branding col-sm-3">
			<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/images/horizonweb-logo.svg" width="209px" height="43px" alt="Horizon Web" title="Horion Web" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/images/horizonweb-logo.png'"></a></div>
			<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		</div>

		<div class="top-right col-sm-9">
			<div class="search-social">
				<div class="search">
					<?php get_search_form(); ?>
			 		<input type="text" name="q" placeholder="Search..." />
		 		</div>

		 		<ul class="top-social">
		 			<li><a href="#" title="Facebook" class="fb"></a></li>
		 			<li><a href="#" title="Twitter" class="tt"></a></li>
		 			<li><a href="#" title="Pinterest" class="pt"></a></li>
		 		</ul>
			</div>

			<nav id="site-navigation" class="primary-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'horizonweb' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #primary-navigation -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
			</nav><!-- #secondary-navigation -->

			
		</div>
	</header><!-- #masthead -->

</div><!-- #header -->

<div class="clearfix mar_top_fixheader"></div>


<?php if ( get_header_image() ) : ?>
	
<section id="banner" class="col-lg-12" style="background-image:url(<?php header_image(); ?>);">
		<h1 class="banner-text"><span class="h1-obj1">Offering Quality</span> <span class="h1-obj2">Web designing</span> <span class="h1-obj3">for your growing business</span></h1>
		<hr class="banner-line" />
		<span class="hire-now">- Hire now -</span>
		<a href="mailto:info@horizonweb.in" class="banner-email">info@horizonweb.in</a>
</section>

<?php endif; // End header image check.