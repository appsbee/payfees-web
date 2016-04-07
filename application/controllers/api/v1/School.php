<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class School extends Base {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Error_codes', 'ErrorCodes');
		$this->load->model('Schoolapi');
	}

	/**
	 * [index_get description]
	 * @return [type] [description]
	 */
	public function index_get() {

		$response;
		if (count($this->input->get()) > 0) {
			$filed_name = $this->input->get("sort");
			$order = $this->input->get("order");
			$response = $this->Schoolapi->sortSchoolname($filed_name, $order);
			$data = array(
				'status' => true,
				'error' => '',
				'response' => $response,
			);
			echo json_encode($data);
			die();
		} else {
			$response = $this->Schoolapi->getSchoolname();
			$data = array(
				'status' => true,
				'error' => '',
				'response' => $response,
			);
			echo json_encode($data);
			die();
		}

		/*
			       if (isset($response) && is_array($response) && count($response)) {
						//	$this->send_success($response);

			            	$data = array(
						 'status' => true,
						 'error' => '',
						 'response' => $response,
					          );
			            echo json_encode($data);
			            die();
						} else {
							$this->send_error("No School Found!");
				   }
			        /*

				/*	if ($response != "") {
						$this->Response->outputResponse(true, false, array("response" => $response), false);
					} else {
						return $this->Response->outputResponse(false, "No School Found!", array(), -1);
					}
		*/
	}

	public function schoolDetailsByID_get() {
		$schoolId = $this->input->get('id');
		$guardianregister_id = $this->input->get('guardianregister_id');

		if (!isset($schoolId) || $schoolId == '' || $schoolId == 0) {
			$this->send_error("Invalid school ID!");
		} else {
			$response = $this->Schoolapi->schoolDetailsByID($schoolId, $guardianregister_id);
			if (isset($response) && is_array($response) && count($response)) {
				$this->send_success($response);
			} else {
				$this->send_error("No Details Found!");
			}
		}

	}

}