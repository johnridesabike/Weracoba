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

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <!--<div class="footer-wrapper">
            <nav class="social-media">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => 'Social',
                ) );
                ?>
            </nav>-->
            <div class="footer-widgets">
                <?php dynamic_sidebar('Footer') ?>
            </div> <!-- .footer-widgets
        </div>-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
