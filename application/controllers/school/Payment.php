<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: monobrata
 * Date: 11/02/15
 * Time: 2:20 PM
 */
class Payment extends Base_SchoolAdmin_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function upload_payment() {
		//die('upload_payment');
		$this->data['pageTitle'] = "Payment Upload";
		$this->data["userName"] = $this->session->school_email;
		$this->data["school_id"] = $this->session->school_id;

		//echo '<pre>';print_r( $this->session->school_email);die();
		$this->_loadView("school/payment/payment_upload");
	}

	public function view_payment() {
		$this->data['pageTitle'] = "Payment Details";
		$this->data["userName"] = $this->session->school_email;
		//echo '<pre>';print_r( $this->session->school_email);die();
		$school_id = $this->session->school_id;
		$this->load->model('Paymentmodel');

		$result = $this->Paymentmodel->getpaymentdetailsdata($school_id);

		$this->data["paymentDetails"] = $result;
		//echo '<pre>';print_r($result);die();

		$this->_loadView("school/payment/payment_view");
	}

	public function insertpayment() {
		if ($_FILES['paymentupload']['type'] == 'application/vnd.ms-excel') {

			$file = $_FILES['paymentupload']['tmp_name'];
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
			//echo '<pre>';print_r($data);

			//echo count($data['values']);
			//die();
			for ($i = 2; $i <= count($arr_data) + 1; $i++) {
				$pay = array();
				$pay['school_id'] = $this->session->school_id;
				$pay['registration_no'] = isset($arr_data[$i]['A']) ? $arr_data[$i]['A'] : '';
				$pay['transaction_no'] = isset($arr_data[$i]['B']) ? $arr_data[$i]['B'] : '';
				$pay['roll'] = isset($arr_data[$i]['C']) ? $arr_data[$i]['C'] : '';
				$pay['class'] = isset($arr_data[$i]['D']) ? $arr_data[$i]['D'] : '';
				$pay['section'] = isset($arr_data[$i]['E']) ? $arr_data[$i]['E'] : '';
				$pay['feehead'] = isset($arr_data[$i]['F']) ? $arr_data[$i]['F'] : '';
				$pay['amount'] = isset($arr_data[$i]['G']) ? $arr_data[$i]['G'] : '';
				$pay['feedue_date'] = isset($arr_data[$i]['H']) ? $arr_data[$i]['H'] : '';
				$pay['payment_date'] = isset($arr_data[$i]['I']) ? $arr_data[$i]['I'] : '';
				$pay['payment_amount'] = isset($arr_data[$i]['J']) ? $arr_data[$i]['J'] : '';
				$pay['payment_mode'] = isset($arr_data[$i]['K']) ? $arr_data[$i]['K'] : '';
				$pay['payment_status'] = isset($arr_data[$i]['L']) ? $arr_data[$i]['L'] : '';

				//echo '<pre>';print_r($pay);
				$this->load->model('Paymentmodel');
				$promotest = $this->Paymentmodel->insertpaymentdata($pay);
				//echo $promotest;
			}
			// die();
			$this->session->set_flashdata('add_details', 'Student Payment Details Upload Successfully');
			redirect("school/Payment/upload_payment/", 'refresh');
		} else {
			$this->session->set_flashdata('error_details', 'Upload Excel File');
			redirect("school/Payment/upload_payment/", 'refresh');
		}

	}

	public function paymentdetails() {
		$this->data['pageTitle'] = "Payment Details";
		$registration_id = $this->uri->segment(4);
		//echo $registration_id;die();
		$this->load->model('Paymentmodel');
		$result = $this->Paymentmodel->getAlldetails($registration_id);
		//echo '<pre>';
		//print_r($result);die();
		$this->data["stduentDetails"] = $result;
		$this->_loadView("school/payment/payment_details");
	}

}

?>