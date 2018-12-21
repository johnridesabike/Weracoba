<?php
/**
 * Template part for displaying attachments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content">
        <div class="entry-attachment entry-content">
            <?php echo wp_get_attachment_image( get_the_ID(), 'full' ); ?>

            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-caption -->
            <?php endif; ?>
        </div><!-- .entry-attachment .entry-content -->
        <footer class="entry-footer">
            
            <div class="entry-meta">
                <?php weracoba_posted_by(); ?>
                <?php weracoba_posted_on(); ?>
                <?php weracoba_comments(); ?>
            </div><!-- .entry-meta -->
            <?php 
            weracoba_entry_footer();
            ?>
        </footer><!-- .entry-footer -->
	</div> <!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php
weracoba_attachment_navigation();
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
?>
