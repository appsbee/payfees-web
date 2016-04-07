<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Communitypostapi extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function postDetails($community_id) {

		/*$this->db->select('*');
			$this->db->where('community_id', $community_id);
			$rows = $this->db->get('communitypost')->result_array();
			//echo '<pre>';
			//print_r($rows['communitymember_id']);die();

			if (count($rows) > 0) {

				foreach ($rows as $key => $value) {

					$this->db->select('*');
					$this->db->where('communitymember_id', $value['communitymember_id']);
					$postMember = $this->db->get('communityMember')->row_array();

					print_r($postMember);
					//
					//echo '<pre>';
					//print_r($value['communitymember_id']);
				}

				die();

				//return $rows;
			} else {
				return array();
		*/

		/*$this->db->select('cp.*, cm.guardianregister_id, gr.*, sd.*')->from('communitypost cp');
			$this->db->join('communityMember cm', 'cp.communitymember_id = cm.communitymember_id');
			$this->db->join('guardianregister gr', 'cm.guardianregister_id = gr.guardianregister_id');
			$this->db->join('studentdetails sd', 'gr.registration_no = sd.registration_no');
			$this->db->where('gr.school_id', 'sd.school_id', false);
			$this->db->where('gr.otpVerificationStatus', '1');
			$this->db->where('gr.AccountStatus', '1');
		*/
		$data = array();
		$query1 = $this->db->select("community.community_name")->get_where("community", array("community_id" => $community_id, "community.status" => '1'));
		if (isset($query1->row()->community_name) && $query1->row()->community_name != "") {
			$data["community_name"] = $query1->row()->community_name;
			$query2 = $this->db
				->select("communitypost.communitypost_id,communitypost.title,communitypost.message,CONCAT('" . base_url() . "/uploads/api/thumble/',communitypost.attachment) AS attachment,HOUR(TIMEDIFF(NOW(),communitypost.PostDate)) AS timeDifference,CONCAT('" . base_url() . "/uploads/thumb/',guardianregister.guardian_image) AS guardian_image,studentdetails.guardian_name")
				->from("communitypost")
				->join("guardianregister", "guardianregister.guardianregister_id=communitypost.posted_by", "left")
				->join("studentdetails", "studentdetails.guardian_phno=guardianregister.guardian_phno", "left")
				->group_by("communitypost.communitypost_id")
				->where(array("communitypost.community_id" => $community_id, "guardianregister.otpVerificationStatus" => '1', "guardianregister.AccountStatus" => '1'))->get();
			// echo $this->db->last_query();die();

			// $data["post_details"] = $query2->result_array();
			foreach ($query2->result_array() as $key => $value) {
				$data["post_details"][$key]["communitypost_id"] = $value["communitypost_id"];
				$data["post_details"][$key]["title"] = $value["title"];
				$data["post_details"][$key]["message"] = $value["message"];
				$data["post_details"][$key]["attachment"] = $value["attachment"];
				$data["post_details"][$key]["timeDifference"] = $value["timeDifference"];
				$data["post_details"][$key]["guardian_name"] = $value["guardian_name"];
				$data["post_details"][$key]["guardian_image"] = $value["guardian_image"];
				$data["post_details"][$key]["no_of_comments"] = $this->fetchNoOfCommentsByPostID($value["communitypost_id"]);
				$data["post_details"][$key]["comments"] = $this->CommentsByPostID($value["communitypost_id"]);

			}

		}
		return $data;
		// if (count($data) > 0) {
		// 	return $data;
		// } else {
		// 	return array();
		// }
		//echo $this->db->last_query();

		//echo '<pre>';
		//print_r($d);
		//die;

	}

	public function fetchNoOfCommentsByPostID($id) {
		return $this->db->select('Community_Comments.community_comments_id')->get_where('Community_Comments', array('Community_Comments.communitypost_id' => $id))->num_rows();
	}

	public function CommentsByPostID($id) {
		return $this->db->select('studentdetails.guardian_name AS commented_by,Community_Comments.comment,Community_Comments.attachment,Community_Comments.postedOn,CONCAT("' . base_url() . '/uploads/thumb/",guardianregister.guardian_image) AS image')->join('guardianregister', 'guardianregister.guardianregister_id=Community_Comments.commented_by', 'left')->join('studentdetails', 'studentdetails.guardian_phno=guardianregister.guardian_phno', 'left')->group_by('Community_Comments.community_comments_id')->get_where('Community_Comments', array('Community_Comments.communitypost_id' => $id))->result_array();
		// echo $this->db->last_query();die();
	}

	function postmessage($communitymember_id, $community_id, $title, $message, $attachmentfile) {
		$data = array(
			'communitymember_id' => $communitymember_id,
			'community_id' => $community_id,
			'title' => $title,
			'message' => $message,
			'attachment' => $attachmentfile,

		);

		$status = $this->db->insert('communitypost', $data);
		return 1;

	}

	function getpostlist($community_id) {
		//echo $guardianregister_id;
		//echo $community_id;
		//die();
		//$rows = $this->db->select("communitymember_id")->where('guardianregister_id', $guardianregister_id)->get('communityMember')->result_array();
		//$datapostlist=$this->db->select('communitypost.*,')

		$lsit = $this->db->select("communitypost.communitypost_id,communitypost.communitymember_id,communitypost.posted_by,communitypost.community_id,communitypost.community_id,communitypost.title,communitypost.message,ifnull(communitypost.attachment,'') attachment,UNIX_TIMESTAMP(communitypost.PostDate) as PostTime,guardianregister.guardian_phno,guardianregister.guardianregister_id,CONCAT('" . base_url() . "uploads/thumb/',guardianregister.guardian_image) AS posted_image,studentdetails.guardian_name as postedname")
			->join('guardianregister', 'guardianregister.guardianregister_id=communitypost.posted_by', 'left')
			->join('studentdetails', 'studentdetails.guardian_phno=guardianregister.guardian_phno', 'left')
			->group_by('communitypost.communitypost_id')
			->order_by("communitypost_id", 'DESC')
			->where('community_id', $community_id)
			->get('communitypost')->result_array();

		foreach ($lsit as $k => $val) {
			$lsit[$k]["no_of_comments"] = $this->fetchNoOfCommentsByPostID($val["communitypost_id"]);
		}
		if (count($lsit) > 0) {
			return $lsit;
		} else {
			return array();
		}

		//echo '<pre>';
		//print_r($lsit);
		//

		die();

		$rows = $this->db->select("communitymember_id")->where('guardianregister_id', $guardianregister_id)->get('communityMember')->result_array();

		if (count($rows) > 0) {
			$ids = array();
			$lsit = array();
			foreach ($rows as $key => $value) {

				$ids[$key] = $value['communitymember_id'];

			}

			//$lsit = $this->db->select("*")->where_in('communitymember_id', $ids)->get('communitypost')->result_array();
			$lsit = $this->db->select("communitypost.communitypost_id,communitypost.communitymember_id,communitypost.posted_by,communitypost.community_id,communitypost.community_id,communitypost.title,communitypost.message,communitypost.attachment,UNIX_TIMESTAMP(communitypost.PostDate) as PostTime,guardianregister.guardian_phno,guardianregister.guardianregister_id,studentdetails.guardian_name as postedname")
				->join('guardianregister', 'guardianregister.guardianregister_id=communitypost.posted_by', 'left')
				->join('studentdetails', 'studentdetails.guardian_phno=guardianregister.guardian_phno', 'left')
				->where('community_id', $community_id)
				->where_in('communitymember_id', $ids)
				->get('communitypost')->result_array();

			foreach ($lsit as $k => $val) {
				$lsit[$k]["no_of_comments"] = $this->fetchNoOfCommentsByPostID($val["communitypost_id"]);

				$lsit[$k]["posted_image"] = "null";

			}

			//echo $this->db->last_query();die();
			return $lsit;
		} else {
			return array();
		}

	}

	function addcomment($community_id, $communitypost_id, $commented_by, $comment, $attachmentcomment) {

		$data = array(
			'community_id' => $community_id,
			'communitypost_id' => $communitypost_id,
			'commented_by' => $commented_by,
			'comment' => $comment,
			'attachment' => $attachmentcomment,
			'postedOn' => date('Y-m-d h:i:s'),

		);

		$this->db->insert('Community_Comments', $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;

	}

}

?>