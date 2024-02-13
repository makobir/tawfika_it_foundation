<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

    function __construct() {
        parent::__construct();  
        $this->load->model('Institute_model', '', TRUE);
        $this->load->model('Accounts_model', '', TRUE);
        $this->load->library('bdbulk');
        $site = $this->Authenticator_model->setting_data();
       	$sdata['icode'] = $site->code;
       $this->session->set_userdata($sdata);
    }

    public function balance()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Balance";
        $data['private'] = $this->load->view('back/accounts/balance',$data,true);   
        $this->load->view('back/institute/index',$data);
    }   


    public function balance_sheet()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Balance";
        $data['private'] = $this->load->view('back/accounts/balance_sheet',$data,true);   
        $this->load->view('back/institute/index',$data);
    }   

    public function due()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Due";
        $data['private'] = $this->load->view('back/accounts/due_sheet',$data,true);   
        $this->load->view('back/institute/index',$data);
    }  

    public function disbursment()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Disbursment";
        $data['private'] = $this->load->view('back/accounts/disbursment',$data,true);   
        $this->load->view('back/institute/index',$data);
    }    


    public function collectfee()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Collect Student Fee";
        $data['private'] = $this->load->view('back/accounts/collectfee',$data,true);   
        $this->load->view('back/institute/index',$data);
    }

    function feedetails() {
        $regi = $this->input->post('regi');
        redirect('accounts/fee/'.$regi);
    }

    public function fee($id)
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Student Fee Details";
        $data['id'] = $id;
        $data['fee'] = $this->Accounts_model->feedetails($id);
        $data['paid'] = $this->Accounts_model->paid($id);
        $data['private'] = $this->load->view('back/accounts/collectfee',$data,true);   
        $this->load->view('back/institute/index',$data);
    }

    function pay() {
        $id = $this->input->post('id');
        $pdata['code'] = $this->session->userdata('icode');
        $pdata['trainee_id'] = $id ;
        $pdata['amount'] = $this->input->post('amount');
        $pdata['remarks'] = $this->input->post('remarks');
        $pdata['date'] = date('d-m-Y');
        foreach ($this->Accounts_model->invoice() as $key => $in) { };
        $invoice = $in->invoice + 1;
        $pdata['invoice'] = $invoice;
        $pid = $this->Accounts_model->trainee_payment($pdata);

        $data['payment_id'] = $pid;
        $data['course'] = $this->input->post('course');
        $data['admission'] = $this->input->post('admission');
        $data['exam'] = $this->input->post('exam');
        $data['registration'] = $this->input->post('registration');
        $data['center'] = $this->input->post('center');
        $data['practical'] = $this->input->post('practical');
        $data['idcard'] = $this->input->post('idcard');
        $data['others'] = $this->input->post('others');
        $this->Accounts_model->save_additional($data);
        //================= Next Payment Date =======================
        $npd = $data['admission'] = $this->input->post('payment_date');
        if($npd != NULL){
            $n['date'] = $this->input->post('payment_date');
            $n['trainee_id'] = $this->input->post('id'); 
            $n['code'] = $this->session->userdata('icode');
            $this->db->insert('next_payment_date',$n);
        }

        redirect('accounts/invoice/'.$id.'/'.$pid);
    }


    public function invoice($id,$pid)
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Collect Student Fee";
        $data['site'] = $this->Accounts_model->site();
        $data['trainee'] = $this->Accounts_model->traineeinfo($id);
        $data['coursefee'] = $this->Institute_model->courseinfo($id);
        $data['paid'] = $this->Accounts_model->paid($id);
        $data['paymentinfo'] = $this->Accounts_model->paymentinfo($pid);
        $data['addiinfo'] = $this->Accounts_model->addiinfo($pid);
        $data['private'] = $this->load->view('back/accounts/trainee_invoice',$data,true);   
        $this->load->view('back/institute/index',$data);
    }




    function delete_credit($id) {
        $this->Accounts_model->delete_credit($id);
        redirect('institute/credit');
    }


    function delete_debit($id) {
        $this->Accounts_model->delete_credit($id);
        redirect('institute/disbursment');
    }



    public function report()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Report";
        $data['site'] = $this->Accounts_model->site();
        $data['private'] = $this->load->view('back/accounts/report',$data,true);   
        $this->load->view('back/institute/index',$data);
    } 
}