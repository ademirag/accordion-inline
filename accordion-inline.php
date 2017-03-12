<?php
/**
 * @package AccInline
 * @version 1.0
 */
/*
Plugin Name: Accordion Inline
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Adds the capability of texting with an accordion style paragraphs on text editor.
Author: Asım Demirağ & Uğur Acil
Version: 1.0
Author URI: http://www.asimdemirag.com
Text Domain: AccInline
*/
define('ACCINLINEURL',plugin_dir_url(__FILE__));

define('ACCINLINEURL_BASENAME',plugin_basename(__FILE__));

require( 'lib/AccInline.class.php' );
$AccInline = new AccInline();


// enka_live_wsuer 7M4EOum3
