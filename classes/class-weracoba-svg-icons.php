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
',
        'calendar'              => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><rect x="0" fill="none" width="20" height="20"/>
    <g>
        <path d="M15 4h3v15H2V4h3V3c0-.41.15-.76.44-1.06.29-.29.65-.44 1.06-.44s.77.15 1.06.44c.29.3.44.65.44 1.06v1h4V3c0-.41.15-.76.44-1.06.29-.29.65-.44 1.06-.44s.77.15 1.06.44c.29.3.44.65.44 1.06v1zM6 3v2.5c0 .14.05.26.15.36.09.09.21.14.35.14s.26-.05.35-.14c.1-.1.15-.22.15-.36V3c0-.14-.05-.26-.15-.35-.09-.1-.21-.15-.35-.15s-.26.05-.35.15c-.1.09-.15.21-.15.35zm7 0v2.5c0 .14.05.26.14.36.1.09.22.14.36.14s.26-.05.36-.14c.09-.1.14-.22.14-.36V3c0-.14-.05-.26-.14-.35-.1-.1-.22-.15-.36-.15s-.26.05-.36.15c-.09.09-.14.21-.14.35zm4 15V8H3v10h14zM7 9v2H5V9h2zm2 0h2v2H9V9zm4 2V9h2v2h-2zm-6 1v2H5v-2h2zm2 0h2v2H9v-2zm4 2v-2h2v2h-2zm-6 1v2H5v-2h2zm4 2H9v-2h2v2zm4 0h-2v-2h2v2z"/>
    </g>
</svg>',
        'update'                => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <rect x="0" fill="none" width="20" height="20"/>
    <g>
        <path d="M10.2 3.28c3.53 0 6.43 2.61 6.92 6h2.08l-3.5 4-3.5-4h2.32c-.45-1.97-2.21-3.45-4.32-3.45-1.45 0-2.73.71-3.54 1.78L4.95 5.66C6.23 4.2 8.11 3.28 10.2 3.28zm-.4 13.44c-3.52 0-6.43-2.61-6.92-6H.8l3.5-4c1.17 1.33 2.33 2.67 3.5 4H5.48c.45 1.97 2.21 3.45 4.32 3.45 1.45 0 2.73-.71 3.54-1.78l1.71 1.95c-1.28 1.46-3.15 2.38-5.25 2.38z"/>
    </g>
</svg>',
        'lock'                  => '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><rect x="0" fill="none" width="20" height="20"/>
    <g>
        <path d="M14 9h1c.55 0 1 .45 1 1v7c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1v-7c0-.55.45-1 1-1h1V6c0-2.21 1.79-4 4-4s4 1.79 4 4v3zm-2 0V6c0-1.1-.9-2-2-2s-2 .9-2 2v3h4zm-1 7l-.36-2.15c.51-.24.86-.75.86-1.35 0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5c0 .6.35 1.11.86 1.35L9 16h2z"/>
    </g>
</svg>',
    );
}

// Instead of rewriting the TwentyNineteen class, we'll just merge it with the Weracoba class.
// In the future this Weracoba class may replace TwentyNineteen.

TwentyNineteen_SVG_Icons::$ui_icons = array_merge( TwentyNineteen_SVG_Icons::$ui_icons, Weracoba_SVG_Icons::$ui_icons );