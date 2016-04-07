<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Fees_Structure extends CI_Migration
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
            'fees_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
            'attribute_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),            
            'attribute_amount' => array(
                'type' => 'DECIMAL',        
            )

            ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('fees_structure');
    }

    public function down()
    {
        $this->dbforge->drop_table('fees_structure');
    }

}

?>