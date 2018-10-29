<?php
/**
 * Template part for displaying the headers of posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */
?>
<?php weracoba_post_thumbnail(); ?>
<div class="entry-header-wrap">
    <?php weracoba_category_list(); ?>
    <?php if ( is_singular() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
    else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif; ?>
    <div class="entry-meta">
        <?php weracoba_posted_by(); ?>
        <?php weracoba_posted_on(); ?>
        <?php weracoba_comments(); ?>
    </div><!-- .entry-meta -->
</div> <!-- .entry-header-wrap -->