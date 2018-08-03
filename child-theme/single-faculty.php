<?php
/**
 * Template Name: Archives
 *
 * 
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			 <h3><?php the_title(); ?></h3>
			 <?php the_content(); ?>
			 <h5>Contact details</h5>
			 	<?php
			 		$contact_details = get_post_custom_values($key = 'Contact Details');
			 	?>
			 	<ul>
					<li><?php echo $contact_details[0];?></li>
					<li><?php echo $contact_details[1];?></li>
					
				</ul>

				<?php
					$department = get_post_custom_values($key = 'Department');
				?>
			<h5>Department</h5>
				<ul>
					<li><?php echo $department[0];?></li>
				</ul>
			 
			 <span class="date">Added On :<?php echo get_the_date(); ?></span>

			<?php endwhile; ?>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
