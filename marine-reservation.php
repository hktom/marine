<?php
/**
 * Plugin Name: Marine Reservation
 * Description: Help you to create a reservation system for your marine activity
 * Plugin URI:  https://github.com/hktom/marine
 * Version:     2.0.0
 * Author:      Kinshasa Digital
 * Author URI:  https://github.com/DRC-COVID19
 * Text Domain: marine-reservation
 */

// if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

defined('ABSPATH') or die('You silly human !');
define('SKVSE_PAGE', "skv-sage-export");

define('SKVSE_URL', plugins_url('', __FILE__));
define('SKVSE_DIR', plugin_dir_path(__FILE__));
define('SKVSE_VER', '1.0.0');

if (!defined('SKVSE_FILE')) {
    define('SKVSE_FILE', __FILE__);
    define('SKVSE_BASENAME', plugin_basename(SKVSE_FILE));
}

include plugin_dir_path( __FILE__ ) . '/reservation.php';
include plugin_dir_path( __FILE__ ) . '/contact.php';
require_once SKVSE_DIR . 'admin/admin.php';

function marine_reservation(){
    $plugin_dir = plugin_dir_url( __DIR__ );
    $page = '
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
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
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
        <input type="hidden" id="plugin_dir" value="'.$plugin_dir.'">
        <script src="'.$plugin_dir.'marine/script.js"></script>

      <div>
          '.reservation().'
        '.contact().'
      </div>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"
      ></script>
    
    ';

    return $page;
}

// function mailer_config(PHPMailer $mailer){
//   $mailer->IsSMTP();
//   $mailer->Host = "mail.telemar.it"; // your SMTP server
//   $mailer->Port = 25;
//   $mailer->SMTPDebug = 2; // write 0 if you don't want to see client/server communication in page
//   $mailer->CharSet  = "utf-8";
// }


// add_action( 'phpmailer_init', 'mailer_config', 10, 1);

add_shortcode('reservation', 'marine_reservation');

class Skv_sage_export
{
    /**
     * Construct
     */
    public function __construct()
    {
        // silence is golden
    }

    public function register()
    {
        $skv_sage_export_admin = new Skv_sage_export_admin();
        $skv_sage_export_admin->init();
        add_action('admin_init', array($this, 'load_admin_js_css'));
    }

    public function activate()
    {
    }

    public function deactivate()
    {
    }

    public function initializeWooCommerceHooks()
    {
    }

    public function load_admin_js_css()
    {
        wp_enqueue_style("jquery-wp-css", SKVSE_URL . "/assets/css/jquery-ui.min.css");

        wp_enqueue_style("bootstrap-css", SKVSE_URL . "/assets/css/bootstrap.css");

        wp_enqueue_script("jquery");
        wp_enqueue_script("jquery-ui-accordion");
        wp_enqueue_script("jquery-ui-datepicker");
    }

    public function load_front_js_script_css()
    {
    }

    // end Class
}

// function skv_uninstall()
// {}

if (class_exists('Skv_sage_export')) {
    $skv_sage_export = new Skv_sage_export();
    $skv_sage_export->register();

    register_activation_hook(__FILE__, array($skv_sage_export, 'activate'));
    register_deactivation_hook(__FILE__, array($skv_sage_export, 'deactivate'));
    // add_action('plugins_loaded', array($Skv_sage_export, '_register'));
}
