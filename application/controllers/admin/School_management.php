<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_management extends Base_Admin_Controller
{
    public function index()
    {
        if ($this->input->post("submit"))
            $this->_store();
        else
            $this->view_all();

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


    public function edit($schoolId = NULL)
    {
        if ($schoolId == NULL) {
            redirect("admin/school-management/view_all");
            return;
        }

        //return edit school view

        $this->load->model("MSchool", "school");
        $this->load->model("MSchoolAdmin", "schoolAdmin");

        $school = $this->school->get($schoolId);
        $schoolAdmins = $this->schoolAdmin->get($schoolId);

        $this->data['school'] = $school;
        $this->data['schoolAdmins'] = $schoolAdmins;


        $this->data["script_js_list"] = array();
        $this->data["script_js_list"][] = base_url("assets/js/_admin_edit_school.js");
        $this->data["script_js_list"][] = base_url("assets/js/chosen.jquery.min.js");
        $this->data['pageTitle'] = "PayFees - Edit School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_edit");

    }

    private function _store()
    {
        //create_school
        $this->_set_validation_school_details();

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

            $school_id = $this->school->create($schoolName, $details, $address, $sessionStart, $sessionEnd, $contactPerson, $contactEmail, $contactPhone);

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
    }

    public function update($schoolId)
    {
        if ($schoolId == null) {
            redirect("admin/school-management/view_all");
            return;
        }

        if ($this->input->post("submit")) {

            $this->_set_validation_school_details();
            if ($this->form_validation->run() == TRUE) {

                $contentValue = array();
                $contentValue['school_name'] = $this->input->post("school_name", TRUE);
                $contentValue['address'] = $this->input->post("address", TRUE);
                $contentValue['school_details'] = $this->input->post("details", TRUE);
                $contentValue['session_start'] = $this->input->post("session_start", TRUE);
                $contentValue['session_end'] = $this->input->post("session_end", TRUE);

                $contentValue['contact_person'] = $this->input->post("contact_person_name", TRUE);
                $contentValue['contact_email'] = $this->input->post("contact_person_email", TRUE);
                $contentValue['contact_no'] = $this->input->post("contact_person_phone", TRUE);

                $this->load->model("MSchool", "school");
                $previousName = $this->school->get($schoolId)->school_name;

                if ($this->school->update($schoolId, $contentValue) == 1) {
                    $this->session->set_flashdata("success", "School " . $previousName . " updated successfully.");
                    redirect("admin/school-management/view_all");
                } else {
                    $this->session->set_flashdata("error", "Unable to update school $previousName .");
                    redirect("admin/school-management/edit/$schoolId");
                }
            } else {
                $this->edit($schoolId);
            }
        }else{
            $this->edit($schoolId);
        }
    }

    private function _set_validation_school_details()
    {
        $this->form_validation->set_rules('school_name', 'School name', 'trim|required');
        $this->form_validation->set_rules('address', 'Adress', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('details', 'Details', 'trim');
        $this->form_validation->set_rules('session_start', 'Session Start Month', 'trim|required|integer');
        $this->form_validation->set_rules('session_end', 'Session End Month', 'trim|required|integer');
        $this->form_validation->set_rules('session_end', 'Session End Month', 'trim|required|integer');
        $this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'trim|required');
        $this->form_validation->set_rules('contact_person_email', 'Contact Person Email', 'trim|required');
        $this->form_validation->set_rules('contact_person_phone', 'Contact Person Phone', 'trim|required');
    }
}

?>