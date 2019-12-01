<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<div id = "resources">
		<?php get_template_part( 'snippets/page-header' ); ?>
		<main id="content" class="site-main container" tabindex="-1">
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
	</div><!-- #resources -->
</div><!-- #post-X -->

<?php get_footer(); ?>