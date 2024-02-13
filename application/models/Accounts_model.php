<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model {

    function admissionfee() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('course_enroll');
        $this->db->where('code', $id);
        $this->db->select_sum('course_fee');
        $this->db->select_sum('admission');
        $this->db->select_sum('registration');
        $this->db->select_sum('exam');
        $this->db->select_sum('practical');
        $this->db->select_sum('idcard');
        $this->db->select_sum('center');
        $this->db->select_sum('others');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    
    function admissionfeecollected() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('code', $id);
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }     

    function invoice() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('code', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    } 
 

    function admissionfeepaid() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('code', $id);
        $this->db->where('status', 'Approved');
        $this->db->where('for','Form Fillup');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    

    function admissionfeedate($date) {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('course_enroll');
        $this->db->where('code', $id);
        $this->db->like('admission_date', $date);
        $this->db->select_sum('course_fee');
        $this->db->select_sum('admission');
        $this->db->select_sum('registration');
        $this->db->select_sum('exam');
        $this->db->select_sum('practical');
        $this->db->select_sum('idcard');
        $this->db->select_sum('center');
        $this->db->select_sum('others');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    


    function admissionfeecollecteddate($date) {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('code', $id);
        $this->db->like('date', $date);
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    

    function others_income($date) {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->where('code', $id);
        $this->db->like('date', $date);
        $this->db->select_sum('credit');
        $this->db->select_sum('debit');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    



function delete_credit($id) {
        $this->db->where('id',$id);
        $this->db->delete('accounts');
    }


function trainee($scode="",$year="") {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee');
        if($scode != NULL){
        $this->db->where('session', $scode);
        }
        if($year != NULL){
        $this->db->like('admission_date', $year);
        }
        $this->db->where('code', $id);
        $this->db->order_by('id', 'DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    } 


function feedetails($id) {
        $this->db->select('*');
        $this->db->from('course_enroll');
        $this->db->where('trainee_id', $id);
        $this->db->select_sum('course_fee');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    
function paid($id) {
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('trainee_id', $id);
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    

function save_additional($data) {
        $this->db->insert('trainee_payment_details', $data);
    }

function trainee_payment($pdata){
    $pid = $this->db->insert('trainee_payment',$pdata);
    $pid = $this->db->insert_id();
    return $pid;
}

function allpayments($id) {
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('trainee_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

function balance_sheet() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('code', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


function paymentinfo($pid) {
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('id', $pid);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

function total_income($date) {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('code', $id);
        $this->db->like('date', $date);
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

function total_expence($date) {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->where('code', $id);
        $this->db->like('date', $date);
        $this->db->select_sum('credit');
        $this->db->select_sum('debit');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
function addiinfo($pid) {
        $this->db->select('*');
        $this->db->from('trainee_payment_details');
        $this->db->where('payment_id', $pid);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

function traineeinfo($id) {
        $this->db->select('*');
        $this->db->from('trainee');
        $this->db->where('regi', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 


    function site() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('code', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 

}
