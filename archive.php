<?php
/**
 * The template for displaying archive pages
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
			if ( is_category() ) :
				// Check if there's a child category.
				$weracoba_the_cat    = get_queried_object();
				$weracoba_child_cats = get_categories( array( 'child_of' => $weracoba_the_cat->term_id ) );
				if ( $weracoba_child_cats ) :
					?>
					<div class="archive-widget-area">
						<?php
						/**
						 * Filters the category widget to only show children of the current category.
						 * This is probably WAY more complicated than just calling wp_list_categories().
						 * 
						 * @param array $args The arguments.
						 */
						function weracoba_widget_categories_args( $args ) {
							global $weracoba_the_cat;
							$args['child_of'] = $weracoba_the_cat->term_id;
							return $args;
						}
						add_filter( 'widget_categories_args', 'weracoba_widget_categories_args' );
						the_widget(
							'WP_Widget_Categories',
							array(
								'title'        => __( 'Browse a subcategory', 'weracoba' ),
								'hierarchical' => 1,
							)
						);
						remove_filter( 'widget_categories_args', 'weracoba_widget_categories_args' );
						?>
					</div> <!-- .archive-widget-area -->
					<h2><?php esc_html_e( 'Or browse the recent updates', 'weracoba' ); ?></h2>
					<?php
				endif;
			endif;
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				$weracoba_format = get_post_format() ? get_post_format() : 'excerpt';
				get_template_part( 'template-parts/content', $weracoba_format );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		<div class="archive-widget-area archive-widget-area-bottom">
			<?php the_widget( 'WP_Widget_Categories', array( 'title' => __( 'Browse another category', 'weracoba' ) ) ); ?>
		</div> <!-- .archive-widget-area -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
