<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAdmin extends CI_Model
{
    private $table_name = "admins";

    public function authenticate($email, $password)
    {
        $resultSet = $this->db->get_where($this->table_name, array('email' => $email, 'password' => md5(SALT . $password)), 1, 0);
        if ($resultSet->num_rows() == 1)
            return $resultSet->row();
        else
            return NULL;
    }
    
    
    public function getadmindetails($data){
        
        $this->db->select('*'); //id  users table


        $this->db->where('id', $data['user_id']);
        $row = $this->db->get('admins')->row_array();
        if (($row) > 0) {
            return $row;
        } else {
            return 0;
        }
    }
    
    public function resetpass($data){
        
        $this->db->select('*'); //id  users table
        $this->db->where('id', $data['user_id']);
        $row = $this->db->get('admins')->row_array();
        
        if (($row) > 0) {
          //  echo '<pre>';print_r($row['password']);
          //  echo '<pre>';print_r(md5(SALT .$data['newpassword']));
           // die();
            
            if($row['password']== md5(SALT . $data['adminpassword'])){
                
                //echo 'if1';die();
                
                $this->db->where('id', $data['user_id']);
                
                $pass['password']=md5(SALT . $data['newpassword']);
               // echo '<pre>';print_r($pass);die();
                
                $this->db->update('admins', $pass);
                
                return 1;
            }
            else{
                 //echo 'else2';die();
                return 2;
            }
            
            
        } else {
            return 0;
        }
        
        
        
    }
    
    
     public function getadminpass($data){
          
        $this->db->select('*'); //id  users table
        $this->db->where('id', $data['user_id']);
        $row = $this->db->get('admins')->row_array();
        
        if (($row) > 0) {
            if($row['password']== md5(SALT . $data['adminpassword'])){
                
                return 1;
            }
            else{
                 
                return 2;
            }
        
        } else {
            return 0;
        }
        
        
     }
     public function forgotpass($data){
        
        $this->db->select('*'); 
        $this->db->where('email', $data['email']);
        $row = $this->db->get('admins')->row_array();
        
        if (($row) > 0) {
             $pass['password']= md5(SALT .$data['password']);
             $this->db->where('email', $data['email']);
            $this->db->update('admins', $pass); 

            return 1;
        } else {
            return 0;
        }
     }

}

?>

