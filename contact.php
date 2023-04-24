<?php
if(!empty($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

    $sql = "INSERT INTO contact WHERE name='$name', email='$email', subject='$subject' AND message='$message'";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($sql, $subject, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
}
require_once "contact-view.php";
?>