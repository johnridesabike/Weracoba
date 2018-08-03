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
		<nav class="social-media">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'Social',
			) );
			?>
		</nav>
    	<div class="site-info">
			<p class="copyright">
				Copyright &copy; <?php echo date("Y"); ?> John Jackson
			</p>
			<p class="address">
				Columbus, GA
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
