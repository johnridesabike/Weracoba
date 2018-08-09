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
	<header class="entry-header">
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
                <?php weracoba_reading_time(); ?>
            </div><!-- .entry-meta -->
        </div> <!-- .entry-header-wrap -->
	</header><!-- .entry-header -->
	<section class="post-content">
		<div class="post-content-wrap">
			<div class="post-content-body">
                <div class="entry-content">
                <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'weracoba' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'weracoba' ),
                    'after'  => '</div>',
                ) );
                ?>
                </div><!-- .entry-content -->
                <footer class="entry-footer">
                    <?php weracoba_entry_footer(); ?>
                </footer><!-- .entry-footer -->
			</div><!-- .post-content-body -->
            <?php get_sidebar( 'post' ); ?>
        </div><!-- .post-content-wrap -->
        <h2 class="post-navigation-title">Read more posts</h2>
        <?php
		weracoba_post_navigation();
		?>
	</section> <!-- .post-content -->
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
