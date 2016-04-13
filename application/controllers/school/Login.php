<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		//die('login');
		if ($this->input->post("submit") != NULL) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			if ($this->form_validation->run() == TRUE) {
				$email = $this->input->post("email", TRUE);
				$password = $this->input->post("password", TRUE);

				$this->load->model("MSchoolAdmin", "school_admin");
				//echo $email;
				// echo $password;die('3');

				$row = $this->school_admin->authenticate($email, $password);

				//echo '<pre>';
				//print_r($row);die();
				if ($row != NULL) {

					$this->session->set_userdata("school_id", $row['school_id']);
					$this->session->set_userdata("school_email", $row['email']);
					$this->session->set_userdata("school_logo", trim($row['school_logo']));
					$this->session->set_userdata("school_img", $row['school_img']);
					$this->session->set_userdata("user_type", USER_SCHOOL);

					if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
						$ip = $_SERVER['HTTP_CLIENT_IP'];
					} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					} else {
						$ip = $_SERVER['SERVER_ADDR'];
					}

					//echo 'IP ' . $ip.'</br>';
					// echo 'logid ' . $row['school_id'].'</br>';
					// echo 'email ' . $row['email'].'</br>';
					//echo "login " .date('Y-m-d H:i:s');
					//die();
					$log = array();

					$log['ip'] = $ip;
					$log['school_id'] = $row['school_id'];
					$log['email'] = $row['email'];
					$log['logindatetime'] = date('Y-m-d H:i:s');

					$this->load->model('logs');
					$insertlog = $this->logs->insertlogdata($log);

					//echo '<pre>';print_r($this->session->school_id);die();
					redirect("school/dashboard");
				} else {

					$this->session->set_flashdata("error", "Email Or Password is incorrect");
					redirect("school/login");
				}
			} else {
				//die('1');
				$this->load->view('school/login/view_login');
			}
		} else {
			//die('2');
			//die('dadadad');
			if ($this->session->user_id == NULL) {
				$this->load->view('school/login/view_login');
			} else {
				if ($this->session->user_type == USER_ADMIN) {
					// echo '<pre>';print_r($this->session->user_type);die();
					redirect("admin/dashboard");
				} else {
					if ($this->session->user_type == USER_SCHOOL) {
						// echo '<pre>';print_r($this->session->user_type);die();

						redirect("school/dashboard");
					} else if ($this->session->user_type == USER_PARENT) {

						//echo '<pre>';print_r($this->session->user_type);die();
						redirect("parent/dashboard");
					}

				}
			}

		}
	}

}

?>