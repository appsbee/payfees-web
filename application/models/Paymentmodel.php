<?php
class Paymentmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //die("cakked");
    }
    
    
    function getpaymentdetailsdata($school_id){
        
        /*$this->db->select('*'); //id  users table
        $this->db->where('school_id',$school_id);
        $this->db->order_by("registration_no");
        $rows = $this->db->get('studentdetails')->result();
        //echo '<pre>';print_r($rows);die();
        $studentsdata=array();
        if(isset($rows) && $rows!=""){
            foreach ($rows as $key=>$regno){  
                $this->db->select('*'); //id  users table
                $this->db->where('registration_no',$regno->registration_no);
                $fees = $this->db->get('paymentdetails')->result();
                $studentsdata[$key]['basic']=$rows[0];
                $studentsdata[$key]['fees']=$fees;
            }
        }
        
        
        
         echo '<pre>';print_r($studentsdata);
           die();*/
        $this->db->select('*'); //id  users table
        $this->db->where('school_id',$school_id);
        $this->db->order_by("registration_no");
        $rows = $this->db->get('paymentdetails')->result();
       // echo '<pre>';print_r($rows);die();
        if (count($rows) > 0) {
            return $rows;
        } else {
            return 0;
        }
    }
    
    function insertpaymentdata($userData)
    {
       // echo '<pre>';print_r($userData);die();
        
        $this->db->insert('paymentdetails', $userData);
        return 1;
        
        
    }
 
    
    function chekmail($useremail){
        
        $this->db->select('*'); //id  users table
        $this->db->where('useremail',$useremail);
        $row = $this->db->get('usermanagement')->result();
        if (count($row) > 0) {
            return 1;
        } else {
            return 0;
        }
        
    }
    
    
    
    function getAlldetails($registration_id){
        
        
        
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
        $this->db->where('registration_no',$registration_id);
        $rows = $this->db->get('studentdetails')->result();
        
        $studentsdata=array();
        $studentsdata['basic']=$rows[0];
        
        $this->db->select('*'); //id  users table
        $this->db->where('registration_no',$registration_id);
        
        
        $fees = $this->db->get('paymentdetails')->result();
        $studentsdata['fees']=$fees;
        
      //$mysql="SELECT  MONTH(feedue_date) as month FROM paymentdetails where`registration_no`=$registration_id GROUP BY MONTH(feedue_date)";
   
   $sql =$this->db->query("SELECT  MONTH(feedue_date) as month FROM paymentdetails where`registration_no`=$registration_id GROUP BY MONTH(feedue_date)");
       $result=$sql->result_array();       
        foreach ($result as $key=>$month){
            //echo '<pre>';print_r($month['month']);
            
    $final=$this->db->query("SELECT * FROM `paymentdetails` WHERE `registration_no` = $registration_id AND MONTH(feedue_date) ='".$month['month']."'");
     $fresult[$key]=$final->result_array();      
            //echo '<pre>';print_r($fresult);// $final;

        }
        $studentsdata['month']=$fresult;
        //die();
        
        
        
        
        
        //$groupmonth = $this->db->get('paymentdetails')->result();
        //$studentsdata['month']=$groupmonth;
        
        return $studentsdata;
        //echo '<pre>';print_r($studentsdata);die();
        
        
    }
}







?>


