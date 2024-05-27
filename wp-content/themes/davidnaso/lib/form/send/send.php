<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-includes/wp-db.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-includes/post.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-includes/class-phpmailer.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/wp-includes/class-smtp.php');
	
	date_default_timezone_set('Europe/Stockholm');


	$smtp_server_address 		= get_field('smtp_server_address','options');
	$smtp_server_secure 		= get_field('smtp_server_secure','options');
	$smtp_server_port 			= get_field('smtp_server_port','options');
	$smtp_server_username 		= get_field('smtp_server_username','options');
	$smtp_server_password 		= get_field('smtp_server_password','options');
	$smtp_server_from_email_address 	= get_field('smtp_server_from_email_address','options');

	/**
	* Måste anges så vi kan använda ACF's get_field-funktion.
	*/
	$post = get_post($_POST['post_id'], OBJECT);
	setup_postdata($post);

	if(isset($_POST['email_retype']) && !empty($_POST['email_retype'])){
		header("Location: http://spam.abuse.net/");
		exit; 
	}

	$sendFromName 	= $_POST['name'];
	$sendFromEmail 	= $_POST['email'];
	$subject 		= 'Message from your website';

$msg = ('<b>' . "
Email Address: 	" . '</b>'. $_POST['email'] . '<br>' . '<b>' . "
Message:
" . '</b>' . $_POST['message'] . '<br>' . '<b>' . "
Message was sent from: ". '</b>'. get_permalink($_POST['post_id']) . "
");

	$mail             = new PHPMailer();
	$body             = $msg;
	//$body             = preg_match("[\]",'',$body);

	// $mail->SMTPDebug = 2;
	$mail->SMTPAuth = true;
	$mail->IsSMTP();
	$mail->Username = $smtp_server_username;
	$mail->Password = $smtp_server_password;
	$mail->Host       = $smtp_server_address;
	$mail->Port       = $smtp_server_port;
	$mail->SMTPSecure = $smtp_server_secure;


	$mail->SetFrom($smtp_server_from_email_address, $sendFromName);
	$mail->AddReplyTo($sendFromEmail, $sendFromName);
	$mail->Subject    = $subject;

	$mail->ContentType = 'text/plain';
	$mail->IsHTML(true);
	$mail->Body       = $body; 
	$mail->WordWrap   = 50; // set word wrap
	$mail->CharSet    = 'UTF-8';
	
	$form_recipient_repeater = get_field('form_recipient_repeater',$_POST['post_id']);

	foreach($form_recipient_repeater AS $k => $r){
		$mail->AddAddress($r['email_address'], $r['name']);
	}


	if(!$mail->Send()){
		$response = array(
			'status' 	=> 'fail',
			'error' 	=> $mail->ErrorInfo 
		);
	}else{
		$response = array(
			'status' => 'ok',
		);
	}
	echo(json_encode($response));
?>