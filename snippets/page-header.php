<?php if ( is_home() ) {
	$page_for_posts = get_option( 'page_for_posts' );
    $hero = get_the_post_thumbnail_url($page_for_posts, 'full');
	} else {
	$hero = get_the_post_thumbnail_url( $post->ID, 'full' );
} ?>	

<section id="hero" style = "background: url('<?php echo $hero; ?>');" class = "page-hero mb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php if ( is_home() ) {
					$title = get_the_title( get_option('page_for_posts', true) ); }
					else {
					$title = get_the_title();
					} ?>
<h1 class="page-header text-white mb-0 d-inline"><?php echo $title; ?></h1>			
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->	
	</div><!-- .container -->
</section><!-- #hero -->