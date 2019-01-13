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
		if ( get_the_time( 'U' ) === get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        } else {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }
        
        $time_string_updated = '<time class="updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
        
        

		$posted_on = sprintf(
			/* translators: %s: post date. */
			wp_kses( 
                _x( '<span class="screen-reader-text">Posted on</span> %s', 'post date', 'weracoba' ), 
                array( 'span' => array( 'class' => array() ) ) 
            ),
            $time_string );

		echo '<span class="posted-on">' . twentynineteen_get_icon_svg( 'calendar', 16) . $posted_on . '</span>'; // WPCS: XSS OK.
        
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string_updated = sprintf( $time_string_updated,
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );

            $updated_on = sprintf(
                /* translators: %s: update date. */
                wp_kses( 
                    _x( '<span class="screen-reader-text">Updated on</span> %s', 'update date', 'weracoba' ), 
                    array( 'span' => array( 'class' => array() ) ) 
                ),
                $time_string_updated );

		  echo '<span class="updated-on">' . twentynineteen_get_icon_svg( 'update', 16) . $updated_on . '</span>'; // WPCS: XSS OK.
        }
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
			esc_html_x( 'By %s', 'post author', 'weracoba' ),
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
		if ( 'post' === get_post_type() ) {
            ?>
            <div class="post-taxonomy">
                <?php
                weracoba_category_list();
                weracoba_tag_list();
                ?>
            </div><!--.post-taxonomy-->
            <?php
        }
        weracoba_comments();
        /**
         * https://jetpack.com/support/sharing/
         */
        if ( function_exists( 'sharing_display' ) ) {
            sharing_display( '', true );
        }
         
        if ( class_exists( 'Jetpack_Likes' ) ) {
            $custom_likes = new Jetpack_Likes;
            echo $custom_likes->post_likes( '' );
        }

        /**
         * https://jetpack.com/support/related-posts/
         */

        if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
            echo do_shortcode( '[jetpack-related-posts]' );
        }

        if ( is_singular( 'attachment' ) ) {
            weracoba_attachment_navigation();
        } elseif ( is_singular( 'post' ) ) {
            weracoba_post_navigation();
        }
    }
    
    /* 
    * Remove the standard Jetpack features that we just added to the footer
    */
    function jptweak_remove_share() {
        remove_filter( 'the_content', 'sharing_display', 19 );
        remove_filter( 'the_excerpt', 'sharing_display', 19 );
        if ( class_exists( 'Jetpack_Likes' ) ) {
            remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
        }
    }
    add_action( 'loop_start', 'jptweak_remove_share' );
    
    function jetpackme_remove_rp() {
        if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
            $jprp = Jetpack_RelatedPosts::init();
            $callback = array( $jprp, 'filter_add_target_to_dom' );
            remove_filter( 'the_content', $callback, 40 );
        }
    }
    add_filter( 'wp', 'jetpackme_remove_rp', 20 );

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
                <?php if ( get_the_post_thumbnail_caption() ) : ?>
                    <figcaption>
                        <?php the_post_thumbnail_caption(); ?>
                    </figcaption>
                <?php endif; ?>
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
		$categories_list = get_the_category_list( esc_html_x( ', ', 'list item separator', 'weracoba' ), esc_html('>') );
		if ( $categories_list ) {
			/* translators: 1: SVG icon
                            2: list of categories. */
			printf( '<div class="cat-links">' . esc_html__( '%1$s %2$s', 'weracoba' ) . '</div>',
                    twentynineteen_get_icon_svg( 'archive', 16), $categories_list ); // WPCS: XSS OK.
		}
	}
endif;

/***** Display the tag list ****/
if ( ! function_exists( 'weracoba_tag_list' ) ) :
	function weracoba_tag_list() {
        /* translators: There is a space before and after the text. */
        $tagged = esc_html__( ' Tagged ', 'weracoba' );
        echo get_the_tag_list(
            '<div class="tags-links"> '. twentynineteen_get_icon_svg( 'tag', 16 ) . ' <span class="screen-reader-text">' . $tagged . "</span>", 
            /* translators: used between list items, there is a space after the comma */
            esc_html_x( ', ', 'list item separator', 'weracoba' ),
            '</div>' );
	}
endif;

/**** Display the comments and edit ****/
if ( ! function_exists( 'weracoba_comments' ) ) :
	function weracoba_comments() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
            echo twentynineteen_get_icon_svg( 'comment', 16 ) . ' ';
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
/*
if ( ! function_exists( 'weracoba_post_navigation' ) ) :
	function weracoba_post_navigation() {
		$prev_icon = twentynineteen_get_icon_svg( 'chevron_left', 24 );
		$next_icon = twentynineteen_get_icon_svg( 'chevron_right', 24 );
        ?>
        <h2 class="post-navigation-title">Read more <?php echo get_the_category_list( esc_html__( ', ', 'weracoba' ) );?> posts.</h2>
        <?php
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next post', 'weracoba') . $next_icon . '</span> <span class="screen-reader-text">' . __('Next Post', 'weracoba') . '</span> <span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . $prev_icon . __('Previous post', 'weracoba') . '</span> <span class="screen-reader-text">' . __('Previous Post', 'weracoba') . '</span> <span class="post-title">%title</span>',
            'in_same_term' => true
		));
	}
endif;*/

if ( ! function_exists( 'weracoba_post_navigation' ) ) :
    function weracoba_post_navigation() {
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
endif;

if ( ! function_exists( 'weracoba_the_posts_pagination' ) ) :
	/**
	 * Documentation for function.
	 */
	function weracoba_the_posts_pagination() {
		$prev_icon = twentynineteen_get_icon_svg( 'chevron_left', 24 );
		$next_icon = twentynineteen_get_icon_svg( 'chevron_right', 24 );
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf( '%s <span class="nav-prev-text">%s</span>', $prev_icon, __( 'Newer posts', 'weracoba' ) ),
				'next_text' => sprintf( '<span class="nav-next-text">%s</span> %s', __( 'Older posts', 'weracoba' ), $next_icon ),
			)
		);
	}
endif;

if ( ! function_exists( 'weracoba_attachment_navigation' ) ) :
    function weracoba_attachment_navigation() {
        // Parent post navigation.
        the_post_navigation(
            array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span> <span class="post-title">%title</span>', 'Parent post link', 'twentynineteen' ),
            )
        );
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

if ( ! function_exists( 'weracoba_citation' ) ) :
    /**
     * Display a citation for the current page. APA format, for no particular reason.
     * This could be changed to support other formats too.
     */
    function weracoba_citation() {
        if ( is_singular() ) {
            $first_name = get_the_author_meta( 'first_name' );
            $last_name  = get_the_author_meta( 'last_name' );
            if ( $first_name && $last_name ) {
                $author = $last_name . ', ' . $first_name[0]; // APA
            } else {
                $author = get_the_author(); // fallback
            }
            $date       = '<time datetime="' . get_the_date( DATE_W3C ) . '">' . get_the_date( 'Y, M j' ) . '</time>'; // APA
            $title      = get_the_title();
            $permalink  = get_permalink();
        } else {
            $author     = get_bloginfo( 'name' );
            $date       = __( 'n.d.', 'weracoba' );
            $title      = get_the_archive_title();
            $permalink  = home_url( $_SERVER['REQUEST_URI'] );
        }
        
        $title = $title ? : get_bloginfo( 'name' );
        $title = ucfirst( strtolower( trim( $title ) ) );
        $permalink = __( 'Retrieved from <code>', 'weracoba' ) . $permalink . '</code>';
        
        return sprintf(
            wp_kses(
                '%1$s. (%2$s). <cite>%3$s</cite>. %4$s',
                array(
                    'code' => array(),
                    'cite' => array(),
                    'time' => array(
                        'datetime' => array(),
                    ),
                    'span' => array(
                        'class' => array(), 
                    ),
                )
            ),
        $author, $date, $title, $permalink
        );
    }
endif;