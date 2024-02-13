<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institute_model extends CI_Model {


    public function check_payment_notification() {
        $id = $this->session->userdata('icode');
        $date = date('d-m-Y');
        $this->db->select('*');
        $this->db->from('next_payment_date');
        $this->db->where('date', date('d-m-Y',strtotime("tomorrow".$date)));
        $this->db->where('send','');
        $this->db->where('code',$id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }    


    public function session() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('session');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function trainee() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    public function edit_trainee($id) {
        $this->db->select('t.*, ce.*');
        $this->db->from('trainee as t');
        $this->db->where('regi',$id);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


    public function last_student($year,$session) {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('course_enroll');
        $this->db->where('code',$id);
        $this->db->where('year',$year);
        $this->db->where('session_id',$session);
        $this->db->order_by('sl','DESC');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }    

    public function total_student($year,$session) {
        $id = $this->session->userdata('icode');
        $this->db->from('course_enroll');
        $this->db->where('code',$id);
        $this->db->where('year',$year);
        $this->db->where('session_id',$session);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }    

    public function total_photo($id) {
        $iid = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('gallery_photos');
       // $this->db->where('code',$iid);
        $this->db->where('group_id',$id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }    

    public function education($id) {
        $iid = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('education');
        $this->db->where('trainee_id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

 public function ins_regi($idata)
    {
        $id = $this->db->insert('settings',$idata);        
        return $id?$this->db->insert_id():false;
    }


 function ins_update($insertId,$udata){
        $this->db->select('*');
        $this->db->where('id',$insertId);
        $this->db->update('users',$udata);
        
    }

    public function allcourses() {
        $this->db->select('*');
        $this->db->from('course');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function courses() {
        $id = $this->session->userdata('icode');
        $this->db->select('c.*');
        $this->db->from('center_course_enroll as cce');
        $this->db->where('cce.code',$id);
        $this->db->where('cce.status','Approved');
        $this->db->join('course as c', 'c.id = cce.course_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function enrolled_course($id) {
        $cid = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('center_course_enroll');
        $this->db->where('course_id',$id);
        $this->db->where('code',$cid);
        $this->db->where('status','Approved');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }







    public function my_courses() {
        $id = $this->session->userdata('icode');
        $this->db->select('c.*,cce.id as id');
        $this->db->from('center_course_enroll as cce');
        $this->db->where('cce.code',$id);
        $this->db->where('cce.status','Approved');
        $this->db->join('course as c', 'c.id = cce.course_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }  
    public function batch() {
        $this->db->select('*');
        $this->db->from('batch');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


 public function trainee_info($data)
    {
        $id = $this->db->insert('trainee',$data);        
        return $id?$this->db->insert_id():false;
    }



 public function user_signup($user)
    {
        $id = $this->db->insert('users',$user);        
        return $id?$this->db->insert_id():false;
    }

 public function course_enroll($enroll)
    {
        $id = $this->db->insert('course_enroll',$enroll);        
        return $id?$this->db->insert_id():false;
    }

 public function course_registration_info($regi)
    {
        $id = $this->db->insert('center_course_enroll',$regi);        
        return $id?$this->db->insert_id():false;
    }
 public function update_course_registration_info($id,$regi)
    {   
        $this->db->where('id',$id);
        $this->db->update('center_course_enroll',$regi);        
     
    }


  function update_qr_info($regi,$qdata){
        $this->db->select('*');
        $this->db->where('regi',$regi);
        $this->db->update('trainee',$qdata);
        
    }


    public function all_trainee($year="", $session="",$course="") {
        $id = $this->session->userdata('icode');
        $this->db->select('t.*,c.title as course,b.title as batch, ee.roll as roll,ce.year,s.session');
        $this->db->from('trainee as t');
        $this->db->where('t.code',$id);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left'); 
        if($year != NULL ) {            
            $this->db->where('ce.year',$year);
        }  
        if($session != NULL ) {            
            $this->db->where('ce.session_id',$session);
        }  
        if($course != NULL ) {            
            $this->db->where('ce.course_id',$course);
        }
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('batch as b', 'b.id = ce.batch_id', 'left');
        $this->db->join('session as s', 's.scode = ce.session_id', 'left');
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = t.regi', 'left'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function single_trainee($id) {
        $this->db->select('t.*,c.title as course,b.title as batch, ee.roll as roll,ce.year,s.session');
        $this->db->from('trainee as t');
        $this->db->where('t.regi',$id);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left');       
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('batch as b', 'b.id = ce.batch_id', 'left');
        $this->db->join('session as s', 's.scode = ce.session_id', 'left');
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = t.regi', 'left'); 
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


    public function all_trainee_attendance($year, $session,$course) {
        $id = $this->session->userdata('icode');
        $this->db->select('t.*,c.title as course,b.title as batch, ee.roll as roll,ce.year,s.session');
        $this->db->from('trainee as t');
        $this->db->where('t.code',$id);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left');            
        $this->db->where('ce.year',$year);              
        $this->db->where('ce.session_id',$session);            
        $this->db->where('ce.course_id',$course);
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('batch as b', 'b.id = ce.batch_id', 'left');
        $this->db->join('session as s', 's.scode = ce.session_id', 'left');
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = t.regi', 'left'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function bteb_trainee() {
        $id = $this->session->userdata('icode');
        $this->db->select('bs.*,t.*,c.title as course,b.title as batch, ee.roll as roll,bs.result as result');
        $this->db->from('bteb_students as bs');
        $this->db->where('bs.code',$id);
        $this->db->join('trainee as t', 't.regi = bs.trainee_id', 'left');
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left'); 
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('batch as b', 'b.id = ce.batch_id', 'left');
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = t.regi', 'left'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    public function result_check($id) {
        $this->db->select('*');
        $this->db->from('bteb_students');
        $this->db->where('trainee_id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


    public function last_regi() {
        $id = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee');
        $this->db->where('code',$id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    public function formfillup($course='',$session='',$year=""){
        $code = $this->session->userdata('icode');
        $this->db->select('t.*,c.*, b.title as batch,t.userfile as trainee,ee.id as eeid,s.scode');
        $this->db->from('trainee as t');
        $this->db->where('t.code', $code);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left'); 
        $this->db->join('session as s', 's.scode = ce.session_id', 'left'); 
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = t.regi', 'left'); 
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        if ($course != NULL) {        
            $this->db->where('c.id', $course);
        }  
        $this->db->join('batch as b', 'b.id = ce.batch_id', 'left'); 
        if ($session != NULL) {        
            $this->db->where('ce.session_id', $session);
        }  if ($year != NULL) {        
            $this->db->where('ce.year', $year);
        }   
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


function formfillupnow($value){
        $this->db->insert_batch('exam_enroll',$value);        
    }

function trainee_attendance_save($value){
        $result = $this->db->update_batch('trainee_attendances',$value,'trainee_id'); 
        $result = $this->db->trans_complete(); 
        return $result;    
    }

function update_attendance($value,$month,$year){
        $this->db->where('month',$month);
        $this->db->where('year',$year);
        $this->db->update('trainee_attendances',$value,'trainee_id');
        //return $id?$this->db->affected_rows():false;
        
    }


function feeadd($data){
        $id = $this->db->insert('payments',$data);
        return $id?$this->db->insert_id():false;
        
    }


function feead($adata){
        $id = $this->db->insert('payments',$adata);
        return $id?$this->db->insert_id():false;
        
    }

function typing($data){
        $id = $this->db->insert('ranking',$data);
        return $id?$this->db->insert_id():false;
        
    }


function typinge($trainee_id,$adata){
        $this->db->where('trainee_id',$trainee_id);
        $this->db->update('exam_marks',$adata);       
    }


    public function month_check($month) {        
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('trainee_attendances');
        $this->db->where('code',$code);
        $this->db->where('month',$month);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function course($course_id) {        
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('center_course_enroll');
        $this->db->where('code',$code);
        $this->db->where('course_id',$course_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function formfilluped($course='',$year='',$session='',$month=''){
        $code = $this->session->userdata('icode');
        $this->db->select('t.*,c.*, b.title as batch,t.userfile as trainee,ee.id as eeid, ee.roll as roll');        
        $this->db->from('exam_enroll as ee'); 
        $this->db->join('trainee as t', 't.regi = ee.trainee_id', 'left');
        $this->db->where('t.code', $code);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left'); 
        if ($course != NULL) {        
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



   public function dues() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('code',$code);
        $this->db->where('status','');
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


   public function treaineepaid() {
        $id = $this->session->userdata('trainee_id');
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('trainee_id',$id);
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function treaineefee() {
        $id = $this->session->userdata('trainee_id');
        $this->db->select('*');
        $this->db->from('course_enroll');
        $this->db->where('trainee_id',$id);
        $this->db->select_sum('course_fee');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function paid($id) {
        $this->db->select('*');
        $this->db->from('trainee_payment');
        $this->db->where('trainee_id',$id);
        $this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function fee($id) {
        $this->db->select('*');
        $this->db->from('course_enroll');
        $this->db->where('trainee_id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


   public function alldues() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('code',$code);
        $this->db->where('status','');
        //$this->db->select_sum('amount');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    public function sessions($sid) {
        $this->db->select('*');
        $this->db->from('session');
        $this->db->where('scode',$sid);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function last_roll($sid,$year) {
       // $year = date('Y');
        $this->db->select('*');
        $this->db->from('exam_enroll');
        $this->db->where('session_id',$sid);
        $this->db->where('year',$year);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function exam_enroll_check($id) {
       // $year = date('Y');
        $this->db->select('*');
        $this->db->from('exam_enroll');
        $this->db->where('trainee_id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }





    public function marksentry($trainee_id,$data)
    {
        $this->db->select('*');
        $this->db->where('trainee_id',$trainee_id);
        $this->db->update('exam_marks',$data);
    }


    public function exammarks($ddata)
    {
        $this->db->insert_batch('exam_marks',$ddata);
    }

function admitted_students($id) {
    $code = $this->session->userdata('icode');
    $this->db->from('course_enroll');
    $this->db->where('code',$code);
    $this->db->where('course_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

function exam_enrolled($id) {
    $code = $this->session->userdata('icode');
    $this->db->from('exam_enroll');
    $this->db->where('code',$code);
    $this->db->where('course_id',$id);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }



function total_trainee() {
    $code = $this->session->userdata('icode');
    $this->db->from('trainee');
    $this->db->where('code',$code);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }


function exam_enroll() {
    $code = $this->session->userdata('icode');
    $this->db->from('exam_enroll');
    $this->db->where('code',$code);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }

function exam_passed() {
    $code = $this->session->userdata('icode');
    $this->db->from('exam_marks as em');
    $this->db->join('exam_enroll as ee', 'ee.trainee_id = em.trainee_id', 'left');
    $this->db->where('ee.code',$code);
   // $this->db->where('mcq' > 1);
    $query_result = $this->db->get();
    $result = $query_result->num_rows();
    return $result;
  }


public function  cinfo($id)
 {
        $this->db->select('*');        
        $this->db->from('center_course_enroll');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



//=================== Student Details section  ================================
public function  courseinfo($id)
 {
        $this->db->select('c.*,ce.*, ce.course_fee as course, ce.sl as ceid, ce.duration as duration');        
        $this->db->from('course_enroll as ce');
        $this->db->where('ce.trainee_id', $id);
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

public function payment($id)
 {
        $this->db->select('sp.*,');        
        $this->db->from('trainee_payment as sp');
        $this->db->where('sp.trainee_id', $id);
        $this->db->select_sum('sp.amount');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

  function add_course_fee($id,$data){
        $this->db->select('*');
        $this->db->where('sl',$id);
        $this->db->update('course_enroll',$data);
        
    }


  function course_fee_payment($data){
        $this->db->insert('trainee_payment',$data);
        
    }













    public function certificate_info($id) {
        $this->db->select('*');
        $this->db->from('applications');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



  function approve_application($id,$data){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->update('applications',$data);
        
    }

  function update_trade($sdata){
        $this->db->insert('trade_info',$sdata);
        
    }

 function tradeno() {
        $this->db->from('trade_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

  function issued($data){
        $this->db->insert('certificate',$data);
        
    }

  function publish_notice($data){
        $this->db->insert('notice',$data);
        
    }
  function update_notice($id,$data){
        $this->db->where('id',$id);
        $this->db->update('notice',$data);
        
    }

    public function all_notice() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('code',$code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function notice_details($id) {
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


     public function all_events() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('code',$code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

   function admission_circular($data){
        $this->db->insert('admission_circular',$data);
    }    

    function publish_event($data){
        $this->db->insert('events',$data);
    }

    public function all_circular() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('admission_circular');
        $this->db->where('code',$code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


   public function sms_count() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('sms');
        $this->db->where('code',$code);
        $this->db->select_sum('total');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function all_sent_sms() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('sms');
        $this->db->where('code',$code);
        $this->db->order_by('id','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
   public function sms_balance() {
        $code = $this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('sms_balance');
        $this->db->where('code',$code);
        $this->db->select_sum('total');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
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