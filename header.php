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
	<style>
		.wp-block-latest-posts li a {
			font-family: Palatino, "Palatino Linotype", Athelas, Georgia, Times, "Times New Roman", serif;
		}
		.continue-reading a {
			line-height: 1;
		}
		.excerpt-entry .entry-footer {
			align-items: flex-start;
		}
		input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea {
			color: black;
		}
		input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus {
			color: black;
		}
		form .required { /* this causes problems with input fields with the .required class */
			font-size: 1em;
			opacity: 1;
		}
		form label .required { /* this is what we actually want to style */
			font-size: .8em;
			opacity: .8;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'weracoba' ); ?>
	</a>
	<header id="masthead" <?php is_singular() ? post_class( 'site-header' ) : print( 'class="site-header"' ); ?>>
		<div id="global-header" class="global-header">
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
			</div> <!-- #toggle-button .menu-button -->
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
		</div><!-- .global-header -->
		<?php
		if ( is_active_sidebar( 'breadcrumbs-1' ) ) :
			dynamic_sidebar( 'breadcrumbs-1' );
		else :
			weracoba_category_list();
		endif;
		?>
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
