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
        <?php 
        if ( ! is_front_page() )
            get_sidebar(); 
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
            <div class="footer-widgets">
                <?php dynamic_sidebar('Footer') ?>
            </div> <!-- .footer-widgets -->
            <section id="print-footer" class="widget widget_text print citation">
                <h2 class="widget-title">
                    <?php esc_html_e( 'Reference for this document' ); ?>
                </h2>
                <p>
                    <?php weracoba_citation(); ?>
                </p>
            </section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
