<?php
/**
 * Template part for displaying the headers of archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

?>

<h1 class="archive-title"><?php the_archive_title(); ?></h1>
<?php
the_archive_description( '<div class="archive-description">', '</div>' );
if ( is_search() ) {
	get_search_form();
}
?>
