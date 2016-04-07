<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSchoolAdmin extends CI_Model
{
    private $tableName = 'school_admins';

    public function create($schoolId, $email, $name, $password, $phone, $isMainAccount, $activated)
    {
        $data = array(
            'school_id' => $schoolId,
            'email' => $email,
            'name' => $name,
            'password' => md5(SALT.$password),
            'phone_number' =>$phone,
            'is_main_account' => $isMainAccount,
            'activated' => $activated
        );
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    public function get($schoolId)
    {
        return $this->db->get_where($this->tableName,array('school_id'=>$schoolId))->result();
    }
    
    
    
    
     public function authenticate($email, $password)
    {
        //echo $email;die();
        
        $this->db->select('*'); //id  users table
        $this->db->where('email', $email);
        $this->db->where('password', md5(SALT . $password));
        $this->db->where('activated', '1');
        $resultSet = $this->db->get('school_admins')->row_array();
        //echo $this->db->last_query();die();
        
        
       // $resultSet = $this->db->get_where($this->table_name, array('email' => $email, 'password' => md5(SALT . $password)));
        
        
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
           return 0;
        }
        
        //if ($resultSet->num_rows() == 1)
           // return $resultSet->row();
       // else
         //   return NULL;
    }
    
    
    
    public function updateschoolpass($update,$school_id){
        
        //echo $school_id; die();
        
        $this->db->where('school_id',$school_id);
        $this->db->update('school_admins', $update);
        return 1;
    }
    
    
    public function statuschange($update,$school_id){
        //echo '<pre>';print_r($update);die();
        $this->db->where('school_id',$school_id);
        $this->db->update('school_admins', $update);
        //echo  $this->db->last_query();die();die();
        return 1;
    }


}

?>