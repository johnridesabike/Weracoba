<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Weracoba
 */

if ( ! function_exists( 'weracoba_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function weracoba_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'weracoba' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'weracoba_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function weracoba_posted_by($with_avatar = true) {
        if ($with_avatar) {
            $avatar = get_avatar( get_the_author_meta( 'ID' ), 144 );
        } else {
            $avatar = '';
        }
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'weracoba' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . $avatar . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'weracoba_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function weracoba_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'weracoba' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'weracoba' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'weracoba_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function weracoba_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() && ! is_front_page() ) : ?>
            <figure class="full-bleed featured-image" style="background-image: url( <?php the_post_thumbnail_url( 'full' ); ?>)">
                <div class="post-thumbnail">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div><!-- .post-thumbnail -->
            </figure> <!--.full-bleed .featured-image -->
		<?php else : ?>
        <figure class="featured-image">
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail( 'post-thumbnail', array(
                    'alt' => the_title_attribute( array(
                        'echo' => false,
                    ) ),
                ) );
                ?>
            </a>
        </figure> <!--.full-bleed .featured-image -->
		<?php
		endif; // End is_singular().
	}
endif;

/***** Display the category list ****/
if ( ! function_exists( 'weracoba_category_list' ) ) :
	function weracoba_category_list() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'weracoba' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'weracoba' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
endif;

/**** Display the comments and edit ****/
if ( ! function_exists( 'weracoba_comments' ) ) :
	function weracoba_comments() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'weracoba' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span> ';
		}
        /*
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers *//*
					__( 'Edit <span class="screen-reader-text">%s</span>', 'weracoba' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);*/
	}
endif;


/***** Post navigation for single post ****/
if ( ! function_exists( 'weracoba_post_navigation' ) ) :
	function weracoba_post_navigation() {
        ?>
        <h2 class="post-navigation-title">Read more <?php echo get_the_category_list( esc_html__( ', ', 'weracoba' ) );?> posts</h2>
        <?php
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next post', 'weracoba') . '</span> <span class="screen-reader-text">' . __('Next Post:', 'weracoba') . '</span> <span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous post', 'weracoba') . '</span> <span class="screen-reader-text">' . __('Previous Post:', 'weracoba') . '</span> <span class="post-title">%title</span>',
            'in_same_term' => true
		));
	}
endif;

if ( ! function_exists( 'weracoba_get_post_page_url' ) ) :
    /**
     * Get the posts page URL in WordPress
     *
     * @link   https://www.winwar.co.uk/2015/10/get-the-posts-page-url-dynamically-in-wordpress/?utm_source=codesnippet
     *
     * @return string
     */
    function weracoba_get_post_page_url() {
        if( 'page' == get_option( 'show_on_front' ) ) {
            return get_permalink( get_option('page_for_posts' ) );
        } else {
            return home_url();
        }
    }
endif;

if ( ! function_exists( 'weracoba_reading_time' ) ) :
    /*
    * Output the reading time. Used in conjunction with "Reading Time WP" plugin.
    *
    * @link https://jasonyingling.me/reading-time-wp/
    *
    * Prints the HTML for a post's reading time.
    */
    function weracoba_reading_time($label = 'Reading time: about ', $postfix = 'minutes') {
        $reading_time = do_shortcode( sprintf(
            '[rt_reading_time label="%s" postfix="%s"]', $label, $postfix ) );
        if( substr($reading_time, 0, 1) === '[' ) {
            ?>
            <!-- Reading Time WP is not active https://jasonyingling.me/reading-time-wp/ -->
            <?php
        } else {
            echo $reading_time;
        }
    }
endif;
