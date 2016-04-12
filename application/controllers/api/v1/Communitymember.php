<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class Communitymember extends Base {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Error_codes', 'ErrorCodes');
		$this->load->model('Communitymemberapi');
	}

	/**
	 * [Description]
	 * @return [GET] [description]
	 */
	public function index_get() {}

	public function index_post() {

		$community_id = $this->input->post('community_id');
		$guardianregister_id = $this->input->post('guardianregister_id');

		$response = $this->Communitymemberapi->joincommunity($community_id, $guardianregister_id);

		if ($response == 1) {
			$this->send_success($response);
		} else {
			$this->send_error("Error");
		}
	}

}