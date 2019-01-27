<?php
/**
 * Template part for displaying the headers of posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

?>
<?php weracoba_post_thumbnail(); ?>
<div class="entry-header-wrap">
	<?php
	if ( is_active_sidebar( 'breadcrumbs-1' ) ) :
		dynamic_sidebar( 'breadcrumbs-1' );
	else :
		weracoba_category_list();
	endif;
	?>
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<div class="entry-meta">
		<?php weracoba_author_avatar(); ?>
		<?php weracoba_posted_by(); ?>
		<?php weracoba_posted_on(); ?>
		<?php weracoba_comments(); ?>
	</div><!-- .entry-meta -->
</div> <!-- .entry-header-wrap -->
