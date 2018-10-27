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
	<header class="entry-header">
        <?php weracoba_post_thumbnail(); ?>
        <div class="entry-header-wrap">
            <?php weracoba_category_list(); ?>
            <?php if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; ?>
        </div> <!-- .entry-header-wrap -->
	</header><!-- .entry-header -->
	<section class="post-content">
        <div class="post-content-body">
            
            <div class="entry-attachment entry-content">
                <?php echo wp_get_attachment_image( get_the_ID(), 'full' ); ?>
                
                <?php if ( has_excerpt() ) : ?>
                    <div class="entry-caption">
                    <?php the_excerpt(); ?>
                    </div><!-- .entry-caption -->
                <?php endif; ?>
            </div><!-- .entry-attachment -->
            
            <footer class="entry-footer">
                <div class="entry-meta">
                    <?php weracoba_posted_by(); ?>
                    <?php weracoba_posted_on(); ?>
                    <?php weracoba_comments(); ?>
                    <?php weracoba_reading_time(); ?>
                </div><!-- .entry-meta -->
                <?php weracoba_entry_footer(); ?>
                <?php
                weracoba_post_navigation();
                ?>
            </footer><!-- .entry-footer -->
        </div><!-- .post-content-body -->
	</section> <!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<div class="content-wrap">

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</div>
