<?php
require_once 'db.php';

$erros = array();
$data = array();

$email = $_POST['email'];
$recaptcha = $_POST['g-recaptcha-response'];
// $age = $_POST['age'];

if(empty($email)) {
	$errors['email'] = 'Please enter your email';
}
if(empty($_POST['age'])) {
	$errors['age'] = 'Confirm age';
}
if(empty($recaptcha)) {
	$errors['recaptcha'] = 'empty_recaptcha';
}
// if errors exist ======================
if(!empty($errors)) {
	$data['errors'] = $errors;
	$data['success'] = false;
}
// if no errors exist ===================
else {

	$data['message'] = 'test';

}
echo json_encode($data);