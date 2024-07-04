<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance {
    public function check() {
        $CI =& get_instance();
        
        // Load the configuration file
        $CI->load->config('config'); // Replace 'config' with your actual configuration file name

        // Retrieve the maintenance mode setting
        $maintenance_mode = $CI->config->item('maintenance_mode');

        if ($maintenance_mode === TRUE) {
            // Load URL helper
            $CI->load->helper('url');
            
            // Display maintenance view
            include(APPPATH . 'views/websites/blokakses.php');
            exit;
        }
    }
}
