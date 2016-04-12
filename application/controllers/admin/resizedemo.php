<?php
$image = $_FILES['image'];
//echo $image['name'];
$file_element_name = 'image';
if ($image['name'] != '') {

	$config['upload_path'] = "./uploads/athletes/";
	//$config['overwrite'] = TRUE;
	//$config['file_name'] = substr(md5($file_name),15);
	$config['encrypt_name'] = TRUE;
	$config['allowed_types'] = "gif|jpg|jpeg|png";
	//$config['max_size']      =   "5000";
	//$config['max_width']     =   "1907";
	//$config['max_height']    =   "1280";
	/* $config['max_width']     =   "300";
											 $config['max_height']    =   "416"; */

	$this->load->library('upload', $config);

	if (!$this->upload->do_upload($file_element_name)) {

		echo $this->upload->display_errors();

	} else {

		$finfo = $this->upload->data();

		$path = './uploads/athletes/' . $finfo['file_name'];
		$resizedpath = './uploads/athletes/' . $finfo['file_name'];

		$img_small = $this->resizeimage->smart_resize_image($path, null, 300, 416, false, $resizedpath, false, false, 100);

		$this->load->library('image_lib');
		$resizedpath = './uploads/athletes/big/' . $finfo['raw_name'] . '_big' . $finfo['file_ext'];
		$img_big = $this->resizeimage->smart_resize_image($path, null, 429, 546, false, $resizedpath, false, false, 100);
		$config3['new_image'] = './uploads/athletes/big/' . $finfo['raw_name'] . '_big' . $finfo['file_ext'];

		//$config3['width'] = 50;
		//$config3['height'] = 50;
		$this->image_lib->initialize($config3);

		$resizedpath = './uploads/athletes/profile/' . $finfo['raw_name'] . '_profile' . $finfo['file_ext'];
		$img_profile = $this->resizeimage->smart_resize_image($path, null, 281, 199, true, $resizedpath, false, false, 100);
		$config4['new_image'] = './uploads/athletes/profile/' . $finfo['raw_name'] . '_profile' . $finfo['file_ext'];

		$this->image_lib->initialize($config4);

		$data['big_name'] = $finfo['raw_name'] . '_big' . $finfo['file_ext'];
		$data['profile_name'] = $finfo['raw_name'] . '_profile' . $finfo['file_ext'];

		$this->image_lib->clear();

		$config2['image_library'] = "gd2";
		$config2['source_image'] = './uploads/athletes/' . $finfo['file_name'];
		$config2['new_image'] = './uploads/athletes/thumb/' . $finfo['file_name'];
		$config2['create_thumb'] = TRUE;
		$config2['maintain_ratio'] = FALSE;
		$config2['width'] = '200';
		$config2['height'] = '150';
		/*$config2['width'] = "200";
													$config2['height'] = "150";*/

		$this->image_lib->initialize($config2);
		if (!$this->image_lib->resize()) {

			echo $this->image_lib->display_errors();

		}
		//echo $path= "./uploads/athletes/thumb/" .$finfo['file_name'];
		//$this->_createThumbnail($finfo['file_name']);
		//$data['uploadInfo'] = $finfo;
		$data['thumbnail_name'] = $finfo['raw_name'] . '_thumb' . $finfo['file_ext'];
		$data['image'] = $finfo['file_name'];
		//echo '<pre>';
		//print_r($config2['new_image']);
		$this->image_lib->clear();
	}
}
//die();
$data['result'] = $this->functions->insert('athlete', $data);
?>