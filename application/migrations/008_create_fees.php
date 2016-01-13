<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Fees extends CI_Migration
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
            'fees_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'class'=>array(
                'type'=>"TINYINT"                
            ),
            'fees_mode'=>array(
                'type'=>"TINYINT"                
            ),
            'is_template'=>array(
                'type'=>"TINYINT"                
            ),
            'payment_date' => array(
                'type' => 'VARCHAR',
                'constraint' => '45',
            ),
            'late_fine' => array(
                'type' => 'DECIMAL',        
            )

            ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('fees');
    }

    public function down()
    {
        $this->dbforge->drop_table('fees');
    }

}

?>