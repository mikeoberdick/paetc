<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Site Search', 'understrap' ); ?></label>
	<div>
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
			<button class="search-submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
</form>