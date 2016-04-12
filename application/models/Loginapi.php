<?php
class Loginapi extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function getphnoexist($guardian_phno) {

		$this->db->select('*');
		//$this->db->where('school_id', $school_id);
		$this->db->where('guardian_phno', $guardian_phno);
		$rows = $this->db->get('studentdetails')->row_array();

		if (count($rows) > 0) {
			return $rows;
		} else {
			return array();
		}
	}

	function checkPhno($guardian_phno) {
		$this->db->select('*');
		$this->db->where('guardian_phno', $guardian_phno);
		$rows = $this->db->get('guardianregister')->row_array();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return array();
		}

	}
	function createregister($data) {
		$this->db->insert('guardianregister', $data);
		$guardianregister_id = $this->db->insert_id();
		$this->db->select('*');
		$this->db->where('guardianregister_id', $guardianregister_id);
		$rows = $this->db->get('guardianregister')->row_array();
		if (count($rows) > 0) {
			return $rows;
		}
		//return $this->db->insert_id();

		// 1;
	}

	function otpVerify($guardianregister_id, $otp) {
		$this->db->select('*');

		//$this->db->where('school_id', $school_id);
		$this->db->where('guardianregister_id', $guardianregister_id);
		$this->db->where('otp', $otp);

		$rows = $this->db->get('guardianregister')->row_array();

		if (count($rows) > 0) {

			//$this->db->where('school_id', $school_id);
			$this->db->where('guardianregister_id', $guardianregister_id);
			$this->db->where('otp', $otp);
			$dataupdate = array(
				'otpVerificationStatus' => 1,
				'AccountStatus' => 1,

			);

			$this->db->update('guardianregister', $dataupdate);
			// return TRUE;
			// $data = array("flag"=>TRUE,"id"=>$guardianregister_id);
			return $guardianregister_id;
		} 
		else {
			// return array("flag"=>FALSE,"id"=>NULL);
			return FALSE;
		}
		
	}

	function otpResend($guardianregister_id) {

		$this->db->select('*');
		$this->db->where('guardianregister_id', $guardianregister_id);
		$rows = $this->db->get('guardianregister')->row_array();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return array();
		}

	}

/**
public function fetchUserDetails_OTP($guardian_phno, $otp) {

$sms_text = "Welcome to Payfees, your OTP is : " . $otp;
$sms_phone = $guardian_phno;
$this->utilities->sendSMS($sms_text, $sms_phone);
//return $data['otp'];
return 1;

}*/

}

?>


