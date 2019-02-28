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
	<header class="entry-header has-ui-font">
		<?php weracoba_author_avatar(); ?>
		<div class="entry-header-wrapper">
			<?php weracoba_posted_by(); ?>
			<?php
			$weracoba_read_more_link = sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'permalink %s', 'weracoba' ),
					array( 'span' => array( 'class' => array() ) )
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			);
			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php echo weracoba_get_icon_svg( 'link', 16 ); /* phpcs:ignore XSS OK */ ?>
				<?php echo $weracoba_read_more_link; /* phpcs:ignore XSS OK */ ?>
			</a>
		</div><!-- .entry-meta-wrapper -->
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer has-ui-font">
		<div class="entry-meta">
			<?php weracoba_posted_on(); ?>
			<?php weracoba_edit_link(); ?>
			<?php weracoba_tag_list(); ?>
		</div><!-- .entry-meta -->
		<?php weracoba_comments(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
