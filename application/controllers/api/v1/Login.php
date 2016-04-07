<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class Login extends Base {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('Utilities');
		$this->load->model('Error_codes', 'ErrorCodes');
		$this->load->model('studentapi');
		$this->load->model('Loginapi');
	}
	/**
	 * [index_post description]
	 * @return [type] [description]
	 */
	public function index_post() {

		//die('adsadadasd');
		//$school_id = $this->input->post('school_id');
		$guardian_phno = $this->input->post('guardian_phno');

		$response = $this->Loginapi->getphnoexist($guardian_phno);
		$returndetails = array();
		if (isset($response) && is_array($response) && count($response)) {
			$phchecking = $this->Loginapi->checkPhno($guardian_phno);
			if (isset($phchecking) && is_array($phchecking) && count($phchecking)) {

				if ($phchecking['otpVerificationStatus'] == "1") {
					$returndetails['verified'] = "true";
					$returndetails['user_id'] = $phchecking['guardianregister_id'];
				} else {

					$sms_text = "Welcome to Payfees, your OTP is : " . $phchecking['otp'];
					$sms_phone = $guardian_phno;
					$this->utilities->sendSMS($sms_text, $sms_phone);
					$returndetails['verified'] = "false";
					$returndetails['user_id'] = $phchecking['guardianregister_id'];
				}

				$data = array(
					'status' => "true",
					'error' => '',
					'response' => $returndetails,
				);
				echo json_encode($data);
				die();

				//$this->send_error("Ph No Exist");
			} else {
				//$dataPost['school_id'] = $school_id;
				$dataPost['guardian_phno'] = $guardian_phno;
				//$dataPost['registration_no'] = $response['registration_no'];
				//$dataPost['otp'] = rand(10, 9999999);
				$dataPost['otp'] = $this->mt_rand_str(7);

				$sms_text = "Welcome to Payfees, your OTP is : " . $dataPost['otp'];
				$sms_phone = $guardian_phno;
				$this->utilities->sendSMS($sms_text, $sms_phone);
				$register = $this->Loginapi->createregister($dataPost);

				$returndetails['verified'] = "false";
				$returndetails['user_id'] = $register['guardianregister_id'];
				if ($register != -1) {
					$data = array(
						'status' => "true",
						'error' => '',
						'response' => $returndetails,
					);
					echo json_encode($data);
					die();

				}
			}

		} else {
			//die('else');
			$this->send_error("Ph No does't Exist");
		}

	}

	function mt_rand_str($l, $c = '1234567890') {
		for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
		return $s;
	}
	public function verifyotp_post() {
		//die('adadddsad');
		//$school_id = $this->input->post('school_id');
		$guardianregister_id = $this->input->post('guardianregister_id');
		$otp = $this->input->post('otp');
		$verify = $this->Loginapi->otpVerify($guardianregister_id, $otp);

		if ($verify > 0) {

			$data = array(
				'status' => true,
				'error' => '',
				'response' => $verify,
			);
			echo json_encode($data);
			die();
		} else {
			$this->send_error("Otp does't Match");
		}
	}

	public function resendotp_post() {

		//$school_id = $this->input->post('school_id');
		$guardianregister_id = $this->input->post('guardianregister_id');
		$response = $this->Loginapi->otpResend($guardianregister_id);
		if (isset($response) && is_array($response) && count($response)) {

			$sms_text = "Welcome to Payfees, your OTP is : " . $response['otp'];
			$sms_phone = $response['guardian_phno'];
			$this->utilities->sendSMS($sms_text, $sms_phone);

			$this->send_success($response);
		} else {
			$this->send_error("Error");
		}
	}

	// public function login_OTP_post() {

	// 	$response = array();
	// 	$data = array();
	// 	$data['phone'] = $this->input->post('phone');
	// 	$data['otp'] = $this->input->post('otp');
	// 	$data['gcm_id'] = $this->input->post('gcm_id');
	// 	if ($this->input->post(null)) {

	// 		$response['user'] = $this->api_user_model->fetchUserDetails_OTP($data);

	// 		if (sizeof($response['user']) > 0) {
	// 			$response['status'] = true;

	// 		} else {
	// 			$response['status'] = false;
	// 		}
	// 		$this->response($response);

	// 	}
	// }

}