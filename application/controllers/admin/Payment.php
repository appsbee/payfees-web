<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: Monobrata
 * Date: 10/2/15
 * Time: 8:15 PM
 */
class Payment extends Base_Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pageTitle'] = "Payment";
        
        $this->load->model('Planmodel');
        $result = $this->Planmodel->getdata();
         $this->data['plandeatils'] = $result;
        
        $this->_loadView("admin/payment/view_payment");
    }
    
     
}

?>