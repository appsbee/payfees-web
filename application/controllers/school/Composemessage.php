<?php
defined('BASEPATH') or exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: M  Sinha
 * Date: 17/2/16
 * Time: 8:00 PM
 */
class Composemessage extends Base_SchoolAdmin_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Message');

	}

	public function index() {
		//die('dsdad');
		$this->data['pageTitle'] = "Compose Message";
		$this->data["userName"] = $this->session->school_email;
		$this->_loadView("school/composemessage/composemessage");
	}

	public function classname() {
		//echo '<per>';print_r($_GET['keywords']);die();
		$data = array();

		/* if($_GET['keywords']="Class"){

			        }
		*/

		if (strlen($_GET['keywords']) == 5) {

			$data['class'] = ucfirst($_GET['keywords']);
			//echo '<pre>';print_r($data);die();
			$this->load->model('Message');
			$result['classresult'] = $this->Message->classnameget($data);

		} else {
			$data['class'] = ucfirst($_GET['keywords']);

			//$data['class'] = 1;
			$this->load->model('Message');
			$result['classsec'] = $this->Message->getclass($data);

			// echo '<pre>';print_r($result);die();
		}

		echo $this->load->view('school/composemessage/class_drop', $result, true);
		//echo '<pre>';print_r($result);die();

	}

	public function individualsend() {
		//echo '<per>';print_r($_GET['keywords']);die();
		$data = array();
		$data['sendmail_email'] = $_GET['keywords'];
		$data['school_id'] = $this->session->school_id;
		$this->load->model('Message');
		$result['classsec'] = $this->Message->getclass($data);

		echo $this->load->view('school/composemessage/class_drop', $result, true);
		//echo '<pre>';print_r($result);die();

	}
	public function send() {

		if ($this->input->post('type') == 2) {
			//echo 'xyz';
			$school_id = $this->session->school_id;
			$title = $this->input->post('title');
			$message = $this->input->post('message');

			$insertedMsgId = $this->Message->inserMessege($school_id, $title, $message);

			//echo $insertedMsgId;

			//if ($insertedMsgId) {

			//}
		}

		//die();

		echo '<pre>';
		print_r($_POST['type']);

		$class = array();
		$section = array();
		$new = array();
		$newclassesid = explode(",", $_POST['classesid']);
		echo '<pre>';
		print_r($newclassesid);
		$i = 0;
		foreach ($newclassesid as $skey => $nclass) {
			if (!stristr($nclass, "c_") == false) {
				//echo $nclass."\n";
				$newclassesid = explode("_", $nclass);
				$class['c'] = $newclassesid[1];
				//echo '<pre>';
				// print_r($class['c']);
				$this->load->model('Message');
				$section = $this->Message->belongssection($class);

				// echo '<pre>';print_r($section);
				foreach ($section as $seckey => $secRow) {
					$sections[$i] = $secRow['section_id'];
					$i++;
				}
				// echo '<pre>';
				// print_r($section);
			} else {
				// echo 'else';
				$new[$skey] = $nclass;
				//echo '<pre>';
				// print_r($class);
				//  $this->load->model('Message');
				// $class['new'] = $this->Message->belongsclass($class);
				//echo '<pre>';
				// print_r($class);

			}
		}

		echo '<pre>';
		print_r($sections);
		$result = array_merge($new, $sections);
		print_r($result);
		$input = array_unique($result);
		//print_r(array_values($input));
		$input = array_values($input);
		$sec = array();

		// foreach ($input as $sk => $put) {
		// 	$sec[$sk] = $put;

		// }
		// $sec['details'] = $sec;
		// print_r($sec);

		// die();
		$deatils = array();
		$phonodetails = array();
		$i = 0;
		foreach ($input as $sk => $put) {
			//$sec[$sk] = $put;
			$seclist = $this->Message->secList($put);

			$deatils[$sk]['message_id'] = $insertedMsgId;
			$deatils[$sk]['school_id'] = $this->session->school_id;

			$deatils[$sk]['class_id'] = $seclist[0]['classlist_id'];
			$deatils[$sk]['section_id'] = $seclist[0]['section_id'];
			$deatils[$sk]['student_id'] = 0;
			//$deatils[$sk]['sec_name'] = substr($seclist[0]['name'], -1);
			$sec = substr($seclist[0]['name'], -1);

			$regphno = $this->Message->getguardianid($sec, $seclist[0]['classlist_id']);
			if (isset($regphno) && count($regphno) > 0 && is_array($regphno)) {

				foreach ($regphno as $key => $value) {
					$phonodetails[$i] = isset($value['guardian_phno']) ? $value['guardian_phno'] : '';
					$i++;
				}
			}

			//$phonodetails[$sk]['regphno'] = $regphno;

		}
		$section = $this->Message->schoolmessage($deatils);

		$input = array_unique($phonodetails);
		//print_r(array_values($input));
		$phonodetails = array_values($input);
		//echo '<pre>';
		//print_r($phonodetails);
		$relation = array();
		foreach ($phonodetails as $pno => $val) {
			$gid = $this->Message->getgid($val);
			if (isset($gid) && count($gid) > 0 && is_array($gid)) {
				$relation[$pno]['guardian_id'] = $gid['guardianregister_id'];
				$relation[$pno]['message_id'] = $insertedMsgId;

			}

		}
		//echo '<pre>';
		//print_r($relation);
		$section = $this->Message->messageuser($relation);

		die();
		//echo '<pre>';
		//print_r($deatils);

		//die();
		//$sec['details'] = $sec;
		//print_r($sec);

		/* $string = $_POST['mailidto'];
			        $pos = strpos($string, "class1");

			        if ($pos === false) {
			        print "Not found\n";
			        } else {

			        print "Found class1!\n";
			        }
			        $pos = strpos($string, "class2");
			        if ($pos === false) {
			        print "Not found\n";
			        } else {
			        print "Found class2!\n";
			        }

		*/

		$allname = array();
		$quer = array();
		$str = $_POST['classesid'];
		$newclassesid = explode(",", $str);
		$fids = array_unique($newclassesid);
		$final = array_values($fids);
		$this->load->model('Message');

		foreach ($final as $key => $frow) {
			$result[$key] = $this->Message->getclassname($frow);
			$splitval = explode(" ", $result[$key]['name']);
			$quer['class'] = substr($splitval[0], 5);
			$quer['sec'] = isset($splitval[2]) ? $splitval[2] : '';
			// echo '<pre>';print_r($splitval);
			echo '<pre>';
			print_r($quer);
		}
		//  $allname['allc']=$splitval;
		// $allname['quer']=$quer;
		//$allname['allids']=$result;
		// echo'<pre>';print_r($allname);
		die();
	}

}

?>