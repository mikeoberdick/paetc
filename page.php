<?php
/**
 * The template for displaying all pages.
 *
 * This is the template for pages...note the conditionals for use with template parts.
 * Each page will need a container and a row.
 * These elements have been removed from this page to allow for each page to either be a fixed or fluid width container.
 *
 * @package understrap
 */

get_header(); ?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<main class="site-main" id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'snippets/page-header' ); ?>
			<div class = "container">
				<div class="row mb-5">
					<div class="col-sm-8">
						<h2 class="h3 mb-3"><?php the_title(); ?></h2>
						<div class="the-content">
							<?php the_content(); ?>
						</div><!-- .the-content -->
					</div><!-- .col-sm-8 -->
					<div class="col-sm-4">
						<section id="sidebarSlider" class="mb-5">
<?php if( have_rows('testimonials', 'options') ):while ( have_rows('testimonials', 'options') ):the_row(); ?>
						  <div class = "testimonial p-4 position-relative">
						  	<h5 class = "heading mb-4"><?php the_sub_field('heading'); ?></h5>
						  	<p class = "copy mb-3"><?php the_sub_field('copy'); ?></p>
						  	<div class="location">
						  		<i class="fa fa-map-marker mr-2" aria-hidden="true"></i>
						  		<span><?php the_sub_field('location'); ?></span>
						  	</div><!-- .location -->
						  </div><!-- .testimonial -->
						<?php endwhile; endif; ?>
						</section><!-- #sidebarSlider -->
					</div><!-- .col-sm-4 -->
				</div><!-- .row -->

				<section id="events" class="row mb-5 text-center">
					<div class="col-sm-12">
						<h3 class = "mb-5">Events</h3>
						<div>EVENTS HERE</div>
						<a href = '<?php echo bloginfo('url'); ?>/events'><button role = 'button' class = 'btn btn-primary'>More Events</button></a>	
					</div><!-- .col-sm-12 -->
				</section><!-- #events -->
			</div><!-- .container -->
		<?php endwhile; // end of the loop. ?>
	</main><!-- #content -->
</div><!-- #homepage -->

<?php get_footer(); ?>