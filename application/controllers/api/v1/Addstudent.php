<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class Addstudent extends Base {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('Utilities');
		$this->load->model('Error_codes', 'ErrorCodes');
		$this->load->model('studentapi');
		$this->load->model('Loginapi');
		$this->load->model('Addstudentapi');
	}
	/**
	 * [index_post description]
	 * @return [type] [description]
	 */
	public function index_post() {

		$guardianregister_id = $this->input->post('guardianregister_id');
		$studentdetails_id = $this->input->post('studentdetails_id');
		$school_id = $this->input->post('school_id');
		$registration_no = $this->input->post('registration_no');
		$student = $this->Addstudentapi->studentadd($guardianregister_id, $studentdetails_id, $school_id, $registration_no);

		if ($student == 1) {

			$data = array(
				'status' => true,
				'error' => '',
				'response' => $student,
			);
			echo json_encode($data);
			die();
		} else {
			$this->send_error("Error");
		}

	}

}