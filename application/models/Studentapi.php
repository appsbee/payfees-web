<?php
class Studentapi extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getStudent($data) {

		$this->db->select('*');
		$this->db->where('school_id', $data['school_id']);
		if (isset($data['registration_no'])) {

			$this->db->where('registration_no', $data['registration_no']);
			$rows = $this->db->get('studentdetails')->row();
		} else {
			$this->db->where('student_name', $data['student_name']);
			$this->db->where('class', $data['class']);
			$this->db->where('section', $data['section']);
			$this->db->where('roll', $data['roll']);
			$rows = $this->db->get('studentdetails')->row();

		}
		if (count($rows) > 0) {
			$studentID = $rows->studentdetails_id;
			// echo $studentID;die();
			return $this->studentDetailsByID($studentID);
			// return $rows;
		} else {
			return array();
		}

	}

	function getRegno($value) {
		$this->db->select('*');
		$this->db->where('studentdetails_id', $value);
		$rows = $this->db->get('studentdetails')->row_array();
		if (count($rows) > 0) {
			return $rows;
		} else {
			return array();
		}
	}

	function getAlldetails($registration_id) {

		/*
			        $this->db->select('*');
			     $this->db->from('paymentdetails');
			     $this->db->where('paymentdetails.registration_no', $registration_id);
			     $this->db->join('studentdetails as studentdetails', 'paymentdetails.registration_no = studentdetails.registration_no', 'LEFT');

			     $query = $this->db->get();
			        $rows= $query->result();

			    echo '<pre>';print_r($rows);die();
		*/

		$this->db->select('*'); //id  users table
		$this->db->where('registration_no', $registration_id);
		$rows = $this->db->get('studentdetails')->result_array();

		$studentsdata = array();
		$feestotal = array();

		$studentsdata['basic'] = $rows[0];
		// $studentsdata['basic']['unread_messages'] = 0;
		$studentsdata['basic']['unread_messages'] = $this->fetchUnreadMessagesByStudent((int)$studentsdata['basic']['studentdetails_id'],(int)$studentsdata['basic']['school_id']);

		$this->db->select('school_name'); //id  users table
		$this->db->where('id', $studentsdata['basic']['school_id']);
		$school_name = $this->db->get('schools')->row_array();

		$studentsdata['basic']['school_name'] = $school_name['school_name'];

		$this->db->select('*'); //id  users table
		$this->db->where('registration_no', $registration_id);

		$fees = $this->db->get('paymentdetails')->result();
		$studentsdata['fees'] = $fees;

		$totalmonthAmount = 0;
		$totalmonthpaymentAmount = 0;
		$totalmonthbalanceAmount = 0;

		foreach ($fees as $key => $value) {

			$totalmonthAmount = $totalmonthAmount + $value->amount;
			$totalmonthpaymentAmount = $totalmonthpaymentAmount + $value->payment_amount;
			$totalmonthbalanceAmount = $totalmonthAmount - $totalmonthpaymentAmount;
		}

		$feestotal['totalAmount'] = $totalmonthAmount;
		$feestotal['totalpayed'] = $totalmonthpaymentAmount;
		$feestotal['totalbalance'] = $totalmonthbalanceAmount;
		$studentsdata['feesdetails'] = $feestotal;

		//$mysql="SELECT  MONTH(feedue_date) as month FROM paymentdetails where`registration_no`=$registration_id GROUP BY MONTH(feedue_date)";

		$sql = $this->db->query("SELECT  MONTH(feedue_date) as month FROM paymentdetails where`registration_no`=$registration_id GROUP BY MONTH(feedue_date)");
		$result = $sql->result_array();
		foreach ($result as $key => $month) {
			//echo '<pre>';print_r($month['month']);

			$final = $this->db->query("SELECT * FROM `paymentdetails` WHERE `registration_no` = $registration_id AND MONTH(feedue_date) ='" . $month['month'] . "'");
			$fresult[$key] = $final->result_array();
			//echo '<pre>';print_r($fresult);// $final;

		}
		//$studentsdata['month'] = $fresult;

		//die();

		//$groupmonth = $this->db->get('paymentdetails')->result();
		//$studentsdata['month']=$groupmonth;

		return $studentsdata;
		//echo '<pre>';print_r($studentsdata);die();

	}

	public function studentDetailsByID($studentId) {
		// return array("student_id"=>$studentId);
		// $data = array("unread_messages"=>0,"unread_notifications"=>0);
		$data = array();
		$query = $this->db->select("studentdetails.studentdetails_id,studentdetails.school_id,studentdetails.student_name,studentdetails.registration_no,studentdetails.class,studentdetails.section,studentdetails.roll,schools.school_name,schools.address,schools.contact_no,schools.fax,schools.contact_email")->from("studentdetails")->join("schools", "schools.id=studentdetails.school_id", "left")->where("studentdetails.studentdetails_id", $studentId)->get();
		if ($query->num_rows() > 0) {
			$data = $query->row_array();
			$data["unread_messages"] = $this->fetchUnreadMessagesByStudent($data['studentdetails_id'],$data['school_id']);
			$data["unread_notifications"] = 0;
			$paymentData = $this->db->select('payment_date,amount,payment_mode,transaction_no,feehead')->from('paymentdetails')->where('registration_no', $data['registration_no'])->order_by('payment_date', 'DESC')->limit('1')->get()->row_array();
			if (isset($paymentData) && !empty($paymentData)) {
				$data["payment_date"] = date("jS F, Y", strtotime($paymentData["payment_date"]));
				$data["amount"] = "$" . $paymentData["amount"];
				$data["payment_mode"] = $paymentData["payment_mode"];
				$data["transaction_no"] = $paymentData["transaction_no"];
				$data["payment_for"] = $paymentData["feehead"];
			} else {
				$data["payment_date"] = "";
				$data["amount"] = "";
				$data["payment_for"] = "";
				$data["payment_mode"] = "";
				$data["transaction_no"] = "";
			}
		}
		return $data;
	}

	public function fetchUnreadMessagesByStudent($studentId,$schoolId){//1,21
		$studentId = (int)$studentId;
		$schoolId = (int)$schoolId;
		// echo $studentId." ".$schoolId;die();
		$query1 = $this->db->select('guardianregister.guardianregister_id')->from('guardianregister')->join('studentdetails','studentdetails.guardian_phno=guardianregister.guardian_phno','left')->where('studentdetails.studentdetails_id',$studentId)->get();
		$guardian_id = $query1->row()->guardianregister_id;//4
		// die();
		$resArr1 = $this->db->select('studentdetails.class,section.section_id')->from('studentdetails')->join('section','section.name=CONCAT("Class",studentdetails.class," ",studentdetails.section)','left')->where(array('studentdetails.studentdetails_id'=>$studentId))->get()->row();
		// echo $this->db->last_query();die();
		$class = $resArr1->class;
		$section = $resArr1->section_id;
		$query2 = $this->db->select('school_message.school_message_id')->from('school_message')->join('school_message_relation','school_message_relation.message_id=school_message.school_message_id','left')
		// ->join('school_message_notification','school_message_notification.message_id=school_message.school_message_id','left')
		->where('school_message_relation.student_id',$studentId)->or_where('(school_message_relation.class_id='.$class.' AND school_message_relation.section_id='.$section.' AND school_message_relation.school_id='.$schoolId.')')->get();
		// echo $this->db->last_query();die();
		// echo '<pre>';print_r($query2->result_array());
		$cnt=0;
		foreach($query2->result_array() as $val){
			$query3 = $this->db->select('school_message_notification_id')->from('school_message_notification')->where(array('school_message_notification.isRead'=>'N','guardian_id'=>$guardian_id,'message_id'=>$val['school_message_id']))->get();
			if($query3->num_rows() > 0){
				// echo "test"."<br>";
				$cnt++;
			}
		}
		// die();
		//echo '<pre>';print_r($query2->result_array());die();
		// $guardian_id = $query1->row()->guardianregister_id;
		return $cnt;

	}

}

?>


