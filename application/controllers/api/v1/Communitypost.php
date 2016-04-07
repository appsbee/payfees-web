<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once APPPATH . 'controllers/api/v1/Base.php';

class Communitypost extends Base {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Error_codes', 'ErrorCodes');
		$this->load->model('Communitypostapi');
	}

	/**
	 * [Description]
	 * @return [GET] [description]
	 */
	public function index_get() {
		$fetchData = array();
		$community_id = $this->get('community_id', true);

		$response = $this->Communitypostapi->postDetails($community_id);
		if (isset($response) && is_array($response) && count($response)) {
			$this->send_success($response);
		} else {
			$this->send_error("No Details Found!");
		}

		//$this->send_success($getpost);
		// die();

		// if (isset($getpost) && is_array($getpost) && count($getpost)) {
		// 	foreach ($getpost as $key => $value) {

		// 		$fetchData[$key]['communitypost_id'] = isset($value['communitypost_id']) ? $value['communitypost_id'] : '';
		// 		$fetchData[$key]['communitymember_id'] = isset($value['communitymember_id']) ? $value['communitymember_id'] : '';
		// 		$fetchData[$key]['community_id'] = isset($value['community_id']) ? $value['community_id'] : '';
		// 		$fetchData[$key]['title'] = isset($value['title']) ? $value['title'] : '';
		// 		$fetchData[$key]['message'] = isset($value['message']) ? $value['message'] : '';
		// 		$fetchData[$key]['attachment'] = isset($value['attachment']) ? 'uploads/api/thumble/' . $value['attachment'] : '';
		// 		$fetchData[$key]['PostDate'] = isset($value['PostDate']) ? $value['PostDate'] : '';
		// 		$fetchData[$key]['posthours'] = isset($value['PostDate']) ? $this->getDateFormat($value['PostDate']) : '';

		// 		$fetchData[$key]['guardian_name'] = isset($value['guardian_name']) ? $value['guardian_name'] : '';

		// 	}
		// 	$this->send_success($fetchData);
		// } else {
		// 	$this->send_error("error");
		// }

	}
/*
private function gethours($date) {
$toDay = time();
$post_date = strtotime($data);
$hours = $toDay - $post_date;
$minite = $hours / 60;
}*/

	function getDateFormat($date) {
		$ret_date = 0;
		$time = strtotime($date);
		$current_time = time();
		$remain_time = $current_time - $time;
		if ($remain_time < 24 * 60 * 60) {
			$ret_date = date('h:i', $remain_time);
		} else {
			$ret_date = date('d h:i', $remain_time);
		}

		return $ret_date;
	}

	public function index_post() {

		$communitymember_id = $this->input->post('communitymember_id');
		$community_id = $this->input->post('community_id');
		$title = $this->input->post('title');
		$message = $this->input->post('message');

		if (isset($_FILES['attachment']) && $_FILES['attachment']['name'] != "") {
			if (!is_dir('uploads/')) {
				mkdir('./uploads/', 0777, true);
			}
			if (!is_dir('uploads/api/')) {
				mkdir('./uploads/api/', 0777, true);
			}
			if (!is_dir('uploads/api/big/')) {
				mkdir('./uploads/api/big/', 0777, true);

			}
			if (!is_dir('uploads/api/thumb/')) {
				mkdir('./uploads/api/thumb/', 0777, true);

			}
			if (!is_dir('uploads/api/thumble/')) {
				mkdir('./uploads/api/thumble/', 0777, true);

			}
			$this->load->library('image_lib');

			$config['upload_path'] = './uploads/api/big/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);
			/* size 50*50for comments */

			$configThumb = array();
			$configThumb['image_library'] = 'gd2';
			$configThumb['create_thumb'] = true;
			$configThumb['new_image'] = './uploads/api/thumb/';
			$configThumb['maintain_ratio'] = true;
			$configThumb['width'] = 50;
			$configThumb['height'] = 50;
			$configThumb['thumb_marker'] = "";
			/* size 50*50 for comments */

			/* size 300*300 for thuble */
			$configThumble = array();
			$configThumble['image_library'] = 'gd2';
			$configThumble['create_thumble'] = true;
			$configThumble['new_image'] = './uploads/api/thumble/';
			$configThumble['maintain_ratio'] = true;
			$configThumble['width'] = 300;
			$configThumble['height'] = 300;
			$configThumble['thumb_marker'] = "";
			/* size 300*300 for thuble */

			//echo '<pre>'; print_r($config);die();

			if (!$this->upload->do_upload('attachment')) {

				$data['error'] = $this->upload->display_errors();

				$this->send_error($data['error']);

			} else {

				$fileData = $this->upload->data();
				$configThumb['source_image'] = $fileData['full_path'];
				$configThumble['source_image'] = $fileData['full_path'];
				$raw_name = $fileData['raw_name'];
				$file_ext = $fileData['file_ext'];

				$imgname = $raw_name . $file_ext;

				$this->image_lib->initialize($configThumb);
				$this->image_lib->resize();
				$this->image_lib->initialize($configThumble);
				$this->image_lib->resize();

				$attachmentfile = $fileData['file_name'];

			}
		}

		$response = $this->Communitypostapi->postmessage($communitymember_id, $community_id, $title, $message, $attachmentfile);

		if ($response == 1) {

			$this->send_success($response);
		} else {
			$this->send_error("error");
		}

	}

	public function postlist_get() {
		//$guardianregister_id = $this->get('guardianregister_id', true);
		$community_id = $this->get('community_id', true);

		$response = $this->Communitypostapi->getpostlist($community_id);
		if (isset($response) && is_array($response) && count($response)) {
			$this->send_success($response);
		} else {
			$this->send_error("No Post Found!");
		}
	}

	public function postcomments_post() {
		$community_id = $this->post('community_id');
		$communitypost_id = $this->post('communitypost_id');
		$commented_by = $this->post('commented_by');
		$comment = $this->post('comment');

		if (isset($_FILES['attachment']) && $_FILES['attachment']['name'] != "") {
			if (!is_dir('uploads/')) {
				mkdir('./uploads/', 0777, true);
			}
			if (!is_dir('uploads/api/')) {
				mkdir('./uploads/api/', 0777, true);
			}
			if (!is_dir('uploads/api/big/')) {
				mkdir('./uploads/api/big/', 0777, true);

			}
			if (!is_dir('uploads/api/thumb/')) {
				mkdir('./uploads/api/thumb/', 0777, true);

			}
			if (!is_dir('uploads/api/thumble/')) {
				mkdir('./uploads/api/thumble/', 0777, true);

			}
			$this->load->library('image_lib');

			$config['upload_path'] = './uploads/api/big/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);
			/* size 50*50for comments */

			$configThumb = array();
			$configThumb['image_library'] = 'gd2';
			$configThumb['create_thumb'] = true;
			$configThumb['new_image'] = './uploads/api/thumb/';
			$configThumb['maintain_ratio'] = true;
			$configThumb['width'] = 50;
			$configThumb['height'] = 50;
			$configThumb['thumb_marker'] = "";
			/* size 50*50 for comments */

			/* size 300*300 for thuble */
			$configThumble = array();
			$configThumble['image_library'] = 'gd2';
			$configThumble['create_thumble'] = true;
			$configThumble['new_image'] = './uploads/api/thumble/';
			$configThumble['maintain_ratio'] = true;
			$configThumble['width'] = 300;
			$configThumble['height'] = 300;
			$configThumble['thumb_marker'] = "";
			/* size 300*300 for thuble */

			//echo '<pre>'; print_r($config);die();

			if (!$this->upload->do_upload('attachment')) {

				$data['error'] = $this->upload->display_errors();

				$this->send_error($data['error']);

			} else {

				$fileData = $this->upload->data();
				$configThumb['source_image'] = $fileData['full_path'];
				$configThumble['source_image'] = $fileData['full_path'];
				$raw_name = $fileData['raw_name'];
				$file_ext = $fileData['file_ext'];

				$imgname = $raw_name . $file_ext;

				$this->image_lib->initialize($configThumb);
				$this->image_lib->resize();
				$this->image_lib->initialize($configThumble);
				$this->image_lib->resize();

				$attachmentcomment = $fileData['file_name'];

			}
		}
		$response = $this->Communitypostapi->addcomment($community_id, $communitypost_id, $commented_by, $comment, $attachmentcomment, $postedOn);

		if ($response) {

			$this->send_success($response);
		} else {
			$this->send_error("error");
		}

	}
}