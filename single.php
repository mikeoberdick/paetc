<?php get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<main class="site-main" id="content" tabindex="-1">
		<div id = "singlePostContainer" class="mt-5 container">
			<div class="row mb-5">
				<div class="col-md-9">
					<?php while ( have_posts() ) : the_post(); ?>
						<h1 class="h3 mb-3"><?php the_title(); ?></h1>
						<div class="the-content">
							<?php the_content(); ?>
						</div><!-- .the-content -->
					<?php endwhile; ?>
				</div><!-- .col-md-9 -->

				<div id = "singleSidebar" class="col-md-3">
					<?php dynamic_sidebar( 'blog_post_sidebar' ); ?>
				</div><!-- .col-md-3 -->
			</div><!-- .row -->
		</div><!-- .container -->

		</main><!-- #content -->
	</div><!-- #post-X -->
<?php get_footer(); ?>