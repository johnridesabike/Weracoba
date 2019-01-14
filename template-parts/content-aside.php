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
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<?php else : ?>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php endif; ?>
		</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<div class="entry-meta">
			<?php weracoba_posted_by(); ?>
			<?php weracoba_posted_on(); ?>
			<?php weracoba_comments(); ?>
		</div><!-- .entry-meta -->
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
<?php if ( is_single() ) : ?>
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>
	<?php get_sidebar( 'post' ); ?>
<?php endif; ?>
