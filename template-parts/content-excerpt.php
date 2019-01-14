<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weracoba
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'excerpt-entry' ); ?>>
	<div class="entry-wrap">
		<?php weracoba_post_thumbnail(); ?>
		<div> <!-- just a div for the flexbox -->
			<header class="entry-header">
				<?php weracoba_category_list(); ?>
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div>
	</div>
	<footer class="entry-footer">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php weracoba_posted_by( false ); ?>
				<?php weracoba_posted_on(); ?>
				<?php weracoba_comments(); ?>
				<?php weracoba_tag_list(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<div class="continue-reading">
			<?php
			$weracoba_read_more_link = sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Open %s', 'weracoba' ),
					array( 'span' => array( 'class' => array() ) )
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			);
			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php echo $weracoba_read_more_link; /* phpcs:ignore XSS OK */ ?>
				<?php echo weracoba_get_icon_svg( 'chevron_right', 24 ); /* phpcs:ignore XSS OK */ ?>
			</a>
		</div>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
