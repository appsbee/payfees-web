<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends CI_Model
{
    
     public function community_create($community_name,$school_id){
        
        $data=array(
            'community_name' => $community_name,
            'school_id' => $school_id,
            'status' => 1
        );
        $status = $this->db->insert('community', $data);
        
    }
    
}

?>