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
}

?>