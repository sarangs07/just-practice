<?php
	/*
		Template Name: Archives
	*/


get_header(); 
?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 
				$args = array( 'post_type' => 'faculty', 'posts_per_page' => 10 );
				$the_query = new WP_Query( $args ); 
			?>
			<?php if ( $the_query->have_posts() ) : 
					while ( $the_query->have_posts() ) : $the_query->the_post();
			?>
				<div class="faculty-board">
					<h2 class="title"><?php the_title(); ?></h2>
					<div class="row">
						<div class="col-md-2">
							<div class="img-container">
								<?php the_post_thumbnail(); ?>
							</div>
						</div>
						<div class="col-md-9 offset-1">
							<div class="content-area">
								<?php the_content(); ?>
								<a href="<?php the_permalink(); ?>" class="btn btn-default btn-sm read-more-btn">Read More</a>
							</div>
						</div> 
					</div>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endwhile;?>
			<?php else :  ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();

?>