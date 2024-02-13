<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticator extends CI_Controller {

    function __construct() {
        parent::__construct();  

        $this->load->model('Authenticator_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);
        $dom = "$_SERVER[HTTP_HOST]";
       // $sdata = array();
       // $this->session->set_userdata($sdata);  
      
       // echo $this->session->userdata('icode');
        if ($this->session->userdata('icode') == NULL) {
            $data['icode'] = 0;
            $this->session->set_userdata($data);
        }
    }

    public function index()
    {
        $data = array();
        $data['menu'] = "";
        $data['title'] = "Login Page";
        $data['private'] = $this->load->view('back/login',$data,true);
       // $this->check();  
        $this->session->unset_userdata('message');
        $this->load->view('back/login',$data);
    }

    public function signup()
    {
        $data = array();
        $data['menu'] = "";
        $data['title'] = "Signup_page";
        $data['private'] = $this->load->view('back/login',$data,true);  
        $this->load->view('back/signup',$data);
    }

        public function thanks() {
        $data = array();
        $data['title'] = 'Welcome';
        $data['site'] = $this->Authenticator_model->setting_data();
        $this->load->view('back/thanks', $data);
    }




function check_email_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"> Invalid Email</span></label>';  
           }  
           else  
           {  
                if($this->Authenticator_model->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"> Email Available</label>';  
                }  
           }  
}  

function check_mobile_avalibility()  
      {  
           
                if($this->Authenticator_model->is_mobile_available($_POST["mobile"]))  
                {  
                     echo '<label class="text-danger"> Mobile Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"> Mobile Available</label>';  
                }  
           }  
  


    function register_info() { 

            $data = array();
            $data['role'] = 'super_admin';
            $data['name'] = $this->input->post('name', true);
            $data['email'] = $this->input->post('email', true);
            $data['mobile'] = $this->input->post('mobile', true);
            $data['password'] = $this->input->post('passward', true);

            $email = $this->input->post('email', true);
            $mobile = $this->input->post('mobile', true);
            $check = $this->Authenticator_model->checkuser($email);
            $checkm = $this->Authenticator_model->checkuserm($mobile);
            if ($check == NULL ) {
                if ($checkm == NULL) {
                    $insertId = $this->Authenticator_model->register_info($data);
                    $sdata = array();               
                    $sdata['tempcode'] = $insertId ;
                    $this->session->set_userdata($sdata); 
                    date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');

                    $id = $insertId;
                    $result = $this->Authenticator_model->check_id($id);
                    $password = $this->input->post('passward', true);
                    $name = $result->name;
                    $role = $result->role;
                    $emailTo = $result->email;  
                    $this->signupemail($emailTo, $name, $role, $password);

                    $sdata = array();
                    $sdata['message'] = 'Your Application Recieved, Please wait for activation !';
                    $this->session->set_userdata($sdata);

                    //======== Send OTP ============== 
                    $this->send_otp_sms();


                    redirect('authenticator/verify');
                }
                else {
                $sdata['message'] = 'Mobile : ' . $mobile . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/register');
                }

            }
            else {

                $sdata['message'] = 'Email : ' . $email . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/register');
            }
        
    }

    function branch_register() { 
            $data = array();
            $data['role'] = 'branch';
            $data['name'] = $this->input->post('director', true);
            $data['email'] = $this->input->post('email', true);
            $data['mobile'] = $this->input->post('mobile', true);
            $data['password'] = '12345';
            $email = $this->input->post('email', true);
            $mobile = $this->input->post('mobile', true);
            $check = $this->Authenticator_model->checkuser($email);
            $checkm = $this->Authenticator_model->checkuserm($mobile);
            if ($check == NULL ) {
                if ($checkm == NULL) {
                    $insertId = $this->Authenticator_model->register_info($data);
                    $sdata = array();               
                    $sdata['tempcode'] = $insertId ;
                    $this->session->set_userdata($sdata); 
                    date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');

                    $id = $insertId;
                    $result = $this->Authenticator_model->check_id($id);
                    $password = $data['password'];
                    $name = $result->name;
                    $role = $result->role;
                    $emailTo = $result->email;  
                    $this->signupemail($emailTo, $name, $role, $password);

                    $sdata = array();
                    $sdata['message'] = 'Your Application Recieved, Please wait for activation !';
                    $this->session->set_userdata($sdata);

                    //======== Send OTP ============== 
                    $this->send_otp_sms();
                    //========= Institute Signup ==================

                    $idata['site_name'] = $this->input->post('institute', true);
                    $idata['director'] = $this->input->post('director', true);
                    $idata['director'] = $this->input->post('director', true);
                    $idata['division'] = $this->input->post('division', true);
                    $idata['district'] = $this->input->post('district', true);
                    $idata['upazila'] = $this->input->post('upazila', true);
                    $idata['address'] = $this->input->post('address', true);
                    $idata['email'] = $this->input->post('email', true);
                    $idata['mobile'] = $this->input->post('mobile', true);
                    $idata['domain'] = 'https://'.$this->input->post('domain', true).'/';
                    $dcode = $this->input->post('district', true);
                    $district = $this->Home_model->district($dcode);
                    foreach ($this->Home_model->last_ins($dcode) as $key => $last_id) { };
                    if (isset($last_id)) {
                        $co = $last_id->sl + 1;
                    }else {
                        $co = 1;
                    }
                    $code = $district->dcode.date('y').str_pad($co,2,"0",STR_PAD_LEFT);
                    $idata['sl'] = $co;
                    $idata['code'] = $code;
                    $id = $this->Institute_model->ins_regi($idata);
                    //========= Update User Institute ================
                    $udata['code'] = $code;
                    $this->Institute_model->ins_update($insertId,$udata);
                    redirect('authenticator/verify');
                }
                else {
                $sdata['message'] = 'Mobile : ' . $mobile . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/registration');
                }

            }
            else {

                $sdata['message'] = 'Email : ' . $email . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/registration');
            }
        
    }


function signupemail($emailTo, $password, $name,  $value = '') {
    $config = array(
        'mailtype'=>"html",
    );
    $this->email->initialize($config);    
    $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
    $this->email->to($emailTo);
    $this->email->subject('Account Created successfully!');
    $subject = 'successfully signup! : '. $name ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->email_text($subject, $emailTo, $password),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }
    else 
    {
       // echo " Email has been send !";
    } 
}

function email_text($subject, $emailTo, $password) {
    return '<tr> <td>' . $subject  .' </td></tr>
            <p> Your login email is : ' . $emailTo  .' </p>  
            <p> Your given password is : ' . $password  .' </p>  
            <p> Please do not share the login information to another . </p> 
      '; 
}


public function email_template($params = array())
{
$_template = '';
$_template .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$_template .= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $_template .= '<head>';
            $_template .= '<meta http-equiv="COntenr-Type"  content="text/html; charset=utf-8"/>';
            $_template .= '<style type="text/css">';
            $_template .= 'th {text-align: center; font-size:20px; }' ;
            //$_template .= 'body,tr,td,th {text-align: left; }' ;
            $_template .= 'table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }';
            $_template .= 'td, th { border: 1px solid #dddddd; padding: 8px; }';
            $_template .= 'tr:nth-child(even) { background-color: #dddddd; }';
            $_template .= '</style>';
        $_template .= '</head>';
    $_template .= '<body>';
       // $_template .= '<h2>Telemedi Healthcare</h2>';
        $_template .= '<table>';
            $_template .= '<tr>';
                $_template .= '<th style="background-color:green; color:white;"> Tawfika IT Foundation</th>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td>{content}</td>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td style="text-align: center"> Tawfika IT Foundation <br> Cell : +8801713576258 <br> Copyright : 2021 </td>';
            $_template .= '</tr>';
        $_template .= '</table>';
    $_template .= '</body>';
$_template .= '</html>';
return $_template;
}



    public function send_otp_sms()
    {
        $otp = $this->generate_otp();
        $_SESSION['user_otp'] = $otp;
        $OTP = $otp ;
        $emailTo = $this->input->post('email');  
        $this->sendotp($emailTo, $OTP );
       }

    

    function sendotp($emailTo, $OTP, $value = '') {
        $config = array(
            'mailtype'=>"html",
        );
        $this->email->initialize($config);    
        $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
        $this->email->to($emailTo);
        $this->email->subject('Signup OTP!');
        $subject = 'Signup OTP!' ;
       // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
        $this->email->message (
            str_replace("{content}", 
            $this->sendotpmail($subject, $OTP),
            $this->email_template())
        );

        if (!$this->email->send()) 
        {
           show_error($this->email->print_debugger());
           echo "Email Not Send";
        }
        else 
        {
           // echo " Email has been send !";
        }
        }

    function sendotpmail($subject, $OTP) {
        return '<tr> <td>' . $subject  .' </td></tr>
            <p> OTP For Verification : ' . $OTP  .' </p>  
      '; 
    }




    public function verify()
    {
        $data = array();
        $data['verify'] = 'Ok';
        $this->session->set_userdata($data);
        $data['title'] = 'Loging Page';
        $data['site'] = $this->Authenticator_model->setting_data();
        $this->load->view('back/verfiy', $data);
    }



    public function verify_otp()
    {
        if ($this->session->userdata('verify') == 'Ok') {
            $this->session->unset_userdata('verify');       
            $userotp = $this->input->post('otp', true );
            $code = $this->session->userdata('tempcode');
            $otpc = $this->Authenticator_model->checkOTP($code);
            if ($otpc) {
                if ($otpc->otp == $userotp ) {
                    $result = $this->Authenticator_model->check_id($this->session->userdata('tempcode'));
                    $data = array();
                    $sdata['name'] = $result->name;
                    $sdata['mobile'] = $result->mobile;
                    $sdata['email'] = $result->email;
                    $sdata['usertype'] = $result->role;
                    $sdata['id'] = $result->id;
                    $sdata['userfile'] = $result->userfile;
                    $this->session->set_userdata($sdata);



                    $otp =  $this->session->userdata('user_otp');
                    $this->Authenticator_model->otpUpdate($otp);      
                    $this->session->unset_userdata('tempcode');
                    $this->session->unset_userdata('user_otp');
                    

                    $id =  $result->id;        
                    $this->Authenticator_model->userVerification($id); 
                    /*
                    $aff = array(
                        'referral' => $this->session->userdata('referral'),
                        'aff_status' => 'Pending'
                    );
                    $id =  $result->id;        
                   // $this->Authenticator_model->affsetup($id,$aff);

                    $signup = array(
                        'type' => $this->session->userdata('type'),
                        'referral' => $this->session->userdata('referral'),
                        'ip' => $this->session->userdata('ip'),
                        'status' => 'Pending'
                    );    
                    $this->Authenticator_model->affsignup($signup); 
                */
                 //   print_r($aff);

                   // unset($_SESSION['user_otp']);
                    $this->thanks();
                }            
                else {
                $sdata = array();
                $sdata['message'] = "This OTP is invalid Or expired!";
                $this->session->set_userdata($sdata);
                redirect('authenticator/verify');
                }
            } 
            else {
                
                $sdata = array();
                $sdata['message'] = "This OTP is invalid Or expired!";
                $this->session->set_userdata($sdata);
                redirect('authenticator/verify');
            }
        } 
        else {
            $this->session->unset_userdata('verify');
             redirect('authenticator/verify');
        }
    }



    private function generate_otp(int $length = 4)
    {
        $otp = "";
        $numbers = "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        $data = array();
        $data['otp'] = $otp;
        $data['uid'] = $this->session->userdata('tempcode');
        $this->Authenticator_model->saveOTP($data);
        $_SESSION['user_otp'] = $otp;
        return $otp;
    }




    function user_login_check() {
        //login info
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $result = $this->Authenticator_model->user_login_check_info($username, $password);

        $sdata = array();

        if ($result) {

                $sdata['name'] = $result->name;
                $sdata['id'] = $result->id;
                $sdata['icode'] = $result->code;
                $sdata['email'] = $result->email;
                $sdata['mobile'] = $result->mobile;
                $sdata['usertype'] = $result->role;
                $sdata['userfile'] = $result->userfile;
                $this->session->set_userdata($sdata);

            date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');

          
            $name = $result->name;
            $role = $result->role;
            $time = $now; 
            $emailTo = $result->email;  
          //  $this->loginmail($emailTo, $name, $time );
           
            $this->thanks();         } 


        else {
            $sdata['exception'] = '<p style="color: red;" > Your UserID or Password is invalid </p>';
            $this->session->set_userdata($sdata);
            redirect('login');
        }
    }






function loginmail($emailTo, $name, $time, $value = '') {
 
   
    $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
    $this->email->to($emailTo);
    $this->email->subject('Check Login activity!');
    $subject = 'Your Recent login info : '. $name ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->login_text($subject, $emailTo, $time),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }
    else 
    {
       // echo " Email has been send !";
    }
}

function login_text($subject, $emailTo, $time) {
    return '<tr> <td>' . $subject  .' </td></tr>
            <p> Login email is : ' . $emailTo  .' </p>  
            <p> Login date and time : ' . $time  .' </p>  
            <p> Please ignore , if the login is authentic ! . </p> 
      '; 
}







function signupemail2($emailTo, $name, $time, $role,$password, $value = '') {
    $config = array(
        'mailtype'=>"html",
    );
    $this->email->initialize($config);    
    $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
    $this->email->to($emailTo);
    $this->email->subject('Account Created successfully!');
    $subject = 'successfully signup! : '. $name ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->email_text($subject, $emailTo, $password),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }
    else 
    {
        echo " Email has been send !";
    }
}

function email_text2($subject, $emailTo, $password) {
    return '<tr> <td>' . $subject  .' </td></tr>
            <p> Your login email is : ' . $emailTo  .' </p>  
            <p> Your given password is : ' . $password  .' </p>  
            <p> Please do not share the login information to another . </p> 
      '; 
}

public function email_template2($params = array())
{
$_template = '';
$_template .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$_template .= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $_template .= '<head>';
            $_template .= '<meta http-equiv="COntenr-Type"  content="text/html; charset=utf-8"/>';
            $_template .= '<style type="text/css">';
            $_template .= 'th {text-align: center; font-size:20px; }' ;
            //$_template .= 'body,tr,td,th {text-align: left; }' ;
            $_template .= 'table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }';
            $_template .= 'td, th { border: 1px solid #dddddd; padding: 8px; }';
            $_template .= 'tr:nth-child(even) { background-color: #dddddd; }';
            $_template .= '</style>';
        $_template .= '</head>';
    $_template .= '<body>';
       // $_template .= '<h2>Telemedi Healthcare</h2>';
        $_template .= '<table>';
            $_template .= '<tr>';
                $_template .= '<th style="background-color:green; color:white;"> Tawfika IT Foundation.</th>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td>{content}</td>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td style="text-align: center"> Tawfika IT Foundation.  <br> Cell : +8801713576258 <br> Copyright : 2021 </td>';
            $_template .= '</tr>';
        $_template .= '</table>';
    $_template .= '</body>';
$_template .= '</html>';
return $_template;
}



function check() {
    $dom = "$_SERVER[HTTP_HOST]";
    $sdata = array();
    $check_domain = $this->Home_model->check_domain($dom);
    $url = $check_domain->url.'/';
    $base_domain = base_url();
    $domain = preg_replace( "#^[^:/.]*[:/]+#i", "", $base_domain);
    //echo $domain;
    //echo '<br>'. $url;
    if ($url != $domain ) {
       $this->send_admin_mail();
    }
}

public function send_admin_mail()
{

    $url = base_url();
    $time = date("l jS \of F Y h:i:s A");
    $emailTo = 'makobirbd@gmail.com';  
    $this->copymail($emailTo, $url, $time );
    
}


function copymail($emailTo, $url, $time, $value = '') {   
    $this->email->from('info@seba24.com.bd','CMS');
    $this->email->to($emailTo);
    $this->email->subject('Your Application Installed at : '. $url);
    $subject = 'Your Application Installed at : '. $url ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->copy_text($subject, $emailTo, $time),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticator extends CI_Controller {

    function __construct() {
        parent::__construct();  

        $this->load->model('Authenticator_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);
        $dom = "$_SERVER[HTTP_HOST]";
       // $sdata = array();
       // $this->session->set_userdata($sdata);  
      
       // echo $this->session->userdata('icode');
        if ($this->session->userdata('icode') == NULL) {
            $data['icode'] = 0;
            $this->session->set_userdata($data);
        }
    }

    public function index()
    {
        $data = array();
        $data['menu'] = "";
        $data['title'] = "Login Page";
        $data['private'] = $this->load->view('back/login',$data,true);
       // $this->check();  
        $this->session->unset_userdata('message');
        $this->load->view('back/login',$data);
    }

    public function signup()
    {
        $data = array();
        $data['menu'] = "";
        $data['title'] = "Signup_page";
        $data['private'] = $this->load->view('back/login',$data,true);  
        $this->load->view('back/signup',$data);
    }

        public function thanks() {
        $data = array();
        $data['title'] = 'Welcome';
        $data['site'] = $this->Authenticator_model->setting_data();
        $this->load->view('back/thanks', $data);
    }




function check_email_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"> Invalid Email</span></label>';  
           }  
           else  
           {  
                if($this->Authenticator_model->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"> Email Available</label>';  
                }  
           }  
}  

function check_mobile_avalibility()  
      {  
           
                if($this->Authenticator_model->is_mobile_available($_POST["mobile"]))  
                {  
                     echo '<label class="text-danger"> Mobile Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"> Mobile Available</label>';  
                }  
           }  
  


    function register_info() { 

            $data = array();
            $data['role'] = 'super_admin';
            $data['name'] = $this->input->post('name', true);
            $data['email'] = $this->input->post('email', true);
            $data['mobile'] = $this->input->post('mobile', true);
            $data['password'] = $this->input->post('passward', true);

            $email = $this->input->post('email', true);
            $mobile = $this->input->post('mobile', true);
            $check = $this->Authenticator_model->checkuser($email);
            $checkm = $this->Authenticator_model->checkuserm($mobile);
            if ($check == NULL ) {
                if ($checkm == NULL) {
                    $insertId = $this->Authenticator_model->register_info($data);
                    $sdata = array();               
                    $sdata['tempcode'] = $insertId ;
                    $this->session->set_userdata($sdata); 
                    date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');

                    $id = $insertId;
                    $result = $this->Authenticator_model->check_id($id);
                    $password = $this->input->post('passward', true);
                    $name = $result->name;
                    $role = $result->role;
                    $emailTo = $result->email;  
                    $this->signupemail($emailTo, $name, $role, $password);

                    $sdata = array();
                    $sdata['message'] = 'Your Application Recieved, Please wait for activation !';
                    $this->session->set_userdata($sdata);

                    //======== Send OTP ============== 
                    $this->send_otp_sms();


                    redirect('authenticator/verify');
                }
                else {
                $sdata['message'] = 'Mobile : ' . $mobile . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/register');
                }

            }
            else {

                $sdata['message'] = 'Email : ' . $email . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/register');
            }
        
    }

    function branch_register() { 
            $data = array();
            $data['role'] = 'branch';
            $data['name'] = $this->input->post('director', true);
            $data['email'] = $this->input->post('email', true);
            $data['mobile'] = $this->input->post('mobile', true);
            $data['password'] = '12345';
            $email = $this->input->post('email', true);
            $mobile = $this->input->post('mobile', true);
            $check = $this->Authenticator_model->checkuser($email);
            $checkm = $this->Authenticator_model->checkuserm($mobile);
            if ($check == NULL ) {
                if ($checkm == NULL) {
                    $insertId = $this->Authenticator_model->register_info($data);
                    $sdata = array();               
                    $sdata['tempcode'] = $insertId ;
                    $this->session->set_userdata($sdata); 
                    date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');

                    $id = $insertId;
                    $result = $this->Authenticator_model->check_id($id);
                    $password = $data['password'];
                    $name = $result->name;
                    $role = $result->role;
                    $emailTo = $result->email;  
                    $this->signupemail($emailTo, $name, $role, $password);

                    $sdata = array();
                    $sdata['message'] = 'Your Application Recieved, Please wait for activation !';
                    $this->session->set_userdata($sdata);

                    //======== Send OTP ============== 
                    $this->send_otp_sms();
                    //========= Institute Signup ==================

                    $idata['site_name'] = $this->input->post('institute', true);
                    $idata['director'] = $this->input->post('director', true);
                    $idata['director'] = $this->input->post('director', true);
                    $idata['division'] = $this->input->post('division', true);
                    $idata['district'] = $this->input->post('district', true);
                    $idata['upazila'] = $this->input->post('upazila', true);
                    $idata['address'] = $this->input->post('address', true);
                    $idata['email'] = $this->input->post('email', true);
                    $idata['mobile'] = $this->input->post('mobile', true);
                    $idata['domain'] = 'https://'.$this->input->post('domain', true).'/';
                    $dcode = $this->input->post('district', true);
                    $district = $this->Home_model->district($dcode);
                    foreach ($this->Home_model->last_ins($dcode) as $key => $last_id) { };
                    if (isset($last_id)) {
                        $co = $last_id->sl + 1;
                    }else {
                        $co = 1;
                    }
                    $code = $district->dcode.date('y').str_pad($co,2,"0",STR_PAD_LEFT);
                    $idata['sl'] = $co;
                    $idata['code'] = $code;
                    $id = $this->Institute_model->ins_regi($idata);
                    //========= Update User Institute ================
                    $udata['code'] = $code;
                    $this->Institute_model->ins_update($insertId,$udata);
                    redirect('authenticator/verify');
                }
                else {
                $sdata['message'] = 'Mobile : ' . $mobile . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/registration');
                }

            }
            else {

                $sdata['message'] = 'Email : ' . $email . ' Already Exist';
                $this->session->set_userdata($sdata);
                redirect('home/registration');
            }
        
    }


function signupemail($emailTo, $password, $name,  $value = '') {
    $config = array(
        'mailtype'=>"html",
    );
    $this->email->initialize($config);    
    $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
    $this->email->to($emailTo);
    $this->email->subject('Account Created successfully!');
    $subject = 'successfully signup! : '. $name ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->email_text($subject, $emailTo, $password),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }
    else 
    {
       // echo " Email has been send !";
    } 
}

function email_text($subject, $emailTo, $password) {
    return '<tr> <td>' . $subject  .' </td></tr>
            <p> Your login email is : ' . $emailTo  .' </p>  
            <p> Your given password is : ' . $password  .' </p>  
            <p> Please do not share the login information to another . </p> 
      '; 
}


public function email_template($params = array())
{
$_template = '';
$_template .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$_template .= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $_template .= '<head>';
            $_template .= '<meta http-equiv="COntenr-Type"  content="text/html; charset=utf-8"/>';
            $_template .= '<style type="text/css">';
            $_template .= 'th {text-align: center; font-size:20px; }' ;
            //$_template .= 'body,tr,td,th {text-align: left; }' ;
            $_template .= 'table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }';
            $_template .= 'td, th { border: 1px solid #dddddd; padding: 8px; }';
            $_template .= 'tr:nth-child(even) { background-color: #dddddd; }';
            $_template .= '</style>';
        $_template .= '</head>';
    $_template .= '<body>';
       // $_template .= '<h2>Telemedi Healthcare</h2>';
        $_template .= '<table>';
            $_template .= '<tr>';
                $_template .= '<th style="background-color:green; color:white;"> Tawfika IT Foundation</th>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td>{content}</td>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td style="text-align: center"> Tawfika IT Foundation <br> Cell : +8801713576258 <br> Copyright : 2021 </td>';
            $_template .= '</tr>';
        $_template .= '</table>';
    $_template .= '</body>';
$_template .= '</html>';
return $_template;
}



    public function send_otp_sms()
    {
        $otp = $this->generate_otp();
        $_SESSION['user_otp'] = $otp;
        $OTP = $otp ;
        $emailTo = $this->input->post('email');  
        $this->sendotp($emailTo, $OTP );
       }

    

    function sendotp($emailTo, $OTP, $value = '') {
        $config = array(
            'mailtype'=>"html",
        );
        $this->email->initialize($config);    
        $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
        $this->email->to($emailTo);
        $this->email->subject('Signup OTP!');
        $subject = 'Signup OTP!' ;
       // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
        $this->email->message (
            str_replace("{content}", 
            $this->sendotpmail($subject, $OTP),
            $this->email_template())
        );

        if (!$this->email->send()) 
        {
           show_error($this->email->print_debugger());
           echo "Email Not Send";
        }
        else 
        {
           // echo " Email has been send !";
        }
        }

    function sendotpmail($subject, $OTP) {
        return '<tr> <td>' . $subject  .' </td></tr>
            <p> OTP For Verification : ' . $OTP  .' </p>  
      '; 
    }




    public function verify()
    {
        $data = array();
        $data['verify'] = 'Ok';
        $this->session->set_userdata($data);
        $data['title'] = 'Loging Page';
        $data['site'] = $this->Authenticator_model->setting_data();
        $this->load->view('back/verfiy', $data);
    }



    public function verify_otp()
    {
        if ($this->session->userdata('verify') == 'Ok') {
            $this->session->unset_userdata('verify');       
            $userotp = $this->input->post('otp', true );
            $code = $this->session->userdata('tempcode');
            $otpc = $this->Authenticator_model->checkOTP($code);
            if ($otpc) {
                if ($otpc->otp == $userotp ) {
                    $result = $this->Authenticator_model->check_id($this->session->userdata('tempcode'));
                    $data = array();
                    $sdata['name'] = $result->name;
                    $sdata['mobile'] = $result->mobile;
                    $sdata['email'] = $result->email;
                    $sdata['usertype'] = $result->role;
                    $sdata['id'] = $result->id;
                    $sdata['userfile'] = $result->userfile;
                    $this->session->set_userdata($sdata);



                    $otp =  $this->session->userdata('user_otp');
                    $this->Authenticator_model->otpUpdate($otp);      
                    $this->session->unset_userdata('tempcode');
                    $this->session->unset_userdata('user_otp');
                    

                    $id =  $result->id;        
                    $this->Authenticator_model->userVerification($id); 
                    /*
                    $aff = array(
                        'referral' => $this->session->userdata('referral'),
                        'aff_status' => 'Pending'
                    );
                    $id =  $result->id;        
                   // $this->Authenticator_model->affsetup($id,$aff);

                    $signup = array(
                        'type' => $this->session->userdata('type'),
                        'referral' => $this->session->userdata('referral'),
                        'ip' => $this->session->userdata('ip'),
                        'status' => 'Pending'
                    );    
                    $this->Authenticator_model->affsignup($signup); 
                */
                 //   print_r($aff);

                   // unset($_SESSION['user_otp']);
                    $this->thanks();
                }            
                else {
                $sdata = array();
                $sdata['message'] = "This OTP is invalid Or expired!";
                $this->session->set_userdata($sdata);
                redirect('authenticator/verify');
                }
            } 
            else {
                
                $sdata = array();
                $sdata['message'] = "This OTP is invalid Or expired!";
                $this->session->set_userdata($sdata);
                redirect('authenticator/verify');
            }
        } 
        else {
            $this->session->unset_userdata('verify');
             redirect('authenticator/verify');
        }
    }



    private function generate_otp(int $length = 4)
    {
        $otp = "";
        $numbers = "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        $data = array();
        $data['otp'] = $otp;
        $data['uid'] = $this->session->userdata('tempcode');
        $this->Authenticator_model->saveOTP($data);
        $_SESSION['user_otp'] = $otp;
        return $otp;
    }




    function user_login_check() {
        //login info
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $result = $this->Authenticator_model->user_login_check_info($username, $password);

        $sdata = array();

        if ($result) {

                $sdata['name'] = $result->name;
                $sdata['id'] = $result->id;
                $sdata['icode'] = $result->code;
                $sdata['email'] = $result->email;
                $sdata['mobile'] = $result->mobile;
                $sdata['usertype'] = $result->role;
                $sdata['userfile'] = $result->userfile;
                $this->session->set_userdata($sdata);

            date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');

          
            $name = $result->name;
            $role = $result->role;
            $time = $now; 
            $emailTo = $result->email;  
          //  $this->loginmail($emailTo, $name, $time );
           
            $this->thanks();         } 


        else {
            $sdata['exception'] = '<p style="color: red;" > Your UserID or Password is invalid </p>';
            $this->session->set_userdata($sdata);
            redirect('login');
        }
    }






function loginmail($emailTo, $name, $time, $value = '') {
 
   
    $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
    $this->email->to($emailTo);
    $this->email->subject('Check Login activity!');
    $subject = 'Your Recent login info : '. $name ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->login_text($subject, $emailTo, $time),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }
    else 
    {
       // echo " Email has been send !";
    }
}

function login_text($subject, $emailTo, $time) {
    return '<tr> <td>' . $subject  .' </td></tr>
            <p> Login email is : ' . $emailTo  .' </p>  
            <p> Login date and time : ' . $time  .' </p>  
            <p> Please ignore , if the login is authentic ! . </p> 
      '; 
}







function signupemail2($emailTo, $name, $time, $role,$password, $value = '') {
    $config = array(
        'mailtype'=>"html",
    );
    $this->email->initialize($config);    
    $this->email->from('info@tawfika.edu.bd','Tawfika IT Foundation');
    $this->email->to($emailTo);
    $this->email->subject('Account Created successfully!');
    $subject = 'successfully signup! : '. $name ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->email_text($subject, $emailTo, $password),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }
    else 
    {
        echo " Email has been send !";
    }
}

function email_text2($subject, $emailTo, $password) {
    return '<tr> <td>' . $subject  .' </td></tr>
            <p> Your login email is : ' . $emailTo  .' </p>  
            <p> Your given password is : ' . $password  .' </p>  
            <p> Please do not share the login information to another . </p> 
      '; 
}

public function email_template2($params = array())
{
$_template = '';
$_template .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$_template .= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $_template .= '<head>';
            $_template .= '<meta http-equiv="COntenr-Type"  content="text/html; charset=utf-8"/>';
            $_template .= '<style type="text/css">';
            $_template .= 'th {text-align: center; font-size:20px; }' ;
            //$_template .= 'body,tr,td,th {text-align: left; }' ;
            $_template .= 'table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }';
            $_template .= 'td, th { border: 1px solid #dddddd; padding: 8px; }';
            $_template .= 'tr:nth-child(even) { background-color: #dddddd; }';
            $_template .= '</style>';
        $_template .= '</head>';
    $_template .= '<body>';
       // $_template .= '<h2>Telemedi Healthcare</h2>';
        $_template .= '<table>';
            $_template .= '<tr>';
                $_template .= '<th style="background-color:green; color:white;"> Tawfika IT Foundation.</th>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td>{content}</td>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td style="text-align: center"> Tawfika IT Foundation.  <br> Cell : +8801713576258 <br> Copyright : 2021 </td>';
            $_template .= '</tr>';
        $_template .= '</table>';
    $_template .= '</body>';
$_template .= '</html>';
return $_template;
}



function check() {
    $dom = "$_SERVER[HTTP_HOST]";
    $sdata = array();
    $check_domain = $this->Home_model->check_domain($dom);
    $url = $check_domain->url.'/';
    $base_domain = base_url();
    $domain = preg_replace( "#^[^:/.]*[:/]+#i", "", $base_domain);
    //echo $domain;
    //echo '<br>'. $url;
    if ($url != $domain ) {
       $this->send_admin_mail();
    }
}

public function send_admin_mail()
{

    $url = base_url();
    $time = date("l jS \of F Y h:i:s A");
    $emailTo = 'makobirbd@gmail.com';  
    $this->copymail($emailTo, $url, $time );
    
}


function copymail($emailTo, $url, $time, $value = '') {   
    $this->email->from('info@seba24.com.bd','CMS');
    $this->email->to($emailTo);
    $this->email->subject('Your Application Installed at : '. $url);
    $subject = 'Your Application Installed at : '. $url ;
   // $message = 'Welcome :' . $name . '<br> We will Contact asap!';
    $this->email->message (
        str_replace("{content}", 
        $this->copy_text($subject, $emailTo, $time),
        $this->email_template())
    );

    if (!$this->email->send()) 
    {
       show_error($this->email->print_debugger());
       echo "Email Not Send";
    }
    else 
    {
       // echo " Email has been send !";
    }
}

function copy_text($subject, $emailTo, $time) {
    return '<tr> <td>' . $subject  .' </td></tr> 
            <p> Login date and time : ' . $time  .' </p>  
            <p> Please ignore , if the login is authentic ! . </p> 
      '; 
}


//Logout Session 
    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
       // $this->session->sess_destroy();
        $sdata = array();
        $sdata['message'] = 'Your are successfully logout !';
        $this->session->set_userdata($sdata);
        redirect('login');
    }




}


    else 
    {
       // echo " Email has been send !";
    }
}

function copy_text($subject, $emailTo, $time) {
    return '<tr> <td>' . $subject  .' </td></tr> 
            <p> Login date and time : ' . $time  .' </p>  
            <p> Please ignore , if the login is authentic ! . </p> 
      '; 
}


//Logout Session 
    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
       // $this->session->sess_destroy();
        $sdata = array();
        $sdata['message'] = 'Your are successfully logout !';
        $this->session->set_userdata($sdata);
        redirect('login');
    }




}

