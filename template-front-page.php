<?php
/**
 * Template Name: Front Page
 *
 * @package weracoba
 */

get_header();
?>

	<?php /*weracoba_post_thumbnail();*/ ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main front-page narrow-width">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

<!-- begin from content-page.php -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'weracoba' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<!-- end content-page.php -->


        <h2 class="fp-header">Recent posts</h2>
        <div class="latest-post">
            <?php
            // this will display the most recent 3 posts
            $second_query = new WP_Query('cat=-17,-18,-19&posts_per_page=3');
            while( $second_query->have_posts() ): $second_query->the_post();
                //get_template_part( 'template-parts/content', get_post_type() );
            ?>
            <div class="fp-post">
                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                <figure class="fp-figure">
                 <?php
                 if ( has_post_thumbnail() ) :?>
                     <a href="<?php the_permalink(); ?>">
                         <img src="<?php the_post_thumbnail_url( 'fp-thumb' ) ?>" />
                     </a>
                 <?php endif; ?>
                    <?php
                        the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );?>
                    <?php the_excerpt(); ?>
                </figure> <!-- .fp-figure -->
                <div class="continue-reading">
                    <?php
                    $read_more_link = sprintf(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        wp_kses( __( 'Continue reading %s', 'weracoba' ), array( 'span' => array( 'class' => array() ) ) ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false)
                    );
                     ?>
                    <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
                        <?php echo $read_more_link ?>
                    </a>
                </div>
            </div> <!-- .fp-post -->
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div> <!-- .latest-post -->
        <div class="blog-link">
            <a href="<?php echo esc_url( weracoba_get_post_page_url() ) ?>" rel="bookmark">
                More blog posts
            </a>
        </div>

<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
