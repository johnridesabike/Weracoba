<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<!--<header class="archive-header">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>-->
                <section>
                    <h2>Browse by category</h2>
                    <ul class="archive-cat-list widget widget_categories">
                        <?php wp_list_categories( array(
                                'title_li' => '',
                                //'title_li' => __("The Archive is a chronological list of all the content from ") . get_bloginfo('name') . __(". You can also explore a specific category:"),
                                'orderby' => 'count',
                                'order' => 'DESC'
                                ) ); ?>
                    </ul>
                </section>
                <section>
                    <h2>Browse by tag</h2>
                    <div class="widget">
                        <?php wp_tag_cloud( array( 'smallest' => 12, 
                                                   'largest' => 24,
                                                   'separator' => ', ' ) );?>
                    </div>
                </section>
                <section>
                    <h2>Browse the recent updates</h2>
            <?php
            endif;
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
                //get_template_part( 'template-parts/content', get_post_type() );
                $format = get_post_format() ? : 'archive';
                get_template_part( 'template-parts/content', $format );

            endwhile;
            the_posts_navigation();
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif; 
        
        if (have_posts() ) : ?>
            </section>
        <?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
