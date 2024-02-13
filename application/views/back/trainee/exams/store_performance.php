<?php
$data = array();
$data['user_id'] = $this->session->userdata('id');
$trainee_id = $this->session->userdata('trainee_id');
$data['wpm'] = $_GET['wpm'];
$data['correct'] = $_GET['correct'];
$data['incorrect'] = $_GET['incorrect'];
$data['keystrokes'] = $_GET['keystrokes'];
$data['accuracy'] = $_GET['accuracy'];
$this->Institute_model->typing($data);
if($_GET['wpm'] > 30 ) {
	$adata['typing'] = 30;
}else {
	$adata['typing'] = $_GET['wpm'];
}
$this->Institute_model->typinge($trainee_id,$adata);

//$query = "select user_id from users where lower(user_name)= '". strtolower($_SESSION['name']) . "'";
//$result = $this->db->run_query($query);

//$row = mysqli_fetch_array($result);
// $user_id = 1;

// $query = "insert into ranking (user_id , wpm , correct , incorrect , keystrokes , accuracy) values ('$user_id' , '$wpm' , '$correct' , '$incorrect' , '$keystrokes' , '$accuracy')";
// $result = $this->db->run_query($query);

?>