
<?php
class Addstudentapi extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function studentadd($guardianregister_id, $studentdetails_id, $school_id, $registration_no) {
		$data = array();
		$data = array(
			'guardianregister_id' => $guardianregister_id,
			'studentdetails_id' => $studentdetails_id,
			'school_id' => $school_id,
			'registration_no' => $registration_no,
		);
		$this->db->insert('studentguardian', $data);
		return $this->db->insert_id();
	}

}

?>





