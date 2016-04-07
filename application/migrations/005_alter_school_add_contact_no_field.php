<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_School_Add_Contact_No_Field extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'contact_email' => array('type' => 'VARCHAR', 'constraint' => '255'),
            'contact_person' => array('type' => 'VARCHAR', 'constraint' => '255'),
            'contact_no' => array('type' => 'CHAR', 'constraint' => '10')
        );
        $this->dbforge->add_column('schools', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('schools', 'contact_email');
        $this->dbforge->drop_column('schools', 'contact_person');
        $this->dbforge->drop_column('schools', 'contact_no');
    }

}

?>