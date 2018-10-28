<?php
/**
 * Template part for displaying the headers of pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */
?>
<?php
if ( is_active_sidebar( 'breadcrumbs-1' ) && !is_front_page() ) : ?> 
    <nav class="breadcrumbs">
        <?php dynamic_sidebar( 'breadcrumbs-1' ); ?>
    </nav>
<?php 
endif;
if ( !is_front_page() && !is_home() ) : ?> 
    <div class="entry-header-wrap">
        <?php weracoba_post_thumbnail(); ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </div>
<?php endif;?>