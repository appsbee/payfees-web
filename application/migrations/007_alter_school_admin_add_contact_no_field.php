<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_School_Admin_Add_Contact_No_Field extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'phone_number' => array('type' => 'CHAR', 'constraint' => '10', 'null' => TRUE)
        );
        $this->dbforge->add_column('school_admins', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('school_admins', 'phone_number');
    }

}

?>