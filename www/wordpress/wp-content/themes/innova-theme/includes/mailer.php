<?php
include_once "../lib/swift_required.php";

if(!$_POST) exit;

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

//$name     = $_POST['name'];
//$email    = $_POST['email'];
//$phone   = $_POST['phone'];
//$subject  = $_POST['subject'];
//$comments = $_POST['comments'];
//$verify   = $_POST['verify'];

$property_address = $_POST['property_address']; 
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name']; 
$email = $_POST['email']; 
$telephone = $_POST['telephone']; 
$datepicker = $_POST['datepicker'];

//if(trim($first_name) == '') {
//	echo '<div class="error_message">Attention! You must enter your first name.</div>';
//	exit();
//} else if (trim($last_name) == '') {
//	echo '<div class="error_message">Attention! You must enter your last name.</div>';
//	exit();
//} else if(trim($email) == '') {
//	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
//	exit();
//} else if(trim($telephone) == '') {
//	echo '<div class="error_message">Attention! Please enter a valid phone number.</div>';
//	exit();
//} else if(!is_numeric($telephone)) {
//	echo '<div class="error_message">Attention! Phone number can only contain digits.</div>';
//	exit();
//} else if(!isEmail($email)) {
//	echo '<div class="error_message">Attention! You have enter an invalid e-mail address, try again.</div>';
//	exit();
//}

//if(trim($subject) == '') {
//	echo '<div class="error_message">Attention! Please enter a subject.</div>';
//	exit();
//} else if(trim($comments) == '') {
//	echo '<div class="error_message">Attention! Please enter your message.</div>';
//	exit();
//} else if(!isset($verify) || trim($verify) == '') {
//	echo '<div class="error_message">Attention! Please enter the verification number.</div>';
//	exit();
//} else if(trim($verify) != '4') {
//	echo '<div class="error_message">Attention! The verification number you entered is incorrect.</div>';
//	exit();
//}

//if(get_magic_quotes_gpc()) {
//	$comments = stripslashes($comments);
//}

// Configuration option.
// Enter the email address that you want to emails to be sent to.
// Example $address = "joe.doe@yourdomain.com";

//$address = "example@themeforest.net";
//$address = "factor@newtonproperty.co.uk";
$address = "letting@newtonproperty.co.uk";

// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."
// Example, $e_subject = '$name . ' has contacted you via Your Website.';
$e_subject = 'You\'ve been contacted by ' . $first_name . ' ' . $last_name . ' about the property at '. $property_address .'.';

// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "You have been contacted by $first_name  $last_name with regards to $property_address ." . PHP_EOL . PHP_EOL;
$e_content = "\n<br><br>Property: $property_address \n<br> Proposed viewing date: $datepicker \n<br><br> " . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $first_name $last_name via email, $email or via phone $telephone \n<br><br>";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

// Login credentials
 $username = 'BrightfireGlasgow';
 $password = 'o5NQPTdRTE';

 // Setup Swift mailer parameters
 $transport = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
 $transport->setUsername($username);
 $transport->setPassword($password);
 $swift = Swift_Mailer::newInstance($transport);

// Create a message (subject)
 $message = new Swift_Message($e_subject);

 // attach the body of the email
 $message->setFrom($email);
 $message->setBody($msg, 'text/html');
 $message->setTo($address);
 $message->addPart($msg, 'text/plain');


if($swift->send($message, $failures)) {

	// Email has sent successfully, echo a success page.
	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h1 class='text-center'>Request Sent Successfully</h1>";
	echo "<p class='text-center'>Thank you <strong>$first_name $last_name</strong>, your request to view <strong>$property_address on $datepicker</strong> has been submitted to us. We will be in touch soon to confirm.</p>";
	echo "</div>";
	echo "</fieldset>";

} else {

	echo "<fieldset>";
	echo "<div id='error_page'>";
	echo "<h1 class='text-center'>Sorry something went wrong</h1>";
	echo "<p class='text-center'><strong>$first_name</strong>, please go back and try again or call the team on 0141 353 6161 quoting the property reference number you wish to make a viewing appointment for.</p>";
	echo "</div>";
	echo "</fieldset>";
	print_r($failures);

}
?>