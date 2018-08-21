<?php
/**
 * Template Name: Front Page
 *
 * @package weracoba
 */

get_header();
?>
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
        <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
        ?>
        <!-- end content-page.php -->
        <div class="cat-blocks">
            <?php 
            $cats_raw = explode( ',' , get_theme_mod('fp_cats') );
            $cats = array();
            foreach ( $cats_raw as $key => $cat ) {
                $cats[] = get_category($cat);
            }
            foreach( $cats as $key => $cat ) :
                $cat_query = new WP_Query( 
                    array( 'cat' => $cat->term_id,
                           'meta_query' => array( array( 'key' => '_thumbnail_id') ) 
                         ) 
                );
                $cat_query->the_post();
                $cat_link = esc_url( get_category_link( $cat->cat_ID ) );
                ?>
                <div class="cat-block-wrap">
                    <div class="cat-block">
                        <a class="overlay-link" href="<?php echo esc_url( get_category_link( $cat->cat_ID ) );?>"></a>
                        <figure class="featured-image">
                            <a class="post-thumbnail" href="<?php echo $cat_link; ?>" aria-hidden="true" tabindex="-1">
                                <?php
                                the_post_thumbnail( 'post-thumbnail', array(
                                    'alt' => the_title_attribute( array(
                                        'echo' => false,
                                    ) ),
                                ) );
                                ?>
                            </a>
                        </figure>
                        <h5 class="cat-title">
                            <a href="<?php echo $cat_link; ?>">
                                <?php echo esc_html__($cat->cat_name);?>
                            </a>
                        </h5>
                        <?php
                        if ( $cat->description ):?>
                            <p>
                                <?php echo esc_html__($cat->description);?>
                            </p>
                        <?php 
                        endif; ?>
                    </div>
                </div>
                <?php
                wp_reset_postdata(); // reset the query
            endforeach;
            ?>
        </div> <!-- .fp-blocks -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
