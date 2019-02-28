<?php
/**
 * Template part for displaying the headers of posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

if ( 'aside' !== get_post_format() ) :
	?>
	<?php weracoba_post_thumbnail(); ?>
	<div class="entry-header-wrap">
		<?php the_title( '<h1 class="entry-title has-body-font">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php weracoba_author_avatar(); ?>
			<div class="entry-meta-wrapper">
				<?php weracoba_posted_by(); ?>
				<?php weracoba_posted_on(); ?>
				<?php weracoba_comments(); ?>
			</div><!-- .entry-meta-wrapper -->
		</div><!-- .entry-meta -->
	</div> <!-- .entry-header-wrap -->
	<?php
endif;
