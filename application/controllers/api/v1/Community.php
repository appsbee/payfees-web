<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class Community extends Base {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Error_codes', 'ErrorCodes');
		$this->load->model('Communityapi');
	}

	/**
	 * [index_get description]
	 * @return [type] [description]
	 */
	public function index_get() {
		$response;
		if (count($this->input->get()) > 0) {
			$limit = "";
			$offset = "";
			if ($this->input->get("limit")) {
				$limit = $this->input->get("limit");
				unset($_GET['limit']);
			}
			if ($this->input->get("offset")) {
				$offset = $this->input->get("offset");
				unset($_GET['offset']);
			}
			$response = $this->Communityapi->getCommunityFiletered($this->input->get(), $limit, $offset);
		} else {
			$response = $this->Communityapi->getAll();
		}
		if (isset($response) && is_array($response) && count($response)) {
			$this->send_success($response);
		} else {
			$this->send_error("No Community Found!");
		}
	}
	/**
	 *
	 * [getcommunity_get description]
	 * @return [type] [description]
	 */
	public function getcommunity_get() {

		$guardianregister_id = $this->input->get("user_id");

		$comunityname = $this->Communityapi->getcommunity($guardianregister_id);
		if (isset($comunityname) && is_array($comunityname) && count($comunityname)) {
			$this->send_success($comunityname);
		} else {
			$this->send_error("No Community Found!");
		}

		//$response = $this->Communityapi->getAll();
	}

}
