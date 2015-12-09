<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: Ratul Ghosh(tibro4u@gmail.com)
 * Date: 7/12/15
 * Time: 7:48 PM
 */
class Dashboard extends Base_Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pageTitle'] = "PayFees - DashBoard";
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView("admin/dashboard/view_index");
    }

}

?>