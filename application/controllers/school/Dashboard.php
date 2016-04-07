<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: Ratul Ghosh(tibro4u@gmail.com)
 * Date: 7/12/15
 * Time: 7:48 PM
 */
class Dashboard extends Base_SchoolAdmin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {   //die('dasdadad');
        $this->data['pageTitle'] = "PayFees - DashBoard";
        $this->data["userName"] = $this->session->school_email;
        //echo '<pre>';print_r( $this->session->school_email);die();
        $this->_loadView("school/dashboard/view_index");
    }

}

?>