<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam_model extends CI_Model {




    public function formfilluped($center='',$course='',$year='',$session='',$month=''){

        $this->db->select('t.*,c.*, b.title as batch,t.userfile as trainee,ee.id as eeid, ee.roll as roll');        
        $this->db->from('exam_enroll as ee'); 
        $this->db->join('trainee as t', 't.regi = ee.trainee_id', 'left');
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left'); 
        if ($center != NULL) {        
            $this->db->where('ee.code', $center);
        }  if ($course != NULL) {        
            $this->db->where('ee.course_id', $course);
        } if ($year != NULL) {        
            $this->db->where('ee.year', $year);
        } if ($session != NULL) {        
            $this->db->where('ee.session_id', $session);
        } if ($month != NULL) {        
            $this->db->like('ee.date', $month);
        } 
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');       
        $this->db->join('batch as b', 'b.id = ce.batch_id', 'left');       
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

 public function marks_entry($session='',$course='',$year=''){
        $code = $this->session->userdata('icode');
        $this->db->select('t.*,em.*, t.userfile as trainee, ee.roll as roll,ee.course_id');        
        $this->db->from('exam_enroll as ee');
        if($year != Null ) {
        $this->db->where('ee.year', $year);
        } if($session != Null ) {
        $this->db->where('ee.session_id', $session);
        } if($course != Null ) {
        $this->db->where('ee.course_id', $course);
        }
        $this->db->join('exam_marks as em','em.trainee_id = ee.trainee_id', 'left'); 
        $this->db->join('trainee as t', 't.regi = ee.trainee_id', 'left');
        $this->db->where('t.code', $code);         
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


 public function results(){
        $id = $this->session->userdata('id');
        $this->db->select('ee.*');        
        $this->db->from('exam_marks as ee'); 
        $this->db->join('users as u', 'u.trainee_id = ee.trainee_id', 'left');
        $this->db->where('u.id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

 public function resultss($id){
        $this->db->select('ee.*');        
        $this->db->from('exam_marks as ee'); 
        $this->db->where('ee.trainee_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


 public function cert_check($id){
        $this->db->select('*');        
        $this->db->from('certificates'); 
        $this->db->where('regi', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    
    public function result($id)
 {
        $uid = $this->session->userdata('id');
        $this->db->from('result');
        $this->db->where('uid', $uid);
        $this->db->where('exm_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }    

    public function testresult($id)
 {
        $uid = $this->session->userdata('id');
        $this->db->from('test_result');
        $this->db->where('uid', $uid);
        $this->db->where('exm_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function english($uid,$id)
 {
     
       $this->db->from('result');
       if($uid == NULL) {
       $uid = $this->session->userdata('id');
       $this->db->where('uid', $uid);
       }else {
       $this->db->where('uid', $uid);
       }        
        $this->db->where('exm_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }    
public function  trainee_info()
 {
        $uid = $this->session->userdata('id');
        $this->db->select('t.*, ee.roll as roll, c.title as title, c.duration as duration, s.site_name as institute,u.id as uid');        
        $this->db->from('users as u');
        $this->db->where('u.id', $uid);
        $this->db->join('trainee as t', 't.regi = u.trainee_id', 'left');
        $this->db->join('course_enroll as ce', 'ce.trainee_id = u.trainee_id', 'left');
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = u.trainee_id', 'left');
        $this->db->join('settings as s', 's.code = ee.code', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

public function  subject_result()
 {
        $uid = $this->session->userdata('id');
        $this->db->select('s.*');        
        $this->db->from('users as u');
        $this->db->where('u.id', $uid);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = u.trainee_id', 'left');
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('subjects as s', 's.course_id = ce.course_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    

public function  exam_marks()
 {
        $uid = $this->session->userdata('id');
        $this->db->select('em.*');        
        $this->db->from('users as u');
        $this->db->where('u.id', $uid);
        $this->db->join('exam_marks as em', 'em.trainee_id = u.trainee_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


public function  admitinfo($id)
 {
        $this->db->select('t.*, ee.roll as roll, c.title as course, ce.duration as duration, s.site_name as institute, b.title as batch,ss.session as session,ee.year as year,c.ccode,ss.scode,t.qr');        
        $this->db->from('trainee as t');
        $this->db->where('t.regi', $id);
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = t.regi', 'left');
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left');
        $this->db->join('course as c', 'c.id = ee.course_id', 'left');
        $this->db->join('settings as s', 's.code = ee.code', 'left');
        $this->db->join('batch as b', 'b.id = ee.batch_id', 'left');
        $this->db->join('session as ss', 'ss.scode = ee.session_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

public function  regiinfo($id)
 {
        $this->db->select('t.*, c.title as course, ee.duration as duration, s.site_name as institute, b.title as batch,ss.session as session,ee.year as year, c.fee as fee,ee.admission_date as date,ss.from, ss.to, cen.site_name, cen.district,ss.scode,c.id as cid,u.email as em,u.password, t.qr');        
        $this->db->from('trainee as t');
        $this->db->where('t.regi', $id);
        $this->db->join('course_enroll as ee', 'ee.trainee_id = t.regi', 'left');
        $this->db->join('course as c', 'c.id = ee.course_id', 'left');
        $this->db->join('settings as s', 's.code = t.code', 'left');
        $this->db->join('batch as b', 'b.id = ee.batch_id', 'left');
        $this->db->join('session as ss', 'ss.scode = ee.session_id', 'left');
        $this->db->join('settings as cen', 'cen.code = t.code', 'left');
        $this->db->join('users as u', 'u.trainee_id = t.regi', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



public function  subjects($id)
 {
        $this->db->select('s.*');        
        $this->db->from('exam_enroll as ee');
        $this->db->join('subjects as s', 's.course_id = ee.course_id', 'left');        
        $this->db->where('ee.trainee_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }




  function delete_examinee($id) {
        $this->db->where('id',$id);
        $this->db->delete('exam_enroll');
    }





//================================ Institute ==============================================================


public function  subjects_result($id) {
        $this->db->select('s.*, u.id as uid,s.id as id');        
        $this->db->from('users as u');
        $this->db->where('u.trainee_id', $id);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = u.trainee_id', 'left');
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('subjects as s', 's.course_id = ce.course_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    


public function  trainee_information($id)
 {
        $this->db->select('t.*, ee.roll as roll, ee.course_id as course_id, c.title as title, ce.duration as duration, s.site_name as institute,u.id as uid');        
        $this->db->from('users as u');
        $this->db->where('u.trainee_id', $id);
        $this->db->join('trainee as t', 't.regi = u.trainee_id', 'left');
        $this->db->join('course_enroll as ce', 'ce.trainee_id = u.trainee_id', 'left');
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = u.trainee_id', 'left');
        $this->db->join('settings as s', 's.code = ee.code', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function  resul($trainee_id,$exam)
 {     
        $this->db->select('r.*');  
        $this->db->from('users as u');
        $this->db->where('u.trainee_id', $trainee_id);        
        $this->db->join('result as r', 'r.uid = u.id', 'left');
        $this->db->where('r.exm_id', $exam);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }








public function  exam_mark($id)
 {
        $this->db->select('*');        
        $this->db->from('exam_marks');
        $this->db->where('trainee_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



}