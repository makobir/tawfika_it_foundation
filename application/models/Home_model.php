<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
  public function __construct() {
        parent::__construct();
    }



    public function last_ins($dcode) {
        $this->db->from('settings');
        $this->db->where('district', $dcode);
       // $this->db->order_by('id','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    public function check_domain($dom) {
        $this->db->select('*');
        $this->db->from('settings');
      $this->db->like('domain', $dom);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }



    public function district($dcode) {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->like('district', $dcode);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

  public function all_notice() {
       $code=$this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('code', $code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    } 


  public function front_notice() {
        $code=$this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('code', $code);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }  


  public function blood_donors($upazila) {
        $this->db->select('*');
        $this->db->from('blood_donors');
        $this->db->where('status','Approved');
        if($upazila != NULL) {
        $this->db->where('upazila',$upazila);
        }
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }  
  public function check_otp($otp,$mobile){
        $this->db->select('*');
        $this->db->from('otp');
        $this->db->where('otp',$otp);
        $this->db->where('uid',$mobile);
        $this->db->where('status','0');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }    

    public function update_donor($mobile,$data){
        $this->db->where('mobile',$mobile);
        $this->db->update('blood_donors',$data);
    }  


    public function all_courses() {
       $code=$this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('code', $code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }  
    
    public function course_details($id) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }  
    
    
    
    public function notice_details($id){
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function event_details($id){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function all_event() {
        $code=$this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('code', $code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function all_center() {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('status', 'Approved');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    } 
    
    public function gallery_groups(){
        $code=$this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('gallery_groups');
        $this->db->where('code', $code);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }   

    public function gallery_photos($id){
        $this->db->select('*');
        $this->db->from('gallery_photos');
        $this->db->where('group_id', $id);
        $this->db->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function page_info($page){
        $code=$this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('code', $code);
        $this->db->where('page', $page);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function slider(){
        $code=$this->session->userdata('icode');
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('code', $code);
        $this->db->order_by('id','DESC');
        $this->db->limit(10);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }












































    public function site($id)  {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('code',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

   public function course($duration) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('duration',$duration);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

   public function courses($duration) {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('duration',$duration);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


   public function allcourses() {
        $this->db->select('*');
        $this->db->from('course');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }



   public function frontcourse() {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->limit(6);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }







    public function chairman_info()  {
        $code = $this->session->userdata('code');
        $this->db->select('c.*,u.*,s.name as sname,c.userfile as cuserfile,s.userfile as suserfile,uk.userfile as uuserfile,uk.name as uname');
        $this->db->from('chairman as c');        
        $this->db->where('c.code',$code);
        $this->db->join('union as u', 'u.id = c.code', 'left');  
        $this->db->join('secretary as s', 's.code = c.code', 'left');  
        $this->db->join('uddokta as uk', 'uk.code = c.code', 'left');  
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
  
//=============================== Application Saved ========================================== 

    public function citizen_application_submission($data)
    {
        $id = $this->db->insert('citizen',$data);        
        return $id?$this->db->insert_id():false;
    }


    public function service_application_submission($sdata)
    {
        $id = $this->db->insert('applications',$sdata);        
        return $id?$this->db->insert_id():false;
    }

    public function update_service_application_submission($id,$qdata)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->update('applications',$qdata);
    }


    public function update_citizen_qr($id,$qdata)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->update('citizen',$qdata);
    }
function shop_additional_info($data) {
    $this->db->insert('trade', $data);
  }
function w_additional_info($value) {
    $this->db->insert_batch('warishan', $value);
  }

  function additional_info($data) {
    $this->db->insert('applications_info', $data);
  }
    public function speech($cat){
        $code = $this->session->userdata('code');
        $this->db->select('*');
        $this->db->from('speech');
        $this->db->where('code', $code);
        $this->db->where('for', $cat);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function findid($id){
        $this->db->select('*');
        $this->db->from('citizen');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function last_ct_id() {
        $code = $this->session->userdata('code');
        $this->db->from('citizen');
        $this->db->where('unionid', $code);
       // $this->db->order_by('id','DESC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }


    public function citizen_info($id) {
        $this->db->select('*');
        $this->db->from('citizen');
      $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }


public function application_info($id)
{
    $this->db->select('c.*,c.id as cid, a.status as status,c.status as cstatus,a.id as aid,a.qr,sc.cat_name');
    $this->db->from('applications as a');
    $this->db->where('a.id', $id);
    $this->db->join('citizen as c', 'c.id = a.cid', 'left');  
    $this->db->join('service_cat as sc', 'sc.cat = a.type', 'left');  
    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;
}


public function  trainee_info($id)
 {
        $this->db->select('t.*, ee.roll as roll, c.title as title, ce.year, c.duration as duration, s.site_name as institute');        
        $this->db->from('trainee as t');
        $this->db->where('t.regi', $id);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = t.regi', 'left');
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('exam_enroll as ee', 'ee.trainee_id = t.regi', 'left');
        $this->db->join('settings as s', 's.code = ee.code', 'left');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

public function  subject_result($id)
 {
        $uid = $id;
        $this->db->select('s.*');        
        $this->db->from('users as u');
        $this->db->where('u.trainee_id', $uid);
        $this->db->join('course_enroll as ce', 'ce.trainee_id = u.trainee_id', 'left');
        $this->db->join('course as c', 'c.id = ce.course_id', 'left');
        $this->db->join('subjects as s', 's.course_id = ce.course_id', 'left');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
































public function get_divisions() {

        $this->db->select('*');
        $this->db->from('division');
      //  $this->db->order_by('division', ASC);
        return $this->db->get()->result();
    }

    function fetch_district($division)
    {
      $this->db->where('division', $division);
     // $this->db->order_by('district', ASC);
      $query = $this->db->get('district');
      $output = '<option value="">Select</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->district.'">'.$row->district.'</option>';
      }
      return $output;
    }

    function fetch_upazila($district)
    {
      $this->db->where('district', $district);
    //  $this->db->order_by('upazila', ASC);
      $query = $this->db->get('upazila');
      $output = '<option value="">Select</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->upazila.'">'.$row->upazila.'</option>';
      }
      return $output;
    }
  function fetch_union($upazila)
    {
      $this->db->where('upazila', $upazila);
    //  $this->db->order_by('union', ASC);
      $query = $this->db->get('union');
      $output = '<option value="">Select</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->union.'">'.$row->union.'</option>';
      }
      return $output;
    }

    function fetch_village($union)
    {
      $this->db->where('union', $union);
   //   $this->db->order_by('village', ASC);
      $query = $this->db->get('village');
      $output = '<option value="">Select</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->village.'">'.$row->village.'</option>';
      }
      return $output;
    }


    function fetch_post($union)
    {
      $this->db->where('union', $union);
  //    $this->db->order_by('post', ASC);
      $query = $this->db->get('post');
      $output = '<option value="">Select</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->post.'">'.$row->post.'</option>';
      }
      return $output;
    }



















}