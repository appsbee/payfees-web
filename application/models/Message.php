<?php
class Message extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function getclass($data) {

		$row = $this->db->select('*')->like('name', $data['class'], 'after')->get('section')->result_array();
		//echo $this->db->last_query();die();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function classnameget($data) {

		$row = $this->db->select('*')->like('name', $data['class'], 'after')->get('classlist')->result_array();
		//echo $this->db->last_query();die();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function getclassname($frow) {

		$row = $this->db->select('*')->where('class_id', $frow)->get('class')->row_array();
		//echo $this->db->last_query();die();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}

	function belongsclass($class) {

		$row = $this->db->select('classlist_id,name')->where('section_id', $class['s'])->get('section')->row_array();
		//echo $this->db->last_query();die();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}

	function belongssection($class) {
		$rows = $this->db->select('*')->where('classlist_id', $class['c'])->get('section')->result_array();
		//echo $this->db->last_query();die();
		if (($rows) > 0) {
			return $rows;
		} else {
			return 0;
		}
	}

	function inserMessege($school_id, $title, $message) {
		$data = array(
			'school_id' => $school_id,
			'title' => $title,
			'message' => $message,
			'message_date' => date('Y-m-d h:i:s'),
		);

		$this->db->insert('school_message', $data);
		return $this->db->insert_id();

	}

	function secList($put) {

		$rows = $this->db->select("*")->where('section_id', $put)->get('section')->result_array();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return 0;
		}
	}
	function schoolmessage($deatils) {

		$this->db->insert_batch('school_message_relation', $deatils);
		return 1;

	}

	function getguardianid($sec, $classlist_id) {
		$school_id = $this->session->school_id;
		$row = $this->db->select('guardian_phno')->where('school_id', $school_id)->where('section', $sec)->where('class', $classlist_id)->get('studentdetails')->result_array();
		//echo $this->db->last_query();die();

		if (count($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function getgid($val) {
		$row = $this->db->select('guardianregister_id')->where('guardian_phno', $val)->get('guardianregister')->row_array();
		if (count($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function messageuser($relation) {
		$this->db->insert_batch('school_message_notification', $relation);
		return 1;
	}

}

?>


