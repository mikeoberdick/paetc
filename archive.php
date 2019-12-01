<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<div id="archive">
		<main id="content" class="site-main container mt-5" tabindex="-1">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h3 mb-3">Currently Viewing the "<?php single_cat_title(); ?>" archive</h1>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
				<?php if ( have_posts() ) : ?>
					<div class="row mb-5">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="the-post col-sm-12">
						<h2 class = "h3"><?php the_title(); ?></h2>
						<div class = "excerpt"><?php the_excerpt(); ?></div>
						<a href="<?php the_permalink(); ?>" class = "learn-more">Learn More</a>
					</div><!-- .col-sm-12 -->	
				<?php endwhile; ?>
				</div><!-- .row -->
				<?php endif; ?>
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
		</main><!-- #content -->
	</div><!-- #archive -->
<?php get_footer(); ?>