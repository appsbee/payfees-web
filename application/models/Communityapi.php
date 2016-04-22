<?php
class Communityapi extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function getCommunityname($data) {
		$this->db->select('*'); //id  users table
		if ($data['community_id'] != "") {
			$this->db->where('community_id', $data['community_id']);
			$rows = $this->db->get('community')->result_array();
		} else {
			$rows = $this->db->get('community')->result_array();
		}
		if (count($rows) > 0) {
			return $rows;
		} else {
			return $rows;
		}
	}

	function getAll() {
		$this->db->select('*');
		$rows = $this->db->get('community')->result_array();
		return $rows;
	}

	function getCommunityFiletered($data, $limit = "", $offset = "") {
		$this->db->select('*');

		$this->db->where($data);
		if ($limit != "") {
			$this->db->limit($limit);
		}

		if ($offset != "") {
			$this->db->offset($offset);
		}

		$rows = $this->db->get('community')->result_array();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return $rows;
		}
	}
//7278976218
	function getcommunity($guardianregister_id) {
		//echo $guardianregister_id;die();
		/*$this->db->select('*');
		$this->db->where('guardianregister_id', $guardianregister_id);
		$row = $this->db->get('guardianregister')->row_array();
		//echo '<pre>';
		//print_r($row);die();
		$guardian_phno = $row['guardian_phno'];*/
		//print_r($guardian_phno);die();
		/*$this->db->select('*');
		$this->db->where('guardian_phno', $guardian_phno);
		$rows = $this->db->get('studentdetails')->result_array();
*/
		//echo '<pre>';
		//print_r($rows);die();
		$this->db->select('school_id');
		$this->db->where('guardianregister_id', $guardianregister_id);
		$this->db->group_by("school_id");
		$rows = $this->db->get('studentguardian')->result_array();
		//echo '<pre>';
		//print_r($rows);
		//die();

		$mainArray = array();

		$comuntybyuser = array();
		foreach ($rows as $key => $value) {

			$this->db->select('community_id,school_id,community_name,status,UNIX_TIMESTAMP(created) as created');
			$this->db->where('school_id', $value['school_id']);
			$community = $this->db->get('community')->row_array();

			//$this->db->select('posted_by,PostDate');
			$this->db->select('posted_by,UNIX_TIMESTAMP(PostDate) as PostTime');
			$this->db->where('community_id', $community['community_id']);
			$this->db->order_by("PostDate", "desc");

			$communitypost = $this->db->get('communitypost')->row_array();

			$this->db->select('school_name');
			$this->db->where('id', $community['school_id']);
			$schoolname = $this->db->get('schools')->row_array();

			$comuntybyuser = $this->db->select("guardianregister.guardianregister_id as posted_guardianregister_id ,guardianregister.guardian_phno posted_guardian_ph_no,studentdetails.guardian_name as postedname")
				->join('guardianregister', 'guardianregister.guardianregister_id=communitypost.posted_by', 'left')
				->join('studentdetails', 'studentdetails.guardian_phno=guardianregister.guardian_phno', 'left')
				->where('guardianregister_id', $communitypost['posted_by'])
				->get('communitypost')->row_array();

			//echo $this->db->last_query();

			$query = $this->db->select('*')->where('guardianregister_id', $guardianregister_id)->where('community_id', $community['community_id'])->get('communityMember');

			if ($query->num_rows() > 0) {
				$join['join'] = "true";
			} else {
				$join['join'] = "false";
			}
			//echo '<pre>';
			//print_r($comuntybyuser);die();
			$mainArray[$key] = array_merge($community, $communitypost, $schoolname, $comuntybyuser, $join);

			//$comuntybyuser['all'] = array_push($comuntybyuser[$key]['community'], $comuntybyuser[$key]['communitypost']);
			//$comuntybyuser[$key]['postid'] = $comuntybyuser[$key]['communitypost']['posted_by'];
			//echo $this->db->last_query();
			//echo '<pre>';
			//print_r($comuntybyuser[$key]['communitypost']);

		}
		//$merge = array_merge($comuntybyuser['community'], $comuntybyusert['community']);
		/*echo '<pre>';
		print_r($mainArray);
		die();*/

		/*$comuntybyuser = $this->db->select("guardianregister.guardianregister_id,guardianregister.guardian_phno,studentdetails.guardian_name as postedname")
			->join('guardianregister', 'guardianregister.guardianregister_id=communitypost.posted_by', 'left')
			->join('studentdetails', 'studentdetails.guardian_phno=guardianregister.guardian_phno', 'left')
			->where('guardianregister_id', $merge['posted_by'])
			->get('communitypost')->row_array();*/
		//echo $this->db->last_query();die();

		//$comuntybyuser = array_merge($merge, $comuntybyuser);

		//echo '<pre>';
		//print_r($mergeeee);
		//die();
		//

		if (count($mainArray) > 0) {
			return $mainArray;
		} else {
			return array();
		}

	}

}

?>


