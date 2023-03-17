<?php

defined('ABSPATH') or die('You silly human !');

class Marine_reservation_export_admin
{

    public function init()
    {
        add_action('admin_menu', array($this, 'init_admin_menu'));
    }

    public function init_admin_menu()
    {
        add_menu_page(
            __('Reservation', 'Marine_reservations'), //page title
            __('Rservation Export', 'Marine_reservations'), //menu title
            'manage_options', //capability
            MARINE_RESERVATION_PAGE, //menu slug
            array($this, 'load_page'), //function
            'dashicons-podio', //icon
            14
        );

    }

    public function load_page()
    {
        require_once MARINE_RESERVATION_DIR . 'admin/views/page.php';
    }

    // class end
}