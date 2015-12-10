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

}

?>

