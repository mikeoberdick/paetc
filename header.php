<?php
/**
 * The header for the theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">


	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md">
			<div class="container py-3">
				<a rel = "home" class="navbar-brand" data-itemprop="url" title="<?php echo esc_attr( get_bloginfo( 'name') ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php $image = get_field('logo', 'option'); ?>
					<img id = "headerLogo" src = "<?php echo $image['url']; ?>" alt = "<?php echo esc_attr( get_bloginfo( 'name') ); ?>">
				</a>
				
				<!-- MOBILE MENU -->
				<button class="navbar-toggler" type="button" data-target="#modalNavigation" data-toggle="modal">
					<span class='sr-only'>Open navigation</span>
					<span class = "mobileToggle">
						<i class="fa fa-bars" aria-hidden="true"></i> Menu
					</span>
				</button>
				
				<div id = "headerRight">
					<div class="search d-none d-md-flex justify-content-end mb-3">
						<div id = "donate" class = "mr-3">
							<a href = '<?php the_field('donate_link', 'option'); ?>'><button role = 'button' class = 'btn btn-primary' target = "_blank">Donate Now</button></a>
						</div>
						<div id = "headerSearch"><?php get_search_form(); ?></div>
					</div><!-- .search -->
					<div class="nav">
						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>	
					</div><!-- .nav -->
					
<!-- MOBILE NAVIGATION MODAL -->
<div class="modal fade modal-fullscreen-menu p-3" id="modalNavigation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog align-items-start" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<?php $logo = get_field('mobile_logo', 'option'); ?>
      	<a rel = "home" class="navbar-brand" data-itemprop="url" title="<?php echo esc_attr( get_bloginfo( 'name') ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      		<img src="<?php echo $logo['url']; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name') ); ?>">
      	</a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id = "headerRight">
			<div class="search">
				<div id = "donate" class = "mr-3">
					<a href = '<?php the_field('donate_link', 'option'); ?>'><button role = 'button' class = 'btn btn-primary' target = "_blank">Donate</button></a>
				</div>
				<div id = "headerSearch"><?php get_search_form(); ?></div>
			</div><!-- .search -->
		</div><!-- #headerRight -->
        <div class="mobile-nav">
			<!-- The WordPress Menu goes here -->
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'walker'          => new understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>	
		</div><!-- .mobile-nav -->
      </div>
    </div>
  </div>
</div>

				</div><!-- #headerRight -->
			</div><!-- .container -->
		</nav><!-- .site-navigation -->
	</div><!-- .wrapper-navbar end -->