<?php
class Schoolfees extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //die("cakked");
    }

      function insertdata($data) 
    {
        $this->db->insert('schoolfees', $data);
        return 1;
    }
      
        function insertfeeshead($data) 
    {
        //echo '<pre>';print_r($data);die();
        /*$this->db->select('feeshead_id'); //id  users table
        $this->db->where('school_id', $data['school_id']);
        $this->db->where('feeshead_name', $data['feeshead_name']);*/
        
        $this->db->select('*'); //id  users table
        $this->db->where('school_id', $data['school_id']);
        $this->db->where('feeshead_name', $data['feeshead_name']);
        $rows = $this->db->get('feeshead')->row_array();
        if (count($rows) > 0) {
            return 0;
        }else{
            $this->db->insert('feeshead', $data);
            return $this->db->insert_id();
        }

        
        

    }
    
    function insertroute($data)
    {
        
        $this->db->select('routename_id'); //id  users table
        $this->db->where('school_id', $data['school_id']);
        $this->db->where('route_name', $data['route_name']);
       
        $rows = $this->db->get('routename')->row_array();
        
        if (count($rows) > 0) {
            return 0;
        } else {
           $this->db->insert('routename', $data);
           return $this->db->insert_id();
        }
        
        
    }
    
      function getroutename($data){
        
        $this->db->select('routename_id,route_name'); //id  users table
        $this->db->where('school_id', $data['school_id']);
        
        $rows = $this->db->get('routename')->result();
        //echo '<pre>';print_r( $rows);die();
         if (count($rows) > 0) {
            return $rows;
        } else {
           return 0;
        }
        
      }
      
      function insertrouteFees($data)
      {
        $this->db->insert('routefees', $data);
        return $this->db->insert_id();
      }
      
       function getfeesname($data){
        
        $this->db->select('feeshead_id,school_id,feeshead_name,created'); //id  users table
        $this->db->where('school_id', $data['school_id']);
        
        $rows = $this->db->get('routename')->result();
         if (count($rows) > 0) {
            return $rows;
        } else {
           return 0;
        }
        
      }
      
      
      function autocompSchool($data){
        
        
        $row = $this->db->select('id, school_name')->like('school_name', $data['school_name'],'after')->get('schools')->result_array();
        //echo $this->db->last_query();die();
        if( ($row) > 0){
            return $row;
        }else{
            return 0;
            }
        }
        
        
        function getfeeshead($data){
           // echo '<pre>';print_r($data);die();
            $row = $this->db->select('feeshead_id, school_id,feeshead_name,created')->where('school_id', $data['school_id'])->get('feeshead')->result_array();
            if( ($row) > 0){
            return $row;
        }else{
            return 0;
            }
            
        }
        
        function getData($data)
        {
            $row = $this->db->select('*')->where('fesshead_id', $data['fesshead_id'])->get('schoolfees')->result_array();
               //echo $this->db->last_query();die();
             
             if( ($row) > 0){
            return $row;
        }else{
            return 0;
            }
        }
      
        function delalldata($data){
            
            $this->db->where('fesshead_id', $data['fesshead_id']);
            $del=$this->db->delete('schoolfees');
            return 1;
                
            //die('asdadad');
        }
        
        function updateFess($data){
            $this->db->insert('schoolfees', $data);
            
        }
        function getSchoolName($data){
            //echo $data['school_id'];die();
            $row = $this->db->select('school_name')->where('id', $data['school_id'])->get('schools')->row_array();
            
            //echo $this->db->last_query();die();
            //echo '<pre>';print_r( $row);die();
             if( ($row) > 0){
            return $row;
        }
        }
        
        function schoolName($school_id){
            //echo $school_id;die();
            $row = $this->db->select('school_name')->where('id', $school_id)->get('schools')->row_array();
            
            //echo $this->db->last_query();die();
            //echo '<pre>';print_r( $row);die();
             if( ($row) > 0){
            return $row;
        }
        }
        
      function routefess($data){
        
         $row = $this->db->select('*')->where('school_id', $data['school_id'])->get('routefees')->result_array();
             if( ($row) > 0){
            return $row;
        }else{
            return 0;
            }
        
            }
            
            
         function  updateRuteFee($data){
            
            $this->db->where('routefees_id', $data['routefees_id']);
            $this->db->update('routefees', $data); 
            
            
         }
         
         
         function feeshadforschool($data){
            
             $row = $this->db->select('*')->where('school_id', $data['school_id'])->get('feeshead')->result_array();
             if( ($row) > 0){
            return $row;
        }else{
            return 0;
            }
        
            
         }
}







?>


