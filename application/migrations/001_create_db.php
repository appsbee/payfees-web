<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Db extends CI_Migration
{

    public function up()
    {
        if ($this->dbforge->create_database($this->config->item('database')))
        {
            echo 'Database created : '.$this->config->item('database');
        }
    }

    public function down()
    {
        if ($this->dbforge->drop_database($this->config->item('database'))) {
            echo 'Database deleted : ' . $this->config->item('database');
        }
    }

}

?>