<?php
/**
 * A place for a breadcrumbs widget.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Weracoba
 */

if ( ! is_active_sidebar( 'breadcrumbs-1' ) || is_front_page() || is_single() ) {
	return;
}
?>

<nav class="breadcrumbs">
	<?php dynamic_sidebar( 'breadcrumbs-1' ); ?>
</nav>
