<?php
/**
 * Plugin Name: Marine Reservation
 * Description: Help you to create a reservation system for your marine activity
 * Plugin URI:  https://github.com/hktom/marine
 * Version:     1.0.0
 * Author:      Kinshasa Digital
 * Author URI:  https://github.com/DRC-COVID19
 * Text Domain: marine-reservation
 */

namespace Marine_Reservation;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function marine_reservation(){
    include plugin_dir_path( __FILE__ ) . '/index.php';
}


add_shortcode('reservation', 'marine_reservation');