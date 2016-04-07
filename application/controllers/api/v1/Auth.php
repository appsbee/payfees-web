<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Auth extends Base {

	public function __construct() {
		parent::__construct();
		$this->load->model('mauth');
	}

	public function index_post() {
		$this->form_validation->set_data($this->post());
		$this->form_validation->set_rules('email', '"Email"', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', '"Password"', 'trim|required|min_length[6]', ['min_length' => 'Password should be min. 6 characters long.']);
		if ($this->form_validation->run() == TRUE) {
			$response = $this->mauth->login($this->post('email', true), $this->post('password', true));
			if (isset($response) && is_array($response) && count($response) && $response[0]) {
				$jwt = ['id' => $response[1]];
				$jwt['iat'] = time();
				$jwt['exp'] = $jwt['iat'] + 3600;
				$this->send_success([
					'token' => $this->jwt->encode($jwt, $this->config->item('jwt_key')),
				], Base::HTTP_OK);
			} else {
				$this->send_error($response[1], Base::HTTP_UNAUTHORIZED);
			}
		} else {
			$this->send_error($this->form_validation->error_array(), Base::HTTP_BAD_REQUEST);
		}
	}

	/*public function forgot_password_post() {
		$this->form_validation->set_data($this->post());
		$this->form_validation->set_rules('email', '"Email', 'trim|required|valid_email|callback_email_exists');
		if ($this->form_validation->run() == TRUE) {
			$plain_pass = $this->_get_hash();
			$hash = password_hash($plain_pass, PASSWORD_BCRYPT);
			$email = $this->post('email', true);
			if ($this->mauth->update_password($email, $hash)) {
				$this->load->library('email_notifications');
				$user = $this->mauth->user_details($email);
				$user['{password}'] = $plain_pass;
				$this->email_notifications->forgot_password($user);
				$this->send_success('Please check your email for the updated password.', Base::HTTP_OK);
			} else {
				$this->send_error(['Internal server error, Try again'], Base::HTTP_INTERNAL_SERVER_ERROR);
			}
		} else {
			$this->send_error($this->form_validation->error_array(), Base::HTTP_BAD_REQUEST);
		}
	}*/

	public function email_exists($email) {
		if ($this->mauth->email_exists($email)) {
			return true;
		} else {
			$this->form_validation->set_message('email_exists', 'Email is not registered with us.');
			return false;
		}
	}

	private function _get_hash() {
		$seed = str_split('abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789!@#$%^&*()');
		shuffle($seed);
		$rand = '';
		foreach (array_rand($seed, 6) as $k) {
			$rand .= $seed[$k];
		}
		return $rand;
	}
}
