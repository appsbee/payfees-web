<?php
class Useradd extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function getUserdata($school_id) {

		$this->db->select('*'); //id  users table
		$this->db->where('school_id', $school_id);

		$rows = $this->db->get('usermanagement')->result();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return 0;
		}
	}

	function insertUserdata($userData) {
		// echo '<pre>';print_r($userData);die();

		$this->db->insert('usermanagement', $userData);
		return 1;

	}

	function getdatedata($editid) {
		$this->db->select('*'); //id  users table
		$this->db->where('usermanagement_id', $editid);
		$row = $this->db->get('usermanagement')->row_array();
		if (count($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}

	function statuschange($update, $edit_id) {

		$this->db->where('usermanagement_id', $edit_id);
		$this->db->update('usermanagement', $update);
		//echo  $this->db->last_query();die();die();
		return 1;

	}

	function chekmail($useremail) {

		$this->db->select('*'); //id  users table
		$this->db->where('useremail', $useremail);
		$row = $this->db->get('usermanagement')->result();
		if (count($row) > 0) {
			return 1;
		} else {
			return 0;
		}

	}

	function getteacher($school_id) {

		$this->db->select('*'); //id  users table
		$this->db->where('school_id', $school_id);
		$this->db->where('useruserlevel', '3');
		$row = $this->db->get('usermanagement')->result();
		if (count($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}
	function classteacher($data) {

		/* $this->db->select('*'); //id  users table
			        $this->db->where('school_id',$data['school_id']);
			        $this->db->where('class',$data['class']);
			        $this->db->where('teacher',$data['teacher']);
			        $rows = $this->db->get('teacherallocate')->result();

			        if(count($rows)>0){
			            return 5;
			        }
			        else{
			            $this->db->insert('teacherallocate', $data);
			            return 1;
		*/
		$this->db->insert_batch('teacherallocate', $data);
		return 1;

	}

	function getteacherforclass($data) {

		$this->db->select('*'); //id  users table
		$this->db->where('school_id', $data['school_id']);
		$this->db->where('class', $data['class']);

		$row = $this->db->get('teacherallocate')->result();
		if (count($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}

	function name($teacher_id) {

		$this->db->select('*');
		$this->db->where('usermanagement_id', $teacher_id);
		$row = $this->db->get('usermanagement')->row();
		if (count($row) > 0) {
			return $row;
		} else {
			return 0;
		}
	}

	function getsectionName($value) {
		$data = array();
		$query = $this->db->select('*')->from('section')->like('name', $value)->get();

		$row = $query->result_array();
		//echo $this->db->last_query();die;
		if (isset($row) && count($row) > 0) {
			foreach ($row as $key => $value) {
				$data[$key] = $value['name'];
			}

		}
		return $data;

	}

	function getteacherDetails($school_id) {
		$query = $this->db->select('*')->from('teacherallocate')->where('school_id', $school_id)->get();
		$row = $query->result_array();
		if (isset($row) && count($row) > 0) {

			return $row;
		} else {
			return 0;
		}
	}

	public function checkAllocateTeacher($sec_name, $class_id, $teacher_id) {
		$school_id = $this->session->school_id;
		//$query = $this->db->select('*')->from('teacherallocate')->where('section', $sec_name)->where('class', $class_id)->where('teacher', $teacher_id)->where('school_id', $school_id)->get();
		$query = $this->db->select('*')->from('teacherallocate')->where('section', $sec_name)->where('class', $class_id)->where('school_id', $school_id)->get();
		return $query->num_rows();
	}
	function getteachernamename($teacher_id) {

		$this->db->select('*');
		$this->db->where('usermanagement_id', $teacher_id);
		$row = $this->db->get('usermanagement')->row_array();
		if (count($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}
}

?>


