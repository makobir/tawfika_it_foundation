<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trade_licence extends CI_Controller {

    function __construct() {
        parent::__construct();        
        $this->load->model('Trade_licence_model', '', TRUE);
        $admin_id = $this->session->userdata('id');
        if ($admin_id == NULL) {
            redirect('authenticator', 'refresh');
        }
        $site = $this->Authenticator_model->site();
        $this->data = array(
            //'theme' => $site->theme,
            //'type' => $site->type,
         //   'language' => $site->lang
        );
      //  $this->lang->load('language',$this->data['language']);


		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		//echo $this->data['now'];
    }


	public function index($id)
	{
		$data = array();
		$data['menu'] = "";
		$data['title'] = "Home";
		$data['info'] = $this->Certificates_model->application_info($id);
		$info = $this->Certificates_model->application_info($id);
		$data['private'] = $this->load->view('back/certificates/'.$info->type,$data,true);	
		$this->load->view('back/index',$data);
	}


	public function new()
	{
		$data = array();
		$data['menu'] = "Citizen";
		$data['title'] = "New Application";
		$data['private'] = $this->load->view('back/citizen/citizen',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function citizen_submission($value='')
	{
				$data = array();	
				$data['unionid'] = $this->session->userdata('code');	
				if ($this->input->post('parent') == 1) {
					$data['holding_parent'] = $this->input->post('holding_parent');
					$data['child'] = $this->input->post('child');
				}
				$data['name'] = $this->input->post('name');
				$data['fatherorhusband'] = $this->input->post('fatherorhusband');
				$data['father'] = $this->input->post('father');
				$data['mother'] = $this->input->post('mother');
				$data['division'] = $this->input->post('division');
				$data['district'] = $this->input->post('district');
				$data['upazila'] = $this->input->post('upazila');
				$data['union'] = $this->input->post('union');
				$data['village'] = $this->input->post('village');
				$data['post'] = $this->input->post('post');
				$data['home_name'] = $this->input->post('home_name');
				$data['holding'] = $this->input->post('holding');
				$data['word'] = $this->input->post('word');
				$data['nid'] = $this->input->post('nid');
				$data['bid'] = $this->input->post('bid');
				$data['dob'] = $this->input->post('dob');
				$data['mobile'] = $this->input->post('mobile');
				$data['email'] = $this->input->post('email');
				$data['status'] = 'Pending';

				$fileUpload = array();
		        $isUpload = FALSE;
		        $userFile = array(
		            'upload_path' => './upload/citizen',
		            'allowed_types' => 'jpg|png|jpeg|gif',
		            'encrypt_name' => TRUE,
		        );
		        $this->upload->initialize($userFile);
		        if ($this->upload->do_upload('userfile')) {
		            $fileUpload = $this->upload->data();
		            $isUpload = TRUE;
		        }
		        if ($isUpload) {        	
				$data['userfile'] = $fileUpload['file_name'];
		        }
				$id = $this->Home_model->citizen_application_submission($data);

				//======= QR Code Generator ===================================
				$this->cqrcodeGenerator($id);

				$id = $sid;
				$this->appqrcodeGenerator($id);
		
			redirect('citizen/citizen_certifiate/'.$id);
	
	}

public function citizen_certifiate($id)
{
	// code...
}















	public function all()
	{
		$data = array();
		$data['menu'] = "Trade Licence Manager";
		$data['title'] = "Licence List";
		$data['private'] = $this->load->view('back/trade/trade',$data,true);	
		$this->load->view('back/index',$data);
	}


public function appqrcodeGenerator ($id)
	{
		
		$qrtext =$this->data['url'].'/home/application_status/'.$id;
		
		if(isset($qrtext))
		{
			//file path for store images
		    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/cms/images/';
		   
			$text = $qrtext;
			$text1= substr($text, 0,9);
			
			$folder = $SERVERFILEPATH;
			$file_name1 = $text1."-mpuran" . rand(2,200) . ".png";
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


