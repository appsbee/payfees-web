<?php
class Planmodel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //die("cakked");
    }
    
    
    function getdata(){
        
        $rows = $this->db->get('plans')->result();
        if (count($rows) > 0) {
            return $rows;
        } else {
            return 0;
        }
    }
    
    function insertplans($data)
    {
       // echo '<pre>';print_r($logdata);die();
        
        $this->db->insert('plans', $data);
        return 1;

    }
    
    function editplans($data){
        $this->db->where('plans_id', $data['plans_id']);
        $this->db->update('plans', $data); 
        return 1;
    }
    
    function  editdata($plans_id){
        
       $this->db->select('*'); //id  users table
        $this->db->where('plans_id',$plans_id);
        $row = $this->db->get('plans')->row_array();
        if (count($row) > 0) {
            return $row;
        } else {
            return 0;
        }
    }
    
    function statuschange($update,$edit_id){
        
        $this->db->where('plans_id',$edit_id);
        $this->db->update('plans', $update);
        //echo  $this->db->last_query();die();die();
        return 1;
        
       
        
    }
    
    
    
    
}







?>


