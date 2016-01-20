<?php
defined('BASEPATH') or exit('No direct script access allowed');
//require_once(APPPATH."libraries/MY_Controller.php");
/**
 * Created by PhpStorm.
 * User: Ratul Ghosh(tibro4u@gmail.com)
 * Date: 7/12/15
 * Time: 7:48 PM
 */
class Addfee extends Base_Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function addfee()
    {

        $this->data['pageTitle'] = "Add Fees";
        $school = new MSchool();
        $schools = $school->all();
        $this->data["schools"] = $schools;
        //echo '<pre>';print_r($this->data["schools"]);die();
        $this->data["userName"] = $this->session->user_name;
        $this->_loadView('admin/fee_management/addfees');


        //die('Addfee');
    }
    public function transportfee()
    {
        // $id = $this->uri->segment(4);
        // echo $id;die();
        $this->data['pageTitle'] = "Transport Fees";
        $school = new MSchool();
        $schools = $school->all();
        $this->data["schools"] = $schools;
        $this->_loadView('admin/fee_management/transportfee');
        //die('Addfee');
    }

    public function insertfees()
    {
        //echo '<pre>';print_r($_POST);
        $data = array();
        //$i=12;
        for ($j = 1; $j <= 12; $j++) {
            $data = "";
            if (($this->input->post('feesname')) != "") {
                $data['fesshead_name'] = $this->input->post('feesname');
            } else {
                $data['fesshead_name'] = "";
            }
            if (($this->input->post('feesid')) != "") {
                $data['fesshead_id'] = $this->input->post('feesid');
            } else {
                $data['fesshead_id'] = "";
            }
            if (($this->input->post('schoolname')) != "") {
                $data['school_id'] = $this->input->post('schoolname');
            } else {
                $data['school_id'] = "";
            }
            $data['class'] = $j;
            if (($this->input->post('cls' . $j . 'fessamopunt')) != "") {
                $data['fessamopunt'] = $this->input->post('cls' . $j . 'fessamopunt');
            } else {
                $data['fessamopunt'] = "";
            }
            if (($this->input->post('cls' . $j . 'frequency')) != "") {
                $data['frequency'] = $this->input->post('cls' . $j . 'frequency');
            } else {
                $data['frequency'] = "";
            }
            if (($this->input->post('cls' . $j . 'duedate')) != "") {
                $data['duedate'] = $this->input->post('cls' . $j . 'duedate');
            } else {
                $data['duedate'] = "";
            }
            if (($this->input->post('cls' . $j . 'grace')) != "") {
                $data['grace'] = $this->input->post('cls' . $j . 'grace');
            } else {
                $data['grace'] = "";
            }
            if (($this->input->post('cls' . $j . 'grace')) != "") {
                $data['grace'] = $this->input->post('cls' . $j . 'grace');
            } else {
                $data['grace'] = "";
            }
            if (($this->input->post('cls' . $j . 'lastdate')) != "") {
                $data['lastdate'] = $this->input->post('cls' . $j . 'lastdate');
            } else {
                $data['lastdate'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltytype')) != "") {
                $data['penaltytype'] = $this->input->post('cls' . $j . 'penaltytype');
            } else {
                $data['penaltytype'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltyamount')) != "") {
                $data['penaltyamount'] = $this->input->post('cls' . $j . 'penaltyamount');
            } else {
                $data['penaltyamount'] = "";
            }
            if (($this->input->post('cls' . $j . 'penaltywaiver')) != "") {
                $data['penaltywaiver'] = $this->input->post('cls' . $j . 'penaltywaiver');
            } else {
                $data['penaltywaiver'] = "";
            }

            //echo '<pre>';print_r($data);
            // die();


            $this->load->model('Schoolfees');

            $getData = $this->Schoolfees->insertdata($data);


            //echo '<pre>';print_r($getData);
        }
        $this->session->set_flashdata('add_success', 'Sucessfully add fee');
        redirect('admin/Addfee/addfee/', 'refresh');
        // die('dsdd');


        //die('sfsfdf');
    }
    public function addfeehead()
    {
        // echo "<pre>";
        // print_r($_GET['school_id']);

        $data['feeshead_name'] = $_GET['feeshead'];
        $data['school_id'] = $_GET['school_id'];

        $this->load->model('Schoolfees');
        $getinsertedid = $this->Schoolfees->insertfeeshead($data);
        echo $getinsertedid;
        die();


    }

    public function inserttransportfee()
    {
        // echo '<pre>';print_r($_POST);
        // die();
        $data = array();
        if (($this->input->post('schoolname')) != "") {
            $data['school_id'] = $this->input->post('schoolname');
        } else {
            $data['school_id'] = "";
        }
        if (($this->input->post('s_name')) != "") {
            $data['school_name'] = $this->input->post('s_name');
        } else {
            $data['school_name'] = "";
        }
        if (($this->input->post('upto_bothway')) != "") {
            $data['upto_bothway'] = $this->input->post('upto_bothway');
        } else {
            $data['upto_bothway'] = "";
        }
        if (($this->input->post('amountupto_bothway')) != "") {
            $data['amountupto_bothway'] = $this->input->post('amountupto_bothway');
        } else {
            $data['amountupto_bothway'] = "";
        }
        if (($this->input->post('beyond_bothway')) != "") {
            $data['beyond_bothway'] = $this->input->post('beyond_bothway');
        } else {
            $data['beyond_bothway'] = "";
        }
        if (($this->input->post('amountbeyond_bothway')) != "") {
            $data['amountbeyond_bothway'] = $this->input->post('amountbeyond_bothway');
        } else {
            $data['amountbeyond_bothway'] = "";
        }
        if (($this->input->post('route_bothway')) != "") {
            $data['route_bothway'] = $this->input->post('route_bothway');
        } else {
            $data['route_bothway'] = "";
        }
        if (($this->input->post('amountroute_bothway')) != "") {
            $data['amountroute_bothway'] = $this->input->post('amountroute_bothway');
        } else {
            $data['amountroute_bothway'] = "";
        }
        if (($this->input->post('upto_oneway')) != "") {
            $data['upto_oneway'] = $this->input->post('upto_oneway');
        }
        if (($this->input->post('amountupto_oneway')) != "") {
            $data['amountupto_oneway'] = $this->input->post('amountupto_oneway');
        } else {
            $data['amountupto_oneway'] = "";
        }
        if (($this->input->post('beyond_oneway')) != "") {
            $data['beyond_oneway'] = $this->input->post('beyond_oneway');
        } else {
            $data['beyond_oneway'] = "";
        }
        if (($this->input->post('amountbeyond_oneway')) != "") {
            $data['amountbeyond_oneway'] = $this->input->post('amountbeyond_oneway');
        } else {
            $data['amountbeyond_oneway'] = "";
        }
        if (($this->input->post('route_oneway')) != "") {
            $data['route_oneway'] = $this->input->post('route_oneway');
        }
        if (($this->input->post('amountroute_oneway')) != "") {
            $data['amountroute_oneway'] = $this->input->post('amountroute_oneway');
        } else {
            $data['amountroute_oneway'] = "";
        }
        // echo '<pre>';print_r($data);
        $this->load->model('Schoolfees');
        $getinsertedid = $this->Schoolfees->insertrouteFees($data);

        $this->session->set_flashdata('add_success', 'Sucessfully add Route fee');
        redirect('admin/Addfee/transportfee/', 'refresh');
        //  echo   $getinsertedid;
        //   die();
    }

    public function insertroute()
    {
        // echo '<pre>';print_r($_POST);
        // die();
        $data = array();
        if (($this->input->post('route_name')) != "") {
            $data['route_name'] = $this->input->post('route_name');
        } else {
            $this->session->set_flashdata('add_success', 'Select the Route Name');
            redirect('admin/Addfee/transportfee/', 'refresh');
        }

        if (($this->input->post('school_id')) != "") {
            $data['school_id'] = $this->input->post('school_id');
        } else {
            $data['school_id'] = "";
        }
        $this->load->model('Schoolfees');
        $getinsertedid = $this->Schoolfees->insertroute($data);
        //echo $getinsertedid;die();
        if ($getinsertedid != 0) {
            //die('if');
            $this->session->set_flashdata('add_success', 'Sucessfully add Route Name');
            redirect('admin/Addfee/transportfee/', 'refresh');
        } else {
            //die('else');
            $this->session->set_flashdata('add_success', 'Route Name Already Exists');
            redirect('admin/Addfee/transportfee/', 'refresh');
        }
        //echo $getinsertedid;

    }

    public function routedropdown()
    {
        //$id = $this->uri->segment(4);
        // echo $id;die();
        $data = array();
        $data['school_id'] = $_GET['school_id'];
        $this->load->model('Schoolfees');
        $result['route'] = $this->Schoolfees->getroutename($data);
        // echo '<pre>';print_r($result);
        echo $this->load->view('admin/fee_management/routedropdown', $result, true);
    }

}

?>