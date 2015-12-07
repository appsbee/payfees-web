<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller
{

    public function index()
    {
        $this->load->library('migration');
        if (!empty($this->migration->error_string())) {
            echo $this->migration->error_string();
        } else
            echo "Successfully executed all migrations.";
    }
}