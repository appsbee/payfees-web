<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        //die('login');
        if ($this->input->post("submit") != NULL) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post("email", TRUE);
                $password = $this->input->post("password", TRUE);
                $this->load->model("MAdmin", "admin");
                $row = $this->admin->authenticate($email, $password);
                if ($row != NULL) {
                    $this->session->set_userdata("user_id", $row->id);
                    $this->session->set_userdata("user_name", $row->full_name);
                    $this->session->set_userdata("user_type", USER_ADMIN);
                    //echo '<pre>';print_r($this->session->user_type);die();
                    redirect("admin/dashboard");
                } else {
                    $this->session->set_flashdata("error", "Email Or Password is incorrect");
                    redirect("admin/login");
                }
            } else {
                
                
                
                $this->load->view('admin/login/view_login');
            }
        } else {
            //die('dadadad');
            if ($this->session->user_id == NULL)
                $this->load->view('admin/login/view_login');
            else {
                if ($this->session->user_type == USER_ADMIN){
                    //echo '<pre>';print_r($this->session->user_type);die();
                    redirect("admin/dashboard");
                } 
                else {
                    if ($this->session->user_type == USER_SCHOOL){
                        //echo '<pre>';print_r($this->session->user_type);die();
                     
                        redirect("school/dashboard");
                    }
                    else if ($this->session->user_type == USER_PARENT){
                        
                        //echo '<pre>';print_r($this->session->user_type);die();
                        redirect("parent/dashboard");
                    }
                        
                }
            }

        }
    }

}

?>