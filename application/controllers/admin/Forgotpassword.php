<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller
{
    public function index()
    {
       // die('dadaddad');
        
    
         $this->load->view('admin/forgotpassword/forgotpassword');
    }
    public function sendpassword()
    {
       
      //echo '<pre>';print_r($_POST);die();
      $email=$this->input->post("email", true);
       $data['email']=$email;
       $data['password']=rand();
       
      
      $this->load->model('MAdmin');
      $password = $this->MAdmin->forgotpass($data);
      if($password==0){

         $this->session->set_flashdata('invalid', 'User Name invalid');
         redirect('admin/Forgotpassword/', 'refresh');
      }
      
      if($password==1){
       // echo 'update ur pass';
        //echo $data['password'];die();
        
        $this->send_mail($data['email'], $data['password']);
        
        
        $this->session->set_flashdata('sucess', 'New password Send on Your mail'.$data['password']);
         redirect('admin/Forgotpassword/', 'refresh');
        //135073827
      }
      
      
      
         
    }
    
    private function send_mail($email,$pass){

	//	echo $schoolAdminEmail;
        //echo $schoolAdminPassword;die();
        $this->email->set_mailtype('html');
		$subject = 'Pass';
		$this->email->from('admin@payfees.com', 'Payfees Admin');
		$this->email->to($email);
		$this->email->subject($subject);
		$message = '<html><body>';

        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

        $message .='<tr style="background: #eee;"><td colspan="2"><strong>' . $subject . '</strong></td></tr>';
     
       //// message content ////
        $url = site_url() .'/admin/login';
        //echo $url;die();
        
        
        $content .='<tr><td><strong>Password:</strong> </td><td>' . $pass . '</td></tr>';
        $content .='<tr><td colspan="2"><strong>Please click on the below link for login to our site:</strong> </td></tr>';

        $content .='<tr><td colspan="2"><strong><a href="' . $url . '">' . $url . '</strong></a> </td></tr>';
        
         $content .='<tr><td colspan="2">Thanks Payfees Team </td></tr>';


        $message .= $content;

        $message .='</table>';

        $message .='</body></html>';

        $this->email->message($message);
		$this->email->send();

	}
    
    

}

?>