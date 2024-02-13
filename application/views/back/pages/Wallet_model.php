<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet_model extends CI_Model {
 public function __construct() {
        parent::__construct();
    }





function payment_info($id) {
   
        $this->db->select('*');
        $this->db->from('payments');      
        $this->db->where('sl',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

  function ins_payment($idata){
        $this->db->select('*');
        $code = $this->session->userdata('icode');
        $this->db->where('code',$code);
        $this->db->update('settings',$idata) ;   
    }

  function pay($id,$data){
        $this->db->select('*');
        $this->db->where('sl',$id);
        $this->db->update('payments',$data);
        
    }

  function exam_enroll_approve($id,$adata){
        $this->db->where('payment_id',$id);
        $this->db->update('exam_enroll',$adata);
        
    }

   public function form_filled_trainee($id) {
        $this->db->select('u.*');
        $this->db->from('exam_enroll as ee');
        $this->db->where('payment_id',$id);
        $this->db->join('users as u','u.trainee_id = ee.trainee_id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

  function center_course_enroll_approve($id,$adata){
        $this->db->where('payment_id',$id);
        $this->db->update('center_course_enroll',$adata);
        
    }





  function pay_tnxs($tdata){
        $this->db->insert('payment_tnx',$tdata);
        
    }


  function recharge($data){
        $id = $this->db->insert('wallet',$data);        
        return $id?$this->db->insert_id():false;
        
    }

   public function balance() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('code',$code);
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


   public function clearence() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('code',$code);
        $this->db->where('status','Pending');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



   public function checktnxid($tnx) {
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('tnxid',$tnx);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function payments() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('payment_tnx');
        $this->db->where('code',$code);
        $this->db->where('method','wallet');
        $this->db->where('status','Pending');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function paymentsa() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('payment_tnx');
        $this->db->where('code',$code);
        $this->db->where('method','wallet');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function pending_approval() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('payment_tnx');
        $this->db->where('code',$code);
        $this->db->where('status','Pending');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

//==================================== Super_admin Area ==============================================


      public function approved_balance($id) {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('code',$id);
       // $this->db->where('method','wallet');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 


   public function wallet_payments($id) {
        $this->db->select('*');
        $this->db->from('payment_tnx');
        $this->db->where('code',$id);
        $this->db->where('method','wallet');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function wallet_payments_all() {
        $this->db->select('*');
        $this->db->from('payment_tnx');
        $this->db->where('method','wallet');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

      public function wallet_balance() {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('method','wallet');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 

    public function recharged_wallet_balance() {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('method','marchent');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 

   public function disbursed() {
        $this->db->select('*');
        $this->db->from('payment_tnx');
        $this->db->where('method','wallet');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function total_expanse() {
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->where('code',0);
        $this->db->select_sum('debit');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function total_earnings() {
        $this->db->select('*');
        $this->db->from('wallet');
        $this->db->where('method','marchent');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function marchent_payments() {
        $this->db->select('*');
        $this->db->from('payment_tnx');
        $this->db->where('method','marchent');
        $this->db->where('status','Approved');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


   public function center($id) {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('code',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



   public function checktnx($mobile) {
        $this->db->select('p.*, pt.method as method');
        $this->db->from('payments as p');
        $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        // if(strlen($mobile) == 11) {
        //    $this->db->where('p.mobile',$mobile); 
        // }else {
          $this->db->where('p.tnxid',$mobile);  
       // }
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


   public function checkwtnx($mobile) {
        $this->db->select('p.*');
        $this->db->from('wallet as p');
       // $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        if(strlen($mobile) == 11) {
           $this->db->where('p.mobile',$mobile); 
        }else {
          $this->db->where('p.tnx',$mobile);  
        }
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }




    function approve_payment($id,$data){
        $this->db->where('sl',$id);
        $this->db->update('payments',$data);    
    }


    function approve_payment_tnx($id,$data){
        $this->db->where('payment_id',$id);
        $this->db->update('payment_tnx',$data); 
        $this->db->where('payment_id',$id);
        $this->db->update('exam_enroll',$data); 

    }


    function approve_wpayment($id,$data){
        $this->db->where('id',$id);
        $this->db->update('wallet',$data);    
    }

   public function alltnx() {
        $this->db->select('p.*, pt.method as method');
        $this->db->from('payments as p');
        $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        $this->db->where('p.status','Approved');  
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function tnx_info($id) {
        $this->db->select('p.*');
        $this->db->from('payments as p');
        $this->db->where('p.sl',$id);  
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }   

    public function check_reff($id) {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('code',$id);  
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function all_tnx_by_center($id) {
        $this->db->select('p.*, pt.method as method, pt.time as date');
        $this->db->from('payments as p');
        $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        $this->db->where('p.code',$id);  
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }




   public function alltnxapproval() {
        $this->db->select('p.*, pt.method as method');
        $this->db->from('payments as p');
        $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        $this->db->where('p.status','Pending');  
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }



   public function walletalltnxapproval() {
        $this->db->select('p.*');
        $this->db->from('wallet as p');
       // $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        $this->db->where('p.status','Pending');  
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
   public function refferaltnxapproval() {
        $this->db->select('p.*');
        $this->db->from('wallet as p');
       // $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        $this->db->where('p.status','');  
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    function debit($adata){
        $this->db->insert('accounts',$adata);    
    }



//========================== Account Balance ============================================ 


   public function account_balance() {
        $code = $this->session->userdata('icode');
        $this->db->from('accounts');
        $this->db->where('code',$code);
        $this->db->select_sum('debit');  
        $this->db->select_sum('credit');  
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

// ==================== SMS ================================================================



function payeea($id) {
    $code = $this->session->userdata('icode');
    $this->db->from('exam_enroll');
    $this->db->where('code',$code);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }





}