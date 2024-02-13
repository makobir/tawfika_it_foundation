<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Super_admin_model', '', TRUE);
        $this->load->model('Branch_model', '', TRUE);
        $this->load->model('Chalan_model', '', TRUE);
        $this->load->model('Accounts_model', '', TRUE);
        $this->load->model('Cash_model', '', TRUE);
        $this->load->library('bdbulk');
        $admin_id = $this->session->userdata('id');
        $usertype = $this->session->userdata('usertype');
        if ($admin_id == NULL and $usertype != 'branch' ) {
            redirect('authenticator', 'refresh');
        }
        if ($usertype != 'branch' ) {
            redirect('authenticator/thanks', 'refresh');
        }
        $site = $this->Authenticator_model->site();
        $this->data = array(
            //'theme' => $site->theme,
            //'type' => $site->type,
         //   'language' => $site->lang
        );
      //  $this->lang->load('language',$this->data['language']);

		//echo $this->session->userdata('icode');
		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		//echo $this->data['now'];
		//echo $usertype;
    }


	public function index()
	{
		$data = array();
		$data['menu'] = "";
		$data['title'] = "Home";
		$data['private'] = $this->load->view('back/branch/pages/home',$data,true);	
		$this->load->view('back/branch/index',$data);
	}


	public function cash_transfer()
	{
		$data = array();
		$data['menu'] = "";
		$data['title'] = "Cash Transfer";
		$data['private'] = $this->load->view('back/branch/accounts/cash_transfer',$data,true);	
		$this->load->view('back/branch/index',$data);
	}


	public function submit_cash_transfer($value='')
	{
	    $data = array();
	    $data['from'] = $this->session->userdata('icode');
	    $data['branch_id'] = $this->input->post('branch_id');
	    $data['by'] = $this->input->post('by');
	    $data['bank_id'] = $this->input->post('bank_id');
	    $data['credit'] = $this->input->post('amount');
	    $data['date'] = date('d-m-Y');
	    $this->db->insert('cash_transfer', $data); 

	  //========== Add Balance to bank account ====================
        $acc_id = $this->input->post('bank_id');
        $check = $this->Cash_model->check_bank_account_balance($acc_id);
        $bal['credit'] = $check->credit + $this->input->post('amount');
        $this->db->where('id',$acc_id );
        $this->db->update('bank_balance',$bal);        
        //=== Save transection Record =============
        $tnx['tnx_type'] = 'Credit';
        $tnx['pre'] = $check->credit;
        $tnx['post'] = $bal['credit'];
        $tnx['amount'] =  $this->input->post('amount');
        $data['bank_id'] = $this->input->post('bank_id');
        $data['staff_id'] = $this->input->post('staff_id');
        $data['branch_id'] = $this->session->userdata('icode');
        $this->db->insert('bank_tnx_history',$tnx);
	    redirect('branch/cash_transfer');
	}



	public function balance()
	{
		$data = array();
		$data['menu'] = "Accounts";
		$data['title'] = "Balance";
		$data['private'] = $this->load->view('back/branch/pages/home',$data,true);	
		$this->load->view('back/branch/index',$data);
	}

	public function debit()
	{
		$data = array();
		$data['menu'] = "Accounts";
		$data['title'] = "Debit";
		$data['private'] = $this->load->view('back/branch/accounts/debit',$data,true);	
		$this->load->view('back/branch/index',$data);
	}



	public function addactnx()
	{
		$data = array();		
		$data['branch_id'] = $this->session->userdata('icode');// code...	
		$data['head'] = $this->input->post('title');// code...	
		$data['amount'] = $this->input->post('amount');// code...	
		$data['remarks'] = $this->input->post('remarks');
		$data['date'] = date('d-m-Y');
	    $this->Super_admin_model->addactnx($data);
		redirect('branch/debit');
	}


	public function debit_report()
	{
		$data = array();
		$data['menu'] = "Accounts";
		$data['title'] = "Debit";
		$data['private'] = $this->load->view('back/branch/accounts/debit',$data,true);	
		$this->load->view('back/branch/index',$data);
	}






}


