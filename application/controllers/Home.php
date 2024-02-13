<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Authenticator_model');
        $this->load->model('Institute_model');
        $this->load->model('Exam_model');
  		$this->load->library('phpqrcode/qrlib');        
  		$this->load->library('bdbulk');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

 		// Specialy coded for load single web 
        $dom = "$_SERVER[HTTP_HOST]";
        //$dom = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $sdata = array();
       
        $check_domain = $this->Home_model->check_domain($dom);
        $dom_exp = strtotime($check_domain->dom_exp_date);  
        $date_today = strtotime(date('d-m-Y'));
        if($check_domain != NULL) {
            if($dom_exp > $date_today) {
             $sdata['icode'] = $check_domain->code;
            }
            else {
                 $sdata['icode'] = 99999;
            }
            $school_id = $check_domain->code;
        }
        $this->session->set_userdata($sdata);  

       // echo $dom;
       // echo $this->session->userdata('icode');


   		$id = $this->session->userdata('icode');
        $site = $this->Home_model->site($id);
        $this->data = array(
            'theme' => $site->theme,
            'language' => $site->lang,
            'userfile' => $site->userfile,
            'address' => $site->address,
            'mobile' => $site->mobile,
            'email' => $site->email,
            'fb' => $site->fb,
           // 'url' => $site->url,
            'domain' => $site->domain,
            'site' => $site->site_name,
            'unique' => $site->unique
        );
        $this->lang->load('language',$this->data['language']);      

    }

	public function index()
	{
		$data = array();

		$data['menu'] = "Home";
		$data['title'] = "Home";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/home',$data,true);	
		$this->load->view('public'.'/'.$this->data['theme'].'/index',$data);
	}


	public function about()
	{
		$data = array();
		$data['menu'] = "Home";
		$data['title'] = 'About Us';
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/about',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function directors()
	{
		$data = array();
		$data['menu'] = "About Us";
		$data['title'] = "About";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/directors',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function mission()
	{
		$data = array();
		$data['menu'] = "About Us";
		$data['title'] = "Mission";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/mission',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function team()
	{
		$data = array();
		$data['menu'] = "About Us";
		$data['title'] = "Team";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/team',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function vision()
	{
		$data = array();
		$data['menu'] = "About Us";
		$data['title'] = "vision";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/vision',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function allcourse()
	{
		$data = array();
		$data['menu'] = "Courses";
		$data['title'] = "All Courses";
		$data['course'] = $this->Home_model->allcourses();
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/courses',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function months($duration)
	{
		$data = array();
		$data['menu'] = "Courses";
		$data['title'] = "All Courses";
		$data['course'] = $this->Home_model->courses($duration);
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/courses',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function course_details($id)
	{
		$data = array();
		$data['menu'] = "Courses";
		$data['title'] = "Course Details";
		$data['course'] = $this->Home_model->course_details($id);
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/course_details',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	

	public function registration()
	{
		$data = array();
		$data['menu'] = "Centers";
		$data['title'] = "Branch Registration";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/register',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function notice()
	{
		$data = array();
		$data['menu'] = "Notice";
		$data['title'] = "Notice Board";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/notice',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function notice_detail($id)
	{
		$data = array();
		$data['menu'] = "Notice";
		$data['title'] = "Notice Details";
		$data['notice'] = $this->Home_model->notice_details($id);
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/notice_detail',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	
	public function events()
	{
		$data = array();
		$data['menu'] = "Events";
		$data['title'] = "Events";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/event',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function event_detail()
	{
		$data = array();
		$data['menu'] = "Event";
		$data['title'] = "Event Details";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/event_detail',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function all_gallery ()
	{
		$data = array();
		$data['menu'] = "Gallery";
		$data['title'] = "Gallery Details";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/all_gallery',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function news()
	{
		$data = array();
		$data['menu'] = "News";
		$data['title'] = "News";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/news',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function news_detail()
	{
		$data = array();
		$data['menu'] = "News";
		$data['title'] = "News";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/news_detail',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	
	public function founder_detail()
	{
		$data = array();
		$data['menu'] = "Founder Detail";
		$data['title'] = "Founder Detail";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/founder',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	
	public function gallery()
	{
		$data = array();
		$data['menu'] = "Gallery";
		$data['title'] = "Gallery";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/gallery',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	
	public function gallery_detail()
	{
		$data = array();
		$data['menu'] = "Gallery";
		$data['title'] = "All Images";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/gallery_detail',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function all_centers_details()
	{
		$data = array();
		$data['menu'] = "Gallery";
		$data['title'] = "All Center";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/all_centers_details',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}
    public function verify_center()
	{
		$data = array();
		$data['menu'] = "Centers";
		$data['title'] = "Verify Center";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/verify_center',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}
	
	function check_center() {
	    $id = $this->input->post('code');
	    redirect('centerdetails/'.$id);
	}
	
	
	
	
	public function centerdetails($id)
	{
		$data = array();
		$data['menu'] = "Centers";
		$data['title'] = "Verify Center";
		$data['center'] = $this->Home_model->site($id);
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/center_details',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}

	public function contact()
	{
		$data = array();
		$data['menu'] = "Contact";
		$data['title'] = "Contact info";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/contact',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}
	
	
	public function login()
	{
		$data = array();
		$data['menu'] = "Login";
		$data['title'] = "Login info";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/login',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}
    public function register() 
	{
		$data = array();
		$data['menu'] = "Register";
		$data['title'] = "Register info";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/register',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}
	public function all_centers()
	{
		$data = array();
		$data['menu'] = "Centers";
		$data['title'] = "All Centers";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/all_centers',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}

		public function admission()
	{
		$data = array();
		$data['menu'] = "Admission";
		$data['title'] = "Admission";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/admission',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}

	public function result()
	{
		$data = array();
		$data['menu'] = "Result";
		$data['title'] = "Result";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/result',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}	
	
	function result_check() {
	    $regi = $this->input->post('regi');
	    redirect('result/'.$regi);
	}
	
	public function result_info($id)
	{
		$data = array();
		$data['menu'] = "Result";
		$data['title'] = "Result";
		$data['subject_result'] = $this->Exam_model->subjects_result($id);
		$data['trainee'] = $this->Exam_model->trainee_information($id);
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/result_details',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}
	
	public function regi($id)
	{
		$data = array();
		$data['menu'] = "Result";
		$data['title'] = "Result";
		$data['trainee'] = $this->Home_model->trainee_info($id);
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/regi',$data,true);	
		$this->load->view('public/'.$this->data['theme'].'/index',$data);
	}

	public function donation()
	{
		$data = array();
		$data['menu'] = "Donation";
		$data['title'] = "Donation";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/donation',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function blood_donors()
	{
		$data = array();
		$data['menu'] = "Blood Donation";
		$data['title'] = "Blood Donors";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/blood_donors',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}
	public function donor_registration()
	{
		$data = array();
		$data['menu'] = "Blood Donation";
		$data['title'] = "Donor Registration";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/donor_registration',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}

	public function donor_info()
	{
		$data = array();
		$data['name'] = $this->input->post('name');
		$data['mobile'] = $this->input->post('mobile');
		$data['group'] = $this->input->post('group');
		$data['email'] = $this->input->post('email');
		$data['division'] = $this->input->post('division');
		$data['district'] = $this->input->post('district');
		$data['upazila'] = $this->input->post('upazila');
		$data['address'] = $this->input->post('address');
		$this->db->insert('blood_donors',$data);				
		$sdata['mobile'] = $this->input->post('mobile'); 
		$this->session->set_userdata($sdata);
		//======== Send OTP ============== 
        $this->send_otp_sms();
        redirect('home/verify');
	}


public function send_otp_sms()
    {
        $otp = $this->generate_otp();
        $_SESSION['user_otp'] = $otp;
        $OTP = $otp ;
        $emailTo = $this->input->post('email');  
       // $this->sendotp($emailTo, $OTP );
        $phone = $this->input->post('mobile'); 
        $message = 'Congratulations! Your verification code for Blood Donor Registration is : '. $OTP.' Tawfika IT Foundation';
        $this->bdbulk->sendSMS($phone,$message);
       }

    private function generate_otp(int $length = 4)
    {
        $otp = "";
        $numbers = "123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        $data = array();
        $data['otp'] = $otp;
        $data['uid'] = $this->input->post('mobile');
        $this->Authenticator_model->saveOTP($data);
        $_SESSION['user_otp'] = $otp;
        return $otp;
    }

	public function verify()
	{
		$data = array();
		$data['menu'] = "Blood Donation";
		$data['title'] = "Registration Verify";
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/verify',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}


	public function verify_otp()
	{
		$data = array();
		$otp = $this->input->post('otp');		
		$mobile = $this->session->userdata('mobile');
		$check = $this->Home_model->check_otp($otp,$mobile);
		if ($check != NULL) {
			$data['status'] = 'Approved';
			$this->Home_model->update_donor($mobile,$data);
			redirect('home/blood_donors');
		}else {		
			$sdata['message'] = 'Verification Code Does not matched';
			$this->session->set_userdata($sdata);
        	redirect('home/verify');
    	}
	}

	public function page($page)
	{
		$data = array();
		$data['page'] = $this->Home_model->page_info($page);
		$page = $this->Home_model->page_info($page);
		$data['menu'] = "About";
		$data['title'] = $page->title;		
		$data['public'] = $this->load->view('public'.'/'.$this->data['theme'].'/pages/page',$data,true);	
		$this->load->view('public/'.'/'.$this->data['theme'].'/index',$data);
	}













    function fetch_district()
    {
      $division = $this->input->post('division');

      if($division)
      {
       echo $this->Home_model->fetch_district($division);
      }
    }

    function fetch_upazila()
    {
      $district = $this->input->post('district');

      if($district)
      {
       echo $this->Home_model->fetch_upazila($district);
      }
    }

    function fetch_union()
    {
      $upazila = $this->input->post('upazila');

      if($upazila)
      {
       echo $this->Home_model->fetch_union($upazila);
      }
    }

    function fetch_village()
    {
      $union = $this->input->post('union');

      if($union)
      {
       echo $this->Home_model->fetch_village($union);
      }
    }

    function fetch_post()
    {
      $union = $this->input->post('union');

      if($union)
      {
       echo $this->Home_model->fetch_post($union);
      }
    }








//==================================== QR ===============================================

public function appqrcodeGenerator ($id)
	{
		
		$qrtext =$this->data['url'].'/home/application_status/'.$id;
		
		if(isset($qrtext))
		{
			//file path for store images
		    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/images/';
		   
			$text = $qrtext;
			$text1= substr($text, 0,9);
			
			$folder = $SERVERFILEPATH;
			$file_name1 = $text1.$this->data['unique']. rand(2,200) . ".png";
			$file_name = $folder.$file_name1;
			QRcode::png($text,$file_name);

			$qdata['qr'] = $file_name1;
			//===== Update QR info =============			
			$this->Home_model->update_service_application_submission($id,$qdata);
			
			// echo"<center><img width='300px' src=".'http://localhost/cms/images/'.$file_name1."></center";
		}
		else
		{
			echo 'No Text Entered';
		}	
	}


	public function cqrcodeGenerator ($id)
	{
		
		$qrtext =$this->data['url'].'/home/citizen_form_print/'.$id;
		
		if(isset($qrtext))
		{
			//file path for store images
		    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/images/';
		   
			$text = $qrtext;
			$text1= substr($text, 0,9);
			
			$folder = $SERVERFILEPATH;
			$file_name1 = $text1.$this->data['unique']. rand(2,200) . ".png";
			$file_name = $folder.$file_name1;
			QRcode::png($text,$file_name);


			$qdata['qr'] = $file_name1;
			//===== Update QR info =============			
			$this->Home_model->update_citizen_qr($id,$qdata);
			
			// echo"<center><img width='300px' src=".'http://localhost/cms/images/'.$file_name1."></center";
		}
		else
		{
			echo 'No Text Entered';
		}	
	}


}
