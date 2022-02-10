
<?php
/*
   Plugin Name: Registration plugin
   description: A simple registartion plugin
   Version: 1.1.0
   Author: Manoj
  
*/

function register_plugin()
{

    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

    $tablename = $wpdb->prefix . "registerplugin";

    $sql = "CREATE TABLE $tablename
     (id int(12) NOT NULL AUTO_INCREMENT,
       firstname varchar(20) NOT NULL,
        lastname varchar(20) NOT NULL,
        email varchar(50) NOT NULL,
        phone varchar   (11) NOT NULL,
        PRIMARY KEY (id)
        ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($sql);
}
register_activation_hook(__FILE__, 'register_plugin');

//ADD MENU

function registerplugin_menu()
{
    add_menu_page('registration', 'registration', 'manage_options', 'register_plugin', 'display', plugins_url('/custom_plugin/img/icon.png'), 5);
    add_submenu_page('register_plugin', 'All Entries', 'All Entries', 'manage_options', 'regentries', 'display');
    add_submenu_page('register_plugin', 'Add New Entry', 'Add New Entry', 'manage_options', 'regaddnewentry', 'entry');
    add_submenu_page('register_plugin', 'Update Entry', 'Update Entry', 'manage_options', 'regupdateentry', 'update');
}
add_action("admin_menu", "registerplugin_menu");


function display()
{
    include 'display.php';
}

function update()
{
    include 'update.php';
}

function entry()
{
    include 'entry.php';
}

function reg_form()
{
    include 'form.php';
}
add_shortcode('register', 'register_form');
