<article class="masonry-entry" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<?php if ( has_post_thumbnail() ) : ?>
	    <div class="masonry-thumbnail">
	        <a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('masonry-thumb'); ?></a>
	    </div><!--.masonry-thumbnail-->
	<?php endif; ?>
    <div class="masonry-details">
        <h5><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><span class="masonry-post-title"> <?php the_title(); ?></span></a></h5>
        <?php 
            //put the excerpt markup in variable so we don't have to repeat it multiple times.
            $excerpt = '<div class="masonry-post-excerpt">';
            $excerpt .= the_excerpt();
            $excerpt .= '</div><!--.masonry-post-excerpt-->';
//if we can only skip for phones, else skip for all mobile devices
            if (function_exists( 'is_phone')) {
                if ( ! is_phone() ) {
                    echo $excerpt;
                }
            }
            else {
                if ( ! wp_is_mobile() ) {
                    echo $excerpt;
                }
            }
        ?>
    </div><!--/.masonry-entry-details -->  
</article><!--/.masonry-entry-->