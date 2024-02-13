<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier_model extends CI_Model {


 public function documents($id){
       // $code = $this->session->userdata('icode');
        $this->db->select('ee.*');        
        $this->db->from('exam_enroll as ee');
        $this->db->where('ee.code', $id); 
        $this->db->where('ee.courier_id',''); 
       // $this->db->join('exam_marks as em', 'em.trainee_id = ee.trainee_id', 'left'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

 public function enrolled($id){
       // $code = $this->session->userdata('icode');
        $this->db->select('ee.*');        
        $this->db->from('exam_enroll as ee');
        $this->db->where('ee.code', $id); 
       // $this->db->join('exam_marks as em', 'em.trainee_id = ee.trainee_id', 'left'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function send($data)
    {
        $id = $this->db->insert('courier',$data);        
        return $id?$this->db->insert_id():false;
    }


    public function update_courier_info($value) {
        $this->db->update_batch('exam_enroll', $value,'trainee_id');
    }

 public function report(){
       // $code = $this->session->userdata('icode');
        $this->db->select('*');        
        $this->db->from('courier');
        // $this->db->where('ee.code', $id); 
        // $this->db->where('ee.courier_id',''); 
        $query_result = $this->db->get();
        $result = $query_result->result();
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

//=== =============== Institute =======================================================================
 public function arrived(){
        $code = $this->session->userdata('icode');
        $this->db->select('*');        
        $this->db->from('courier');
        $this->db->where('code', $code); 
        // $this->db->where('ee.courier_id',''); 
        $this->db->where('status','Send'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

 public function documents_details($id){
        $code = $this->session->userdata('icode');
        $this->db->select('*');        
        $this->db->from('courier');
        $this->db->where('code', $code ); 
        $this->db->where('sl',$id); 
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_status($id,$data) {        
        $this->db->where('sl', $id ); 
        $this->db->update('courier', $data);
    }
 public function received(){
        $code = $this->session->userdata('icode');
        $this->db->select('*');        
        $this->db->from('courier');
        $this->db->where('code', $code); 
        // $this->db->where('ee.courier_id',''); 
        $this->db->where('status','Received'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

//======================== Notifications Management ============================

    public function notification($not) {   
        $this->db->insert('notification', $not);
    }  

    public function update_view($id,$data) {  
        $this->db->where('id', $id );   
        $this->db->update('notification', $data);
    }


}