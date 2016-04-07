<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Communitymemberapi extends CI_Model {

	public function joincommunity($community_id, $guardianregister_id) {

		$data = array(
			'community_id' => $community_id,
			'guardianregister_id' => $guardianregister_id,
		);

		$status = $this->db->insert('communityMember', $data);

		return $status;

	}

}

?>