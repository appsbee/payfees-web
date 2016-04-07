<?php
defined('BASEPATH') or exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: Ratul Ghosh(tibro4u@gmail.com)
 * Date: 7/12/15
 * Time: 7:48 PM
 */
class Addfee extends Base_SchoolAdmin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function addfee()
    {
       // die('addfee');
        $this->data['pageTitle'] = "Add Fees";
        //$school = new MSchool();
        //$schools = $school->all();
        //$this->data["schools"] = $schools;
        //echo '<pre>';print_r($this->data["schools"]);die();
        $this->data["userName"] = $this->session->school_email;
        $this->_loadView('school/fee_management/addfees');
        //die('Addfee');
    }
    
    public function transportfee()
    {
        //die('transportfee');
        // $id = $this->uri->segment(4);
        // echo $id;die();
        $this->data['pageTitle'] = "Transport Fees";
        
        
        $school_id = $this->session->school_id;
        $this->load->model('Schoolfees');
        $getSchool_name=$this->Schoolfees->schoolName($school_id);
        
        //echo '<pre>';print_r($getSchool_name);die();
         $this->data['getSchoolname']=$getSchool_name;
         
        
        $result= $this->Schoolfees->getroutename($data); 
        
        $this->data['route'] =  $result;
        //$school = new MSchool();
        //$schools = $school->all();
        //$this->data["schools"] = $schools;
        $this->_loadView('school/fee_management/transportfee');
        //die('Addfee');
    }

    public function insertfees()
    {
        //die('insertfees');
        //echo '<pre>';
       // print_r($_POST);die();
        $data = array();
        //$i=12;
        for ($j = 1; $j <= 12; $j++) {
            $data = "";
            if (($this->input->post('feesname')) != "") {
                $data['fesshead_name'] = $this->input->post('feesname');
            } else {
                $data['fesshead_name'] = "";
            }
            if (($this->input->post('feesid')) != "") {
                $data['fesshead_id'] = trim($this->input->post('feesid'));
            } else {
                $data['fesshead_id'] = "";
            }
            /*if (($this->input->post('schoolname')) != "") {
                $data['school_id'] = $this->input->post('schoolname');
            } else {
                $data['school_id'] = "";
            } */
            
            $data['school_id']=$this->session->school_id;
            $data['class'] = $j;
            if (($this->input->post('cls' . $j . 'fessamopunt')) != "") {
                $data['fessamopunt'] = $this->input->post('cls' . $j . 'fessamopunt');
            } else {
                $data['fessamopunt'] = "";
            }
            if (($this->input->post('cls' . $j . 'frequency')) != "") {
                $data['frequency'] = $this->input->post('cls' . $j . 'frequency');
            } else {
                $data['frequency'] = "";
            }
            if (($this->input->post('cls' . $j . 'duedate')) != "") {
                $data['duedate'] = $this->input->post('cls' . $j . 'duedate');
            } else {
                $data['duedate'] = "";
            }
            if (($this->input->post('cls' . $j . 'grace')) != "") {
                $data['grace'] = $this->input->post('cls' . $j . 'grace');
            } else {
                $data['grace'] = "";
            }
            
          /*  if (($this->input->post('cls' . $j . 'grace')) != "") {
                $data['grace'] = $this->input->post('cls' . $j . 'grace');
            } else {
                $data['grace'] = "";
            } */
            if (($this->input->post('cls' . $j . 'lastdate')) != "") {
                $data['lastdate'] = $this->input->post('cls' . $j . 'lastdate');
            } else {
                $data['lastdate'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltytype')) != "") {
                $data['penaltytype'] = $this->input->post('cls' . $j . 'penaltytype');
            } else {
                $data['penaltytype'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltyamount')) != "") {
                $data['penaltyamount'] = $this->input->post('cls' . $j . 'penaltyamount');
            } else {
                $data['penaltyamount'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltywaiver')) != "") {
                $data['penaltywaiver'] = $this->input->post('cls' . $j . 'penaltywaiver');
            } else {
                $data['penaltywaiver'] = "";
            }

            //echo '<pre>';print_r($data);
            


            $this->load->model('Schoolfees');

            $getData = $this->Schoolfees->insertdata($data);


            //echo '<pre>';print_r($getData);
        }//die();
        $this->session->set_flashdata('add_success', 'Fee Added Successfully');
        redirect('school/Addfee/addfee/', 'refresh');
        // die('dsdd');


        //die('sfsfdf');
    }
    public function addfeehead()
    {
        // echo "<pre>";
        // print_r($_GET['school_id']);

        $data['feeshead_name'] = $_GET['feeshead'];
        $data['school_id'] = $this->session->school_id;

        $this->load->model('Schoolfees');
        $getinsertedid = $this->Schoolfees->insertfeeshead($data);
        echo $getinsertedid;
        die();


    }

    public function inserttransportfee()
    {
        // echo '<pre>';print_r($_POST);
        // die();
        $data = array();
        /*if (($this->input->post('schoolname')) != "") {
            $data['school_id'] = $this->input->post('schoolname');
        } else {
            $data['school_id'] = "";
        } 
        */
        $data['school_id']=$this->session->school_id;
        if (($this->input->post('s_name')) != "") {
            $data['school_name'] = $this->input->post('s_name');
        } else {
            $data['school_name'] = "";
        }
      //  echo '<pre>';print_r($data);die();
        if (($this->input->post('upto_bothway')) != "") {
            $data['upto_bothway'] = $this->input->post('upto_bothway');
        } else {
            $data['upto_bothway'] = "";
        }
        if (($this->input->post('amountupto_bothway')) != "") {
            $data['amountupto_bothway'] = $this->input->post('amountupto_bothway');
        } else {
            $data['amountupto_bothway'] = "";
        }
        if (($this->input->post('beyond_bothway')) != "") {
            $data['beyond_bothway'] = $this->input->post('beyond_bothway');
        } else {
            $data['beyond_bothway'] = "";
        }
        if (($this->input->post('amountbeyond_bothway')) != "") {
            $data['amountbeyond_bothway'] = $this->input->post('amountbeyond_bothway');
        } else {
            $data['amountbeyond_bothway'] = "";
        }
        if (($this->input->post('route_bothway')) != "") {
            $data['route_bothway'] = $this->input->post('route_bothway');
        } else {
            $data['route_bothway'] = "";
        }
        if (($this->input->post('amountroute_bothway')) != "") {
            $data['amountroute_bothway'] = $this->input->post('amountroute_bothway');
        } else {
            $data['amountroute_bothway'] = "";
        }
        if (($this->input->post('upto_oneway')) != "") {
            $data['upto_oneway'] = $this->input->post('upto_oneway');
        }
        if (($this->input->post('amountupto_oneway')) != "") {
            $data['amountupto_oneway'] = $this->input->post('amountupto_oneway');
        } else {
            $data['amountupto_oneway'] = "";
        }
        if (($this->input->post('beyond_oneway')) != "") {
            $data['beyond_oneway'] = $this->input->post('beyond_oneway');
        } else {
            $data['beyond_oneway'] = "";
        }
        if (($this->input->post('amountbeyond_oneway')) != "") {
            $data['amountbeyond_oneway'] = $this->input->post('amountbeyond_oneway');
        } else {
            $data['amountbeyond_oneway'] = "";
        }
        if (($this->input->post('route_oneway')) != "") {
            $data['route_oneway'] = $this->input->post('route_oneway');
        }
        if (($this->input->post('amountroute_oneway')) != "") {
            $data['amountroute_oneway'] = $this->input->post('amountroute_oneway');
        } else {
            $data['amountroute_oneway'] = "";
        }
        // echo '<pre>';print_r($data);
        $this->load->model('Schoolfees');
        $getinsertedid = $this->Schoolfees->insertrouteFees($data);

        $this->session->set_flashdata('add_success', 'Successfully add Route fee');
        redirect('school/Addfee/transportfee/', 'refresh');
        //  echo   $getinsertedid;
        //   die();
    }

    public function insertroute()
    {
        // echo '<pre>';print_r($_POST);
        // die();
        $data = array();
        if (($this->input->post('route_name')) != "") {
            $data['route_name'] = $this->input->post('route_name');
        } else {
            $this->session->set_flashdata('add_success', 'Select the Route Name');
            redirect('schools/Addfee/transportfee/', 'refresh');
        }

        /*if (($this->input->post('school_id')) != "") {
            $data['school_id'] = $this->input->post('school_id');
        } else {
            $data['school_id'] = "";
        } */
        $data['school_id']=$this->session->school_id;
        $this->load->model('Schoolfees');
        $getinsertedid = $this->Schoolfees->insertroute($data);
        //echo $getinsertedid;die();
        if ($getinsertedid != 0) {
            //die('if');
            $this->session->set_flashdata('add_success', 'Successfully add Route Name');
            redirect('school/Addfee/transportfee/', 'refresh');
        } else {
            //die('else');
            $this->session->set_flashdata('routename_error', 'Route Name Already Exists');
            redirect('school/Addfee/transportfee/', 'refresh');
        }
        //echo $getinsertedid;

    }

    public function routedropdown()
    {
        //$id = $this->uri->segment(4);
        // echo $id;die();
        //die('insertfees');
        $data = array();
        $data['school_id'] = $_GET['school_id'];
        
        
        $this->load->model('Schoolfees');
        $result['route'] = $this->Schoolfees->getroutename($data);
        // echo '<pre>';print_r($result);
        echo $this->load->view('school/fee_management/routedropdown', $result, true);
    }
    
    public function editfee(){
        
        $this->data['pageTitle'] = "Edit Fees";
        $school = new MSchool();
        $schools = $school->all();
        $this->data["schools"] = $schools;
        //echo '<pre>';print_r($this->data["schools"]);die();
        $this->data["userName"] = $this->session->user_name;
        
        
        
       $id = $this->session->school_id;
      // if(isset($id)){
        
        
        
        
        //echo $id;die();
        
        $this->data["schools_id"] = $id;
        $data['school_id']=$this->session->school_id;
         $this->load->model('Schoolfees');
         
        $getSchool_name=$this->Schoolfees->getSchoolName($data);
        
        $this->data["school_name"]=$getSchool_name['school_name'];
        $feesHead = $this->Schoolfees->getfeeshead($data);
        //$data['fees']=$feesHead;
        //echo '<pre>';print_r($data['fees']);die();
        $this->data["fees"]=$feesHead;
        $this->_loadView('school/fee_management/editfees');
      // }
     //  else{
      //  $this->_loadView('school/fee_management/editfees');
        //echo 'noid';
      // }
        
        
        
        
        
        
        //$this->_loadView('admin/fee_management/editfees');
        
        //die('edit');
    }
    
    public function getschoolname(){
        
        $data['school_name'] = $_GET['keywords'];
       // echo $data['school_name'];die();
        $this->load->model('Schoolfees');
        $result['auto_comp'] = $this->Schoolfees->autocompSchool($data);
        
        	echo $this->load->view('school/fee_management/schoolname', $result, true);
        
        //echo'<pre>';print_r( $result['auto_comp']);die();
    }
    public function editfeepage(){
        $data=array();
        $data['fesshead_id'] = $_GET['row_edit'];
        //$data['fesshead_id']=$this->uri->segment(4);
        //echo $data['fesshead_id'];die();
        $this->load->model('Schoolfees');
        $fessdetails = $this->Schoolfees->getData($data);
        
        $data["feesdetails"]=$fessdetails;
        //echo '<pre>';print_r($fessdetails);die();
        $this->load->view('school/fee_management/editfessdata',$data);
        //echo'<pre>';print_r( $fessdetails);die();
    }
    
    
    public function updatefees(){
       // echo '<pre>';print_r($_POST);die();
        $data = array();
        $i=12;
        
        $this->load->model('Schoolfees');
        $data['fesshead_id'] = $this->input->post('update_id');
        $deldata = $this->Schoolfees->delalldata($data);
        //echo $deldata;die();
        
        if($deldata==1){
            for ($j = 1; $j <= 12; $j++) {
            
            $data = "";
            $data['fesshead_name'] = $this->input->post('fesshead_name');
            $data['fesshead_id'] = $this->input->post('update_id');
            $data['school_id'] = $this->session->school_id;
            $data['class'] = $j;
            if (($this->input->post('cls' . $j . 'fessamopunt')) != "") {
                $data['fessamopunt'] = $this->input->post('cls' . $j . 'fessamopunt');
            } else {
                $data['fessamopunt'] = "";
            }
            if (($this->input->post('cls' . $j . 'frequency')) != "") {
                $data['frequency'] = $this->input->post('cls' . $j . 'frequency');
            } else {
                $data['frequency'] = "";
            }
            if (($this->input->post('cls' . $j . 'duedate')) != "") {
                $data['duedate'] = $this->input->post('cls' . $j . 'duedate');
            } else {
                $data['duedate'] = "";
            }
            if (($this->input->post('cls' . $j . 'grace')) != "") {
                $data['grace'] = $this->input->post('cls' . $j . 'grace');
            } else {
                $data['grace'] = "";
            }
            
            if (($this->input->post('cls' . $j . 'lastdate')) != "") {
                $data['lastdate'] = $this->input->post('cls' . $j . 'lastdate');
            } else {
                $data['lastdate'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltytype')) != "") {
                $data['penaltytype'] = $this->input->post('cls' . $j . 'penaltytype');
            } else {
                $data['penaltytype'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltyamount')) != "") {
                $data['penaltyamount'] = $this->input->post('cls' . $j . 'penaltyamount');
            } else {
                $data['penaltyamount'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltywaiver')) != "") {
                $data['penaltywaiver'] = $this->input->post('cls' . $j . 'penaltywaiver');
            } else {
                $data['penaltywaiver'] = "";
            }

            //echo '<pre>';print_r($data);
            
            $this->load->model('Schoolfees');
            $updateData= $this->Schoolfees->updateFess($data);
           
        }//die();
        
        $this->session->set_flashdata('update_fees', 'Fee Updated Successfully');
        redirect("school/Addfee/editfee",'refresh');
            
        }
        
        
    }
    
    public function edittransportfee(){
        
        //die('adada');
        $data=array();
        $this->data['pageTitle'] = "Edit Transport Fees";
        $id = $this->session->school_id;
        
         
         if(isset($id)){
            //echo 'if';die();
            $data["school_id"] = $id;
            $this->load->model('Schoolfees');
            $result= $this->Schoolfees->getroutename($data);
            // echo '<pre>';print_r($result);die();
            $this->data["route"] = $result;  
            
            $routedeatils = $this->Schoolfees->routefess($data);
            
                $this->data['routefeedetails']=$routedeatils;
                
             $this->data['school_id']=$this->session->school_id;
            // echo '<pre>';print_r($routedeatils);die();
            $this->_loadView('school/fee_management/edittransportfee');
         
         }        else{
            $this->_loadView('school/fee_management/edittransportfee');
            
         }
         
         
   
   
    }
    public function getschoolnamefortransport(){
        
        //die('adada');
        
         $data['school_name'] = $_GET['keywords'];
       // echo $data['school_name'];die();
        $this->load->model('Schoolfees');
        $result['auto_comp'] = $this->Schoolfees->autocompSchool($data);
        
        
        
       	echo $this->load->view('school/fee_management/schoolnamefortransport', $result, true);
    }
    
    
    public function updatetransportfee(){
         $update_id = $this->uri->segment(4);
         //echo '<pre>';print_r($_POST);die();
        
        // echo $id;die();
         $data = array();
        //$schoolID= $this->input->post('school_id');
        $data['routefees_id'] = $update_id;
       
        if (($this->input->post('upto_bothway')) != "") {
            $data['upto_bothway'] = $this->input->post('upto_bothway');
        } else {
            $data['upto_bothway'] = "";
        }
        if (($this->input->post('amountupto_bothway')) != "") {
            $data['amountupto_bothway'] = $this->input->post('amountupto_bothway');
        } else {
            $data['amountupto_bothway'] = "";
        }
        if (($this->input->post('beyond_bothway')) != "") {
            $data['beyond_bothway'] = $this->input->post('beyond_bothway');
        } else {
            $data['beyond_bothway'] = "";
        }
        if (($this->input->post('amountbeyond_bothway')) != "") {
            $data['amountbeyond_bothway'] = $this->input->post('amountbeyond_bothway');
        } else {
            $data['amountbeyond_bothway'] = "";
        }
        if (($this->input->post('route_bothway')) != "") {
            $data['route_bothway'] = $this->input->post('route_bothway');
        } else {
            $data['route_bothway'] = "";
        }
        if (($this->input->post('amountroute_bothway')) != "") {
            $data['amountroute_bothway'] = $this->input->post('amountroute_bothway');
        } else {
            $data['amountroute_bothway'] = "";
        }
        if (($this->input->post('upto_oneway')) != "") {
            $data['upto_oneway'] = $this->input->post('upto_oneway');
        }
        if (($this->input->post('amountupto_oneway')) != "") {
            $data['amountupto_oneway'] = $this->input->post('amountupto_oneway');
        } else {
            $data['amountupto_oneway'] = "";
        }
        if (($this->input->post('beyond_oneway')) != "") {
            $data['beyond_oneway'] = $this->input->post('beyond_oneway');
        } else {
            $data['beyond_oneway'] = "";
        }
        if (($this->input->post('amountbeyond_oneway')) != "") {
            $data['amountbeyond_oneway'] = $this->input->post('amountbeyond_oneway');
        } else {
            $data['amountbeyond_oneway'] = "";
        }
        if (($this->input->post('route_oneway')) != "") {
            $data['route_oneway'] = $this->input->post('route_oneway');
        }
        if (($this->input->post('amountroute_oneway')) != "") {
            $data['amountroute_oneway'] = $this->input->post('amountroute_oneway');
        } else {
            $data['amountroute_oneway'] = "";
        }
        // echo '<pre>';print_r($data);die();
        $this->load->model('Schoolfees');
        
         $updaterutefee= $this->Schoolfees->updateRuteFee($data);
         
         $this->session->set_flashdata('update_fees', 'Route Fee Updated Successfully');
        redirect("school/Addfee/edittransportfee/".$this->input->post('school_id'), 'refresh');
        
    }
    
    

}

?>