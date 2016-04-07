
<?php
class Userapi extends CI_Model {

	function __construct() {
		parent::__construct();
		//die("cakked");
	}

	function getUserdetails($guardianregister_id) {

		$this->db->select('studentdetails_id');
		$this->db->where('guardianregister_id', $guardianregister_id);
		$rows = $this->db->get('studentguardian')->result_array();

		$detailsdata['id'] = $guardianregister_id;
		$detailsdata['students'] = array();
		//$students[] = array();
		foreach ($rows as $key => $value) {

			$detailsdata['students'][] = $value['studentdetails_id'];
		}

		if (count($detailsdata) > 0) {
			return $detailsdata;
		} else {
			return $detailsdata;
			//return array();
		}
		// echo '<pre>';
		// print_r($rows);die();
		//
		//

	}

	public function updateNoticeByGuardianId($notice_id,$guardianregister_id) {
		$this->db->update('school_notice_notification',array('isRead'=>'Y'),array('notice_id'=>$notice_id,'guardian_id'=>$guardianregister_id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function updateMessageByGuardianId($message_id,$guardianregister_id) {
		$this->db->update('school_message_notification',array('isRead'=>'Y'),array('message_id'=>$message_id,'guardian_id'=>$guardianregister_id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}



}

?>