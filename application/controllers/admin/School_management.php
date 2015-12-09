<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_management extends Base_Admin_Controller
{
    public function index(){
        $this->data['pageTitle'] = "PayFees - School Management";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_index");
    }
}

?>