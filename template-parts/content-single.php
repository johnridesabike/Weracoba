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
	<div class="post-content">
		<div class="entry-content">
		<?php
		$weracoba_link_page_args = array(
			'before'      => '<div class="page-links">',
			'after'       => '</div>',
			'link_before' => esc_html_x( 'Page ', 'Single pagination', 'weracoba' ),
		);
		if ( 1 < $wp_query->get( 'page' ) ) {
			wp_link_pages( $weracoba_link_page_args );
		}
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'weracoba' ),
					array( 'span' => array( 'class' => array() ) )
				),
				get_the_title()
			)
		);
		wp_link_pages( $weracoba_link_page_args );
		?>
		</div><!-- .entry-content -->
		<footer class="entry-footer">
			<?php weracoba_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div> <!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->
