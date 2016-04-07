<?php
defined('BASEPATH') or exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by phpDesigner.
 * User: M Sinha
 * Date: 9/2/16
 * Time: 12:25 PM
 */
class Usermanagement extends Base_SchoolAdmin_Controller {
	public function __construct() {
		parent::__construct();
		/* $this->load->library(array(
			        'session',
			        'form_validation',
			        'excel',
		*/
		// $this->load->library('excel');
		$this->load->model('Studentdetails');
	}

	public function index() {

		//echo base_url();die();
		$this->data['pageTitle'] = "User Management";
		$school_id = $this->session->school_id;
		$this->load->model('useradd');
		$getdata = $this->useradd->getUserdata($school_id);
		//echo '<pre>';print_r($getdata);die();
		$this->data['userData'] = $getdata;
		$this->_loadView('school/user_management/user_management');
	}

	public function addMemeber() {
		// echo '<pre>';
		// print_r($_GET);
		//die();
		$userData = array();
		if ($_GET) {
			$userpassword = $_GET['userpassword'];
			$userconfirmpassword = $_GET['userconfirmpassword'];
			if ($userpassword == $userconfirmpassword) {
				$useremail = $_GET['useremail'];
				$vaild = $this->isValidEmail($useremail);
				if ($vaild == "1") {
					$this->load->model('useradd');
					$exists = $this->useradd->chekmail($useremail);
					if ($exists == "0") {
						$userData['school_id'] = $this->session->school_id;
						$userData['name'] = $_GET['name'];
						$userData['useremail'] = $_GET['useremail'];
						$userData['userpassword'] = md5(SALT . $_GET['userpassword']);
						$userData['useruserlevel'] = $_GET['useruserlevel'];
						$userData['status'] = "1";
						//echo '<pre>';
						//print_r($userData);die();
						$this->load->model('useradd');
						$insert = $this->useradd->insertUserdata($userData);
						if ($insert == "1") {
							// $this->session->set_flashdata('add_success', 'School Member Added Successfully');
							// redirect('school/Usermanagement/', 'refresh');
							$resultText['sucess'] = 'Sucess'; //die();
						} else {
							$resultText['error'] = 'Not inserted'; //die();
						}
					} else {
						$resultText['error'] = 'Email id already exists';
					}
				} else {
					$resultText['error'] = 'Emai is not a valid email address'; //die();
				}
			} else {
				//echo 'false';die();
				$resultText['error'] = 'Password And Confirmation Password Doesnot Match'; //die();
			}
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($resultText);
		exit;
	}

	function isValidEmail($useremail) {
		if (!filter_var($useremail, FILTER_VALIDATE_EMAIL) === false) {
			return 1;
		} else {
			return 0;
		}
	}

	public function getupdatedata() {
		if ($_GET) {
			$editid = $_GET['edit_id'];
			$this->load->model('useradd');
			$resultData = $this->useradd->getdatedata($editid);
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($resultData);
			exit;
		}
	}

	public function changestatus() {
		//echo '<pre>';print_r($_GET);die();
		$edit_id = $_GET['edit_id'];
		$update['status'] = $_GET['isactive'];
		$this->load->model('useradd');
		$statusUpdate = $this->useradd->statuschange($update, $edit_id);
		if ($statusUpdate == "1") {
			$state['stateactive'] = $_GET['isactive'];
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($state);
			exit;
		}
	}

	public function assignteacher() {
		$this->data['pageTitle'] = "Assign Teacher";
		$school_id = $this->session->school_id;
		$this->load->model('useradd');
		$teacher = $this->useradd->getteacher($school_id);
		$this->data['teacherdropdown'] = $teacher;
		$allocteacher = $this->useradd->getteacherDetails($school_id);
		//echo '<pre>';
		//print_r($allocteacher);die();
		if (isset($allocteacher) && $allocteacher != "") {
			foreach ($allocteacher as $key => $teacher_id) {
				//echo 'for';die('dasdad');
				$teachername = $this->useradd->getteachernamename($teacher_id['teacher']);
				//echo '<pre>';
				//print_r($teachername);
				$allocteacher[$key]['teachername'] = $teachername['name'];
				//$allocteacher
			}
			//die();
		}
		$this->data['result'] = $allocteacher;
		//echo '<pre>';
		//print_r($data['result']);die();
		$this->_loadView('school/user_management/assign_teacher');
	}

	public function sectionlist() {
		$data = array();
		$section = array();
		$this->load->model('useradd');
		$value = ucfirst($this->input->get('term'));
		$section = urldecode($this->input->get('section'));
		$teacher_id = $this->input->get('teacher_id');

		$secName = $this->useradd->getsectionName($value);

		if (isset($section) && $section != "") {
			$sec_array = explode(',', $section);
			if (isset($secName) && count($secName) > 0) {
				$i = 0;
				foreach ($secName as $key => $row) {
					if (!in_array($row, $sec_array)) {
						$sec_expld = explode(' ', $row);
						$sec_name = $sec_expld[1];
						$class_id = substr($sec_expld[0], -1);
						$check = $this->useradd->checkAllocateTeacher($sec_name, $class_id, $teacher_id);
						//echo $check;die;
						if ($check <= 0) {
							$data[$i] = $row;
							$i++;
						}
					}
				}
			}
		} else {
			if (isset($secName) && count($secName) > 0) {
				$i = 0;
				foreach ($secName as $key => $row) {
					$sec_expld = explode(' ', $row);
					$sec_name = $sec_expld[1];
					$class_id = substr($sec_expld[0], -1);
					$check = $this->useradd->checkAllocateTeacher($sec_name, $class_id, $teacher_id);
					//echo $check;die;
					if ($check <= 0) {
						$data[$i] = $row;
						$i++;
					}
				}
			}
		}

		echo json_encode($data);
	}

	public function saveteacher() {
		//echo '<pre>';
		//print_r($_POST);die();

		$sections = $this->input->post('selected_section');
		$sec_array = explode(',', $sections);
		//echo '<pre>';
		//print_r($sec_array);die();
		foreach ($sec_array as $key => $value) {

			$splitval = explode(' ', $value);
			//echo '<pre>';
			//print_r(substr($splitval[0], -1));
			$data[$key]['school_id'] = $this->session->school_id;
			$data[$key]['class'] = substr($splitval[0], -1);
			$data[$key]['section'] = $splitval[1];
			$data[$key]['teacher'] = $this->input->post('teacher');
			//echo '<pre>';
			//print_r($data);

		}
		//echo '<pre>';
		//print_r($data);
		//die();
		/*$data['school_id'] = $this->session->school_id;
			$data['class'] = $this->input->post('class');
			$data['section'] = $this->input->post('section');
		*/
		$this->load->model('useradd');
		$teacheradd = $this->useradd->classteacher($data);

		//$this->data['teacherdropdown']=$teacher;
		if ($teacheradd == "1") {
			$this->session->set_flashdata('add_teacher', 'Teacher add Sucessfully');
			redirect("school/Usermanagement/assignteacher/", 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Error');
			redirect("school/Usermanagement/assignteacher/", 'refresh');
		}

	}

	public function teacherdetails() {
		//echo '<pre>';print_r($_GET);die();

		$data['class'] = $_GET['classte'];
		$data['school_id'] = $this->session->school_id;
		$teacher = $allocteacher = array();
		$this->load->model('useradd');
		$allocteacher = $this->useradd->getteacherforclass($data);

		if (isset($allocteacher) && $allocteacher != "") {
			foreach ($allocteacher as $key => $teacher_id) {
				$teachername = $this->useradd->name($teacher_id->teacher);
				$allocteacher[$key]->name = $teachername->name;

			}
		}
		$data['result'] = $allocteacher;

		// echo '<pre>';print_r($allocteacher);die();

		echo $this->load->view('school/user_management/allocateteacher', $data, true);
	}

}

?>