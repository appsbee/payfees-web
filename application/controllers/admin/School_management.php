<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_management extends Base_Admin_Controller
{
    public function index(){
        if ($this->input->post("submit") != NULL) {
            //create_school
            $this->form_validation->set_rules('school_name', 'School name', 'trim|required');
            $this->form_validation->set_rules('address', 'Adress', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('details', 'Details', 'trim|');
            $this->form_validation->set_rules('session_start', 'Session Start Month', 'trim|required|exact_length[10]');
            $this->form_validation->set_rules('session_end', 'Session End Month', 'trim|required|exact_length[10]');

            $this->form_validation->set_rules('school_admin_name', 'School Admin name', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('school_admin_email', 'School Admin email', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('school_admin_password', 'School Admin password', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('school_admin_phone', 'School Admin Contact No', 'trim|required|exact_length[10]');

            if ($this->form_validation->run() == TRUE) {

                $schoolName = $this->input->post("school_name", TRUE);
                $address = $this->input->post("address", TRUE);
                $details = $this->input->post("details", TRUE);
                $session_start = $this->input->post("session_start", TRUE);
                $session_end = $this->input->post("session_end", TRUE);


                $schoolAdminName = $this->input->post("school_admin_name", TRUE);
                $schoolAdminEmail = $this->input->post("school_admin_email", TRUE);
                $schoolAdminPassword = $this->input->post("school_admin_password", TRUE);
                $schoolAdminPhone = $this->input->post("school_admin_phone", TRUE);

                $this->load->model("MAdmin", "admin");
                //$row = $this->admin->authenticate($email, $password);
                if ($row != NULL) {
                    $this->session->set_userdata("user_id", $row->id);
                    $this->session->set_userdata("user_name", $row->name);
                    $this->session->set_userdata("user_type", USER_ADMIN);

                    redirect("admin/dashboard");
                } else {
                    $this->session->set_flashdata("error", "Email Or Password is incorrect");
                    redirect("admin/login");
                }
            } else {
                $this->load->view('admin/login/view_login');
            }
        }
        else{
            $this->data["script_js_list"]=array(base_url("assets/js/_admin_school_view_all.js"));
            $this->data['pageTitle'] = "PayFees - All School";
            $this->data["userName"] = $this->session->user_name;
            $this->_loadView("admin/school_management/view_all");
        }
    }

    //return create school view
    public function create(){
        $this->data["script_js_list"]=array(base_url("assets/js/_admin_create_school.js"));
        $this->data['pageTitle'] = "PayFees - Create School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_create");
    }
    public function view_all(){
        $this->data["script_js_list"]=array(base_url("assets/js/_admin_school_view_all.js"));
        $this->data['pageTitle'] = "PayFees - All School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_all");
    }

    //return create school view
    public function edit(){
        $this->data["script_js_list"]=array(base_url("assets/js/_admin_edit_school.js"));
        $this->data['pageTitle'] = "PayFees - Edit School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_edit");
    }


}

?>