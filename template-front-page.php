<?php
/**
 * Template Name: Front Page
 *
 * @package weracoba
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<div class="cat-blocks">
			<?php
			$weracoba_cats_raw = explode( ',', get_theme_mod( 'fp_cats' ) );
			$weracoba_cats     = array();
			foreach ( $weracoba_cats_raw as $weracoba_key => $weracoba_cat ) {
				$weracoba_cats[] = get_category( $weracoba_cat );
			}
			foreach ( $weracoba_cats as $weracoba_key => $weracoba_cat ) :
				if ( ! property_exists( $weracoba_cat, 'term_id' ) ) {
					continue;
				}
				$weracoba_cat_query = new WP_Query(
					array(
						'cat'      => $weracoba_cat->term_id,
						'meta_key' => '_thumbnail_id',
					)
				);
				$weracoba_cat_query->the_post();
				$weracoba_cat_link = esc_url( get_category_link( $weracoba_cat->cat_ID ) );
				?>
				<div class="cat-block-wrap">
					<div class="cat-block">
						<a href="<?php echo esc_url( get_category_link( $weracoba_cat->cat_ID ) ); ?>"
							class="overlay-link" aria-hidden="true" tabindex="-1"></a>
						<figure class="featured-image">
							<a class="post-thumbnail" aria-hidden="true" tabindex="-1"
								href="<?php echo $weracoba_cat_link; /* phpcs:ignore xss ok. */ ?>">
								<?php
								the_post_thumbnail(
									'post-thumbnail',
									array( 'alt' => the_title_attribute( array( 'echo' => false ) ) )
								);
								?>
							</a>
						</figure>
						<h2 class="cat-title">
							<a href="<?php echo $weracoba_cat_link; /* phpcs:ignore xss ok. */ ?>">
								<?php echo esc_html( $weracoba_cat->cat_name ); /* phpcs:ignore xss ok. */ ?>
							</a>
						</h2>
						<?php
						if ( $weracoba_cat->description ) :
							?>
							<p>
								<?php echo esc_html( $weracoba_cat->description ); ?>
							</p>
							<?php
						endif;
						?>
					</div>
				</div>
				<?php
				wp_reset_postdata(); // reset the query.
			endforeach;
			?>
		</div> <!-- .fp-blocks -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
