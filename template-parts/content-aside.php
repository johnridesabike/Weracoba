<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php weracoba_post_thumbnail(); ?>
    <div class="entry-wrap">

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
        <footer class="entry-footer">
            <?php
            if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php weracoba_posted_by(); ?>
                    <?php weracoba_posted_on(); ?>
                    <?php weracoba_comments(); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </footer>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php if ( is_single() ) :?>
<?php get_sidebar( 'post' ); ?>

<div class="content-wrap">

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</div>
<?php endif;?>
