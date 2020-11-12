<?php

/**
 * Plugin Name: Sold Widget
 * Description: Example plugin to add a widget
 * Version:     0.1
 * Author:     apexpredatorxx0
 */

// security measure to prevent people from running this script directly
defined('ABSPATH') or die('No script kiddies please!');

require_once('SoldWidget.php');

/** 
 * Example plugin! 
 *
 * apexpredatorxx0: Nov. 2020
 */
// register My_Widget
add_action('widgets_init', function () {
    register_widget('SoldWidget');
});
