<?php

/**

 * Plugin Name: MVNO Settings
 * Plugin URI: https://mvnop.com/
 * Description: MVNO settings to get you started with MVNO services.
 * Version: 1.0.1
 * Author: MVNOP
 * Author URI: https://mvnop.com
 * Text Domain: MVNO
 * @package Mvno
 */



defined( 'ABSPATH' ) || exit;

include ('init.php');
include ('includes/Install.php');
include ('includes/Uninstall.php');

if (class_exists('MVNO_MvnoSettings')) {
    $newinstance = new MVNO_MvnoSettings();
}
register_activation_hook( __FILE__, array( 'MVNO_InstallMvnoSettings', 'create_mvno_settings_db' ) );
register_deactivation_hook( __FILE__, array('MVNO_UninstallMvnoSettings', 'remove_mvno_settings_db'));