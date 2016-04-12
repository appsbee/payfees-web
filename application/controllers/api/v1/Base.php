<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

/**
 *	Base class
 */
class Base extends REST_Controller {

	protected $user;

	function __construct() {
		parent::__construct();
	}

	/*protected function check_access() {
		$headers = apache_request_headers();
		if (isset($headers[$this->config->item('rest_key_name')]) && $headers[$this->config->item('rest_key_name')] != "") {
			try {
				$this->user = $this->jwt->decode($headers[$this->config->item('rest_key_name')], $this->config->item('jwt_key'));
				$time = time();
				if ($time > $this->user->exp) {
					$this->send_error('Access token expired', REST_Controller::HTTP_UNAUTHORIZED);
				}
			} catch (Exception $e) {
				$this->send_error('Authentication required', REST_Controller::HTTP_UNAUTHORIZED);
			}
		} else {
			$this->send_error('Authentication required', REST_Controller::HTTP_UNAUTHORIZED);
		}
	}*/

	protected function send_success($data, $status_code = 200) {
		$response = array(
			'status' => true,
			'error' => '',
			'response' => $data,
		);
		$this->response($response, $status_code);
	}

	protected function send_error($data, $status_code = 200) {
		$response = array(
			'status' => false,
			'error' => $data,
			'response' => '',
		);
		$this->response($response, $status_code);
	}

	protected function pr($data) {
		print_r($data);die;
	}
}