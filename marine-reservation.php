<?php
/**
 * Plugin Name: Marine Reservation
 * Description: Help you to create a reservation system for your marine activity
 * Plugin URI:  https://github.com/hktom/marine
 * Version:     1.0.1
 * Author:      Kinshasa Digital
 * Author URI:  https://github.com/DRC-COVID19
 * Text Domain: marine-reservation
 */

namespace Marine_Reservation;

include plugin_dir_path( __FILE__ ) . '/reservation.php';
include plugin_dir_path( __FILE__ ) . '/contact.php';


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function marine_reservation(){
    $plugin_dir = plugin_dir_url( __DIR__ );
    $page = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Marine form</title>
        <link
          rel="stylesheet"
          href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"
        />
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous"
        />
        <!-- <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
    
        <style>
          .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 48;
          }
        </style>
    
        <style>
          .main-container {
            max-width: 350px;
            margin: 0 auto;
          }
          .recap-order {
            background-color: #f7f7f7;
            width: 40%;
            min-height: 80vh;
          }
    
          .form-contact {
            width: 60%;
            height: 100%;
          }
        </style>
        <script src="'.$plugin_dir.'marine/script.js"></script>
      </head>
      <body>
          '.reservation().'
        
        '.contact().'
    
      </body>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"
      ></script>
    </html>
    ';

    return $page;
}


add_shortcode('reservation', 'marine_reservation');