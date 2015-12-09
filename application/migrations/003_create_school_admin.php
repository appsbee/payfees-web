<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_School_Admin extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'school_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'password' => array(
                'type' => 'CHAR',
                'constraint' => '255',
            ),
            'is_main_account'=>array(
                'type'=>'TINYINT',
                'constraint'=>2
            ),
            'activated'=>array(
                'type'=>"TINYINT",
                'default'=>'0'
            ),
            'phone_number'=>array(
                'type'=>'CHAR',
                'constraint'=>'10'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('school_admins');
    }

    public function down()
    {
        $this->dbforge->drop_table('school_admins');
    }

}

?>