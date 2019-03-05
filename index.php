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

			if ( is_home() && ! is_front_page() ) :
				?>
				<div class="archive-widget-area">
					<?php
					the_widget(
						'WP_Widget_Categories',
						array(
							'title'        => __( 'Browse by category', 'weracoba' ),
							'hierarchical' => 1,
						),
						array(
							'before_widget' => '<div class="widget widget__archive has-ui-font %s">',
						)
					);
					the_widget(
						'WP_Widget_Tag_Cloud',
						array(
							'title' => __( 'Browse by tag', 'weracoba' ),
						),
						array(
							'before_widget' => '<div class="widget widget__archive has-ui-font %s">',
						)
					);
					?>
				</div> <!-- .archive-widget-area -->
				<p class="has-large-font-size has-ui-font"><?php esc_html_e( 'Or browse the recent updates:', 'weracoba' ); ?></p>
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
				$weracoba_format = get_post_format() ? get_post_format() : 'excerpt';
				get_template_part( 'template-parts/content', $weracoba_format );

			endwhile;
			weracoba_the_posts_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
