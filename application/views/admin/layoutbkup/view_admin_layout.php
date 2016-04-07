<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admin/layout/view_admin_header');
$this->load->view('admin/layout/view_admin_top_navigation_bar');
$this->load->view('admin/layout/view_admin_left_sidebar');


$this->load->view($content);

$this->load->view('admin/layout/view_admin_footer');
?>