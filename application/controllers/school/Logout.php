<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends Base_SchoolAdmin_Controller
{
    public function  index()
    {
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip = $_SERVER['SERVER_ADDR'];
        }
        
        $school_id = $this->session->school_id;
        
        $logout=array();
        $logout['logoutdatetime']=date('Y-m-d H:i:s');
        
        $this->load->model('logs');
        $updatelogout = $this->logs->logouttime($logout,$school_id,$ip);
        
        
        $this->session->unset_userdata("school_id");
        $this->session->unset_userdata("school_email");
        $this->session->unset_userdata("user_type");
       
       
       
       
       
        redirect("school/login");

    }
}

?>