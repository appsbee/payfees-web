<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller
{

    public function index()
    {
        $this->load->library('migration');

        $error_string = $this->migration->error_string();
        if (!empty($error_string)) {
            echo $error_string;
        } else
            echo "Successfully executed all migrations.";
    }
}