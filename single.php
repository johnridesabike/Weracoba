<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Weracoba
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
            $format = get_post_format() ? : 'single';
			get_template_part( 'template-parts/content', $format );
            
            if ( is_singular( 'attachment' ) ) {
                weracoba_attachment_navigation();
            } elseif ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                ?>
                <h2 class="post-navigation-title">Read more <?php echo get_the_category_list( esc_html_x( ', ', 'category seperator', 'weracoba' ) );?> posts.</h2>
                <?php
                $prev_icon = twentynineteen_get_icon_svg( 'chevron_left', 24 );
                $next_icon = twentynineteen_get_icon_svg( 'chevron_right', 24 );
                the_post_navigation(
                    array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . $next_icon . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span>' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . $prev_icon . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span>' .
                            '<span class="post-title">%title</span>',
                        
                        'in_same_term' => true,
                    )
                );
            }

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
            
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
get_footer();
