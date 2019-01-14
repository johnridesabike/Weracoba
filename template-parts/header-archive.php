<?php
/**
 * Template part for displaying the headers of archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

?>
<?php
if ( is_active_sidebar( 'breadcrumbs-1' ) ) :
	?>
	<nav id="breadcrumbs" class="breadcrumbs-nav">
		<?php dynamic_sidebar( 'breadcrumbs-1' ); ?>
	</nav>
<?php endif; ?>
<h1 class="page-title"><?php the_archive_title(); ?></h1>
<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
