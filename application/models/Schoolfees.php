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

        $this->db->insert('feeshead', $data);
        return $this->db->insert_id();

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
      
}







?>


