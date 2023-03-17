<?php

defined('ABSPATH') or die('You silly human !');

class Skv_sage_export_admin
{

    public function init()
    {
        add_action('admin_menu', array($this, 'init_admin_menu'));
    }

    public function init_admin_menu()
    {
        add_menu_page(
            __('Silikin Village Sage Export', 'skvse'), //page title
            __('Silikin Export', 'skvse'), //menu title
            'manage_options', //capability
            SKVSE_PAGE, //menu slug
            array($this, 'load_page'), //function
            'dashicons-podio', //icon
            14
        );

    }

    public function load_page()
    {
        require_once SKVSE_DIR . 'admin/views/page.php';
    }

    // class end
}
