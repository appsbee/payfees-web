<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class Student extends Base {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Error_codes', 'ErrorCodes');
		$this->load->model('studentapi');
	}

	/**
	 * [Description]
	 * @return [GET] [description]
	 */
	public function index_get() {
		$this->form_validation->set_data($this->get());
		if ($this->get('registration_no')) {
			//$this->form_validation->set_rules('school_id', '"School ID"', 'trim|required|integer');
			$this->form_validation->set_rules('registration_no', '"Registration Number"', 'trim|required|integer');
		} else {
			$this->form_validation->set_rules('student_name', '"Student Name"', 'trim|required');
			$this->form_validation->set_rules('class', '"Class"', 'trim|required');
			$this->form_validation->set_rules('section', '"Section"', 'trim|required');
			$this->form_validation->set_rules('roll', '"Roll"', 'trim|required');
		}

		$data = $this->_get_student_data();

		if ($this->form_validation->run() == TRUE) {
			$response = $this->studentapi->getStudent($data);
			// $this->pr($response);
			if (isset($response) && is_array($response) && count($response)) {
				$this->send_success($response);
			} else {
				$this->send_error("No Student Found!");
			}
		} else {
			$this->send_error($this->form_validation->error_array());
		}
	}

	private function _get_student_data() {
		if ($this->get('registration_no')) {
			return array(
				'school_id' => $this->get('school_id', true),
				'registration_no' => $this->get('registration_no', true),
			);
		} else {
			return array(
				'school_id' => $this->get('school_id', true),
				'student_name' => $this->get('student_name', true),
				'class' => $this->get('class', true),
				'section' => strtoupper($this->get('section', true)),
				'roll' => $this->get('roll', true),
			);
		}
	}

	// public function testtt_post() {
	// 	die('adsadadasd');
	// }
	public function Studentfeesdetails_get() {
		//die('asdadasd');
		$data = array();
		$student_id = $this->get('student_id');
		//echo '<pre>';
		//($student_id);

		//echo count($student_id);
		foreach ($student_id as $key => $value) {
			//$data[$key]['student_id'] = $value;
			//echo '<pre>';
			$registration_no = $this->studentapi->getRegno($value);
			//$data[$key]['registration_no'] = $registration_no['registration_no'];
			$details_no = $this->studentapi->getAlldetails($registration_no['registration_no']);
			$data[$key] = $details_no;
		}
		$this->send_success($data);
		//print_r($data);
		//die();
	}

	public function studentDetailsByID_get() {
		$studentId = $this->get('id');
		if (!isset($studentId) || $studentId == '' || $studentId ==0) {
		 	$this->send_error("Invalid student ID!");
		}else{
			$response = $this->Studentapi->studentDetailsByID($studentId);
			if (isset($response) && is_array($response) && count($response)) {
				$this->send_success($response);
			} else {
				$this->send_error("No Details Found!");
			}
		}

	}

}