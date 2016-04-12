<?php
class Schoolapi extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function getSchoolname() {

		$this->db->select('id,school_name'); //id  users table
		$rows = $this->db->get('schools')->result_array();
		for ($s = 0; $s < count($rows); $s++) {
			for ($c = 0; $c < 12; $c++) {
				$rows[$s]['classes'][$c] = //$c+1;
				array('name' => $c + 1,
					'sec' => array(
						'A',
						'B',
						'C',
						'D'),
				);
			}

		}
		//echo '<pre>';print_r( $rows);die();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return $rows;
		}
	}

	function sortSchoolname($filed_name, $order) {
		$this->db->select('id,school_name');
		$this->db->order_by($filed_name, $order);
		$rows = $this->db->get('schools')->result_array();
		for ($s = 0; $s < count($rows); $s++) {
			for ($c = 0; $c < 12; $c++) {
				$rows[$s]['classes'][$c] = //$c+1;
				array('name' => $c + 1,
					'sec' => array(
						'A',
						'B',
						'C',
						'D'),
				);
			}
		}
		//echo '<pre>';print_r( $rows);die();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return $rows;
		}
	}

	public function schoolDetailsByID($schoolId, $guardianregister_id) {
		$data = array();
		$query = $this->db->select("schools.school_name,schools.address,CONCAT('" . base_url() . "/uploads/thumble/',schools.school_img) AS school_img,CONCAT('" . base_url() . "/uploads/thumb/',schools.school_logo) AS school_logo,schools.contact_no,schools.contact_email")->from("schools")->where("schools.id", $schoolId)->get();
		if ($query->num_rows() > 0) {
			$data = $query->row_array();
			$data["fees_structure"] = "";
			$notices = array();
			$notice_query = $this->db->select('school_notices.school_notices_id,school_notices.title,school_notices.message,school_notices.notice_date')->from('school_notices')->where('school_notices.school_id', $schoolId)->order_by('school_notices.notice_date', 'DESC')->limit('5')->get();
			foreach ($notice_query->result_array() as $key => $value) {
				$notices[$key]["notice_id"] = $value["school_notices_id"];
				$notices[$key]["notice_title"] = $value["title"];
				$notices[$key]["notice_body"] = $value["message"];
				$notices[$key]["notice_date"] = date('d/m/Y', strtotime($value["notice_date"]));
			}
			$data["notices"] = $notices;
			$messages = array();
			$messages_query = $this->db->select('school_message.school_message_id,school_message.title,school_message.message,school_message.message_date')->from('school_message')->where('school_message.school_id', $schoolId)->order_by('school_message.message_date', 'DESC')->limit('5')->get();
			foreach ($messages_query->result_array() as $key => $value) {
				$messages[$key]["message_id"] = $value["school_message_id"];
				$messages[$key]["message_title"] = $value["title"];
				$messages[$key]["message_body"] = $value["message"];
				$messages[$key]["message_date"] = date('d/m/Y', strtotime($value["message_date"]));
			}
			$data["messages"] = $messages;
		}
		return $data;
	}

}
?>