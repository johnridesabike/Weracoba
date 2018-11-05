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
	<header id="masthead" <?php is_singular() ? post_class( "site-header" ) : print( 'class="site-header"' ); ?>>
        <div class="global-header">
            <div class="site-header-wrapper">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <?php
                    else : ?>
                        <p class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </p>
                        <?php
                    endif; 
                    ?>
                    
                    <div class="menu-button" id="toggle-button">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <?php esc_html_e( 'Menu', 'weracoba' ); ?>
                        </button>
                    </div>
                    <?php 
                    $weracoba_description = get_bloginfo( 'description', 'display' );
                    if ( $weracoba_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php echo $weracoba_description; /* WPCS: xss ok. */ ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div><!-- .site-branding -->
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ) );
                    ?>
                </nav><!-- #site-navigation -->
            </div><!-- .site-header-wrapper -->
        </div><!-- .global-header -->
        <div class="entry-header">
            <?php
            if ( is_singular() ) : 
                while ( have_posts() ) :
                    the_post();
                    $type = get_post_type();
                endwhile; // End of the loop.
            else :
                $type = 'archive';
            endif;
            get_template_part( 'template-parts/header', $type );
            ?>
        </div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">

