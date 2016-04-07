<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends Base_Admin_Controller
{
    public function  index()
    {
        $this->session->unset_userdata("user_id");
        $this->session->unset_userdata("user_name");
        $this->session->unset_userdata("user_type");
        redirect("admin/login");

    }
}

?>