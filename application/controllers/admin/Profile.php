<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Base_Admin_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation'));

    }
    public function index()
    {

        $this->data["pageTitle"] = "Profile";
        $data['user_id'] = $this->session->user_id;
        //echo '<pre>';print_r($data);die();
        $this->load->model('MAdmin');
        $getAdmin = $this->MAdmin->getadmindetails($data);
        //echo '<pre>';print_r($getAdmin);die();

        $this->data["adminDetails"] = $getAdmin;
        $this->_loadView('admin/profile');

        //die('adadad');

    }

    public function resetpassword()
    {

        //echo '<pre>';print_r($_GET['newpassword']);die();
        //die('adada');

        if ($_GET) {
           $newpassword=$_GET['newpassword'];
           $confirmpassword=$_GET['confirmpassword'];

            if ($newpassword==$confirmpassword) {
                
                //echo 'true';//die();
                $data['user_id'] = $this->session->user_id;
                $data['newpassword'] = $_GET['newpassword'];
                $data['confirmpassword'] = $_GET['confirmpassword'];
                $data['adminpassword'] =$_GET['adminpassword'];

                //echo '<pre>';print_r($data);die();
                $this->load->model('MAdmin');
                $resetPass = $this->MAdmin->resetpass($data);
                //echo $resetPass;die();
                if ($resetPass == "1") {
                     $resultText['update']= 'Update Password Successfully';//die();
                    //$this->session->set_flashdata('update', 'Update your Password ');
                   // redirect("admin/profile/", 'refresh');

                }

                if ($resetPass == "2") {
                     $resultText['error']= 'Admin Password Doesnot Match';//die();
                     
                    //$this->session->set_flashdata('error_details', 'Admin Password Doesnot Match');
                   // redirect("admin/profile/", 'refresh');

                }

                if ($resetPass == "0") {
                    $resultText['error']= 'Password Doesnot Update';//die();
                    //$this->session->set_flashdata('error_details', 'Password Doesnot Update');
                    //redirect("admin/profile/", 'refresh');

                }


            
                
            } 
            
            
            else {
                
                $resultText['error']= 'New Password And Confirmation Password Doesnot Match';//die();
            }
            
            header('Content-Type: application/json; charset=utf-8');
        echo json_encode($resultText);
        exit;

        } else {

            redirect("admin/profile/", 'refresh');
        }
       
    }
}

?>