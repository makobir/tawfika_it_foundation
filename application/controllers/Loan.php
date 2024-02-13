<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Bank_model', '', TRUE);
        $this->load->model('Branch_model', '', TRUE);
        $this->load->model('Loan_model', '', TRUE);
        $this->load->model('Accounts_model', '', TRUE);
        $this->load->model('Chalan_model', '', TRUE);
        $this->load->library('bdbulk');
        $admin_id = $this->session->userdata('id');
        $usertype = $this->session->userdata('usertype');
        if ($admin_id == NULL and $usertype != 'super_admin' ) {
            redirect('authenticator', 'refresh');
        }
        if ($usertype != 'super_admin' ) {
            redirect('authenticator/thanks', 'refresh');
        }
        $site = $this->Authenticator_model->site();
        $this->data = array(
            //'theme' => $site->theme,
            //'type' => $site->type,
         //   'language' => $site->lang
        );
      //  $this->lang->load('language',$this->data['language']);


		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		//echo $this->data['now'];
		//echo $usertype;
    }



public function add()
	{
		$data = array();
		$data['menu'] = "Loan Management";
		$data['title'] = "Loan Receive";
		$data['private'] = $this->load->view('back/loan/unpaid_loans',$data,true);	
		$this->load->view('back/index',$data);
	}

public function create_client()
	{
		$data = array();
		$data['menu'] = "Loan Management";
		$data['title'] = "Create Client";
		$data['private'] = $this->load->view('back/pages/client',$data,true);	
		$this->load->view('back/index',$data);
	}




	public function create_client_info()
	{
		$data = array();		
		$data['branch_id'] = $this->session->userdata('icode');
		$data['name'] = $this->input->post('name');
		$data['company'] = $this->input->post('company');
		$data['address'] = $this->input->post('address');
		$data['mobile'] = $this->input->post('mobile');
		$data['email'] = $this->input->post('email');

		$insertId = $this->db->insert('clients',$data);
		$insertId = $this->db->insert_id();
		
        $c['client_id'] = $insertId;
		$this->db->insert('dues',$c);

   		$sdata['message'] ='Client Profile Created';
    	$this->session->set_userdata($sdata);
		redirect('branch/all_client');
	}

	public function all_client()
	{
		$data = array();
		$data['menu'] = "Due Management";
		$data['title'] = "All Clients";
		$data['private'] = $this->load->view('back/branch/pages/client',$data,true);	
		$this->load->view('back/branch/index',$data);
	}




	public function new()
	{
		$data = array();
		$data['menu'] = "Accounts Management";
		$data['title'] = "New";
		$data['private'] = $this->load->view('back/bank/bank',$data,true);	
		$this->load->view('back/index',$data);
	}

	function new_bank() {
		$data = array();
		$data['bank'] = $this->input->post('bank');
		$data['branch_name'] = $this->input->post('name');
		$data['type'] = $this->input->post('type');
		$data['district'] = $this->input->post('district');
		$data['upazila'] = $this->input->post('upazila');
		$data['name'] = $this->input->post('account_name');
		$data['account'] = $this->input->post('account_number');
		$data['mobile'] = $this->input->post('mobile');
		$insertId = $this->db->insert('bank_accounts',$data);		
		$insertId = $this->db->insert_id();

		$d['bank_id'] = $insertId;
		$this->db->insert('bank_balance',$d);

        $sdata['message'] = 'Bank Account Created';
        $this->session->set_userdata($sdata);    
		redirect ('bank/all');
	}

	public function unpaid_loans()
	{
		$data = array();
		$data['menu'] = "Loan Management";
		$data['title'] = "All Loans";
		$data['private'] = $this->load->view('back/loan/unpaid_loans',$data,true);	
		$this->load->view('back/index',$data);
	}





}


