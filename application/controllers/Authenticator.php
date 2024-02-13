<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticator extends CI_Controller {

    function __construct() {
        parent::__construct();  
        $this->load->model('Authenticator_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);        
        $this->load->library('bdbulk');
        $this->load->library('phpqrcode/qrlib');
        $dom = "$_SERVER[HTTP_HOST]";
        //$this->check();
        $sdata = array();
        $check_domain = $this->Home_model->check_domain($dom);
        $dom_exp = strtotime($check_domain->dom_exp_date);  
        $date_today = strtotime(date('d-m-Y'));
        if($check_domain != NULL) {
            // $sdata['icode'] = $check_domain->code;  
        }
        $this->session->set_userdata($sdata);  
     // echo $dom .'<br>' ;
     // echo $this->session->userdata('uid').'<br>';
        //  echo $this->session->userdata('tempuid').'<br/>';
     // echo $this->session->userdata('icode');

        $sys = $this->Authenticator_model->sys_info();
        $this->data = array(
            'aff_commission' => $sys->aff_commission,
            'aff_fee' => $sys->aff_fee
        );
        
    }

    public function index()
    {
        $data = array();
        $data['menu'] = "";
        $data['title'] = "Login Page";
        $data['private'] = $this->load->view('back/login',$data,true);
       // $this->check();  
        $this->load->view('back/login',$data);
        $this->session->unset_userdata('message');
        $this->session->unset_userdata('exception');
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
  
function tnx_avalibility()  
      {  
           
                if($this->Authenticator_model->is_tnx_available($_POST["tnx"]))  
                {  
                     echo '<label class="text-danger"> Already Exist</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success">Available</label>';  
                }  
           }  
  
 function branch_register() { 
            $data = array();
            $data['role'] = 'branch';
            $data['name'] = $this->input->post('director', true);
            $data['email'] = $this->input->post('email', true);
            $data['mobile'] = $this->input->post('mobile', true);            
            $pass = $this->generate_password();
            $data['password'] = $pass;
            $email = $this->input->post('email', true);
            $mobile = $this->input->post('mobile', true);
            $check = $this->Authenticator_model->checkuser($email);
            $checkm = $this->Authenticator_model->checkuserm($mobile);
            if ($check == NULL ) {
                if ($checkm == NULL) {
                    $insertId = $this->Authenticator_model->register_info($data);
                    $sdata = array();               
                    $sdata['tempuid'] = $insertId ;
                    $this->session->set_userdata($sdata); 
                    date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');

                    $id = $insertId;
                    $result = $this->Authenticator_model->check_id($id);
                    $password = $data['password'];
                    $name = $result->name;
                    $role = $result->role;
                    $emailTo = $result->email;  
                    $this->signupemail($emailTo,$password, $name, $role);

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
                    $idata['lang'] = 'english';
                    $idata['theme'] = 'branch';
                    $idata['date'] = date('d-m-Y h:i:sA');
                    $idata['domain'] = 'https://'.$this->input->post('domain', true).'/';
                    $dcode = $this->input->post('district', true);
                    $district = $this->Home_model->district($dcode);
                    foreach ($this->Home_model->last_ins($dcode) as $key => $last_id) { };
                    if (isset($last_id)) {
                        $co = $last_id->sl + 1;
                    }else {
                        $co = 1;
                    }
                    $code = $district->dcode.str_pad($co,3,"0",STR_PAD_LEFT);
                    $idata['sl'] = $co;
                    $idata['code'] = $code;
                    if($this->input->post('refferal', true) != NULL ) {
                        $idata['refferal'] = $this->input->post('refferal', true);
                    }
                    $idata['status'] = '';
                    $id = $this->Institute_model->ins_regi($idata);

                    //======= QR Code Generator ===================================             
                    $this->appqrcodeGenerator($id);
                    //========= Update User Institute ================
                    $udata['code'] = $code;
                    $udata['email2'] = $code;
                    $this->Institute_model->ins_update($insertId,$udata);
                    //=============== Payment Added =======================
                    $adata['code'] =  $code;                       
                    $adata['for'] = 'Institute Registration';
                    $adata['amount'] = $this->data['aff_fee'];
                    $adata['date'] = date('d-m-Y');
                    $adata['status'] = '';
                    $payment_id = $this->Institute_model->feead($adata);
                    $regi = array(
                       array(
                          'course_id' => '1' ,
                          'code' => $code,
                          'payment_id' => '0' ,
                          'course_fee' => '3500',
                          'fee' => '350',
                          'status' => 'Approved'
                       ),
                       array(
                          'course_id' => '2',
                          'code' => $code,
                          'payment_id' => '0',
                          'course_fee' => '3500',
                          'fee' => '350',
                          'status' => 'Approved'
                       )
                    );
                    $this->db->insert_batch('center_course_enroll', $regi);
                    //============ Refferal info & Commission add ======================= 
                    // if($this->input->post('refferal', true) != NULL ) {
                    //     $r = array();
                    //     $r['code'] = $this->input->post('refferal', true);
                    //     $r['amount'] = $this->data['aff_commission'];
                    //     $r['date'] = date('d-m-Y');
                    //     $r['type'] = 'refferal';
                    //     $r['remarks'] = $code;
                    //     $this->db->insert('wallet',$r);
                    // }
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
      // show_error($this->email->print_debugger());
      // echo "Email Not Send";
    }
    else 
    {
      //  echo " Email has been send !";
    } 
}

function email_text($subject, $emailTo, $password) {
    return '<tr> <td>' . $subject  .' </td></tr>
            <p> Your login email is : ' . $emailTo  .' </p>  
            <p> Your given password is : ' . $password  .' </p>  
            <p> <a href="'.base_url().'/login" </p> 
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
        $phone = $this->input->post('mobile'); 
        $message = 'Your OTP for Tawfika IT Foundation signup is : '. $OTP;
        $this->bdbulk->sendSMS($phone,$message);
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
        $sdata = array();
        $data['verify'] = 'Ok';
        $this->session->set_userdata($data);
        $data['title'] = 'Loging Page';
        $data['site'] = $this->Authenticator_model->site();
        $this->load->view('back/verfiy', $data);
    }



    public function verify_otp()
    {
        if ($this->session->userdata('verify')== 'Ok') {
            $this->session->unset_userdata('verify');       
            $userotp = $this->input->post('otp', true );
            $uid = $this->session->userdata('tempuid');
            $otpc = $this->Authenticator_model->checkOTP($uid);
            if ($otpc) {
                if ($otpc->otp == $userotp ) {
                    $result = $this->Authenticator_model->check_id($this->session->userdata('tempuid'));
                    $data = array();
                    $sdata['name'] = $result->name;
                    $sdata['mobile'] = $result->mobile;
                    $sdata['email'] = $result->email;
                    $sdata['usertype'] = $result->role;
                    $sdata['icode'] = $result->code;
                    $sdata['id'] = $result->id;
                    $sdata['userfile'] = $result->userfile;
                    $this->session->set_userdata($sdata);

                    $otp =  $this->session->userdata('user_otp');
                    $this->Authenticator_model->otpUpdate($otp);      
                    $this->session->unset_userdata('tempuid');
                    $this->session->unset_userdata('user_otp');
                    
                    $phone= $result->mobile;
                    $message = 'Your user id :'.$result->code.', Password : '.$result->password.' : Tawfika IT Foundation';
                    $this->bdbulk->sendSMS($phone,$message);

                    $id =  $result->id;        
                    $this->Authenticator_model->userVerification($id); 
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
        $numbers = "123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        $data = array();
        $data['otp'] = $otp;
        $data['uid'] = $this->session->userdata('tempuid');
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
            $sdata['trainee_id'] = $result->trainee_id;
            $sdata['email'] = $result->email;
            $sdata['mobile'] = $result->mobile;
            $sdata['usertype'] = $result->role;
            $sdata['userfile'] = $result->userfile;
            $this->session->set_userdata($sdata);

            date_default_timezone_set('Asia/Dhaka'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['browser'] = $_SERVER['HTTP_USER_AGENT'];
            $data['code'] = $sdata['icode'];
            $data['userid'] =  $sdata['id'];
            $this->db->insert('login_history',$data);
          
            $name = $result->name;
            $role = $result->role;
            $time = $now; 
            $emailTo = $result->email;  
          //  $this->loginmail($emailTo, $name, $time );
           
            $this->thanks();         
        } 

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
       // echo " Email has been send !";
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
                $_template .= '<th style="background-color:green; color:white;"> Certificate Managment System.</th>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td>{content}</td>';
            $_template .= '</tr>';
            $_template .= '<tr>';
                $_template .= '<td style="text-align: center"> Certificate Managment System.  <br> Cell : +8801713576258 <br> Copyright : 2021 </td>';
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
    $url = $check_domain->domain;
    $base_domain = base_url();
   // $domain = preg_replace( "#^[^:/.]*[:/]+#i", "", $base_domain);
   // echo $base_domain;
   // echo '<br>'. $url;
    if ($url != $base_domain ) {
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





    public function forget()
    {
        $data = array();
        $data['menu'] = "";
        $data['title'] = "Login Page";
        $data['private'] = $this->load->view('back/login',$data,true);
       // $this->check();  
        $this->load->view('back/forget',$data);
        $this->session->unset_userdata('message');
        $this->session->unset_userdata('exception');
    }

    public function resset_password()
    {
        $user = $this->input->post('username');
        $check_user = $this->Authenticator_model->check_user($user);
        if ($check_user != NULL) {
            $pass = $this->generate_password();
            $id = $check_user->id;
            $data['password'] = $pass;
            $this->Authenticator_model->change_password($id,$data);
            $message = 'Your temp password is : '. $pass. ' : Tawfika IT Foundation';
            $phone = $check_user->mobile;
            $this->bdbulk->sendSMS($phone,$message);

            $sdata['message'] = 'A message has been sent to your registered mobile number';
            $this->session->set_userdata($sdata);

            redirect('login');
        } else {
            $sdata['exception'] = '<p style="color: red;" > Userid or email doesnot matched !</p>';
            $this->session->set_userdata($sdata);
            redirect('authenticator/forget');
        }
    }



    private function generate_password(int $length = 8)
    {
        $otp = "";
        $numbers = "123456789ABCSEFGHJKLMNOPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        };
        return $otp;
    }






    public function appqrcodeGenerator($id)
    {       
        $qrtext = 'tif.org.bd/centerdetails/'.$id;
        if(isset($qrtext))
        {
            //file path for store images
            $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/images/';
            $text = $qrtext;
            $text1= substr($text, 0,9);         
            $folder = $SERVERFILEPATH;
            $file_name1 = $text1.rand(2,200).".png";
            $file_name = $folder.$file_name1;
            QRcode::png($text,$file_name);
            $qdata['qr'] = $file_name1;
            //===== Update QR info =============            
            $this->Authenticator_model->update_qr_info($id,$qdata);
        }
        else
        {
            echo 'No Text Entered';
        }   
    }











//Logout Session 
    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('trainee_id');  
        $this->session->unset_userdata('email');  
        $this->session->unset_userdata('mobile');  
        $this->session->unset_userdata('usertype');  

        $sdata = array();
        $sdata['message'] = 'Your are successfully logout !';
        $this->session->set_userdata($sdata);
        redirect('login');
    }




}

