<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="site-wrapper">
	<header id="site-header">
		<div class="header-container">
			<div class="header-top">
					<div class="logo">
					<?php 
					if ( has_custom_logo() ) {
							the_custom_logo();
					} else {
						echo '<a href="'.home_url().'"><img src="'.get_template_directory_uri().'/assets/img/logo.png" alt="John Doe Logo" width="180" height="40"></a>';
					}
					?>
					</div>
					<nav id="site-navigation" class="main-nav">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'nav-menu'
						));
						?>
					</nav>
			</div>
			<div class="header-banner">
					<div class="banner-content">
						<h1>John Doe</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<button href="<?php echo esc_url(get_theme_mod('banner_button_url', '#')); ?>" class="green-btn">Free SEO Consulting Training</button>
					</div>
					<div class="banner-image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Man_img.png" alt="Banner Image">
					</div>
			</div>
		</div>
	</header>