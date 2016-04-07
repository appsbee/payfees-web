<?php
class Logs extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //die("cakked");
    }
    
    
    function getLoguser(){
        
        $rows = $this->db->get('logindetails')->result();
        //echo '<pre>';print_r($rows);die();
        if (count($rows) > 0) {
            return $rows;
        } else {
            return 0;
        }
    }
    
    function insertlogdata($logdata)
    {
        //echo '<pre>';print_r($logdata);die();
        
        $this->db->insert('logindetails', $logdata);
        return 1;

    }
    function logouttime($logout,$school_id,$ip){
        $this->db->where('school_id', $school_id);
        $this->db->where('ip', $ip);
        
        $this->db->update('logindetails', $logout); 
    }
    
    
    
    
}







?>


