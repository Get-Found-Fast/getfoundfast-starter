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

/**
 * Enable shortcodes in widgets
 */
add_filter('widget_text', 'do_shortcode');

/**
 *Enable ACF options
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
	'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false));
	
		
		acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media Settings',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-general-settings',
	));
	
		acf_add_options_sub_page(array(
		'page_title' 	=> 'RAD & SEO Settings',
		'menu_title'	=> 'RAD & SEO',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

 
/**
 * Load the state choices
 *
 * @return array
 */
add_filter( 'acf/load_field/name=address_state', function( $field ) {
    $field['choices'] = array();
    return get_choices( $field, get_states_array() );
});
 
/**
 * Load the country choices
 * Original list from Yoast Local SEO
 *
 * @return array
 */
add_filter( 'acf/load_field/name=address_country', function( $field ) {
    $field['choices'] = array();
    return get_choices( $field, get_countries_array() );
});
 
/**
 * Return the state name based on state code
 *
 * @param  string $state_code Two char country code.
 *
 * @return string State name.
 */
function get_state( $state_code = '' ) {
    return get_value_from_key( $state_code, get_states_array() );
}
 
/**
 * Return the country name based on country code
 *
 * @param  string $country_code Two char country code.
 *
 * @return string Country name.
 */
function get_country( $country_code = '' ) {
    return get_value_from_key( $country_code, get_countries_array() );
}
 
/**
 * Helper method to get the formatted choices to load an ACF select field
 *
 * @param  array  $field   $field array from acf/load_field
 * @param  array  $choices The unformatted choices array
 *
 * @return array
 */
function get_choices( $field, $choices ) {
    foreach ( $choices as $key => $value ) {
        $field['choices'][ $key ] = $value;
    }
    return $field;
}
 
/**
 * Get the value of an array item by key
 *
 * @param   string  $key
 * @param   array   $names
 *
 * @return  string
 */
function get_value_from_key( $key = '', $names ) {
    if ( $key == '' || ! array_key_exists( $key, $names ) ) {
        return false;
    }
    return $names[$key];
}
 
/**
 * Retrieves array of all states and their state code.
 *
 * @return array Array of states
 */
function get_states_array() {
    return array(
        'AL' => __( 'Alabama' , 'textdomain' ),
        'AK' => __( 'Alaska' , 'textdomain' ),
        'AZ' => __( 'Arizona' , 'textdomain' ),
        'AR' => __( 'Arkansas' , 'textdomain' ),
        'CA' => __( 'California' , 'textdomain' ),
        'CO' => __( 'Colorado' , 'textdomain' ),
        'CT' => __( 'Connecticut' , 'textdomain' ),
        'DE' => __( 'Delaware' , 'textdomain' ),
        'DC' => __( 'District of Colombia' , 'textdomain' ),
        'FL' => __( 'Florida' , 'textdomain' ),
        'GA' => __( 'Georgia' , 'textdomain' ),
        'HI' => __( 'Hawaii' , 'textdomain' ),
        'ID' => __( 'Idaho' , 'textdomain' ),
        'IL' => __( 'Illinois' , 'textdomain' ),
        'IN' => __( 'Indiana' , 'textdomain' ),
        'IA' => __( 'Iowa' , 'textdomain' ),
        'KS' => __( 'Kansas' , 'textdomain' ),
        'KY' => __( 'Kentucky' , 'textdomain' ),
        'LA' => __( 'Louisiana' , 'textdomain' ),
        'ME' => __( 'Maine' , 'textdomain' ),
        'MD' => __( 'Maryland' , 'textdomain' ),
        'MA' => __( 'Massachusetts' , 'textdomain' ),
        'MI' => __( 'Michigan' , 'textdomain' ),
        'MN' => __( 'Minnesota' , 'textdomain' ),
        'MS' => __( 'Mississippi' , 'textdomain' ),
        'MO' => __( 'Missouri' , 'textdomain' ),
        'MT' => __( 'Montana' , 'textdomain' ),
        'NE' => __( 'Nebraska' , 'textdomain' ),
        'NV' => __( 'Nevada' , 'textdomain' ),
        'NH' => __( 'New Hampshire' , 'textdomain' ),
        'NJ' => __( 'New Jersey' , 'textdomain' ),
        'NM' => __( 'New Mexico' , 'textdomain' ),
        'NY' => __( 'New York' , 'textdomain' ),
        'NC' => __( 'North Carolina' , 'textdomain' ),
        'ND' => __( 'North Dakota' , 'textdomain' ),
        'OH' => __( 'Ohio' , 'textdomain' ),
        'OK' => __( 'Oklahoma' , 'textdomain' ),
        'OR' => __( 'Oregon' , 'textdomain' ),
        'PA' => __( 'Pennsylvania' , 'textdomain' ),
        'PR' => __( 'Puerto Rico' , 'textdomain' ),
        'RI' => __( 'Rhode Island' , 'textdomain' ),
        'SC' => __( 'South Carolina' , 'textdomain' ),
        'SD' => __( 'South Dakota' , 'textdomain' ),
        'TN' => __( 'Tennessee' , 'textdomain' ),
        'TX' => __( 'Texas' , 'textdomain' ),
        'UT' => __( 'Utah' , 'textdomain' ),
        'VT' => __( 'Vermont' , 'textdomain' ),
        'VA' => __( 'Virginia' , 'textdomain' ),
        'WA' => __( 'Washington' , 'textdomain' ),
        'WV' => __( 'West Virginia' , 'textdomain' ),
        'WI' => __( 'Wisconsin' , 'textdomain' ),
        'WY' => __( 'Wyoming' , 'textdomain' ),
    );
}
function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

add_filter('login_errors',create_function('$a', "return null;"));
