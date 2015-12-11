<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_School extends CI_Migration
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
            'school_name' => array(
                'type' => 'TEXT',
            ),
            'school_details' => array(
                'type' => 'TEXT',
            ),
            'session_start'=>array(
                'type'=>'TINYINT',
                'constraint'=>'3'
            ),
            'session_end'=>array(
                'type'=>'TINYINT',
                'constraint'=>'3'
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint'=>'255'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('schools');
    }

    public function down()
    {
        $this->dbforge->drop_table('schools');
    }

}

?>