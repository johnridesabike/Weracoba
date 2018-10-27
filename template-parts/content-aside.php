<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

?>

<?php if ( is_single() ) :?>
<div class="content-wrap">
    <div class="aside-body">
    <?php endif; ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
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
    </article><!-- #post-<?php the_ID(); ?> -->
        <?php if ( is_single() ) :?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
    </div>

    <?php get_sidebar( 'post' ); ?>
</div>
<?php endif;?>
