<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>
	<footer id = "footer" class = "container-fluid py-5">
		<div class="container">
			<div class="row">
				<div id = "footerOne" class="col-sm-3">
					<h5 class = "text-white">About</h5>
					<ul id="footerAboutMenu" class = "list-unstyled">
						<li><a href="<?php echo bloginfo('url'); ?>/services">Services</a></li>
						<li><a href="<?php echo bloginfo('url'); ?>/programs">Programs</a></li>
						<li><a href="<?php echo bloginfo('url'); ?>/resources">Resources</a></li>
						<li><a href="<?php echo bloginfo('url'); ?>/events">Events</a></li>
						<li><a href="<?php echo bloginfo('url'); ?>/contact">Contact</a></li>
					</ul><!-- #footerAboutMenu -->
				</div><!-- .col-sm-3 -->
				<div id = "footerTwo" class="col-sm-3">
					<h5 class = "text-white">Resources</h5>
					<ul id="footerResourcesMenu" class = "list-unstyled">
						<li><a href="<?php echo bloginfo('url'); ?>/about">About</a></li>
						<li><a href="<?php echo bloginfo('url'); ?>/my-account">My Account</a></li>
					</ul><!-- #footerAboutMenu -->
				</div><!-- .col-sm-3 -->
				<div id = "footerThree" class="col-sm-3">
					<div id="address" class = "d-flex mb-3">
						<i class="fa fa-map-marker mr-3" aria-hidden="true"></i>
						<span><?php the_field('address', 'option'); ?></span>
					</div><!-- #address -->
					<div id="phone" class = "d-flex align-items-center mb-3">
						<i class="fa fa-phone mr-3" aria-hidden="true"></i>
	<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
						<a href="tel:<?php echo $phone ?>">
						  <?php the_field('phone_number', 'option'); ?>
						</a>
					</div><!-- #phone -->
					<div id="email" class = "d-flex align-items-center">
						<i class="fa fa-envelope mr-3" aria-hidden="true"></i>
						<a href = "mailto: <?php the_field('email_address', 'option'); ?>"><?php the_field('email_address', 'option'); ?></a>
					</div><!-- #email -->
				</div><!-- .col-sm-3 -->
				<div id = "footerFour" class="col-sm-3">
					<a href = '<?php the_field('donate_link', 'option'); ?>'><button role = 'button' class = 'btn btn-primary' target = "_blank">Donate Now</button></a>
				</div><!-- .col-sm-3 -->
			</div><!-- .row -->
			<div id = "footerBottom" class="row mt-5">
				<div class="col-sm-12">
					<div id="disclaimer" class = "py-3 mb-3">
						<p class = "mb-0"><?php the_field('footer_disclaimer', 'option'); ?></p>
					</div><!-- #disclaimer -->
					<div class = "d-flex justify-content-between">
						<p id="copyright" class = "mb-0"><?php the_field('footer_copyright', 'option'); ?></p>
						<p id = "attribution">website by <a href = "https://www.knockmedia.com" target = "_blank">knockmedia</a></p>
					</div><!-- #copyright -->
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->			
		</div><!-- .container -->
	</footer><!-- .container-fluid -->

</div><!-- wrapper end -->

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>