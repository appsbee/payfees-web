<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School_management extends Base_Admin_Controller
{
    public function index()
    {
        if ($this->input->post("submit"))
            $this->_store();
        else
            $this->view_all();
    }

    //return create school view
    public function create()
    {
        $this->data["script_js_list"] = array(base_url("assets/js/_admin_create_school.js"));
        $this->data['pageTitle'] = "PayFees - Create School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_create");
    }

    public function view_all()
    {
        //$this->load->model("MSchool", 'school');
        $school = new MSchool();
        $schools = $school->all();
       // echo '<pre>';print_r($schools);die();
        $this->data["script_js_list"] = array(base_url("assets/js/_admin_school_view_all.js"));
        $this->data['pageTitle'] = "PayFees - All School";
        $this->data["userName"] = $this->session->user_name;
       
       // $this->data["schools"] = $schools; old
        
        
        $this->load->model('MSchool');
        $scholldetailsall = $this->MSchool->scholldetails();
        //echo '<pre>';print_r($scholldetailsall);die();
        $this->data["schools"] = $scholldetailsall;
        $this->_loadView("admin/school_management/view_all");
    }

    //return edit school view
    public function edit($schoolId = null)
    {
        if ($schoolId == null) {
            redirect("admin/school-management/view_all");
            return;
        }

        $schoolModel = new MSchool();
        $schoolAdminModel = new MSchoolAdmin();


        $school = $schoolModel->get($schoolId);
        $schoolAdmins = $schoolAdminModel->get($schoolId);

        $this->data['school'] = $school;
        $this->data['schoolAdmins'] = $schoolAdmins;


        $this->data["script_js_list"] = array();
        //$this->data["script_js_list"][] = base_url("assets/js/_admin_edit_school.js");
        //$this->data["script_js_list"][] = base_url("assets/js/chosen.jquery.min.js");
        $this->data['pageTitle'] = "PayFees - Edit School";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/school_management/view_edit");

    }

    private function _store()
    {
        //create_school
        $this->_set_validation_school_details();

        $this->form_validation->set_rules('school_admin_name', 'School Admin name','trim|required|max_length[255]');
            $this->form_validation->set_rules('school_admin_email', 'Email', 'required|valid_email');
        //$this->form_validation->set_rules('school_admin_email', 'Email','required');

        $this->form_validation->set_rules('school_admin_password','School Admin password', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('school_admin_phone','School Admin Contact No', 'trim|required|regex_match[/^[0-9]{10}$/]');

        //$this->form_validation->set_rules('school_admin_email', 'School Admin email', 'required|is_unique[schools.contact_email]');
        
        if ($this->form_validation->run() == true) {

            $schoolName = $this->input->post("school_name", true);
            $address = $this->input->post("address", true);
            $city = $this->input->post("city", true);
            $state = $this->input->post("state", true);
            $zip = $this->input->post("zip", true);

            
            
            //  $details = $this->input->post("details", true);
            $details="Static";
            $sessionStart = $this->input->post("session_start", true);
            $sessionEnd = $this->input->post("session_end", true);

            

            $contactPerson = "static";
            $contactEmail = "static@gmail.com";
            $contactPhone = "1234567890";

            $schoolAdminName = $this->input->post("school_admin_name", true);
            
            $schoolAdminEmail = $this->input->post("school_admin_email", true);
            
    
            /*
            print_r($schoolAdminEmail);die();
            
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
            
            }
            
            */
            $schoolAdminPassword = $this->input->post("school_admin_password", true);
            $maildata=array();
            
                 $maildata['email']=   $schoolAdminEmail;
                 $maildata['password']=   $schoolAdminPassword;
           	     
                 
            $schoolAdminPhone = $this->input->post("school_admin_phone", true);
            
            
            
            //echo '<pre>';print_r($_FILES);die();
            // school logo upload
            if (isset($_FILES['school_logo'])&& $_FILES['school_logo']['name']!="") {
                
               // echo 'file1';
              //  die();
                if (!is_dir('uploads/')) {
                    mkdir('./uploads/', 0777, true);
                }
                if (!is_dir('uploads/big/')) {
                    mkdir('./uploads/big/', 0777, true);

                }
                if (!is_dir('uploads/thumb/')) {
                    mkdir('./uploads/thumb/', 0777, true);

                }
                if (!is_dir('uploads/thumble/')) {
                    mkdir('./uploads/thumble/', 0777, true);

                }
                $this->load->library('image_lib');

                $config['upload_path'] = './uploads/big/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '0';
                $config['max_width'] = '0';
                $config['max_height'] = '0';
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                /* size 50*50for comments */

                $configThumb = array();
                $configThumb['image_library'] = 'gd2';
                $configThumb['create_thumb'] = true;
                $configThumb['new_image'] = './uploads/thumb/';
                $configThumb['maintain_ratio'] = true;
                $configThumb['width'] = 50;
                $configThumb['height'] = 50;
                $configThumb['thumb_marker'] = "";
                /* size 50*50 for comments */

                /* size 300*300 for thuble */
                $configThumble = array();
                $configThumble['image_library'] = 'gd2';
                $configThumble['create_thumble'] = true;
                $configThumble['new_image'] = './uploads/thumble/';
                $configThumble['maintain_ratio'] = true;
                $configThumble['width'] = 300;
                $configThumble['height'] = 300;
                $configThumble['thumb_marker'] = "";
                /* size 300*300 for thuble */

                //echo '<pre>'; print_r($config);die();

                if (!$this->upload->do_upload('school_logo')) {

                    $data['error'] = $this->upload->display_errors();
                    
                    //echo '<pre>';print_r($data['error']);die();
                    
                    $this->session->set_flashdata("errorlogo",$data['error'] );
                    redirect("admin/school-management/create");
                    //die();
                                        
                } else {

                    //$folder = 'uploads/';
                    $fileData = $this->upload->data();
                    //print"<pre>";print_r($fileData['file_ext']);die;

                    $configThumb['source_image'] = $fileData['full_path'];
                    $configThumble['source_image'] = $fileData['full_path'];

                    $raw_name = $fileData['raw_name'];
                    $file_ext = $fileData['file_ext'];

                    $imgname = $raw_name . $file_ext;

                    $this->image_lib->initialize($configThumb);
                    $this->image_lib->resize();
                    $this->image_lib->initialize($configThumble);
                    $this->image_lib->resize();
                    // echo "<pre>"; print_r($fileData);die();
                    //$img_logo = $folder . $fileData['file_name'];
                    $img_logo = $fileData['file_name'];
                   // echo $img_logo;
                   // die();

                }
            }
            else{
                $img_logo="";
            }
                    if (isset($_FILES['school_img'])&& $_FILES['school_img']['name']!="") {
                        //echo 'file2';
                        //die();
                if (!is_dir('uploads/')) {
                    mkdir('./uploads/', 0777, true);
                }
                if (!is_dir('uploads/big/')) {
                    mkdir('./uploads/big/', 0777, true);

                }
                if (!is_dir('uploads/thumb/')) {
                    mkdir('./uploads/thumb/', 0777, true);

                }
                if (!is_dir('uploads/thumble/')) {
                    mkdir('./uploads/thumble/', 0777, true);

                }
                $this->load->library('image_lib');

                $config['upload_path'] = './uploads/big/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '0';
                $config['max_width'] = '0';
                $config['max_height'] = '0';
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                /* size 50*50for comments */

                $configThumb = array();
                $configThumb['image_library'] = 'gd2';
                $configThumb['create_thumb'] = true;
                $configThumb['new_image'] = './uploads/thumb/';
                $configThumb['maintain_ratio'] = true;
                $configThumb['width'] = 50;
                $configThumb['height'] = 50;
                $configThumb['thumb_marker'] = "";
                /* size 50*50 for comments */

                /* size 300*300 for thuble */
                $configThumble = array();
                $configThumble['image_library'] = 'gd2';
                $configThumble['create_thumble'] = true;
                $configThumble['new_image'] = './uploads/thumble/';
                $configThumble['maintain_ratio'] = true;
                $configThumble['width'] = 300;
                $configThumble['height'] = 300;
                $configThumble['thumb_marker'] = "";
                /* size 300*300 for thuble */

                //echo '<pre>'; print_r($config);die();

                if (!$this->upload->do_upload('school_img')) {

                    $data['error'] = $this->upload->display_errors();
                    
                    $this->session->set_flashdata("errorimg",$data['error'] );
                    redirect("admin/school-management/create");
                    //die();
                                        
                } else {

                    //$folder = 'uploads/';
                    $fileData = $this->upload->data();
                    //print"<pre>";print_r($fileData['file_ext']);die;

                    $configThumb['source_image'] = $fileData['full_path'];
                    $configThumble['source_image'] = $fileData['full_path'];

                    $raw_name = $fileData['raw_name'];
                    $file_ext = $fileData['file_ext'];

                    $imgname = $raw_name . $file_ext;

                    $this->image_lib->initialize($configThumb);
                    $this->image_lib->resize();
                    $this->image_lib->initialize($configThumble);
                    $this->image_lib->resize();
                    // echo "<pre>"; print_r($fileData);die();
                    //$img = $folder . $fileData['file_name'];
                    $img = $fileData['file_name'];
                   // echo $img;
                   // die();

                }
            }
            else{
                $img="";
            }

            //MSchool school = new MSchool();
            $this->load->model("MSchool", 'school');

            $school_id = $this->school->create($schoolName, $details, $address,$city,$state,$zip, $sessionStart,
                $sessionEnd, $contactPerson, $contactEmail, $contactPhone,$img_logo,$img);

            if ($school_id != -1) {
                $this->load->model("MSchoolAdmin", 'schoolAdmin');
                
                $admin_id = $this->schoolAdmin->create($school_id, $schoolAdminEmail, $schoolAdminName,
                    $schoolAdminPassword, $schoolAdminPhone, 1, STATE_ACTIVE);
                if ($admin_id != -1) {
               	$this->send_mail($schoolAdminEmail, $schoolAdminPassword);
                
                $this->load->model('Community');
                $community_name=$schoolName.'-Community';
                $school_id=$admin_id;
                $c_id = $this->Community->community_create($community_name,$school_id);
                                
                    
                 $this->session->set_flashdata("success", "School " . $schoolName ." created successfully.");
                    redirect("admin/school-management/create");
                }

            } else {
                $this->session->set_flashdata("error", "Unable to create school .");
                redirect("admin/school-management/create");
            }
        } else {
            $this->create();
        }
    }
    
    
    private function send_mail($schoolAdminEmail,$schoolAdminPassword){

	//	echo $schoolAdminEmail;
        //echo $schoolAdminPassword;die();
        $this->email->set_mailtype('html');
		$subject = 'Welcome to Payfees';
		$this->email->from('admin@payfees.com', 'Payfees Admin');
		$this->email->to($schoolAdminEmail);
		$this->email->subject($subject);
		$message = '<html><body>';
        $content="";
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

        $message .='<tr style="background: #eee;"><td colspan="2"><strong>' . $subject . '</strong></td></tr>';
     
       //// message content ////
        $url = site_url() .'/school/login';
        //echo $url;die();
        $content .='<tr><td colspan="2"><strong>Here is your Login credential :</strong> </td></tr>';
        $content .='<tr><td><strong>Email:</strong> </td><td>' . $schoolAdminEmail . '</td></tr>';
        $content .='<tr><td><strong>Password:</strong> </td><td>' . $schoolAdminPassword . '</td></tr>';
        $content .='<tr><td colspan="2"><strong>Please click on the below link for login to our site:</strong> </td></tr>';

        $content .='<tr><td colspan="2"><strong><a href="' . $url . '">' . $url . '</strong></a> </td></tr>';
        
         $content .='<tr><td colspan="2">Thanks Payfees Team </td></tr>';


        $message .= $content;

        $message .='</table>';

        $message .='</body></html>';
        //echo '<pre>';print_r($message);die();
        $this->email->message($message);
		$this->email->send();

	}
    
    
    
    
    
    function validateEMAIL($EMAIL) {
    $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";

    return (bool)preg_match($v, $EMAIL);
    }
    

    public function update($schoolId)
    {
        if ($schoolId == null) {
            
           
            redirect("admin/school-management/view_all");
            return;
        }

        if ($this->input->post("submit")) {

            $this->_set_validation_school_details();
            if ($this->form_validation->run() == true) {

                $contentValue = array();
                $contentValue['school_name'] = $this->input->post("school_name", true);
                $contentValue['address'] = $this->input->post("address", true);
                $contentValue['city'] = $this->input->post("city", true);
                $contentValue['state'] = $this->input->post("state", true);
                $contentValue['zip'] = $this->input->post("zip", true);
                
                $contentValue['school_details'] = $this->input->post("details", true);
                $contentValue['session_start'] = $this->input->post("session_start", true);
                $contentValue['session_end'] = $this->input->post("session_end", true);
                $contentValue['contact_person'] = $this->input->post("contact_person_name", true);
                $contentValue['contact_email'] = $this->input->post("contact_person_email", true);
                $contentValue['contact_no'] = $this->input->post("contact_person_phone", true);

                $this->load->model("MSchool", "school");

                $previousName = $this->school->get($schoolId)->school_name;

                if ($this->school->update($schoolId, $contentValue) == 1) {
                    $this->session->set_flashdata("success", "School " . $previousName ." updated successfully.");
                    redirect("admin/school-management/view_all");
                } else {
                    $this->session->set_flashdata("error", "Unable to update school $previousName .");
                    redirect("admin/school-management/edit/$schoolId");
                }
            } else {
                $this->edit($schoolId);
            }
        } else {
            $this->edit($schoolId);
        }
    }

    private function _set_validation_school_details()
    {
        $this->form_validation->set_rules('school_name', 'School name', 'trim|required');
        $this->form_validation->set_rules('address', 'Adress',
            'trim|required|max_length[255]');
        $this->form_validation->set_rules('details', 'Details', 'trim');
        $this->form_validation->set_rules('session_start', 'Session Start Month',
            'trim|required|integer');
        $this->form_validation->set_rules('session_end', 'Session End Month',
            'trim|required|integer');
        $this->form_validation->set_rules('session_end', 'Session End Month',
            'trim|required|integer');
        //  $this->form_validation->set_rules('contact_person_name', 'Contact Person Name', 'trim|required');
        //  $this->form_validation->set_rules('contact_person_email', 'Contact Person Email', 'trim|required');
        // $this->form_validation->set_rules('contact_person_phone', 'Contact Person Phone', 'trim|required');
    }
    
    
    public function resetpasswordforschool(){
        //echo '<pre>';print_r($_GET);die();
        if ($_GET) {
           $newpassword=$_GET['newpassword'];
           $confirmpassword=$_GET['confirmpassword'];

            if ($newpassword==$confirmpassword) {
                
               // echo 'true';die();
                $data['user_id'] = $this->session->user_id;
                
                $data['school_id'] = $_GET['schoolid'];
                $data['newpassword'] = $_GET['newpassword'];
                $data['confirmpassword'] = $_GET['confirmpassword'];
                $data['adminpassword'] =$_GET['adminpassword'];

                //echo '<pre>';print_r($data);die();
               
               
               
                $this->load->model('MAdmin');
                $resetPass = $this->MAdmin->getadminpass($data);
                
                
              //  echo $resetPass;die();
               
               
               if($resetPass=="1"){
                
                
                $this->load->model("MSchoolAdmin", 'schoolAdmin');
                
                $school_id=$_GET['schoolid'];
                $update['password']=md5(SALT .$_GET['newpassword']);
                
                $schoolPass= $this->schoolAdmin->updateschoolpass($update,$school_id);
                
                if($schoolPass=="1"){
                    $resultText['update']= 'Update Password Successfully';//die();
                }
                
                //echo 'update';die();
               }
               
                if($resetPass=="2"){
                $resultText['error']= 'Admin Password Doesnot Match';
               }
                
              //  if($resetPass=="2"){
             //   $resultText['error']= 'Admin Password Doesnot Match';
            //   }

                
            } 

            else {
                //echo 'false';die();
                $resultText['error']= 'New Password And Confirmation Password Doesnot Match';//die();
            }
            
            header('Content-Type: application/json; charset=utf-8');
        echo json_encode($resultText);
        exit;

        }
            
    }
    
    
    public function changestatus(){
        //echo '<pre>';print_r($_GET);die();
              
        $this->load->model("MSchoolAdmin", 'schoolAdmin');
        
        $school_id=$_GET['school_id'];
        
        $update['activated']=$_GET['isactive'];
        
        $schoolPass= $this->schoolAdmin->statuschange($update,$school_id);
         
         if($schoolPass=="1"){
            $state['stateactive']=$_GET['isactive'];
            header('Content-Type: application/json; charset=utf-8');
        echo json_encode($state);
        exit;
         }
        
    }
    
    public function logs(){
           $this->data['pageTitle'] = "Logs Deatils";
         $this->load->model('logs');
         $logsdata = $this->logs->getLoguser();
         //echo '<pre>';print_r($logsdata);die();
         $this->data["logdetails"]=$logsdata;
         $this->_loadView("admin/logsview");
        //die('sadadad');
    }
}

?>