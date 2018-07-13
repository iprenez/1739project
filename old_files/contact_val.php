<?php 

// define variables and set to empty values
$fname_error = $lname_error = $email_error = $subj_error = $message_error ="";
$fname = $lname = $email =  $message = $subj = $success = "";
$error=-1;
//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["fname"])) 
  {
    $fname_error = "Your first name is required";
  } 
  else
  {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
  {
      $fname_error = "Only letters and white space allowed";
        $error=1;
   }
  }
  if (empty($_POST["lname"])) 
  {
    $lname_error = "Your last name is required";
  } 
  else
  {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
  {
      $lname_error = "Only letters and white space allowed"; 
	  
   }
  }

  if (empty($_POST["email"]))
   {
    $email_error = "Email is required";
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
      $email_error = "Invalid email format"; 
    }
  }
  if (empty($_POST["subj"])) 
  {
    $subj_error = "Please, write the subject of your message here.";
  } 
  else
  {
    $subj = test_input($_POST["subj"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$subj)) 
  {
      $subj_error = "Only letters and white space allowed"; 
   }
  }
  if (empty($_POST["message"])) 
  {
    $message_error = "Please, write your message here.";
  } 
  else
  {
    $message = test_input($_POST["message"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$subj)) 
  {
      $message_error = "Only letters and white space allowed"; 
   }
  }

  

  
  if ($fname_error == '' and $fname_error == '' and $email_error == ''  ){
      $message_body = '';
      unset($_POST['submit']);}
	  //$_POST is an array so we are using for each to loop through each element $k refers to field name and $v refers to value in it for example $_POST['email'] hello@yahoo.com then $key is email and $value is hello@yahoo.com 
      foreach ($_POST as $k => $v){
          $message_body .=  "$k: $v\n";
		  // $message_body .= means $message_body=$message_body . "msg";
      }
  //echo $message_body;
  // code to insert record in the database
  
  
// sending message to administrator change the address where you want to send the email
            $to = 'isabelleprenez@outlook.com';
      $subject = 'Contact Form Submitted at Website';
	  //change from to your domain name
	  $headers = "From: isabelleprenez@outlook.com";
//mail function has min three parameters and maximum 5 parameters
     if (mail($to, $subject, $message_body,$headers) && mail($email,"Thank you for Enquiry at iL&F",$tmsg,"From : isabelleprenez@outlook.com"))
{
echo "<script> alert('Message sent, thank you for contacting me!'); window.location='../index.html'; </script>";
}
else
{
echo "<script> alert('Sorry, your email was not sent'); window.location='../index.html'; </script>";
}

{
    //confirmation email to the person who completed the form change the details as required
  $tmsg="Dear". $fname .", <br/> Thank you for completing the enquiry form at our site. We will get back to you in 24 hrs. Your enquiry is ". $message;
  mail($email,"Thank you for Enquiry at www.elatt.org.uk",$tmsg,"From : isabelleprenez@outlook.com");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  }
?>
