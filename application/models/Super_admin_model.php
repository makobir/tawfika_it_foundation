<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin_model extends CI_Model {


function total_licence_fee() {
    $id = $this->session->userdata('code');
    $this->db->from('trade_info as t');
    $this->db->join('applications as a','a.id = t.application_id');
    $this->db->where('unionid',$id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


function total_applications() {
    $id = $this->session->userdata('code');
    $this->db->from('applications');
    $this->db->where('unionid',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

function total_approved() {
    $id = $this->session->userdata('code');
    $this->db->from('applications');
    $this->db->where('status','Approved');
    $this->db->where('unionid',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

function total_certificate() {
    $id = $this->session->userdata('code');
    $this->db->from('certificate as c');
    $this->db->join('applications as a','a.id = c.application_id');
    $this->db->where('a.unionid',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

function save_settings($id,$data){
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->where('code',$id);
        $this->db->update('settings',$data);
        
    }

function change_logo($data){
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->where('code',$id);
        $this->db->update('settings',$data);
        
    }
function change_user_photo($data){
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        
    }
    
function update_user_basic($id,$data){
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        
    }

function change_password($id,$data){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        
    }

function batch() {
    $id = $this->session->userdata('code');
    $this->db->from('batch');
    //$this->db->where('unionid',$id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }

function session() {
    $id = $this->session->userdata('code');
    $this->db->from('session');
    //$this->db->where('unionid',$id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


function enrolled($id) {
  //  $id = $this->session->userdata('code');
    $this->db->from('course_enroll');
    $this->db->where('batch_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

function examinee($id) {
  //  $id = $this->session->userdata('code');
    $this->db->from('exam_enroll');
    $this->db->where('batch_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }


function trainee($id) {
    $this->db->select('t.*,ce.*'); 
    $this->db->from('trainee as t');    
    //$this->db->where('t.code',$id);
    $this->db->where('t.regi',$id);
    $this->db->join('course_enroll as ce','ce.trainee_id = t.regi');
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
  }



function alltrainee($id) {
    //$id = $this->session->userdata('icode');
    $this->db->from('trainee as t');    
    //$this->db->where('t.code',$id);
    $this->db->join('exam_enroll as ee','ee.trainee_id = t.regi');
    $this->db->where('ee.payment_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }



//======================== Course Management Starts ================================================


function course() {
    $id = $this->session->userdata('code');
    $this->db->from('course');
    //$this->db->where('unionid',$id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }

function cenrolled($id) {
  //  $id = $this->session->userdata('code');
    $this->db->from('course_enroll');
    $this->db->where('course_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }
  function tcenrolled($id) {
  //  $id = $this->session->userdata('code');
    $this->db->from('course_enroll');
    $this->db->where('code',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

function tcexaminee($id) {
  //  $id = $this->session->userdata('code');
    $this->db->from('exam_enroll');
    $this->db->where('code',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }
  function cexaminee($id) {
  //  $id = $this->session->userdata('code');
    $this->db->from('exam_enroll');
    $this->db->where('course_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }
function subjects($id) {
    //$id = $this->session->userdata('code');
    $this->db->from('subjects');
    $this->db->where('course_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }

public function add_course($data)
{
   $this->db->insert('course',$data);
}

public function update_course($id,$data)
{
    $this->db->where('id',$id);
    $this->db->update('course',$data);
}


public function add_subject($data)
{
    $id = $this->db->insert('subjects',$data);
    $id = $this->db->insert_id();
    return $id;
}

public function add_exam($edata)
{
   $this->db->insert('exams',$edata);
}


function courseby($id) {
    //$id = $this->session->userdata('code');
    $this->db->from('course');
    $this->db->where('id',$id);
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
  }
//======================== Course Management Ends ================================================



//======================== Institute Management Starts ================================================
function center($id) {
    //$id = $this->session->userdata('code');
    $this->db->from('settings');
    $this->db->where('code',$id);
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
  }

function centers() {
    //$id = $this->session->userdata('code');
    $this->db->from('settings');
    //$this->db->where('code',$id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


function approvalcenters() {
    //$id = $this->session->userdata('code');
    $this->db->from('settings');
    $this->db->where('status','');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }
function allcenters() {
    //$id = $this->session->userdata('code');
    $this->db->from('settings');
    $this->db->where('status','Approved');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }


  function terminatedcenters() {
    //$id = $this->session->userdata('code');
    $this->db->from('settings');
    $this->db->where('status','Terminated');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }







function centerdetails($id) {
    //$id = $this->session->userdata('code');        
    $this->db->select('s.*, u.name as uname,u.mobile as umobile, u.email as uemail, u.password as password, u.userfile as user'); 
    $this->db->from('settings as s');
    $this->db->join('users as u','u.code = s.code');
    $this->db->where('s.code',$id);
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
  }

  function paymentdetails($id) {
    //$id = $this->session->userdata('code');        
    $this->db->select('pt.*, p.mobile as pmobile,p.tnxid as tnxid'); 
    $this->db->from('payments as p');
    $this->db->where('p.code',$id);
   // $this->db->where('p.sl','DESC');
    $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
  }

  function all_payments($month) {
    //$id = $this->session->userdata('code');        
    $this->db->select('*'); 
    $this->db->from('payment_tnx');
    $this->db->like('date',$month);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }    

  function all_debits($month) {
    //$id = $this->session->userdata('code');        
    $this->db->select('*'); 
    $this->db->from('accounts');
    $this->db->where('code',0);
    $this->db->like('date',$month);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
  }  


  function fee_check($id) {
    //$id = $this->session->userdata('code');        
    $this->db->select('p.*'); 
    $this->db->from('payments as p');
    $this->db->where('p.code',$id);
    $this->db->where('p.for','Institute Registration');
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
  }  

  function approve_now($id,$data){
        $this->db->where('code',$id);
        $this->db->update('settings',$data);    
    }

    function pending_for_approval() {
    //$id = $this->session->userdata('code');
    $this->db->from('settings');
    $this->db->where('status','');
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

    function checkinspayment($id) {
    //$id = $this->session->userdata('code');

    $this->db->select('p.*');   
    $this->db->from('settings as s');
    $this->db->where('s.code',$id);
    $this->db->join('payments as p','p.code = s.code');
    $this->db->where('p.for','Institute Registration');
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
  }


//======================== Institute Management Ends ================================================


//======================== Batch Management Start ================================================


    function save_batch($data){
        $this->db->insert('batch',$data);    
    }

    function null_batch($data){
        $this->db->update('batch',$data);    
    }   

    function active_batch($id,$adata){
        $this->db->where('id',$id);
        $this->db->update('batch',$adata);    
    }

//======================== Batch Management Ends ================================================


//======================== Question  Management Starts ================================================
    function questions() {
        $this->db->from('question');
       // $this->db->where('xmid', $exm_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    function questionsby($id) {
        $this->db->from('question');
        $this->db->where('xmid', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

     function total_question($exm_id) {
        $this->db->from('question');
        $this->db->where('xmid', $exm_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }


   function exm($exm_id) {
        $this->db->select('*');
        $this->db->from('exams');
        $this->db->where('id', $exm_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    function subject() {
        //$id = $this->session->userdata('code');
        $this->db->from('subjects');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
      }



    
    function select_question_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('question');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


    function update_question($data, $id)
    {
        $this->db->where('id', $id);
        $insertId = $this->db->update('question', $data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    function select_answers_by_question($id)
    {
        $this->db->select('*');
        $this->db->from('answer');
        $this->db->where('question_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }



    function update_answer($value) {
        $this->db->update_batch('answer', $value, 'id');
    }

     function add_question($data) {
        $insertId = $this->db->insert('question', $data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    function answer($value) {
        $this->db->insert_batch('answer', $value);
    }

        function s_exam($exm_id) {
        $this->db->select('*');
        $this->db->from('exams');
        $this->db->where('cid',$exm_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
//======================== Question Management Ends ================================================




//======================== Accounts Management Start ================================================

  function allactnx() {
        $id = $this->session->userdata('icode');
        $this->db->from('accounts');
        $this->db->where('code', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    function addactnx($data) {
        $this->db->insert('accounts', $data);
    }

//======================== Accounts Management Ends ================================================





  function trainee_list($session, $course,$year) {
        $this->db->select('t.*');
        $this->db->from('trainee as t');
        $this->db->join('exam_enroll as ce','ce.trainee_id = t.regi');        
            $this->db->where('t.session',$session);
       
        if($course != NULL) {
            $this->db->where('ce.course_id',$course);
        }  
        if($year != NULL) {
            $this->db->like('ce.year',$year);
        }
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

  function trainee_list_all($session, $course,$year) {
        $id = $this->session->userdata('icode');
        $this->db->select('t.*');
        $this->db->from('trainee as t');        
        $this->db->where('t.code', $id);
        $this->db->join('course_enroll as ce','ce.trainee_id = t.regi');        
        if($session != NULL) {
          $this->db->where('t.session',$session);  
        }               
        if($course != NULL) {
            $this->db->where('ce.course_id',$course);
        }  
        if($year != NULL) {
            $this->db->like('ce.year',$year);
        }
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }  

    function trainee_list_all_due($session, $course,$year) {
        $id = $this->session->userdata('icode');
        $this->db->select('t.*');
        $this->db->from('trainee as t');        
        $this->db->where('t.code', $id);
        $this->db->where('t.status','Active');
        $this->db->join('course_enroll as ce','ce.trainee_id = t.regi');        
        if($session != NULL) {
          $this->db->where('t.session',$session);  
        }               
        if($course != NULL) {
            $this->db->where('ce.course_id',$course);
        }  
        if($year != NULL) {
            $this->db->like('ce.year',$year);
        }
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }



  function center_trainee_list($code) {
        $this->db->select('t.*');
        $this->db->from('trainee as t');
        $this->db->join('exam_enroll as ce','ce.trainee_id = t.regi');  
        $this->db->where('ce.code',$code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }










  function users($type="") {
        //$id = $this->session->userdata('code');
        $this->db->from('users');
        if($type != NULL) {
            $this->db->like('role',$type);
        }
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    function tnx_pending_for_approval() {
        //$id = $this->session->userdata('code');
        $this->db->from('payments as p');
        $this->db->join('payment_tnx as pt','pt.payment_id = p.sl');
        $this->db->where('p.status','Pending');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }


    function wallet_pending_for_approval() {
        //$id = $this->session->userdata('code');
        $this->db->from('wallet');
        $this->db->where('status','Pending');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }


    function refferal_pending_for_approval() {
        //$id = $this->session->userdata('code');
        $this->db->from('wallet');
        $this->db->where('type','refferal');
        $this->db->where('status','');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }



    function total_trainee() {
        //$id = $this->session->userdata('code');
        $this->db->from('trainee');
        //$this->db->where('status','Pending');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    function exam_enrolled() {
        //$id = $this->session->userdata('code');
        $this->db->from('exam_enroll');
        //$this->db->where('status','Pending');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
  }


    function totalcenters() {
        //$id = $this->session->userdata('code');
        $this->db->from('settings');
        $this->db->where('status','Approved');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
  }




//======================== Notifications Management ============================

    function notifications() {
        $id = $this->session->userdata('icode');
        $this->db->from('notification');
        $this->db->where('to',$id);
        $this->db->where('is_view',0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
  }
    function notific() {
        $id = $this->session->userdata('icode');
        $this->db->from('notification');
        $this->db->where('is_view',0);
        $this->db->where('for',$id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
  }


//======================== Gallery Management ============================

    function gallery_groups() {
        $id = $this->session->userdata('icode');
        $this->db->from('gallery_groups');
        $this->db->where('code',$id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
  }


   function gallery_groups_info($data) {
        $this->db->insert('gallery_groups', $data);
    }


   function upload_gallery_photo($data) {
        $this->db->insert('gallery_photos', $data);
    }






    public function password($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }







}




