<?php
include_once "../lib/swift_required.php";
 
if(!$_POST) exit;

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name     = $_POST['name'];
$address    = $_POST['address'];
$email    = $_POST['email'];
$phone   = $_POST['phone'];
$product   = $_POST['product'];
$bbd   = $_POST['bbd'];
$batchcode   = $_POST['batchcode'];
$purchase   = $_POST['purchase'];
$comments = $_POST['comments'];

if(trim($name) == '') {
	echo '<div class="error_message">Attention! You must enter your name.</div>';
	exit();
} else if(trim($address) == '') {
	echo '<div class="error_message">Attention! You must enter your address.</div>';
	exit();
} else if(trim($product) == '') {
	echo '<div class="error_message">Attention! You must enter the product name for the complaint.</div>';
	exit();
} else if(trim($bbd) == '') {
	echo '<div class="error_message">Attention! You must enter the best before date.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
	exit();
} else if(trim($phone) == '') {
	echo '<div class="error_message">Attention! Please enter a valid phone number.</div>';
	exit();
} else if(!is_numeric($phone)) {
	echo '<div class="error_message">Attention! Phone number can only contain digits.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Attention! You have enter an invalid e-mail address, try again.</div>';
	exit();
}

if(trim($comments) == '') {
	echo '<div class="error_message">Attention! Please enter your message.</div>';
	exit();
} 

if(get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}

$address = "kirsty@kirstymunro.ninja";

$e_subject = 'You\'ve been contacted by ' . $name . ' via website.';

$e_body = "You have been contacted by $name via website with regards to a complaint about $product, their additional message is as follows." . PHP_EOL . PHP_EOL;
$e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $name via email, $email or via phone $phone or at the address $address <br> Product Name: $product <br> Best before date: $bbd <br> Batch Code: $batchcode <br> Date and Place of Purchase: $purchase <br> Nature of Complaint: $comments";

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
	echo "<h1>Email Sent Successfully.</h1>";
	echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
	echo "</div>";
	echo "</fieldset>";
} else {
	echo "<fieldset>";
	echo "<div id='error_page'>";
	echo "<h1>Sorry something went wrong.</h1>";
	echo "<p><strong>$name</strong>, please go back and try again or email the team at <a href='mailto:enquiries@clarkboyle.com'>enquiries@clarkboyle.com</a></p>";
	echo "</div>";
	echo "</fieldset>";
	print_r($failures);
}