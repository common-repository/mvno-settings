<?php/** * Created by PhpStorm. * User: Husnain * Date: 6/15/2020 * Time: 8:06 PM */class MVNO_InstallMvnoSettings{    public function create_mvno_settings_db()    {        global $wpdb;        $mvno_settings_name = $wpdb->prefix .'mvno_settings';        $mvno_settings_db_version = '1.0.0';        $charset_collate = $wpdb->get_charset_collate();        if ( $wpdb->get_var( "SHOW TABLES LIKE '{$mvno_settings_name}'" ) != $mvno_settings_name ) {            $sql = "CREATE TABLE $mvno_settings_name (            ID mediumint(9) NOT NULL AUTO_INCREMENT,            `mvno_number` mediumint(9) NOT NULL,            `auth_code` varchar(255) NOT NULL,            `is_data_usage` mediumint(5) NOT NULL,            `grace_period` varchar(255) NOT NULL,            PRIMARY KEY  (ID)      )    $charset_collate;";            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );            dbDelta( $sql );            add_option( 'my_db_version', $mvno_settings_db_version );      }    }}