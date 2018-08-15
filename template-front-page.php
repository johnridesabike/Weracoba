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
        <?php /*    
        <div class="fp-blocks">
        <?php 
        $categories = get_categories(); 
        foreach( $categories as $key => $value ) :
            $cat_query = new WP_Query( array( 'cat' => $value->term_id,
                                              'meta_query' => array( array( 'key' => '_thumbnail_id') ) ) );
            $cat_query->the_post();
            $cat_link = esc_url( get_category_link( $value->cat_ID ) );
            ?>
            <div class="fp-block-wrap">
                <div class="fp-block wp-block-cover-image has-background-dim" style="background-image: url(<?php the_post_thumbnail_url( 'weracoba-fp-thumb' ); ?>);">
                <a class="overlay-link" href="<?php echo esc_url( get_category_link( $value->cat_ID ) );?>"></a>
                    <h5 class="cat-title wp-block-cover-image-text">
                        <a href="<?php echo esc_url( get_category_link( $value->cat_ID ) );?>">
                            <?php echo esc_html__($value->cat_name);?>
                        </a>
                    </h5>
                    <?php
                    if ( $value->description ):?>
                        <p class="wp-block-cover-image-text">
                            <?php echo esc_html__($value->description);?>
                        </p>
                    <?php 
                    endif; ?>
                </div>
            </div>
            <?php
            wp_reset_postdata(); // reset the query
        endforeach; ?>
        </div> <!-- .fp-blocks -->*/?>
        <div class="cat-blocks">
            <?php 
            $cats_raw = explode( ',' , get_theme_mod('fp_cats') );
            $cats = array();
            foreach ( $cats_raw as $key => $cat ) {
                $cats[] = get_category($cat);
            }
            ?>
        <?php weracoba_cat_block( $cats ); ?>
        </div> <!-- .fp-blocks -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();