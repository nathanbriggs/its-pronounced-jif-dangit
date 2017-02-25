<?php
/*
Plugin Name: It's Pronounced JIF, Dangit
Plugin URI: https://github.com/nathanbriggs/its-pronounced-jif-dangit
Description: Inspired by Matt Cromwell and his irrational attachment to the Jraphics Interchange Format
Version: 0.1
Author: Nathan Briggs
Author URI: https://wppampering.com
*/

foreach ( array( 'the_content', 'the_title', 'comment_text' ) as $filter ) {
	add_filter( $filter, 'its_pronounced_jif_dangit', 11 );
}

// nicked from wp-includes/formatting.php capital_P_dangit()
function its_pronounced_jif_dangit( $text ) {
	// Simple replacement for titles
	$current_filter = current_filter();
	if ( 'the_title' === $current_filter || 'wp_title' === $current_filter )
		return str_replace( 'GIF', 'JIF', $text );
	// Still here? Use the more judicious replacement
	static $dblq = false;
	if ( false === $dblq ) {
		$dblq = _x( '&#8220;', 'opening curly double quote' );
	}
	return str_replace(
		array( ' GIF', '&#8216;GIF', $dblq . 'GIF', '>GIF', '(GIF' ),
		array( ' JIF', '&#8216;JIF', $dblq . 'JIF', '>JIF', '(JIF' ),
	$text );
}
