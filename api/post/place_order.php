<?php

      // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  
    // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  
  $post->name = $data->name;
  $post->phoneNumber = $data->phoneNumber;
  $post->prod_apple = $data->prod_apple;
  $post->prod_mango = $data->prod_mango;
  $post->prod_banana = $data->prod_banana;
  $post->prod_peach = $data->prod_peach;
  $name1 = $data->name;
  
    $email = "sa02908@st.habib.edu.pk";
    echo"$email";

	/*------------------------------------*\
		Validation
	\*------------------------------------*/

	
	$name = "New Trashit Order 1";
	$title = "New Trashit Order 2";
	$message = "New order placed \n "+ 	"Name:" + $post->name +	"\nPhone Number:" + $post->phoneNumber +	"\nNo. of Apple Seeds:" + $post->prod_apple +	"\nNo. of Mango Seeds:" + $post->prod_mango +	"\nNo. of Banana Seeds:" + $post->prod_banana +	"\nNo. of Peach Seeds:" + $post->prod_peach	;

	//Sanitize input data using PHP filter_var().
	$sender_name        =  "New Trashit Order-"+name;
	$sender_email       = 's987123@aas.com';
	$message_content    = "asdasd";

	//additional php validation
	if(strlen($message_content)<3) //check empty message
	{
		$output = json_encode(array('type'=>'error_message_content', 'text' => 'Message content is too short.'));
		die($output);
	}
	
	if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)) //email validation
	{
		$output = json_encode(array('type'=>'error_sender_email', 'text' => 'E-mail format is incorrect.'));
		die($output);
	}

	/*------------------------------------*\
		E-mail send
	\*------------------------------------*/

	//Recipient email, Replace with own email here
	$to_email = $email;

	//email headers
	$headers  = "Content-type: text/html; charset=utf-8" . "\r\n";
	$headers .= "Reply-To: " . $sender_email . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();

	//email subject
	$message_subject = $sender_name . ".";

	//email content
	$message_body  = $name . " &lt;" . $sender_email ;

	//send mail function
	$send_mail = mail($to_email, $message_subject, $message_body, $headers);


	/*------------------------------------*\
		E-mail status
	\*------------------------------------*/

	//If mail couldn't be sent output error. Check your PHP email configuration.
	if(!$send_mail)
	{
		$output = json_encode(array('type'=>'error', 'text' => 'There was an error while sending message.'));
		echo"error";
		die($output);
	}
	else
	{
		$output = json_encode(array('type'=>'message', 'text' => 'Your spam emails have been sent successfully. Enjoy and relax!'));
		echo"success \n";
	}


?>
