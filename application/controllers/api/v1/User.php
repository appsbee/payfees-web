<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class User extends Base {

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
		$this->load->model('Userapi');

	}
	/**
	 * [index_post description]
	 * @return [type] [description]
	 */
	public function index_get() {

		$guardianregister_id = $this->input->get("user_id");
		$details = $this->Userapi->getUserdetails($guardianregister_id);

		if (isset($details) && is_array($details) && count($details)) {

			$this->send_success($details);
		} else {
			$this->send_error("No Student Add");
		}

	}

	public function viewNotice_get() {
		$guardianregister_id = $this->input->get('userId');
		$notice_id = $this->input->get('noticeId');
		if (!isset($guardianregister_id) || $guardianregister_id == '' || $guardianregister_id ==0) {
		 	$this->send_error("Invalid User ID!");
		}
		else if (!isset($notice_id) || $notice_id == '' || $notice_id ==0) {
		 	$this->send_error("Invalid Notice ID!");
		}
		else{
			$response = $this->Userapi->updateNoticeByGuardianId($notice_id,$guardianregister_id);
			if ($response==TRUE) {
				$this->send_success($response);
			} else {
				$this->send_error("Data missmatch!");
			}
		}

	}

	public function viewMessage_get() {
		$guardianregister_id = $this->input->get('userId');
		$message_id = $this->input->get('messageId');
		if (!isset($guardianregister_id) || $guardianregister_id == '' || $guardianregister_id ==0) {
		 	$this->send_error("Invalid User ID!");
		}
		else if (!isset($message_id) || $message_id == '' || $message_id ==0) {
		 	$this->send_error("Invalid Message ID!");
		}
		else{
			$response = $this->Userapi->updateMessageByGuardianId($message_id,$guardianregister_id);
			if ($response==TRUE) {
				$this->send_success($response);
			} else {
				$this->send_error("Data missmatch!");
			}
		}

	}

}