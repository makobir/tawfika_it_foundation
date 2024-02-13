<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticator_model extends CI_Model {



    function user_login_check_info($username, $password ) {
        $this->db->select('*');
        $this->db->from('users');
        $type = strlen($username);
        if($type <= 5) {
            $this->db->where('email2', $username);
        }else {
            $this->db->where('email', $username);
        }
        $this->db->where('password', $password);
        $this->db->where('email_verification', '1');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    function payments_status() {
        $id = $this->session->userdata('icode');
        $this->db->select('p.*,s.*');
        $this->db->from('payments as p');
        $this->db->where('p.code', $id);
        $this->db->where('p.for','Institute Registration');
        $this->db->where('p.status','Approved');
        $this->db->join('settings as s', 's.code = p.code', 'left');
        $this->db->where('s.status','Approved');
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

    function sys_info() {
        $id = 0;
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('code', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    } 
    
    function setting_data() {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('settings as s');
        $this->db->join('users as u', 'u.code = s.code', 'left'); 
        $this->db->where('u.id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


    public function checkuser($email){
        $check = $this->db->select('*')
                                ->from('users')
                                ->where('email',$email)
                                ->get()->row();
         return $check; 
    }


    public function checkuserm($mobile){

        $checkm = $this->db->select('*')
                                ->from('users')
                                ->where('mobile',$mobile)
                                ->get()->row();

         return $checkm; 

    }


    function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("users");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
    function is_mobile_available($mobile)  
      {  
           $this->db->where('mobile', $mobile);  
           $query = $this->db->get("users");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  

    function is_tnx_available($tnx)  
      {  
           $this->db->where('tnxid', $tnx);  
           $query = $this->db->get("payments");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  


    function register_info($data) {
        $insertId = $this->db->insert('users', $data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    function saveOTP($data) {
        $this->db->insert('otp', $data);
        
    }


 function check_id($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

 function checkOTP($uid) {
        $this->db->select('*');
        $this->db->from('otp');
        $this->db->where('uid', $uid);
        $this->db->where('status', 0);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }




 function otpUpdate($otp) {
        $this->db->where('otp', $otp);
        $this->db->set('status', 1);
        $this->db->update('otp');
    }

 function affsetup($id,$aff) {
        $this->db->where('id', $id);
        $this->db->update('users',$aff);
    }
 function affsignup($signup) {
        $this->db->insert('referrals', $signup);
    }


 function userVerification($id) {
        $this->db->where('id', $id);
        $this->db->set('email_verification', 1);
        $this->db->update('users');
    }

 function add_edu($edata) {
        $this->db->insert('education', $edata);
    }

function add_timeline($data) {
        $this->db->insert('timeline', $data);
    }




 function check_user($user) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $user);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

 function change_password($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('users',$data);
    }

  function update_qr_info($id,$qdata){
        $this->db->select('*');
        $this->db->where('code',$id);
        $this->db->update('settings',$qdata);
        
    }

 function collect_pass($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('code', $id);
        $this->db->where('role', 'branch');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }









}

