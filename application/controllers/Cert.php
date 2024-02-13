<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cert extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Wallet_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);
        $this->load->model('Question_model', '', TRUE);
        $this->load->model('Courier_model', '', TRUE);
        $this->load->library('bdbulk');
        $admin_id = $this->session->userdata('id');
        $usertype = $this->session->userdata('usertype');
        if ($admin_id == NULL and $usertype != 'cert' ) {
            redirect('authenticator', 'refresh');
        }
        if ($usertype != 'cert' ) {
            redirect('authenticator/thanks', 'refresh');
        }
        $site = $this->Authenticator_model->site();
        $this->data = array(
            'exam_controller' => $site->exam_controller
            //'type' => $site->type,
         //   'language' => $site->lang
        );
      //  $this->lang->load('language',$this->data['language']);


        date_default_timezone_set("Asia/Dhaka");
        $this->data['now'] = date("d-m-Y h:i A");
        //echo $this->data['now'];
        //echo $usertype;
    }


    public function index()
    {
        $data = array();
        $data['menu'] = "";
        $data['title'] = "Home";
        $data['private'] = $this->load->view('back/pages/home',$data,true); 
        $this->load->view('back/index',$data);
    }


//====================== Institue Management Starts ===================================================

  
    public function allcenter()
    {
        $data = array();
        $data['menu'] = "Institute Management";
        $data['title'] = "All Centers";
        $data['private'] = $this->load->view('back/institute_management/approval',$data,true);  
        $this->load->view('back/index',$data);
    }

  //====================== Institue Management Ends ===================================================




//======================== Batch Management Start ================================================


    public function trainee()
    {
        $data = array();
        $data['menu'] = "Batch Management";
        $data['title'] = "Trainee";
        $data['private'] = $this->load->view('back/batch/trainee',$data,true);  
        $this->load->view('back/index',$data);
    }



//======================== Batch Management Ends ================================================




//======================== Course Management Starts ================================================


    public function course()
    {
        $data = array();
        $data['menu'] = "Course Management";
        $data['title'] = "Course";
        $data['private'] = $this->load->view('back/admin/course/course',$data,true);  
        $this->load->view('back/index',$data);
    }

    function add_course(){
        $data= array();
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/course',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp',
            'encrypt_name' => TRUE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['userfile'] = $fileUpload['file_name'];
            $data['ccode'] = $this->input->post('ccode');
            $data['title'] = $this->input->post('title');
            $data['duration'] = $this->input->post('duration');
            $data['course_fee'] = $this->input->post('course_fee');
            $data['fee'] = $this->input->post('certificate_fee');
            $data['short'] = $this->input->post('short');
            $data['details'] = $this->input->post('details');

            $this->Super_admin_model->add_course($data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['message'] = 'New Course ( '. $data['title'] .' ) Added';
            $this->session->set_userdata($sdata);
            redirect('admin/course');
        }
        else {
            echo 'Invalid Image';
        }
    }

  

    public function subject()
    {

        $data = array();
        $data['menu'] = "Course Management";
        $data['title'] = "Subject";
        $data['private'] = $this->load->view('back/admin/course/subject',$data,true); 
        $this->load->view('back/index',$data);
    }



    function add_subject(){
        $data= array();
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/subjects',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp',
            'encrypt_name' => FALSE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['userfile'] = $fileUpload['file_name'];
            $data['title'] = $this->input->post('title');
            $data['course_id'] = $this->input->post('course_id');

            $id = $this->Super_admin_model->add_subject($data);

            $edata['title'] = $this->input->post('title');
            $edata['cid'] = $id;

            $this->Super_admin_model->add_exam($edata);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['message'] = 'New Subject ( '. $data['title'] .' ) Added';
            $this->session->set_userdata($sdata);
            redirect('admin/subject');
        }
        else {

            $data = array();
           // $data['userfile'] = $fileUpload['file_name'];
            $data['scode'] = $this->input->post('scode');
            $data['title'] = $this->input->post('title');
            $data['course_id'] = $this->input->post('course_id');

            $id = $this->Super_admin_model->add_subject($data);

            $edata['title'] = $this->input->post('title');
            $edata['cid'] = $id;

            $this->Super_admin_model->add_exam($edata);

            $sdata = array();
            $sdata['message'] = 'New Subject ( '. $data['title'] .' ) Added';
            $this->session->set_userdata($sdata);

            redirect('admin/subject');
            //echo 'Invalid Image';
        }
    }


//======================== Course Management Ends ================================================



//======================== Question  Management Starts ================================================
    
    function question(){
        $this->session->unset_userdata('exam');
        $this->add_question();
    }
  function add_question() {
        $data = array();
        $data['menu'] = 'Exam Management';
        $data['title'] = 'Add Question';
        $exm_id = $this->session->userdata('exam');
        $data['exm_id'] = $exm_id;
        $data['total_question'] = $this->Super_admin_model->total_question($exm_id);
        $data['limit'] = $this->Super_admin_model->exm($exm_id);
        $data['private'] = $this->load->view('back/admin/exam/add_question', $data, true);
        $this->load->view('back/index', $data);
    }

    function add_question_info() {
        $data = array();
        $exm_id = $this->session->userdata('exam');
        if($exm_id != ''){
            $data['xmid'] = $exm_id;
        }else{
            $data['xmid'] = $this->input->post('xmid', true);
        }

        $exm_id = $data['xmid'];
        $total_question = $this->Super_admin_model->total_question($exm_id);
        $limit = $this->Super_admin_model->exm($exm_id);

        // if($total_question >= $limit->ques_limit){
        //     $sdata = array();
        //     $sdata['message'] = 'Question Limit Reached !';
        //     $this->session->set_userdata($sdata);
        // }else{

        $data['content'] = $this->input->post('question', true);

        $insertId = $this->Super_admin_model->add_question($data);

        $xmid =  $this->input->post('xmid', true);
        $content = $this->input->post('content[]');
        $correct = $this->input->post('correct[]');
        
        $value = array();
        for($i = 0; $i < count($content); $i++) {
            $value[$i] = array (
                'content' =>$content[$i],
                'correct' =>$correct[$i],
                'question_id' =>$insertId
            );
        }
        $this->Super_admin_model->answer($value);

        //message show after successfully saved data to database
        $sdata = array();
        $c_id = $this->session->userdata('category');
        $exm_id = $this->session->userdata('exam');    
        if($exm_id != ''){
            $sdata['category'] = $c_id;
            $sdata['exam'] = $exm_id;
        }else{
            $sdata['category'] = $this->input->post('cid', true);
            $sdata['exam'] = $this->input->post('xmid', true);
        }
        $sdata['message'] = 'Question Published !';
        $this->session->set_userdata($sdata);
        //}
        redirect('admin/add_question');
    }

  function print_question() {
        $data = array();
        $data['menu'] = 'Exam Management';
        $data['title'] = 'Print Question';
        $exm_id = $this->session->userdata('exam');
        $data['exm_id'] = $exm_id;
        $data['total_question'] = $this->Super_admin_model->total_question($exm_id);
        $data['limit'] = $this->Super_admin_model->exm($exm_id);
        $data['private'] = $this->load->view('back/admin/exam/questions', $data, true);
        $this->load->view('back/index', $data);
    }


    public function goque()
    {
             
        $id = $this->input->post('sub_id');       
        $this->questions($id);
    }

    function questions($id) {
        $data = array();
        $data['menu'] = 'Exam Management';
        $data['title'] = 'Print Question';
        $data['questions'] = $this->Super_admin_model->questionsby($id);
        $data['que'] = $this->Super_admin_model->questionsby($id);
       // $data['exam'] = $this->Super_admin_model->exam_details($id);
        $data['private'] = $this->load->view('back/admin/exam/questions', $data, true);
        $this->load->view('back/index', $data);
    }


  




//======================== Question Management Ends ================================================








//====================== Notice Management <> =============================================================



    public function new_notice()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "New Notice";
        $data['private'] = $this->load->view('back/admin/announcement/notice',$data,true);    
        $this->load->view('back/index',$data);
    }


    public function publish_notice() {
        $data = array();
        $data['code']  = $this->session->userdata('icode');
        $data['title']  = $this->input->post('title');
        $data['short'] = $this->input->post('short');                        
        $data['details'] = $this->input->post('details');

        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/notice',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp|pdf',
            'encrypt_name' => FALSE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {
            $type = $this->upload->data('file_ext');
            if($type == '.jpg' || $type == '.png') {
              $data['userfile'] = $fileUpload['file_name'];  
          }if($type == '.pdf') {
              $data['pdf'] = $fileUpload['file_name']; 
          }
            
        }else {
            echo 'Invalid Image';
        }


        $this->Institute_model->publish_notice($data);   
        
        redirect('admin/all_notice');
    }


    public function all_notice()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "All Notice";
        $data['private'] = $this->load->view('back/admin/announcement/notice',$data,true);    
        $this->load->view('back/index',$data);
    }

    public function new_circular()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "Admission Circular";
        $data['private'] = $this->load->view('back/admin/announcement/admission_circular',$data,true);    
        $this->load->view('back/index',$data);
    }


    public function admission_circular() {
        $data = array();
        $data['code']  = $this->session->userdata('icode');
        $data['title']  = $this->input->post('title');
        $data['short'] = $this->input->post('short');                        
        $data['details'] = $this->input->post('details');                        
        $this->Institute_model->admission_circular($data);   
        
        redirect('admin/all_circular');
    }


    public function all_circular()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "All Circular";
        $data['private'] = $this->load->view('back/admin/announcement/admission_circular',$data,true);    
        $this->load->view('back/index',$data);
    }


    public function new_event()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "New Event";
        $data['private'] = $this->load->view('back/admin/announcement/event',$data,true); 
        $this->load->view('back/index',$data);
    }


    public function publish_event() {
        $data = array();
        $data['code']  = $this->session->userdata('icode');
        $data['title']  = $this->input->post('title');
        $data['date']  = $this->input->post('date');
        $data['time']  = $this->input->post('time');
        $data['short'] = $this->input->post('short');                        
        $data['details'] = $this->input->post('details');                        
        $this->Institute_model->publish_event($data);   
        
        redirect('admin/new_event');
    }


    public function all_event()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "Publish Event";
        $data['private'] = $this->load->view('back/announcement/admission_circular',$data,true);    
        $this->load->view('back/index',$data);
    }

//====================== Notice Management </> =============================================================


    function update_password(){
        $data= array();
        $id = $this->session->userdata('id');
        $a = $this->Institute_model->password($id);
        $old = $a->password;
        $oldinput = $this->input->post('old');
        $new = $this->input->post('password');
      
        if($oldinput == $old) {
            if ($old != $new) {                    
                $id = $this->session->userdata('id');
                $data['password'] = $new;
                $this->Super_admin_model->change_password($id,$data);
                $sdata = array();
                $sdata['message'] = "Password Successfully Updated";
                $this->session->set_userdata($sdata);
                redirect('admin/system_settings');
                
            }
            else {

                $sdata = array();
               $sdata['exception'] = '<p style="color: red;" > Password already used </p>';
                $this->session->set_userdata($sdata);
                redirect('admin/system_settings'); 
                
            }  
         } else {
                $sdata = array();
                $sdata['exception'] = '<p style="color: red;" > Old Password doesnot matched!</p>';
                $this->session->set_userdata($sdata);
                redirect('admin/system_settings'); 
         } 
    }
    

 function update_logo(){
        $data= array();
        $id = $this->input->post('id');
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/logo',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp',
            'encrypt_name' => TRUE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['userfile'] = $fileUpload['file_name'];
            $this->Super_admin_model->save_settings($id,$data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['userfile'] =$fileUpload['file_name'];
            $sdata['message'] = 'Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('admin/system_settings');
        }
        else {
            echo 'Invalid Image';
        }
    }

    function update_exam_cont(){
        $data= array();
        $id = $this->input->post('id');
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/logo',
            'allowed_types' => 'jpg|png|jpeg|gif|bmp',
            'encrypt_name' => TRUE,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['exam_controller'] = $fileUpload['file_name'];
            $this->Super_admin_model->save_settings($id,$data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['exam_controller'] =$fileUpload['file_name'];
            $sdata['message'] = 'Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('admin/system_settings');
        }
        else {
            echo 'Invalid Image';
        }
    }

//==================== Gallery Starts ===========================================

    public function create_gallery()
    {
        $data = array();
        $data['menu'] = "Gallery";
        $data['title'] = "Create Gallery";
        $data['private'] = $this->load->view('back/admin/gallery/create_gallery',$data,true); 
        $this->load->view('back/index',$data);
    }
    
    public function gallery_groups_info()
    {
        $data = array();
        $data['code'] = $this->session->userdata('icode');
        $data['title'] = $this->input->post("title");
        $this->Super_admin_model->gallery_groups_info($data); 
        redirect('admin/create_gallery');
    }

    public function gallery_photo()
    {
        $data = array();
        $data['menu'] = "Gallery";
        $data['title'] = "Gallery Photos";
        $data['private'] = $this->load->view('back/admin/gallery/gallery_photo',$data,true);  
        $this->load->view('back/index',$data);
    }

    function upload_gallery_photo(){

        $data= array();
        $fileUpload = array();
        $isUpload = FALSE;
        $userFile = array(
            'upload_path' => './upload/gallery',
            'allowed_types' => 'jpg|png|jpeg|gif',
            'encrypt_name' => TRUE,   
            'max_size'    => 1000,
        );
        $this->upload->initialize($userFile);
        if ($this->upload->do_upload('userfile')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['userfile'] = $fileUpload['file_name'];
            $data['group_id'] = $this->input->post('id');
            $data['title'] = $this->input->post('title');
            $this->Super_admin_model->upload_gallery_photo($data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['userfile'] =$fileUpload['file_name'];
            $sdata['message'] = 'Image Upladed!';
            $this->session->set_userdata($sdata);
            redirect('admin/gallery_photo');
        }
        else {
            echo 'Invalid Image';
        }
    }

//==================== Gallery Ends ===========================================





//======================= Super Admin Area ======================================================
    public function send($id='')
    {
        $data = array();
        $data['menu'] = "Courier";
        $data['title'] = "Send";
        $data['id'] = $id;
        $data['documents'] = $this->Courier_model->documents($id);
        $data['private'] = $this->load->view('back/admin/courier/courier',$data,true);    
        $this->load->view('back/index',$data);
    }


    public function send_to($id)
    {
        $code = $id;
        $data = array();
        $data['code'] = $id;
        $data['name'] = $this->input->post('name');
        $data['details'] = $this->input->post('details');
        $data['status'] = 'Send';           
        $data['date'] = date('d-m-Y');          
        $id = $this->Courier_model->send($data);

        $trainee_id = $this->input->post('trainee_id[]');
        if(isset($trainee_id)) {
            $value = array();
            for($i = 0; $i < count($trainee_id); $i++) { 
                $value[$i] = array (
                    'trainee_id'    =>$trainee_id[$i],
                    'courier_id'    => $id
                ); 
            }
            $this->Courier_model->update_courier_info($value);
        }
        //================= Send Notification ======================
        $not['to'] = $code;
        $not['for'] = 'Courier';
        $not['id'] = $id;
        $this->Courier_model->notification($not);

        $id = $data['code'];
        $center = $this->Courier_model->center($id);
        $phone = $center->mobile; 
        $message = 'A courier has been sent to you. Please check for details, Tawfika IT Foundation.';
        $this->bdbulk->sendSMS($phone,$message);

    redirect('courier/send');
    
    }










}


