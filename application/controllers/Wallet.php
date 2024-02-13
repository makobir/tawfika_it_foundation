<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Wallet_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);
        $this->load->model('Super_admin_model', '', TRUE);
        $this->load->model('Courier_model', '', TRUE);
        $this->load->model('institute_model', '', TRUE);
        $this->load->library('bdbulk');
        $admin_id = $this->session->userdata('id');
        if ($admin_id == NULL) {
            redirect('authenticator', 'refresh');
        }
        if ($this->session->userdata('usertype') == 'trainee') {
            redirect('trainee', 'refresh');
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
		
		//echo date('y');
		//$x=11;
		//$value = str_pad($x,2,"0",STR_PAD_LEFT);
		//echo $value;
		if($this->session->userdata('usertype')=='super_admin'){
			$sys = $this->Authenticator_model->sys_info();
		}else {
        	$sys = $this->Authenticator_model->site();
    	}
        $this->data = array(
            'aff_commission' => $sys->aff_commission,
            'refferal' => $sys->refferal,
            'aff_fee' => $sys->aff_fee
        );
      // echo $this->data['refferal'];
    }


	public function payfee()
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Pay Fee";
		$data['private'] = $this->load->view('back/wallet/pay',$data,true);	
		$this->load->view('back/institute/index',$data);
	}	

	public function paynow($id)
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Pay Fee";
		$data['info'] = $this->Wallet_model->payment_info($id);
		$data['private'] = $this->load->view('back/wallet/paynow',$data,true);	
		$this->load->view('back/institute/index',$data);
	}


	public function pay($value='')
	{
		$data = array();
		$code = $this->session->userdata('icode');
		$id = $this->input->post('payment_id');
		$data['mobile'] = $this->input->post('mobile');
		$data['amount'] = $this->input->post('amount');
		$data['tnxid'] = $this->input->post('tnx');
		$check = $this->Wallet_model->checktnxid($data['tnxid']);
		if($check == NULL) {
	        $data['status'] = 'Pending';
			$this->Wallet_model->pay($id,$data);
			
			$tdata['payment_id'] = $id;
			$tdata['code'] = $code;
			$tdata['method'] = $this->input->post('method');
			$tdata['amount'] = $this->input->post('amount');
			$tdata['status'] = 'Pending';
			$this->Wallet_model->pay_tnxs($tdata);
			if ($this->input->post('for') != NULL) {
				$idata['payment_id'] = $this->input->post('payment_id');
				$this->Wallet_model->ins_payment($idata);
			}

		    $not['to'] = '0';
		    $not['for'] = 'Fee payment by : '.$tdata['code'];
		    $not['id'] = $id;
			$this->Courier_model->notification($not);
		} else {					
	    	$sdata['exception'] = 'TNX ID already used !';
	    	$this->session->set_userdata($sdata);
		}
		redirect('wallet/payfee');
	
	}

	public function payfromwallet($value='')
	{
		$data = array();
		$code = $this->session->userdata('icode');
		$id = $this->input->post('payment_id');
		$data['tnxid'] = date('d-m-Y');
		$data['date'] = date('d-m-Y');
        $data['status'] = 'Approved';
		$this->Wallet_model->pay($id,$data);
		// =====  Exam Enroll Approving=================
        $adata['status'] = 'Approved';
		$this->Wallet_model->exam_enroll_approve($id,$adata);
		$this->Wallet_model->center_course_enroll_approve($id,$adata);

		//=========== Message sent to Trainee ========================= 
			
		if($this->input->post('for') == 'Form Fillup') {
			$trainee = $this->Wallet_model->form_filled_trainee($id);
			foreach ($trainee  as $key => $t) {
				$phone = $t->mobile; 
        		$amount = $this->input->post('amount'); 
        		$message = 'Congratulations! Now you can participate Final Exam. Please visit https://tif.org.bd/login. User: '.$t->trainee_id.', Pass: '.$t->password .' Thanks. Tawfika IT Foundation';
        		$this->bdbulk->sendSMS($phone,$message);				
			}
		}

		$tdata['payment_id'] = $id;
		$tdata['code'] = $code;
		$tdata['method'] = $this->input->post('method');
		$tdata['amount'] = $this->input->post('amount');
		$tdata['status'] = 'Approved';
		$this->Wallet_model->pay_tnxs($tdata);

		if ($this->input->post('for') != NULL) {
			$idata['payment_id'] = $this->input->post('payment_id');
			$this->Wallet_model->ins_payment($idata);
		}

			$amount = $this->input->post('amount');			
			//======== Transfer Balance to affiliate =============			
			if($this->data['refferal'] > 10 ){
			$w['amount'] = $amount * 8 / 100;
			$w['type'] = 'referral_continues';
			$w['code'] = $this->data['refferal'];
			$w['remarks'] = $code;
			$w['status'] = 'Approved';
			$w['date'] = date('d-m-Y');			
			$r['case'] = 'Refferal Continues fee for '. $code ;			
			$this->db->insert('wallet',$w);

			//==== Debit to TIF ===========				
			$dd['debit'] = $w['amount'];
			$dd['code'] = 0;
			$dd['from'] = $code;
			$dd['to'] = $this->data['refferal'];
			$dd['head'] = 'Referral Continues';
			$dd['for'] = $code;
			$dd['date'] = date('d-m-Y');
			$this->db->insert('accounts',$dd);

			} 

			$w1['amount'] = $amount * 12 / 100;
			$w1['from'] = $code;
			$w1['date'] = date('d-m-Y');
			$this->db->insert('charity_fund',$w1);

			//==== Debit to TIF ===========				
			$d['debit'] = $w1['amount'];
			$d['code'] = 0;
			$d['from'] = $code;
			$d['to'] = 0;
			$d['for'] = $code;
			$d['head'] = 'Charity Fund' ;
			$d['date'] = date('d-m-Y');
			$this->db->insert('accounts',$d);

		redirect('wallet/payfee');
	
	}
	public function mybalance()
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Balance";
		$data['private'] = $this->load->view('back/wallet/balance',$data,true);	
		$this->load->view('back/institute/index',$data);
	}	
	public function recharge()
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Balance";
		$data['private'] = $this->load->view('back/wallet/recharge',$data,true);	
		$this->load->view('back/institute/index',$data);
	}

	public function recharge_info($value='')
	{
		$data = array();
		$data['code'] = $this->session->userdata('icode');
		$data['method'] = $this->input->post('method');
		$data['mobile'] = $this->input->post('mobile');
		$data['amount'] = $this->input->post('amount');
		$data['tnx'] = $this->input->post('tnx');
        $data['status'] = 'Pending';
		$id = $this->Wallet_model->recharge($data);

		// $tdata['payment_id'] = $id;
		// $tdata['code'] =  $this->session->userdata('icode');
		// $tdata['method'] = $this->input->post('method');
		// $tdata['amount'] = $this->input->post('amount');
		// $tdata['status'] = 'Pending';
		// $this->Wallet_model->pay_tnxs($tdata);
		redirect('wallet/mybalance');
	
	}

	public function payregifee($id)
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Registration Fee";
		$data['info'] = $this->Wallet_model->payment_info($id);
		$data['private'] = $this->load->view('back/wallet/paynow',$data,true);	
		$this->load->view('back/institute/index',$data);
	}










//=================== Super Admin Functions =======================================

	public function balance_sheet()
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Balance";
		$data['private'] = $this->load->view('back/wallet/balance_sheet',$data,true);	
		$this->load->view('back/index',$data);
	}



	public function wrecharge()
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Recharge";
		$data['private'] = $this->load->view('back/wallet/recharge',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function wrecharge_info($value='')
	{
		$data = array();
		if ($this->input->post('method') == 'marchent') {
			$data['code'] = $this->input->post('code');
			$data['method'] = $this->input->post('method');
			$data['mobile'] = $this->input->post('mobile');
			$data['amount'] = $this->input->post('amount');
			$data['tnx'] = $this->input->post('tnx');
	        $data['status'] = 'Approved';
		}else {			
			$data['code'] = $this->input->post('code');
			$data['method'] = $this->input->post('method');;
			$data['amount'] = $this->input->post('amount');
			$data['remarks'] = $this->input->post('remarks');
	        $data['status'] = 'Approved';

			// $adata['for'] = 'Wallet';
			// $adata['title'] = 'Debited to : '. $this->input->post('code');
			// $adata['debit'] = $this->input->post('amount');
			// $adata['remarks'] = $this->input->post('remarks');
	  		// $this->Wallet_model->debit($adata);
		}
		$id = $data['code'];
		$center = $this->Wallet_model->center($id);
        $phone = $center->mobile; 
        $message = 'Your wallet recharge by TK'.$data['amount'].', Tawfika IT Foundation.';
        $this->bdbulk->sendSMS($phone,$message);
		$this->Wallet_model->recharge($data);
		redirect('wallet/center_balance/'.$data['code']);
	
	}

	public function center_balance($id)
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Balance";
		$data['center'] = $this->Wallet_model->center($id);
		$data['approved_balance'] = $this->Wallet_model->approved_balance($id);
		$data['wallet_payments'] = $this->Wallet_model->wallet_payments($id);
		$data['private'] = $this->load->view('back/wallet/balance_check',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function balance()
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Balance";
		$data['private'] = $this->load->view('back/wallet/balance',$data,true);	
		$this->load->view('back/index',$data);
	}


		public function withdraw()
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "Withdraw";
		$data['private'] = $this->load->view('back/wallet/withdraw',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function alltnx()
	{
		$data = array();
		$data['menu'] = " ";
		$data['title'] = "All TNX";
		$data['private'] = $this->load->view('back/wallet/tnx_approval',$data,true);	
		$this->load->view('back/index',$data);
	}
	public function checktnx()
	{
		$data = array();
		$mobile = $this->input->post('mobile');
		//echo gettype($mobile);
		$data['info'] = $this->Wallet_model->checktnx($mobile);
		$data['menu'] = " ";
		$data['title'] = "TNX Details";
		$data['private'] = $this->load->view('back/wallet/tnx_approval',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function checkwtnx()
	{
		$data = array();
		$mobile = $this->input->post('mobile');
		$data['info'] = $this->Wallet_model->checkwtnx($mobile);
		$data['menu'] = " ";
		$data['title'] = "Wallet TNX Details";
		$data['private'] = $this->load->view('back/wallet/tnx_approval',$data,true);	
		$this->load->view('back/index',$data);
	}


	public function approve_now($id)
	{
		$data['status'] = 'Approved';
		$data['date'] = date('d-m-Y');
		$adata['status'] = 'Approved';
		$adata['date'] = date('d-m-Y');
	    $this->Wallet_model->approve_payment($id,$data);
	    $this->Wallet_model->approve_payment_tnx($id,$data);
		$this->Wallet_model->center_course_enroll_approve($id,$adata);
		$info = $this->Wallet_model->tnx_info($id);

		if($info->for == 'Institute Registration') {
			$amount = $info->amount;
			//========= Add balance to wallet ===========			
			//$w1['amount'] = $amount * 40 / 100;
			if($amount >= 2500) {
			$w1['amount'] = 1000;
			$w1['code'] = $info->code;
			$w1['type'] = 'Starting Balance';
			$w1['status'] = 'Approved';
			$w1['date'] = date('d-m-Y');
			$this->db->insert('wallet',$w1);


			$d['type'] = 'Starting Balance';
			$d['debit'] = $w1['amount'];
			$d['code'] = 0;
			$d['for'] = $w1['code'];
			$d['head'] = 'Wallet recharge to '. $w1['code'] ;
			$d['date'] = date('d-m-Y');
			$this->db->insert('accounts',$d);
			}

			//======== Transfer Balance to affiliate =============
			$check = $this->Wallet_model->check_reff($info->code);
			if($check->refferal != NULL || $check->refferal != 0){
			//$w['amount'] = $amount * 20 / 100;
			if($info->amount >= 1500) {
				$w['amount'] = $this->data['aff_commission'];
				$w['type'] = 'referral';
				$w['code'] = $check->refferal;
				$w['remarks'] = $info->code;
				$w['status'] = 'Approved';
				$w['date'] = date('d-m-Y');						
				$this->db->insert('wallet',$w);

				//==== Debit to TIF ===========	
				$d2['type'] = 'Referral';			
				$d2['debit'] = $w['amount'];
				$d2['code'] = 0;
				$d2['head'] = 'Referral Fee for '.$info->code ;
				$d2['for'] = $info->code;
				$d2['date'] = date('d-m-Y');
				$this->db->insert('accounts',$d2);
				}
			}

 			
	 		$phone = $this->input->post('mobile'); 
	        $amount = $this->input->post('amount'); 
	        $message = 'Your Payment of TK '.$info->amount.' has been Approved, 
	        Tawfika IT Foundation.';
	        $this->bdbulk->sendSMS($phone,$message);
		}

		if($info->for == 'Form Fillup') {
			$amount = $info->amount;			
			//======== Transfer Balance to affiliate =============
			$check = $this->Wallet_model->check_reff($info->code);
			if($check->refferal != NULL || $check->refferal != 0){
			$w['amount'] = $amount * 8 / 100;
			$w['type'] = 'Referral Continues';
			$w['code'] = $check->refferal;
			$w['remarks'] = $info->code;
			$w['status'] = 'Approved';
			$w['date'] = date('d-m-Y');			
			$r['case'] = 'Refferal Continues fee for '.$info->code ;			
			$this->db->insert('wallet',$w);
			//==== Debit to TIF ===========				
			$dd['debit'] =  $w['amount'];
			$dd['code'] = 0;
			$dd['from'] = $info->code;
			$dd['to'] = $check->refferal;
			$dd['for'] = $check->refferal;
			$dd['type'] = 'Referral Continues';
			$dd['date'] = date('d-m-Y');
			$this->db->insert('accounts',$dd);
			} 

			$w1['amount'] = $amount * 12 / 100;
			$w1['from'] = $info->code;
			$w1['status'] = 'Approved';
			$w1['date'] = date('d-m-Y');
			$this->db->insert('charity_fund',$w1);

			//==== Debit to TIF ===========				
			$d['debit'] = $w1['amount'];
			$d['code'] = 0;
			$d['from'] = $w1['from'];
			$d['to'] = 0;
			$d['type'] = 'Charity Fund';
			$d['for'] = $info->code;
			$d['date'] = date('d-m-Y');
			$this->db->insert('accounts',$d);

			//=========== Message sent to Trainee ========================= 
			$trainee = $this->Wallet_model->form_filled_trainee($id);
			foreach ($trainee  as $key => $t) {
				$phone = $t->mobile; 
        		$amount = $this->input->post('amount'); 
        		$message = 'Congratulations! Now you can participate Final Exam. Please visit https://tif.org.bd/login. User: '.$t->trainee_id.', Pass: '.$t->password .' Thanks. Tawfika IT Foundation';
        		$this->bdbulk->sendSMS($phone,$message);				
			}

	        $phone = $this->input->post('mobile'); 
	        $amount = $this->input->post('amount'); 
	        $message = 'Your payment of TK'.$amount.' has been Approved. Tawfika IT Foundation.';
	        $this->bdbulk->sendSMS($phone,$message);
		}


		redirect('wallet/alltnx');
	
	}


	public function wtnxapprove_now($id)
	{
		$data = array();
		$data['status'] = 'Approved';
	    $this->Wallet_model->approve_wpayment($id,$data);
	    //$this->Wallet_model->approve_payment_tnx($id,$data);
	   // $this->Wallet_model->approve_payment_tnx($id,$data);
		redirect('wallet/alltnx');
	
	}	

	public function delete_tnx($id)
	{
		$this->db->where('payment_id',$id);
		$this->db->delete('payment_tnx');
		$data ['tnxid'] = '' ;
		$data ['mobile'] = '' ;		
		$data ['status'] = '' ;		
		$this->db->where('sl',$id);
		$this->db->update('payments',$data);
		redirect('wallet/alltnx');
	
	}	

	public function delete_w_tnx($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('wallet');
		redirect('wallet/alltnx');
	
	}

	public function all_transactions($id)
	{
		$data = array();
		$data['menu'] = "Wallet";
		$data['title'] = "All Tnx";
	    $data['tnx'] = $this->Wallet_model->all_tnx_by_center($id);
	    $data['t'] = $this->Super_admin_model->center($id);
		$data['private'] = $this->load->view('back/wallet/all_transactions',$data,true);	
		$this->load->view('back/index',$data);
	}







}