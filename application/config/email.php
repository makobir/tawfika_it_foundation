<?php defined('BASEPATH') OR exit('No direct script access allowed');

//SMTP configuration



/*



$config = array(

    'protocol' => 'ssmtp', // 'mail', 'sendmail', or 'smtp'

    'smtp_host' => 'ssl://ssmtp.googlemail.com',

    'smtp_port' => 587,

    'smtp_user' => 'edupoint.com.bd@gmail.com',

    'smtp_pass' => 'Mrboss@05Sherpur',

    'smtp_crypto' => 'security', //can be 'ssl' or 'tls' for example

    'mailtype' => 'html', //plaintext 'text' mails or 'html'

    'smtp_timeout' => '4', //in seconds

    'smtp_secure' => 'tls', //in seconds

    'charset' => 'iso-8859-1',

    'newline' => '\r\n',

    'wordwrap' => TRUE

);



*/





 $config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://mail.tawfika.edu.bd',
    'smtp_port' => 465,
    'smtp_user' => 'info@tawfika.edu.bd',
    'smtp_pass' => 'Tti@123456T',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
); 

