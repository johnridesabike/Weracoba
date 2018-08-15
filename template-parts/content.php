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
	<!--<div class="post_content">-->
		<header class="entry-header">
	    	<?php weracoba_category_list(); ?>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>

				<div class="entry-meta">
					<?php weracoba_posted_by(); ?>
					<?php weracoba_posted_on(); ?>
					<?php weracoba_comments(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php weracoba_post_thumbnail(); ?>

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
		<div class="continue-reading">
			<?php
			$read_more_link = sprintf(
				/* translators: %s: Name of current post. Only visible to screen readers */
				wp_kses( __( 'Continue reading %s', 'weracoba' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false)
			);
			 ?>
			<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
				<?php echo $read_more_link ?>
			</a>
		</div>
	<!--</div> .post_content -->
</article><!-- #post-<?php the_ID(); ?> -->
