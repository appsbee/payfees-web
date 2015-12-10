<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSchool extends CI_Model
{
    private $tableName = 'schools';

    public function  create($schoolName, $schoolDetails, $schoolAddress, $sessionStart, $sessionEnd, $contactPerson, $contactEmail, $contactNo)
    {
        $data = array(
            'school_name' => $schoolName,
            'school_details' => $schoolDetails,
            'address' => $schoolAddress,
            'session_start' => $sessionStart,
            'session_end' => $sessionEnd,
            'contact_email' => $contactEmail,
            'contact_person' => $contactPerson,
            'contact_no' => $contactNo
        );
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }
}

?>