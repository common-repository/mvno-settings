<?php

class MVNO_MvnoSettings{

    protected $table;
    /**
     * Mvno constructor.
     */

    public function __construct()
    {
        global $wpdb;
        $this->table = $wpdb->prefix."mvno_settings";
        
    }

    /**
     * Register a custom menu page.
     */

    public function register_mvno_settings_menu_page()
    {
        
    }



    /**
     * Display a custom menu page
     */
    public function mvno_settings_menu_page()
    {
        
    }

    /**
     * Register Mvno Scripts
     */
    function mvnoSettingsJS()
    {
        
    }

    /**
     * Store Mvno settings
     * Storing mvno number and auth code
     */
    public function store_mvno_settings()
    {
        
    }

    /**
     * Get Mvno info
     */
    public function get_mvno_info()
    {
        
    }

    public function sendSMS()
    {
        
    }

    function my_activation() {
        wp_schedule_event( time(), 'hourly', 'my_hourly_event' );
    }

    function svd_deactivate() {
        wp_clear_scheduled_hook( 'svd_cron' );
    }


    public function mvno_cron_run()
    {
        add_action( 'svd_cron', 'svd_run_cron' );
        register_deactivation_hook( __FILE__, 'svd_deactivate' );

        if (! wp_next_scheduled ( 'svd_cron' )) {
            wp_schedule_event( time(), 'daily', 'svd_cron' );
        }
    }
    function svd_run_cron() {
        // do your stuff.
    }

}