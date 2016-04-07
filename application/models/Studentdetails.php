<?php
class Studentdetails extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function getstudents($data) {

		$row = $this->db->select('*')->where('school_id', $data['school_id'])->get('studentdetails')->
			result_array();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function getschoolname($school_id) {
		$row = $this->db->select('school_name')->where('id', $school_id)->get('schools')->row_array();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function deleteInitialy($schoolid) {

		$this->db->where('school_id', $schoolid);
		$del = $this->db->delete('studentdetails');
		return 1;
	}

	function studentdetailsimport($studentdata) {

		$status = $this->db->insert('studentdetails', $studentdata);
		if ($status) {
			return 1;
		} else {
			return 0;
		}

	}

	function advanceSearchvalue($data) {
		$this->db->select('*'); //id  users table

		if ($data['school_id'] != "") {
			$this->db->where('school_id', $data['school_id']);
		}

		if ($data['class'] != "") {
			$this->db->where('class', $data['class']);
		}
		if ($data['section'] != "") {
			$this->db->where('section', $data['section']);
		}
		if ($data['roll'] != "") {
			$this->db->where('roll', $data['roll']);
		}

		$rows = $this->db->get('studentdetails')->result_array();

		// echo  $this->db->last_query();die();
		if (($rows) > 0) {
			return $rows;
		} else {
			return 0;
		}

	}

	function schollname($school_id) {
		$this->db->select('*'); //id  users table

		$this->db->where('id', $school_id);
		$row = $this->db->get('schools')->row_array();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function studentspromote($promote) {

		$this->db->where('registration_no', $promote['registration_no']);
		$this->db->update('studentdetails', $promote);
		// echo  $this->db->last_query();die();die();

	}

	function studentdetails($studentid) {

		$this->db->select('*'); //id  users table

		$this->db->where('studentdetails_id', $studentid);
		$row = $this->db->get('studentdetails')->row_array();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}
}

?>


