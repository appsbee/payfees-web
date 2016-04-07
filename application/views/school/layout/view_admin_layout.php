<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('school/layout/view_admin_header');
$this->load->view('school/layout/view_admin_top_navigation_bar');
$this->load->view('school/layout/view_admin_left_sidebar');


$this->load->view($content);

$this->load->view('school/layout/view_admin_footer');
?>