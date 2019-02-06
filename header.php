<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Weracoba
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'weracoba' ); ?>
	</a>
	<header id="masthead" <?php is_singular() ? post_class( 'site-header' ) : print( 'class="site-header"' ); ?>>
		<div id="global-header" class="global-header">
				<div class="mobile-header-wrapper">
					<div class="site-branding">
						<?php
						if ( is_front_page() ) :
							?>
							<h1 class="site-title">
								<?php the_custom_logo(); ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<?php
						else :
							?>
							<p class="site-title">
								<?php the_custom_logo(); ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</p>
							<?php
						endif;
						$weracoba_description = get_bloginfo( 'description', 'display' );
						if ( $weracoba_description || is_customize_preview() ) :
							?>
							<p class="site-description">
								<?php echo $weracoba_description; /* phpcs:ignore xss ok. */ ?>
							</p>
						<?php endif; ?>
					</div><!-- .site-branding -->
					<div class="menu-button" id="toggle-button">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span class="screen-reader-text">
								<?php esc_html_e( 'Menu', 'weracoba' ); ?>
							</span>
							<span class="menu-icon">
								<?php echo weracoba_get_icon_svg( 'menu', 24 ); /* phpcs:ignore XSS OK. */ ?>
							</span>
							<span class="dismiss-icon">
								<?php echo weracoba_get_icon_svg( 'dismiss', 24 ); /* phpcs:ignore XSS OK. */ ?>
							</span>
						</button>
					</div>
				</div><!-- .mobile-header-wrapper -->
				<div class="header-nav-wrapper">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<?php
						if ( is_active_sidebar( 'breadcrumbs-1' ) && ! is_front_page() ) :
							dynamic_sidebar( 'breadcrumbs-1' );
						else :
							weracoba_category_list();
						endif;
					?>
				</div><!-- .header-nav-wrapper -->
		</div><!-- .global-header -->
		<div class="entry-header">
			<?php
			if ( is_singular() ) :
				while ( have_posts() ) :
					the_post();
					$weracoba_type = get_post_type();
				endwhile; // End of the loop.
			else :
				$weracoba_type = 'archive';
			endif;
			get_template_part( 'template-parts/header', $weracoba_type );
			?>
		</div>
	</header><!-- #masthead .site-header -->
	<div id="content" class="site-content">
