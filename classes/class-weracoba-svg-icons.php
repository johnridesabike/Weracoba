<?php
/**
 * SVG Icons class
 *
 * @package Weracoba
 * @since 0.1
 */

/**
 * Extends TwentyNineteen's icons
 */
require( dirname(__FILE__) . '/' . 'class-twentynineteen-svg-icons.php' ); 

class Weracoba_SVG_Icons {
    /* Dashicons
    ** @link https://github.com/WordPress/dashicons/tree/master/svg-min
    */
    static $ui_icons = array(
        'menu'                  => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <rect x="0" fill="none" width="20" height="20"/>
    <g>
        <path d="M17 7V5H3v2h14zm0 4V9H3v2h14zm0 4v-2H3v2h14z"/>
    </g>
</svg>
',
        'dismiss'               => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <rect x="0" fill="none" width="20" height="20"/>
    <g>
        <path d="M10 2c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8 3.58-8 8-8zm5 11l-3-3 3-3-2-2-3 3-3-3-2 2 3 3-3 3 2 2 3-3 3 3z"/>
    </g>
</svg>
'
    );
}

// Instead of rewriting the TwentyNineteen class, we'll just merge it with the Weracoba class.
// In the future this Weracoba class may replace TwentyNineteen.

TwentyNineteen_SVG_Icons::$ui_icons = array_merge( TwentyNineteen_SVG_Icons::$ui_icons, Weracoba_SVG_Icons::$ui_icons );