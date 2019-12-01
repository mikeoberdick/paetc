<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<div id="homepage">
	<main class="site-main" id="content">
	
	<?php $hero = get_field('hero'); ?>
	<section id="hero" style = "background: url('<?php echo $hero['image']['url']; ?>');" class = "page-hero">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1 class="text-white mb-3"><?php echo $hero['header']; ?></h1>
					<h2 class="h3 text-white mb-0"><?php echo $hero['subheading']; ?></h2>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->	
		</div><!-- .container -->
	</section><!-- #hero -->

	<section id="interactiveGraphic" class = "container">
		<img src="" alt="">
	</section><!-- #interactiveGraphic -->

	<section id="about" class = "container mb-5">
		<?php $about = get_field('about_section'); ?>
		<div class="row">
			<div class="col sm-6">
				<?php echo $about['simple_maps']; ?>
			</div><!-- .col sm-6 -->
			<div class="col sm-6">
				<h3 class = "mb-3"><?php echo $about['header']; ?></h3>
				<p class = "mb-3"><?php echo $about['copy']; ?></p>
				<a href = '<?php echo $about['button_link']; ?>'><button role = 'button' class = 'btn btn-primary'><?php echo $about['button_text']; ?></button></a>
			</div><!-- .col sm-6 -->
		</div><!-- .row -->
	</section><!-- #about -->

	<section id="events" class="container mb-5 text-center">
		<h3 class = "mb-5">Events</h3>
		<div>EVENTS HERE</div>
		<a href = '<?php echo bloginfo('url'); ?>/events'><button role = 'button' class = 'btn btn-primary'>More Events</button></a>
	</section><!-- #events -->

	<section id="resources" class="container mb-5">
		<h3 class = "mb-5 text-center">Resources</h3>
		<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 3 ); ?>
			<?php $query = new WP_Query($args); ?>
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="homepage-post row mb-3">
					<div class="col-sm-2 d-flex justify-content-center date-wrapper">
						<?php
						//vars
						$m = get_the_date('M');
						$d = get_the_date('d');
						$y = get_the_date('Y');

						?>
						<div class = "date">
							<?php echo $m . ' ' . $d . '<br>' . $y; ?>
						</div>
					</div><!-- .col-sm-2 -->
					<div class="col-sm-10">
						<h5 class = "mb-3"><?php the_title(); ?></h5>
						<?php
						$categories = get_the_category();
						$separator = ', ';
						$output = '';
						if ( ! empty( $categories ) ) { ?>
						<p class = "tags mb-3">Tags:
    						<?php foreach( $categories as $category ) {
        					$output .= esc_html( $category->name ) . $separator; }
    						echo trim( $output, $separator );
							} ?>
						</p>
						<div class = "excerpt mb-3"><?php the_excerpt(); ?></div>
						<a href="<?php the_permalink(); ?>" class = "learn-more">Learn More</a>
					</div><!-- .col-sm-10 -->
				</div><!-- .row -->
			<?php endwhile; endif; ?>
		<?php wp_reset_postdata(); ?>
		<div class = "text-center">
		<a href = '<?php echo bloginfo('url'); ?>/resources'><button role = 'button' class = 'btn btn-primary'>More Resources</button></a>	
		</div>
	</section><!-- #resources -->

	<section id="testimonials" class="mb-5">
<?php if( have_rows('testimonials') ):while ( have_rows('testimonials') ):the_row(); ?>
		  <div class = "testimonial p-4 position-relative">
		  	<h5 class = "heading mb-4"><?php the_sub_field('heading'); ?></h5>
		  	<p class = "copy mb-3"><?php the_sub_field('copy'); ?></p>
		  	<div class="location">
		  		<i class="fa fa-map-marker mr-2" aria-hidden="true"></i>
		  		<span><?php the_sub_field('location'); ?></span>
		  	</div><!-- .location -->
		  </div>
		<?php endwhile; endif; ?>
	</section><!-- #testimonials -->

	<section id="prevalanceMap" class="container mb-5 text-center">
		<div>iFrame Map Here</div>
	</section><!-- #prevalanceMap -->

	</main><!-- #content -->
</div><!-- #homepage -->

<?php get_footer(); ?>