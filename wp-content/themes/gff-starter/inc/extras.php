<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GFF_Starter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gff_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'gff_starter_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function gff_starter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'gff_starter_pingback_header' );

/**
 * Adds sitemap shortcode
 */
 add_shortcode('sitemap', 'wp_sitemap_page');

 function wp_sitemap_page(){

    return "<ul>".wp_list_pages('title_li=&echo=0')."</ul>";

}

/**
 * Dynamic copyright function
 */
 
 add_shortcode('copyright', 'gff_copyright');
function gff_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');
// Enable ACF options
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}