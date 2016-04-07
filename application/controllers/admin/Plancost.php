<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: Monobrata
 * Date: 10/2/15
 * Time: 3:44 PM
 */
class Plancost extends Base_Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pageTitle'] = "Plancost";
        $this->load->model('Planmodel');
        $result = $this->Planmodel->getdata();
         $this->data['plandeatils'] = $result;
        
        //echo '<pre>';print_r($result);die();
        
        $this->_loadView("admin/plan/view_plan");
    }
    
    public function addplan(){
        //echo '<pre>';print_r($_GET);die();
        if($_GET){
            $data['planname']=$_GET['planname'];
        $data['description']=$_GET['description'];
        $data['plancost']=$_GET['plancost'];
        $data['currencycode']=$_GET['currencycode'];
       
        $data['vaildtill']=$_GET['vaildtill'];
        
        $data['status']="1";
        
        $this->load->model('Planmodel');
        $result = $this->Planmodel->insertplans($data);
        
        if($result=="1"){
            $resultText['sucess'] = 'Sucess';
            
        }
      
        }else{
            $resultText['error'] = 'Eroor';
        }
        
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($resultText);
        exit;
        
        
    }
    
    public function getupdatedata(){
        
        $plans_id=$_GET['edit_id'];
        
        $this->load->model('Planmodel');
        $result = $this->Planmodel->editdata($plans_id);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
        exit;
    }

     public function editplan(){
        
        //echo '<pre>';print_r($_GET);die();
        if($_GET){
            $data['plans_id']=$_GET['edit_id'];
            $data['planname']=$_GET['planname'];
        $data['description']=$_GET['description'];
        $data['plancost']=$_GET['plancost'];
        $data['currencycode']=$_GET['currencycode'];
       
        $data['vaildtill']=$_GET['vaildtill'];
        
        $data['status']="1";
        
        $this->load->model('Planmodel');
        $result = $this->Planmodel->editplans($data);
        
        if($result=="1"){
            $resultText['sucess'] = 'Sucess';
            
        }
      
        }else{
            $resultText['error'] = 'Error';
        }
        
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($resultText);
        exit;
            
     }
     
     
     public function changestatus(){
        //echo '<pre>';print_r($_GET);die();
        $edit_id = $_GET['edit_id'];
        $update['status'] = $_GET['isactive'];
        $this->load->model('Planmodel');
        $statusUpdate = $this->Planmodel->statuschange($update, $edit_id);
        if ($statusUpdate == "1") {
            $state['stateactive'] = $_GET['isactive'];
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($state);
            exit;
        }
    
     }
     
}

?>