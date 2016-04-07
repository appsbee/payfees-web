<?php
defined('BASEPATH') or exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by phpDesigner.
 * User: M Sinha
 * Date: 27/1/16
 * Time: 12:25 PM
 */
class Studentmanagement extends Base_Admin_Controller {
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

	}

	public function uploadstudent() {

		$this->data['pageTitle'] = "Upload Student";
		$school = new MSchool();
		$schools = $school->all();
		$this->data["schools"] = $schools;
		//echo '<pre>';print_r($this->data["schools"]);die();
		$this->data["userName"] = $this->session->user_name;

		$id = $this->uri->segment(4);

		if (isset($id)) {

			$this->data["schools_id"] = $id;

			$data['school_id'] = $this->uri->segment(4);
			$this->load->model('Schoolfees');

			$getSchool_name = $this->Schoolfees->getSchoolName($data);

			$this->data["school_name"] = $getSchool_name['school_name'];

			$this->load->model('Studentdetails');
			$getallStudents = $this->Studentdetails->getstudents($data);

			// echo '<pre>';print_r($getallStudents);die();
			$this->data["allStudents"] = $getallStudents;

			$this->_loadView('admin/student_management/upload_student');

		} else {
			$this->_loadView('admin/student_management/upload_student');

		}

	}
	public function studentdetails() {

		$this->data['pageTitle'] = "Student Details";
		$school = new MSchool();
		$schools = $school->all();
		$this->data["schools"] = $schools;
		//echo '<pre>';print_r($this->data["schools"]);die();
		$this->data["userName"] = $this->session->user_name;
		$this->_loadView('admin/student_management/student_details');
	}

	public function getschoolname() {

		$data['school_name'] = $_GET['keywords'];
		// echo $data['school_name'];die();
		$this->load->model('Schoolfees');
		$result['auto_comp'] = $this->Schoolfees->autocompSchool($data);

		echo $this->load->view('admin/student_management/schoolnameforstudent', $result, true);

		//echo'<pre>';print_r( $result['auto_comp']);die();
	}

	public function uploadStudentdata() {
		$data = array();
		//echo '<pre>';
		//print_r($_FILES['studentdetails']);
		//die();
		if (isset($_POST["submit"])) {
			if ($_FILES['studentdetails']['type'] == 'application/vnd.ms-excel') {
				$schoolid = $this->input->post('school_id');
				$delinitialy = $this->Studentdetails->deleteInitialy($schoolid);
				//echo 'if';die();
				$file = $_FILES['studentdetails']['tmp_name'];
				$this->load->library('excel');
				//read file from path
				$objPHPExcel = PHPExcel_IOFactory::load($file);
				//get only the Cell Collection
				$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
				//extract to a PHP readable array format
				foreach ($cell_collection as $cell) {
					$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
					$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
					$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
					//header will/should be in row 1 only. of course this can be modified to suit your need.
					if ($row == 1) {
						$header[$row][$column] = $data_value;
					} else {
						$arr_data[$row][$column] = $data_value;
					}
				}
				//send the data in an array format
				$data['header'] = $header;
				//$data['values'] = $arr_data;
				// echo '<pre>';print_r($arr_data);
				//echo count($arr_data);die();
				for ($i = 2; $i <= count($arr_data) + 1; $i++) {
					$studentdata = array();
					$studentdata['school_id'] = $this->input->post('school_id');
					$studentdata['school_name'] = $this->input->post('school_id');
					$studentdata['student_name'] = isset($arr_data[$i]['B']) ? $arr_data[$i]['B'] : '';
					$studentdata['class'] = isset($arr_data[$i]['C']) ? $arr_data[$i]['C'] : '';
					$studentdata['section'] = isset($arr_data[$i]['D']) ? $arr_data[$i]['D'] : '';
					$studentdata['roll'] = isset($arr_data[$i]['E']) ? $arr_data[$i]['E'] : '';
					$studentdata['gender'] = isset($arr_data[$i]['F']) ? $arr_data[$i]['F'] : '';
					$studentdata['blood_group'] = isset($arr_data[$i]['G']) ? $arr_data[$i]['G'] : '';
					$studentdata['dob'] = isset($arr_data[$i]['H']) ? $arr_data[$i]['H'] : '';
					$studentdata['permanent_address'] = isset($arr_data[$i]['I']) ? $arr_data[$i]['I'] : '';
					$studentdata['present_address'] = isset($arr_data[$i]['J']) ? $arr_data[$i]['J'] : '';
					$studentdata['religion'] = isset($arr_data[$i]['K']) ? $arr_data[$i]['K'] : '';
					$studentdata['caste'] = isset($arr_data[$i]['L']) ? $arr_data[$i]['L'] : '';
					$studentdata['nationality'] = isset($arr_data[$i]['M']) ? $arr_data[$i]['M'] : '';
					$studentdata['mother_tongue'] = isset($arr_data[$i]['N']) ? $arr_data[$i]['N'] : '';
					$studentdata['mothers_name'] = isset($arr_data[$i]['O']) ? $arr_data[$i]['O'] : '';
					$studentdata['mothers_qualification'] = isset($arr_data[$i]['P']) ? $arr_data[$i]['P'] : '';
					$studentdata['mothers_profession'] = isset($arr_data[$i]['Q']) ? $arr_data[$i]['Q'] : '';
					$studentdata['mothers_phno'] = isset($arr_data[$i]['R']) ? $arr_data[$i]['R'] : '';
					$studentdata['mothers_email'] = isset($arr_data[$i]['S']) ? $arr_data[$i]['S'] : '';
					$studentdata['mothers_annual_income'] = isset($arr_data[$i]['T']) ? $arr_data[$i]['T'] : '';
					$studentdata['fathers_name'] = isset($arr_data[$i]['U']) ? $arr_data[$i]['U'] : '';
					$studentdata['fathers_qualification'] = isset($arr_data[$i]['V']) ? $arr_data[$i]['V'] : '';
					$studentdata['fathers_profession'] = isset($arr_data[$i]['W']) ? $arr_data[$i]['W'] : '';
					$studentdata['fathers_phno'] = isset($arr_data[$i]['X']) ? $arr_data[$i]['X'] : '';
					$studentdata['fathers_email'] = isset($arr_data[$i]['Y']) ? $arr_data[$i]['Y'] : '';
					$studentdata['fathers_annual_income'] = isset($arr_data[$i]['Z']) ? $arr_data[$i]['Z'] : '';
					$studentdata['student_living_with'] = isset($arr_data[$i]['AA']) ? $arr_data[$i]['AA'] : '';
					$studentdata['guardian_name'] = isset($arr_data[$i]['AB']) ? $arr_data[$i]['AB'] : '';
					$studentdata['guardian_phno'] = isset($arr_data[$i]['AC']) ? $arr_data[$i]['AC'] : '';
					$studentdata['guardian_email'] = isset($arr_data[$i]['AD']) ? $arr_data[$i]['AD'] : '';
					$studentdata['registration_no'] = isset($arr_data[$i]['AE']) ? $arr_data[$i]['AE'] : '';

					//echo '<pre>';print_r($studentdata);die();
					//if $details= $this->Studentdetails->studentdetailsimport($studentdata);
					$result = $this->Studentdetails->studentdetailsimport($studentdata);
					//echo $result;
				}
				//die();
				$this->session->set_flashdata('add_details', 'Student Details Upload Successfully');
				redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
			} else {
				//echo 'else';die();
				$this->session->set_flashdata('error_details', 'Upload Excel File');
				redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
			}
		}
		$this->session->set_flashdata('error_details', 'Upload Excel File');
		redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
	}

	public function advancesearch() {

		$data = array();
		if ($this->input->post('school_id') != "") {

			$this->data['pageTitle'] = "Advance Search";

			$Schoolname = $this->Studentdetails->schollname($this->input->post('school_id'));
			if ($Schoolname != "0") {
				$this->data['schoolDetails'] = $Schoolname;
			}

			if ($this->input->post('school_id') != "") {
				$data['school_id'] = $this->input->post('school_id');

			} else {
				$data['school_id'] = "";

			}
			if ($this->input->post('class') != "") {
				$data['class'] = $this->input->post('class');
			} else {
				$data['class'] = "";
			}
			if ($this->input->post('section') != "") {
				$data['section'] = $this->input->post('section');
			} else {
				$data['section'] = "";
			}

			if ($this->input->post('roll') != "") {
				$data['roll'] = $this->input->post('roll');
			} else {
				$data['roll'] = "";
			}

			$result = $this->Studentdetails->advanceSearchvalue($data);

			//  echo '<pre>';
			//  print_r($result);
			// die();
			$this->data["allStudents"] = $result;
			$this->data["searchParam"] = $data;

			$this->_loadView('admin/student_management/advancesearch');

		} else {
			redirect("admin/Studentmanagement/uploadstudent", 'refresh');
		}

	}

	public function promotestudent() {

		if ($_FILES['promotestudent']['type'] == 'application/vnd.ms-excel') {

			$file = $_FILES['promotestudent']['tmp_name'];
			$this->load->library('excel');
			//read file from path
			$objPHPExcel = PHPExcel_IOFactory::load($file);
			//get only the Cell Collection
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			foreach ($cell_collection as $cell) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				if ($row == 1) {
					$header[$row][$column] = $data_value;
				} else {
					$arr_data[$row][$column] = $data_value;
				}
			}
			//send the data in an array format
			$data['header'] = $header;
			//$data['values'] = $arr_data;
			//  echo '<pre>';print_r($data);

			//echo count($data['values']);die();
			for ($i = 2; $i <= count($arr_data) + 1; $i++) {
				$promote = array();
				//$promote['school_id']=$this->input->post('school_id');
				$promote['registration_no'] = isset($arr_data[$i]['A']) ? $arr_data[$i]['A'] : '';
				$promote['roll'] = isset($arr_data[$i]['B']) ? $arr_data[$i]['B'] : '';
				$promote['class'] = isset($arr_data[$i]['C']) ? $arr_data[$i]['C'] : '';
				$promote['section'] = isset($arr_data[$i]['D']) ? $arr_data[$i]['D'] : '';

				// echo '<pre>';print_r($promote);
				//if $details= $this->Studentdetails->studentdetailsimport($promote);
				$promotest = $this->Studentdetails->studentspromote($promote);
				//echo $promotest;
			}
			//die();
			$this->session->set_flashdata('add_details', 'Student Promotion Successfully');
			redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
		} else {
			$this->session->set_flashdata('error_details', 'Upload Promotion Excel File');
			redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
		}
	}

	public function excelupload() {
		if ($this->input->post('uploadfile') == "1") {

			if ($_FILES['fileupload']['type'] == 'application/vnd.ms-excel') {

				$file = $_FILES['fileupload']['tmp_name'];
				$this->load->library('excel');
				//read file from path
				$objPHPExcel = PHPExcel_IOFactory::load($file);
				//get only the Cell Collection
				$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
				//extract to a PHP readable array format
				foreach ($cell_collection as $cell) {
					$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
					$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
					$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
					//header will/should be in row 1 only. of course this can be modified to suit your need.
					if ($row == 1) {
						$header[$row][$column] = $data_value;
					} else {
						$arr_data[$row][$column] = $data_value;
					}
				}
				//send the data in an array format
				$data['header'] = $header;
				//$data['values'] = $arr_data;
				//  echo '<pre>';print_r($data);

				//echo count($data['values']);die();
				for ($i = 2; $i <= count($arr_data) + 1; $i++) {
					$promote = array();
					//$promote['school_id']=$this->input->post('school_id');
					$promote['registration_no'] = isset($arr_data[$i]['A']) ? $arr_data[$i]['A'] : '';
					$promote['roll'] = isset($arr_data[$i]['B']) ? $arr_data[$i]['B'] : '';
					$promote['class'] = isset($arr_data[$i]['C']) ? $arr_data[$i]['C'] : '';
					$promote['section'] = isset($arr_data[$i]['D']) ? $arr_data[$i]['D'] : '';

					// echo '<pre>';print_r($promote);
					//if $details= $this->Studentdetails->studentdetailsimport($promote);
					$promotest = $this->Studentdetails->studentspromote($promote);
					//echo $promotest;
				}
				//die();
				$this->session->set_flashdata('add_details', 'Student Promotion Successfully');
				redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
			} else {
				$this->session->set_flashdata('error_details', 'Upload Promotion Excel File');
				redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
			}

		}

		if ($this->input->post('uploadfile') == "2") {
			$school_id = $this->input->post('school_id');
			$schoolname = $this->Studentdetails->getschoolname($school_id);
			$data = array();

			//echo '<pre>';
			//print_r($_FILES['fileupload']);
			//die();
			//
			if (isset($_POST["submit"])) {
				if ($_FILES['fileupload']['type'] == 'application/vnd.ms-excel') {
					$schoolid = $this->input->post('school_id');
					$delinitialy = $this->Studentdetails->deleteInitialy($schoolid);
					//echo 'if';die();
					$file = $_FILES['fileupload']['tmp_name'];
					$this->load->library('excel');
					//read file from path
					$objPHPExcel = PHPExcel_IOFactory::load($file);
					//get only the Cell Collection
					$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
					//extract to a PHP readable array format
					foreach ($cell_collection as $cell) {
						$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
						$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
						$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
						//header will/should be in row 1 only. of course this can be modified to suit your need.
						if ($row == 1) {
							$header[$row][$column] = $data_value;
						} else {
							$arr_data[$row][$column] = $data_value;
						}
					}
					//send the data in an array format
					$data['header'] = $header;
					//$data['values'] = $arr_data;
					// echo '<pre>';print_r($arr_data);
					//echo count($arr_data);die();
					for ($i = 2; $i <= count($arr_data) + 1; $i++) {
						$studentdata = array();
						$studentdata['school_id'] = $this->input->post('school_id');
						$studentdata['school_name'] = $schoolname['school_name'];
						$studentdata['student_name'] = isset($arr_data[$i]['B']) ? $arr_data[$i]['B'] : '';
						$studentdata['class'] = isset($arr_data[$i]['C']) ? $arr_data[$i]['C'] : '';
						$studentdata['section'] = isset($arr_data[$i]['D']) ? $arr_data[$i]['D'] : '';
						$studentdata['roll'] = isset($arr_data[$i]['E']) ? $arr_data[$i]['E'] : '';
						$studentdata['gender'] = isset($arr_data[$i]['F']) ? $arr_data[$i]['F'] : '';
						$studentdata['blood_group'] = isset($arr_data[$i]['G']) ? $arr_data[$i]['G'] : '';
						$studentdata['dob'] = isset($arr_data[$i]['H']) ? $arr_data[$i]['H'] : '';
						$studentdata['permanent_address'] = isset($arr_data[$i]['I']) ? $arr_data[$i]['I'] : '';
						$studentdata['present_address'] = isset($arr_data[$i]['J']) ? $arr_data[$i]['J'] : '';
						$studentdata['religion'] = isset($arr_data[$i]['K']) ? $arr_data[$i]['K'] : '';
						$studentdata['caste'] = isset($arr_data[$i]['L']) ? $arr_data[$i]['L'] : '';
						$studentdata['nationality'] = isset($arr_data[$i]['M']) ? $arr_data[$i]['M'] : '';
						$studentdata['mother_tongue'] = isset($arr_data[$i]['N']) ? $arr_data[$i]['N'] : '';
						$studentdata['mothers_name'] = isset($arr_data[$i]['O']) ? $arr_data[$i]['O'] : '';
						$studentdata['mothers_qualification'] = isset($arr_data[$i]['P']) ? $arr_data[$i]['P'] : '';
						$studentdata['mothers_profession'] = isset($arr_data[$i]['Q']) ? $arr_data[$i]['Q'] : '';
						$studentdata['mothers_phno'] = isset($arr_data[$i]['R']) ? $arr_data[$i]['R'] : '';
						$studentdata['mothers_email'] = isset($arr_data[$i]['S']) ? $arr_data[$i]['S'] : '';
						$studentdata['mothers_annual_income'] = isset($arr_data[$i]['T']) ? $arr_data[$i]['T'] : '';
						$studentdata['fathers_name'] = isset($arr_data[$i]['U']) ? $arr_data[$i]['U'] : '';
						$studentdata['fathers_qualification'] = isset($arr_data[$i]['V']) ? $arr_data[$i]['V'] : '';
						$studentdata['fathers_profession'] = isset($arr_data[$i]['W']) ? $arr_data[$i]['W'] : '';
						$studentdata['fathers_phno'] = isset($arr_data[$i]['X']) ? $arr_data[$i]['X'] : '';
						$studentdata['fathers_email'] = isset($arr_data[$i]['Y']) ? $arr_data[$i]['Y'] : '';
						$studentdata['fathers_annual_income'] = isset($arr_data[$i]['Z']) ? $arr_data[$i]['Z'] : '';
						$studentdata['student_living_with'] = isset($arr_data[$i]['AA']) ? $arr_data[$i]['AA'] : '';
						$studentdata['guardian_name'] = isset($arr_data[$i]['AB']) ? $arr_data[$i]['AB'] : '';
						$studentdata['guardian_phno'] = isset($arr_data[$i]['AC']) ? $arr_data[$i]['AC'] : '';
						$studentdata['guardian_email'] = isset($arr_data[$i]['AD']) ? $arr_data[$i]['AD'] : '';
						$studentdata['registration_no'] = isset($arr_data[$i]['AE']) ? $arr_data[$i]['AE'] : '';

						//echo '<pre>';print_r($studentdata);die();
						//if $details= $this->Studentdetails->studentdetailsimport($studentdata);
						$result = $this->Studentdetails->studentdetailsimport($studentdata);
						//echo $result;
					}
					//die();
					$this->session->set_flashdata('add_details', 'Student Details Upload Successfully');
					redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
				} else {
					//echo 'else';die();
					$this->session->set_flashdata('error_details', 'Upload Excel File');
					redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');
				}
			}
			$this->session->set_flashdata('error_details', 'Upload Excel File');
			redirect("admin/Studentmanagement/uploadstudent/" . $this->input->post('school_id'), 'refresh');

		}

	}

	public function getStudenydetails() {
		//echo '<pre>';print_r($_GET['studentdetails_id']);die();

		$studentid = $_GET['studentdetails_id'];
		$result = $this->Studentdetails->studentdetails($studentid);

		//echo '<pre>';print_r($result);die();

		header('Content-Type: application/json; charset=utf-8');

		echo json_encode($result);
		exit;

	}

}

?>