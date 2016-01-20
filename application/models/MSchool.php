<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSchool extends CI_Model{
    public $table_name = 'schools';

    public function  create($schoolName, $schoolDetails, $schoolAddress, $sessionStart, $sessionEnd, $contactPerson, $contactEmail, $contactNo,$img_logo,$img)
    {
        $data = array(
            'school_name' => $schoolName,
            'school_details' => $schoolDetails,
            'address' => $schoolAddress,
            'session_start' => $sessionStart,
            'session_end' => $sessionEnd,
            'contact_email' => $contactEmail,
            'contact_person' => $contactPerson,
            'contact_no' => $contactNo,
            'school_logo'=> $img_logo,
            'school_img'=> $img
        );
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    public function update($schoolId, $contentValue)
    {
        $this->db->update($this->table_name, $contentValue, "id = $schoolId");
        return $this->db->affected_rows();
    }

    public function all()
    {
        return $this->db->get($this->table_name)->result();
    }

    public function get($schoolId)
    {
        return $this->db->get_where($this->table_name, array('id' => $schoolId), 1)->row();
    }


}

?>