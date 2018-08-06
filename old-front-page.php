<?php

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fp-blurb">
            <p>Welcome</p>
            <p>
                This is the front page.
            </p>
        </div>
        <h3 class="fp-header">Skills and Experience</h3>
        <div class="fp-services">
            <?php
            $custom_query = new WP_Query('cat=17'); // Library Programming category
            while($custom_query->have_posts()) : $custom_query->the_post();
            ?>
            <figure class="fp-blocks">
                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                <?php
                if ( has_post_thumbnail() ) :?>
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url( 'fp-thumb' ) ?>" />
                    </a>
                <?php endif; ?>
                <figcaption>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </figcaption>
            </figure>
            <?php
            endwhile;
            wp_reset_postdata(); // reset the query
            ?>

             <?php
             $custom_query = new WP_Query('cat=18'); // Library Programming category
             while($custom_query->have_posts()) : $custom_query->the_post();
             ?>
             <figure class="fp-blocks">
                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                 <?php
                 if ( has_post_thumbnail() ) :?>
                     <a href="<?php the_permalink(); ?>">
                         <img src="<?php the_post_thumbnail_url( 'fp-thumb' ) ?>" />
                     </a>
                 <?php endif; ?>
                <figcaption>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </figcaption>
             </figure>
             <?php
             endwhile;
             wp_reset_postdata(); // reset the query
             ?>

             <?php
             $custom_query = new WP_Query('cat=19'); // Library Programming category
             while($custom_query->have_posts()) : $custom_query->the_post();
             ?>
             <figure class="fp-blocks">
                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                 <?php
                 if ( has_post_thumbnail() ) :?>
                     <a href="<?php the_permalink(); ?>">
                         <img src="<?php the_post_thumbnail_url( 'fp-thumb' ) ?>" />
                     </a>
                 <?php endif; ?>
                <figcaption>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </figcaption>
             </figure>
             <?php
             endwhile;
             wp_reset_postdata(); // reset the query
             ?>
        </div> <!-- .fp-services -->

        <h3 class="fp-header">Recent posts</h3>
        <div class="latest-post">
            <?php
            // this will display the most recent 3 posts
            $second_query = new WP_Query('cat=-17,-18,-19&posts_per_page=3');
            while( $second_query->have_posts() ): $second_query->the_post();
                //get_template_part( 'template-parts/content', get_post_type() );
            ?>
            <div class="fp-post">
                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                <figure class="fp-figure">
                 <?php
                 if ( has_post_thumbnail() ) :?>
                     <a href="<?php the_permalink(); ?>">
                         <img src="<?php the_post_thumbnail_url( 'fp-thumb' ) ?>" />
                     </a>
                 <?php endif; ?>
                    <?php
                        the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );?>
                    <?php the_excerpt(); ?>
                </figure> <!-- .fp-figure -->
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
            </div> <!-- .fp-post -->
            <?php /*
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post_content">
                    <header class="entry-header">
                        <?php
                        the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );

                    if ( 'post' === get_post_type() ) :?>
                        <div class="entry-meta">
                            <?php weracoba_posted_on(); ?>
                            <?php weracoba_comments(); ?>
                        </div><!-- .entry-meta --
                    <?php endif; ?>
                    </header><!-- .entry-header --

                    <?php weracoba_post_thumbnail(); ?>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-content --
                    <div class="continue-reading">
                        <?php
                        $read_more_link = sprintf(
                            /* translators: %s: Name of current post. Only visible to screen readers *
                            wp_kses( __( 'Continue reading %s', 'weracoba' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false)
                        );
                         ?>
                        <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
                            <?php echo $read_more_link ?>
                        </a>
                    </div>
                </div><!-- .post_content --
            </article><!-- #post-<?php the_ID(); ?> -->*/?>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div> <!-- .latest-post -->
        <div class="blog-link">
            <a href="<?php echo esc_url( wereacoba_get_post_page_url() ) ?>" rel="bookmark">
                More blog posts
            </a>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
