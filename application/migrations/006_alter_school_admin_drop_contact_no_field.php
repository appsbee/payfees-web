<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_School_Admin_Drop_Contact_No_Field extends CI_Migration
{

    public function up()
    {
        $this->dbforge->drop_column('school_admins', 'phone_number');
    }

    public function down()
    {
        $fields = array(
            'phone_number' => array('type' => 'CHAR', 'constraint' => '10')
        );
        $this->dbforge->add_column('school_admins', $fields);    }

}

?>