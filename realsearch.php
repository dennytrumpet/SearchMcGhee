<?php

/*
Plugin Name: SearchMcGhee
Plugin URI: http://voxmd.com
Description:
Version: 1.00
Author: Dennis McGhee
Author URI: http://the3rdplace.co

	Copyright 2017  DENNIS MCGHEE

	(email : dennis.mcghee@voxmd.com)

*/
/* changed to wp-options and transients */
function realsearch_install() {
add_option('realsearch_db_version', '1.00');
}

function realsearch_select($atts) {
$html = '<form id="searchform"><div id="lookingfor"><img src="http://naglrep.cullenws.com/wp-content/uploads/2017/06/looking-for-box.png" style="width:200px" draggable="false"></div>
<div style="padding:6px 5px; padding-right:5px;background-color: #fff;width:800px;height:66px"><div id="selecttype" style="float:left;border-right: 1px #ddd solid;width:195px"><div style="color:#999;text-align:left;font-size:13px;padding-left:9px;padding-right:9px">SELECT:</div><div style="float:left">
<ul id="select-type" style="border:none;font-size:14px;color:#333;outline: none;"> 
<li>Select</li>     
<li id="Realtor">Realtor/Real Estate Agent</li>
<li id="Mortgage">Mortgage Professional</li>
<li id="Title+Agent">Title Agent</li>
<li id="Commercial+Agent">Commercial Agent</li>
<li id="Home+Inspector">Home Inspector</li>
<li id="Residential+Appraiser">Residential Appraiser</li>
<li id="Property+Management">Property Management</li>
<li id="Insurance+Agent">Insurance Agent</li>
<li id="Escrow+Officer">Escrow Officer</li>
<li id="Educators+Trainers">Educators &amp; Trainers</li>
<li id="Lawyer">Lawyer</li>
<li id="Tax+Advisor">Tax Advisor</li>
<li id="Interior+Design">Interior Designer</li>
</ul>
<input type="hidden" name="prof" id="prof">
 </div></div>
 <div id="searchterm" style="float:left;width:50%"><div style="color:#999;text-align:left;font-size:13px;padding-left:16px;">LOCATION</div><div style="float:left"><input type="text" name="term" style="color:#000;border:0;float:left;outline: none;"></div></div><div stlye="float:right;margin-right:0px"><button type="submit" style="background-color:#f69a20;color:white;padding:15px;padding-left:40px;padding-right:40px;border:0;float:right;font-size:16px">Search</button></div></div></form>';
    return $html; }

//this is optional, only if you are not already using jQuery
function load_jquery() {
    wp_enqueue_script('jquery');
}
add_action('init', 'load_jquery');
// register jquery and style on initialization
add_action('init', 'register_script');
function register_script() {
    wp_register_script( 'cat_script', plugins_url('/js/catmap.js', __FILE__), array('jquery'));
    wp_register_style( 'cat_style', plugins_url('/css/style.css', __FILE__));
}

// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style(){
   wp_enqueue_script('cat_script');
   wp_enqueue_style( 'cat_style' );
}

function realsearch_uninstall() {
delete_option('realsearch_db_version');
}

register_uninstall_hook(__FILE__, 'realsearch_uninstall');

add_shortcode( 'realsearch', 'realsearch_select' );

register_activation_hook(__FILE__, 'realsearchinstall');
?>