<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates_model extends CI_Model {

    public function all_certificates() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('certificates');
        $this->db->where('code',$code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


//=============================== Application Saved ========================================== 

    public function reissue_cert($data)
    {
        $id = $this->db->insert('certificates',$data);        
        return $id?$this->db->insert_id():false;
    }   


    public function issue_cert($value)
    {
        $id = $this->db->insert_batch('certificates',$value);        
        return $id?$this->db->insert_id():false;
    }



    public function trainee($id) {
        $this->db->select('*');
        $this->db->from('trainee');
        $this->db->where('regi', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function markscheck($id) {
        $this->db->select('*');
        $this->db->from('exam_marks');
        $this->db->where('trainee_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function issue_check($id) {
        $this->db->select('*');
        $this->db->from('certificates');
        $this->db->where('regi', $id);
        $this->db->where('status', 'Approved');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function reissue_applications() {
        $this->db->select('*');
        $this->db->from('certificates');
        $this->db->where('status', '');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }





    public function check_exam_enroll($id) {
        $this->db->select('*');
        $this->db->from('certificates');
        $this->db->where('regi', $id);
        $this->db->where('status','Approved');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


//================================ Super Admin ===========================================




    public function centers() {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('status','Approved');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function certificates() {
       // $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('certificates');
        $this->db->where('status','Approved');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }  

    public function check_certificate($id) {
       // $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('certificates');
        $this->db->where('regi',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function certificates_id($id) {
       // $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('certificates');
        $this->db->where('regi',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function approve_now($id, $data){
        $this->db->where('regi',$id);
        $this->db->update('certificates',$data);  
    }


  function certificate_qr_info($regi,$qdata){
        $this->db->where('regi',$regi);
        $this->db->update('certificates',$qdata);
        
    }


}