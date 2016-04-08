<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSchool extends CI_Model {
	public $table_name = 'schools';

	public function create($schoolName, $schoolDetails, $schoolAddress, $city, $state, $zip, $sessionStart, $sessionEnd, $contactPerson, $contactEmail, $contactNo, $img_logo, $img) {
		$data = array(
			'school_name' => $schoolName,
			'school_details' => $schoolDetails,
			'address' => $schoolAddress,
			'city' => $city,
			'state' => $state,
			'zip' => $zip,

			'session_start' => $sessionStart,
			'session_end' => $sessionEnd,
			'contact_email' => $contactEmail,
			'contact_person' => $contactPerson,
			'contact_no' => $contactNo,
			'school_logo' => $img_logo,
			'school_img' => $img,
		);
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	public function update($schoolId, $contentValue) {
		$this->db->update($this->table_name, $contentValue, "id = $schoolId");
		return $this->db->affected_rows();
	}

	public function all() {
		// $this->db->select('*');

		// $this->db->order_by("id", "asc");
		// $this->db->from('schools');
		// $query = $this->db->get();
		// return $query->result();

		return $this->db->get($this->table_name)->result();

	}

	public function get($schoolId) {
		return $this->db->get_where($this->table_name, array('id' => $schoolId), 1)->row();
	}

	public function scholldetails() {

		//return 1;

		$this->db->select('*');
		$this->db->from('schools');
		$this->db->join('school_admins', 'school_admins.school_id = schools.id');
		$this->db->order_by("schools.id", "desc");
		$query = $this->db->get();
		$details = $query->result();
		//echo '<pre>';print_r($d);die();

		return $details;

	}

	public function authenticate($email, $password) {
		$resultSet = $this->db->get_where($this->table_name, array('email' => $email, 'password' => md5(SALT . $password)), 1, 0);
		if ($resultSet->num_rows() == 1) {
			return $resultSet->row();
		} else {
			return NULL;
		}

	}

	public function getschoolname($keywords) {

		$row = $this->db->select('*')->like('school_name', $keywords, 'after')->or_like('address', $keywords, 'after')->get('schools')->result_array();
		//echo $this->db->last_query();die();
		if (($row) > 0) {
			return $row;
		} else {
			return 0;
		}

	}

}

?>