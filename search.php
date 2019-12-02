<?php
/**
 * The template for displaying search results.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<div id="searchResults">
		<main id="content" class="site-main container mt-5" tabindex="-1">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h3 mb-3">Search results for "<?php the_search_query(); ?>"</h1>
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
				<div id="postNavigation">
					<?php understrap_pagination(); ?>
				</div><!-- #postNavigation -->
		</main><!-- #content -->
	</div><!-- #searchResults -->
<?php get_footer(); ?>