<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Base_Admin_Controller extends MY_Controller{
    protected $data=array();

    public function __construct()
    {
        parent::__construct();
        if($this->session->user_id==NULL)
            redirect("admin/login");
        else {
            if($this->session->user_type!=USER_ADMIN)
            {
                if($this->session->user_type==USER_SCHOOL)
                    redirect("school/dashboard");
                else if($this->session->user_type==USER_PARENT)
                    redirect("parent/dashboard");
            }
        }
    }

    protected function _loadView($layoutFilePath)
    {
        $this->data['content'] = $layoutFilePath;
        $this->load->view('admin/layout/view_admin_layout', $this->data);
    }

}

class Base_SchoolAdmin_Controller extends MY_Controller{
   
    protected $data=array();

    public function __construct()
    {
        parent::__construct();
        if($this->session->school_id==NULL)
            redirect("school/login");
        else {
            if($this->session->user_type!=USER_SCHOOL)
            {
                if($this->session->user_type==USER_ADMIN)
                    redirect("admin/dashboard");
                else if($this->session->user_type==USER_PARENT)
                    redirect("parent/dashboard");
            }
        }
    }

    protected function _loadView($layoutFilePath)
    {
        $this->data['content'] = $layoutFilePath;
        $this->load->view('school/layout/view_admin_layout', $this->data);
    }

}



?>