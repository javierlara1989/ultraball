<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
//	
//// Create the email and send the message
//$to = 'javierlara1989@gmail.com';
//$email_subject = "Website Contact Form:  $name";
//$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
//$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";	
//mail($to,$email_subject,$email_body,$headers);
//return true;			



echo "Starting curl";
$curl = curl_init();
$name = $name; 
$email = $email; 
$subject = "Tienes un mensaje de $name"; 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"personalizations\": [\n    {\n      \"to\": [\n        {\n          \"email\": \"javier.lara@usach.cl\"\n        }\n      ],\n      \"subject\": \"New Contact\"\n    }\n  ],\n  \"from\": {\n    \"email\": \"[FROM EMAIL]\"\n  },\n  \"content\": [\n    {\n      \"type\": \"text/html\",\n      \"value\": \"$name<br>$email<br>$subject<br>$message\"\n    }\n  ]\n}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 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",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
header('Location: thanks.html');
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
return true;


?>
