<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Weracoba
 */

?>
		<?php get_sidebar(); ?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php
				/**
				 * Disabled this for now.
				the_widget(
					'WP_Widget_Text',
					array(
						'title' => __( 'Reference for this document', 'weracoba' ),
						'text'  => weracoba_citation(),
					),
					array( 'before_widget' => '<div class="widget print %s">' )
				);
				 */
				?>
			</div> <!-- .footer-widgets -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
	console.info("This site is open source! https://github.com/johnridesabike/Weracoba");
</script>
</body>
</html>
