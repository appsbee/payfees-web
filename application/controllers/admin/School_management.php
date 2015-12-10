<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_management extends Base_Admin_Controller
{
    public function index()
    {
        if ($this->input->post("submit") != NULL) {
            //create_school
            $this->form_validation->set_rules('school_name', 'School name', 'trim|required');
            $this->form_validation->set_rules('address', 'Adress', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('details', 'Details', 'trim');
            $this->form_validation->set_rules('session_start', 'Session Start Month', 'trim|required|integer');
            $this->form_validation->set_rules('session_end', 'Session End Month', 'trim|required|integer');
            $this->form_validation->set_rules('session_end', 'Session End Month', 'trim|required|integer');
            $this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'trim|required');
            $this->form_validation->set_rules('contact_person_email', 'Contact Person Email', 'trim|required');
            $this->form_validation->set_rules('contact_person_phone', 'Contact Person Phone', 'trim|required');

            $this->form_validation->set_rules('school_admin_name', 'School Admin name', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('school_admin_email', 'School Admin email', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('school_admin_password', 'School Admin password', 'trim|required|max_length[32]');
            $this->form_validation->set_rules('school_admin_phone', 'School Admin Contact No', 'trim|required|exact_length[10]');

            if ($this->form_validation->run() == TRUE) {

                $schoolName = $this->input->post("school_name", TRUE);
                $address = $this->input->post("address", TRUE);
                $details = $this->input->post("details", TRUE);
                $sessionStart = $this->input->post("session_start", TRUE);
                $sessionEnd = $this->input->post("session_end", TRUE);

                $contactPerson = $this->input->post("contact_person_name", TRUE);
                $contactEmail = $this->input->post("contact_person_email", TRUE);
                $contactPhone = $this->input->post("contact_person_phone", TRUE);


                $schoolAdminName = $this->input->post("school_admin_name", TRUE);
                $schoolAdminEmail = $this->input->post("school_admin_email", TRUE);
                $schoolAdminPassword = $this->input->post("school_admin_password", TRUE);
                $schoolAdminPhone = $this->input->post("school_admin_phone", TRUE);

                $this->load->model("MSchool", "school");

                $school_id = $this->school->create($schoolAdminName, $details, $address, $sessionStart, $sessionEnd, $contactPerson, $contactEmail, $contactPhone);

                if ($school_id != -1) {
                    $this->load->model("MSchoolAdmin", 'schoolAdmin');
                    $admin_id = $this->schoolAdmin->create($school_id, $schoolAdminEmail, $schoolAdminName, $schoolAdminPassword, $schoolAdminPhone, 1, STATE_ACTIVE);
                    if ($admin_id != -1) {
                        $this->session->set_flashdata("success", "School " . $schoolName . " created successfully.");
                        redirect("admin/school-management/create");
                    }

                } else {
                    $this->session->set_flashdata("error", "Unable to create school .");
                    redirect("admin/school-management/create");
                }
            } else {
                $this->create();
            }
        } else {
            $this->view_all();
        }
    }

    //return create school view
    public function create()
    {
        $this->data["script_js_list"] = array(base_url("assets/js/_admin_create_school.js"));
        $this->data['pageTitle'] = "PayFees - Create School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_create");
    }

    public function view_all()
    {
        $this->load->model("MSchool", 'school');
        $schools = $this->school->all();

        $this->data["script_js_list"] = array(base_url("assets/js/_admin_school_view_all.js"));
        $this->data['pageTitle'] = "PayFees - All School";
        $this->data["userName"] = $this->session->user_name;
        $this->data["schools"] = $schools;

        $this->_loadView("admin/school_management/view_all");
    }

    //return create school view
    public function edit()
    {
        $this->data["script_js_list"] = array(base_url("assets/js/_admin_edit_school.js"));
        $this->data['pageTitle'] = "PayFees - Edit School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_edit");
    }


}

?>