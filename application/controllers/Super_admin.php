<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Wallet_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);
        $this->load->model('Question_model', '', TRUE);
        $this->load->library('bdbulk');
        $admin_id = $this->session->userdata('id');
        $usertype = $this->session->userdata('usertype');
        if ($admin_id == NULL and $usertype != 'super_admin' ) {
            redirect('authenticator', 'refresh');
        }
        if ($usertype != 'super_admin' ) {
            redirect('authenticator/thanks', 'refresh');
        }
        $site = $this->Authenticator_model->site();
        $this->data = array(
            'exam_controller' => $site->exam_controller,
            'ex_ctrl_status' => $site->ex_ctrl_status,
            'chairman' => $site->chairman,
            'chairman_status' => $site->chairman_status
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

    public function ins_approval()
    {
        $data = array();
        $data['menu'] = "Institute Management";
        $data['title'] = "Approval";
        $data['private'] = $this->load->view('back/institute_management/approval',$data,true);  
        $this->load->view('back/index',$data);
    }

    public function centerdetails($id)
    {
        $data = array();
        $data['menu'] = "Institute Management";
        $data['title'] = "Center Details";
        $data['details'] = $this->Super_admin_model->centerdetails($id);
        $data['payment'] = $this->Super_admin_model->paymentdetails($id);
        $data['private'] = $this->load->view('back/institute_management/approval',$data,true);  
        $this->load->view('back/index',$data);
    }

    public function edit_center($id)
    {
        $data = array();
        $data['menu'] = "Institute Management";
        $data['title'] = "Edit Center";
        $data['details'] = $this->Super_admin_model->centerdetails($id);
        $data['payment'] = $this->Super_admin_model->paymentdetails($id);
        $data['private'] = $this->load->view('back/institute_management/approval',$data,true);  
        $this->load->view('back/index',$data);
    }

    public function update_aff_fee()
    {
        $data = array();
        $data['amount'] = $this->input->post('aff_fee');
        $id = $this->input->post('code');
        $this->db->where('code', $id);
        $this->db->where('for', 'Institute Registration');
        $this->db->update('payments',$data);
        $this->db->where('code', $id);
        $this->db->update('payment_tnx',$data);
        
        $sdata = array();
        $sdata['message'] = 'Affiliation Fee  has been Updated !';
        $this->session->set_userdata($sdata); 
        redirect('super_admin/edit_center/'.$id);
    
    }    

    public function update_refferal_code()
    {
        $data = array();
        $data['refferal'] = $this->input->post('refferal');
        $id = $this->input->post('code');
        $this->db->where('code', $id);
        $this->db->update('settings',$data);
        
        $sdata = array();
        $sdata['message'] = 'Refferal Code has been Updated !';
        $this->session->set_userdata($sdata); 
        redirect('super_admin/edit_center/'.$id);
    
    }
    public function delete_institute($id)
    {
        $this->db->where('code',$id);
        $this->db->delete('settings');  
        $this->db->where('code',$id);
        $this->db->delete('users'); 
        $this->db->where('code',$id);
        $this->db->delete('center_course_enroll');
        $sdata['message']= 'Institute Has been deleted !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/ins_approval');
    }

    public function allcenter()
    {
        $data = array();
        $data['menu'] = "Institute Management";
        $data['title'] = "All Centers";
        $data['private'] = $this->load->view('back/institute_management/approval',$data,true);  
        $this->load->view('back/index',$data);
    }

    public function approve_now()
    {
        $data = array();
        $data['status'] = 'Approved';
        $data['approved_date'] = date('d-m-Y h:i:sA');
        $data['payment_id'] = $this->input->post('payment_id');
        $id = $this->input->post('id');
        $data['remarks'] = $this->input->post('remarks');
        $this->Super_admin_model->approve_now($id,$data);
        
        $sdata = array();
        $sdata['message'] = 'Institute has been Approved !';
        $this->session->set_userdata($sdata);

        $collect_pass = $this->Authenticator_model->collect_pass($id);

        $center = $this->Super_admin_model->center($id);
        $phone = $center->mobile; 
        $message = 'Congratulations! '.$center->director.', Now your are Honorable member of Tawfika IT Foundation. Your user ID: '.$center->code.', Password: '.$collect_pass->password.' Please Visit https://tif.org.bd/login to login. Thanks of being with us.';
        $this->bdbulk->sendSMS($phone,$message);
        redirect('super_admin/allcenter');
    
    }


    public function terminate($id)
    {
        $data = array();
        $data['status'] = 'Terminated';
        $this->Super_admin_model->approve_now($id,$data);
        
        $sdata = array();
        $sdata['message'] = 'Institute has been Terminate !';
        $this->session->set_userdata($sdata);

        $center = $this->Super_admin_model->center($id);
        $phone = $center->mobile; 
        $message = 'Sorry! Your Institute has been Terminated : Tawfika IT Foundation.';
        $this->bdbulk->sendSMS($phone,$message);
        redirect('super_admin/terminatedcenter');
    
    }

    public function terminatedcenter()
    {
        $data = array();
        $data['menu'] = "Institute Management";
        $data['title'] = "Terminated Centers";
        $data['private'] = $this->load->view('back/institute_management/approval',$data,true);  
        $this->load->view('back/index',$data);
    }

    public function activecenter($id)
    {
        $data = array();
        $data['status'] = 'Approved';
        $this->Super_admin_model->approve_now($id,$data);
        
        $sdata = array();
        $sdata['message'] = 'Institute has been Reactivated !';
        $this->session->set_userdata($sdata);

        $center = $this->Super_admin_model->center($id);
        $phone = $center->mobile; 
        $message = 'Your Institute has been reactivated : Tawfika IT Foundation.';
        $this->bdbulk->sendSMS($phone,$message);
        redirect('super_admin/allcenter');
    
    }


//====================== Institue Management Ends ===================================================




//======================== Batch Management Start ================================================



    public function batch()
    {
        $data = array();
        $data['menu'] = "Batch Management";
        $data['title'] = "Batch";
        $data['private'] = $this->load->view('back/batch/batch',$data,true);    
        $this->load->view('back/index',$data);
    }



    public function new_batch()
    {
        $data = array();
        $data['title'] = $id;
        $data['session_start'] = $this->input->post('start');
        $data['session_end'] = $this->input->post('end');
        $this->Super_admin_model->save_batch($data);

        $sdata = array();
        $sdata['message'] = 'New batch created!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/batch');
    
    }

    public function active_batch($id)
    {
        $data = array();
        $data['status'] = '';
        $this->Super_admin_model->null_batch($data);
        $adata['status'] = 'Active';
        $sdata = array();
        $sdata['message'] = 'Batch '. $id .' Activated !';
        $this->session->set_userdata($sdata);

        $this->Super_admin_model->active_batch($id,$adata);
        redirect('super_admin/batch');
    
    }

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
        $data['private'] = $this->load->view('back/course/course',$data,true);  
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
            redirect('super_admin/course');
        }
        else {
            echo 'Invalid Image';
        }
    }

    function update_course(){
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
        }
        
        $id = $this->input->post('id');
        $data['ccode'] = $this->input->post('ccode');
        $data['title'] = $this->input->post('title');
        $data['duration'] = $this->input->post('duration');
        $data['course_fee'] = $this->input->post('course_fee');
        $data['fee'] = $this->input->post('certificate_fee');
        $data['short'] = $this->input->post('short');
        $data['details'] = $this->input->post('details');
        $this->Super_admin_model->update_course($id,$data);

        //message show after successfully saved data to database
        $sdata = array();
        $sdata['message'] = 'Course ( '. $data['title'] .' ) Updated';
        $this->session->set_userdata($sdata);
        redirect('super_admin/course');
    }








    public function edit_course($id)
    {
        $data = array();
        $data['menu'] = "Course Management";
        $data['title'] = "Edit Course";
        $data['course'] = $this->Super_admin_model->courseby($id);
        $data['private'] = $this->load->view('back/course/course',$data,true);  
        $this->load->view('back/index',$data);
    }


    public function delete_course($id) { 
        $this->db->where('id',$id);
        $this->db->delete('course');
        redirect('super_admin/course');
    }


    public function subject()
    {

        $data = array();
        $data['menu'] = "Course Management";
        $data['title'] = "Subject";
        $data['private'] = $this->load->view('back/course/subject',$data,true); 
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
            redirect('super_admin/subject');
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

            redirect('super_admin/subject');
            //echo 'Invalid Image';
        }
    }


    public function delete_subject($id) { 
        $this->db->where('id',$id);
        $this->db->delete('subjects');
        redirect('super_admin/subject');
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
        $data['private'] = $this->load->view('back/exam/add_question', $data, true);
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
        redirect('super_admin/add_question');
    }

  function print_question() {
        $data = array();
        $data['menu'] = 'Exam Management';
        $data['title'] = 'Print Question';
        $exm_id = $this->session->userdata('exam');
        $data['exm_id'] = $exm_id;
        $data['total_question'] = $this->Super_admin_model->total_question($exm_id);
        $data['limit'] = $this->Super_admin_model->exm($exm_id);
        $data['private'] = $this->load->view('back/exam/questions', $data, true);
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
        $data['private'] = $this->load->view('back/exam/questions', $data, true);
        $this->load->view('back/index', $data);
    }


    function edit_question($id)
    {
        $data = array();
        $data['menu'] = 'Exam';
        $data['title'] = 'Edit Question';
        $data['question'] = $this->Super_admin_model->select_question_by_id($id);
        $data['answers'] = $this->Super_admin_model->select_answers_by_question($id);
        $data['private'] = $this->load->view('back/exam/edit_question', $data, true);
        $this->load->view('back/index', $data);
    }

    function update_question($id)
    {
        $data = array();
        $data['content'] = $this->input->post('question', true);
        $insertId = $this->Super_admin_model->update_question($data, $id);
        
        $xmid =  $this->input->post('xmid', true);
        $content = $this->input->post('content[]');
        $correct = $this->input->post('correct[]');
        $aid = $this->input->post('aid[]');
        $value = array();
        for($i = 0; $i < count($content); $i++) {
            $value[$i] = array (
                'id' => $aid[$i],
                'content' => $content[$i],
                'correct' => $correct[$i],
                'question_id' => $id
            );
        }
        $this->Super_admin_model->update_answer($value);
        $sdata['massage'] = 'Question Updated !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/questions/'.$xmid);
    }  


function deleteQuestion($id) 
{
    $this->db->where('id',$id);
    $this->db->delete('question');
    $this->delete_answer($id);
    redirect('super_admin/goque/');

}
public function delete_answer($id)
{    
    $this->db->where('question_id',$id);
    $this->db->delete('answer');
}




//======================== Question Management Ends ================================================

//======================== User Management Starts ================================================

    public function users()
    {

        $data = array();
        $data['menu'] = "User Manager";
        $data['title'] = "Users";
        $data['private'] = $this->load->view('back/pages/users',$data,true);    
        $this->load->view('back/index',$data);
    }

//======================== User Management Ends ================================================



//======================== Accounts Management Starts ================================================


    public function credit()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Credit";
        $data['private'] = $this->load->view('back/accounts/credit',$data,true);    
        $this->load->view('back/index',$data);
    }

    public function addactnx()
    {
        $data = array();
        if($this->input->post('type') == 'credit') {
            $data['credit'] = $this->input->post('amount');
        }if ($this->input->post('type')== 'debit') {
            $data['debit'] = $this->input->post('amount');// code...
        }
        $data['remarks'] = $this->input->post('remarks');
        $data['date'] = date('d-m-Y');
        $this->Super_admin_model->addactnx($data);



        if($this->input->post('type') == 'credit') {
            redirect('super_admin/credit');
        }if ($this->input->post('type')== 'debit') {
            redirect('super_admin/debit');
        }
        
    
    }


    public function total_earnings()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Total Earnings";
        $data['private'] = $this->load->view('back/accounts/total_earnings',$data,true);    
        $this->load->view('back/index',$data);
    }


    public function total_expanse()
    {
        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Total Expanse";
        $data['private'] = $this->load->view('back/accounts/total_expanse',$data,true);    
        $this->load->view('back/index',$data);
    }







    public function debit()
    {

        $data = array();
        $data['menu'] = "Accounts";
        $data['title'] = "Debit";
        $data['private'] = $this->load->view('back/accounts/debit',$data,true); 
        $this->load->view('back/index',$data);
    }


//======================== Accounts Management Ends ================================================






//====================== Notice Management <> =============================================================



    public function new_notice()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "New Notice";
        $data['private'] = $this->load->view('back/announcement/notice',$data,true);    
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
        
        redirect('super_admin/all_notice');
    }


    public function all_notice()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "All Notice";
        $data['private'] = $this->load->view('back/announcement/notice',$data,true);    
        $this->load->view('back/index',$data);
    }

    public function new_circular()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "Admission Circular";
        $data['private'] = $this->load->view('back/announcement/admission_circular',$data,true);    
        $this->load->view('back/index',$data);
    }


    public function admission_circular() {
        $data = array();
        $data['code']  = $this->session->userdata('icode');
        $data['title']  = $this->input->post('title');
        $data['short'] = $this->input->post('short');                        
        $data['details'] = $this->input->post('details');                        
        $this->Institute_model->admission_circular($data);   
        
        redirect('super_admin/all_circular');
    }


    public function all_circular()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "All Circular";
        $data['private'] = $this->load->view('back/announcement/admission_circular',$data,true);    
        $this->load->view('back/index',$data);
    }


    public function new_event()
    {
        $data = array();
        $data['menu'] = "Announcement";
        $data['title'] = "New Event";
        $data['private'] = $this->load->view('back/announcement/event',$data,true); 
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
        
        redirect('super_admin/new_event');
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
//====================== SMS Management <> =============================================================

    public function send_sms()
    {
       
        $data = array();
        $data['menu'] = "SMS";
        $data['title'] = "Send SMS";
        $data['private'] = $this->load->view('back/sms/send_sms',$data,true);   
        $this->load->view('back/index',$data);
    }

    public function sms()
    {
        $phone = $this->input->post('phone');
        $message = $this->input->post('message');   
        $this->bdbulk->sendSMS($phone,$message);
        $sdata = "Messege has been Sent!";
        $this->session->set_userdata($sdata);

        $data['code'] = $this->session->userdata('icode');
        $data['message'] = $message;
        $data['numbers'] = $phone;
        $total = strlen($phone)/12;
        if(is_float($total) == 1) {
            $data['total'] = round($total) + 1; 
        }else {
            $data['total'] = round($total); 
        }   

        $me = strlen($message);
        if($this->input->post('lang') == 'English'){
            $me = mb_strlen($message, 'UTF8');
            if($me <= 160) {
                $to = 1;
            }if($me <= 320) {
                $to = 2;
            }if($me <= 480) {
                $to = 3;            
            }if($me <= 640 ) {
                $to = 4;
            } 
            $data['total_sms'] = $data['total']*$to;    
        } else {
            $me = mb_strlen($message, 'UTF8');
            if($me >= 1) {
                $to = 1;
            }if($me >= 71) {
                $to = 2;
            }if($me >= 141) {
                $to = 3;
            }if($me >= 211) {
                $to = 4;
            }if($me >= 281) {
                $to = 5;
            }   if($me >= 351) {
                $to = 6;
            } 
            $data['total_sms'] = $data['total']*$to;             
            
        }

        $this->db->insert('sms',$data);
    
        $sdata = "Messege has been Sent!";
        $this->session->set_userdata($sdata);
        redirect('super_admin/send_sms');
    }





//====================== SMS Management </> =============================================================



    public function profile_settings()
    {
        $data = array();
        $data['menu'] = "Settings";
        $data['title'] = "Site Settings";
        $data['private'] = $this->load->view('back/pages/site_settings',$data,true);    
        $this->load->view('back/index',$data);
    }
    

    public function system_settings()
    {
        $data = array();
        $data['menu'] = "Settings";
        $data['title'] = "Site Settings";
        $data['private'] = $this->load->view('back/pages/site_settings',$data,true);    
        $this->load->view('back/index',$data);
    }
    



    function update_basic(){
        $data= array();
        $id = $this->input->post('id');
        $data['site_name'] = $this->input->post('site_name');
        $data['tagline'] = $this->input->post('tagline');
        $data['aff_fee'] = $this->input->post('aff_fee');
        $data['aff_commission'] = $this->input->post('aff_commission');
        $this->Super_admin_model->save_settings($id,$data);
        $sdata = array();
        $sdata['message'] = "You are Successfully Updated";
        $this->session->set_userdata($sdata);

        redirect('super_admin/system_settings');
        
    }

    function updated_contact_info(){
        $data= array();
        $id = $this->input->post('id');
        $data['address'] = $this->input->post('address');
        $data['email'] = $this->input->post('email');
        $data['mobile'] = $this->input->post('mobile');
        $this->Super_admin_model->save_settings($id,$data);
        $sdata = array();
        $sdata['message'] = "You are Successfully Updated";
        $this->session->set_userdata($sdata);

        redirect('super_admin/system_settings');
        
    }


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
                redirect('super_admin/system_settings');
                
            }
            else {

                $sdata = array();
               $sdata['exception'] = '<p style="color: red;" > Password already used </p>';
                $this->session->set_userdata($sdata);
                redirect('super_admin/system_settings'); 
                
            }  
         } else {
                $sdata = array();
                $sdata['exception'] = '<p style="color: red;" > Old Password doesnot matched!</p>';
                $this->session->set_userdata($sdata);
                redirect('super_admin/system_settings'); 
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
            redirect('super_admin/system_settings');
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
            $sdata['message'] = 'Signature Updated!';
            $this->session->set_userdata($sdata);
            redirect('super_admin/system_settings');
        }
        else {
            echo 'Invalid Image';
        }
    }

    function update_chairman(){
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
        if ($this->upload->do_upload('userfile2')) {
            $fileUpload = $this->upload->data();
            $isUpload = TRUE;
        }
        if ($isUpload) {

            $data = array();
            $data['chairman'] = $fileUpload['file_name'];
            $this->Super_admin_model->save_settings($id,$data);

            //message show after successfully saved data to database
            $sdata = array();
            $sdata['chairman'] =$fileUpload['file_name'];
            $sdata['message'] = 'Signature Updated!';
            $this->session->set_userdata($sdata);
            redirect('super_admin/system_settings');
        }
        else {
            echo 'Invalid Image';
        }
    }


public function ex_ctrl_status_disable() {
    $code = $this->session->userdata('icode'); 
    $data['ex_ctrl_status'] = 'Deactive'; 
    $this->db->where('code',$code);
    $this->db->update('settings',$data);

    $sdata['message'] = 'Exam Controller Sign Deactivated!';
    $this->session->set_userdata($sdata);
    redirect('super_admin/system_settings');
}
public function ex_ctrl_status_enable() {
    $code = $this->session->userdata('icode'); 
    $data['ex_ctrl_status'] = 'Active'; 
    $this->db->where('code',$code);
    $this->db->update('settings',$data);

    $sdata['message'] = 'Exam Controller Sign Activated!';
    $this->session->set_userdata($sdata);
    redirect('super_admin/system_settings');
}
public function chairman_status_disable() {
    $code = $this->session->userdata('icode'); 
    $data['chairman_status'] = 'Deactive'; 
    $this->db->where('code',$code);
    $this->db->update('settings',$data);

    $sdata['message'] = 'Chairman Sign Deactivated!';
    $this->session->set_userdata($sdata);
    redirect('super_admin/system_settings');
}
public function chairman_status_enable() {
    $code = $this->session->userdata('icode'); 
    $data['chairman_status'] = 'Active'; 
    $this->db->where('code',$code);
    $this->db->update('settings',$data);

    $sdata['message'] = 'Chairman Sign Activated!';
    $this->session->set_userdata($sdata);
    redirect('super_admin/system_settings');
}
//==================== Gallery Starts ===========================================

    public function create_gallery()
    {
        $data = array();
        $data['menu'] = "Gallery";
        $data['title'] = "Create Gallery";
        $data['private'] = $this->load->view('back/gallery/create_gallery',$data,true); 
        $this->load->view('back/index',$data);
    }
    
    public function gallery_groups_info()
    {
        $data = array();
        $data['code'] = $this->session->userdata('icode');
        $data['title'] = $this->input->post("title");
        $this->Super_admin_model->gallery_groups_info($data); 
        redirect('super_admin/create_gallery');
    }

    public function gallery_photo()
    {
        $data = array();
        $data['menu'] = "Gallery";
        $data['title'] = "Gallery Photos";
        $data['private'] = $this->load->view('back/gallery/gallery_photo',$data,true);  
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
            redirect('super_admin/gallery_photo');
        }
        else {
            echo 'Invalid Image';
        }
    }

//==================== Gallery Ends ===========================================






public function backup($value='')
{
    //load helpers

$this->load->helper('file');
$this->load->helper('download');
$this->load->library('zip');

//load database
$this->load->dbutil();

//create format
$db_format=array('format'=>'zip','filename'=>'backup.sql');

$backup= $this->dbutil->backup($db_format);

// file name

$dbname='backup-on-'.date('d-m-y H:i').'.zip';
$save='assets/db_backup/'.$dbname;

// write file

write_file($save,$backup);

// and force download
force_download($dbname,$backup);

}


    public function download($fileName = NULL) {   
       if ($fileName) {
        $file = realpath ( "download" ) . "\\" . $fileName;
        // check file exists    
        if (file_exists ( $file )) {
         // get file content
         $data = file_get_contents ( $file );
         //force download
         force_download ( $fileName, $data );
        } else {
         // Redirect to base url
         redirect ( base_url ('super_admin/myList') );
        }
       }
      }











}


