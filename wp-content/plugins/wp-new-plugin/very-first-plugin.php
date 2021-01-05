<?php
/**
 * Plugin Name: Very First Plugin
 * Plugin URL: https://hanna-mariikriisa.ikt.khk.ee
 * Description: This is the very first plugin I've ever created
 * Version 1.0
 * Author: Hanna-Marii Kriisa
 * Author URL: https://hanna-mariikriisa.ikt.khk.ee
**/

function dh_modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Click to Read!</a>';
}
add_filter( 'the_content_more_link', 'dh_modify_read_more_link' );
 