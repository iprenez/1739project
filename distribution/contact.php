<?php include ('header.html');
?>
      <div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Contact</h1>
            </div>
            <div class="col-md-5">
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div id="contact" class="container">
          <section class="bar">
            <div class="row">
              <div class="col-md-12">
                <div class="heading">
                  <h2>We are here to help you</h2>
                </div>
                <p class="lead">If you have any questions about any particular item or about our company, please feel free to contact us! Any query regarding an item displayed on our website should mention its reference number.</p>
              </div>
            </div>
          </section>
         <!-- <section>
            <div class="row text-center">
              <div class="col-md-4">
                <div class="box-simple">
                  <div class="icon-outlined"><i class="fa fa-map-marker"></i></div>
                  <h3 class="h4">Address</h3>
                  <p>13/25 New Avenue<br>                                        New Heaven, 45Y 73J<br>                                        England,  <strong>Great Britain</strong></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box-simple">
                  <div class="icon-outlined"><i class="fa fa-phone"></i></div>
                  <h3 class="h4">Call center</h3>
                  <p>This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                  <p><strong>+33 555 444 333</strong></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box-simple">
                  <div class="icon-outlined"><i class="fa fa-envelope"></i></div>
                  <h3 class="h4">Electronic support</h3>
                  <p>Please feel free to write an email to us or to use our electronic ticketing system.</p>
                  <ul class="list-unstyled text-sm">
                    <li><strong><a href="mailto:">info@fakeemail.com</a></strong></li>
                    <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                  </ul>
                </div>
              </div>
            </div>
          </section>-->
          <section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Contact form</h2>
                </div>
              </div>
              <div class="col-md-8 mx-auto">
              <?php 
 
// define variables and set to empty values
$fname_error = $lname_error = $email_error = $subj_error = $message_error ="";
$fname = $lname = $email =  $message = $subj = $success = "";
$msg="";
$error=-1;
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$error=0;
  	if (empty($_POST["fname"])) 
  	{
    $fname_error = "Your first name is required";
	$error=1;
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
	$error=1;
  } 
  else
  {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
 	 {
      $lname_error = "Only letters and white space allowed"; 
	  $error=1;
	  }
     }

  if (empty($_POST["email"]))
   {
    $email_error = "A valid email is required";
	$error=1;
   } 
  else 
  {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
      $email_error = "Invalid email format"; 
	  $error=1;
    }
  }
  if (empty($_POST["subj"])) 
  {
    $subj_error = "Please, write the subject of your message here.";
	$error=1;
  } 
  else
  {    $subj = test_input($_POST["subj"]);
      if (!preg_match("/^[a-zA-Z .',()0-9]*$/",$subj)) 
 	   {
        $subj_error = "Only letters and white space allowed"; 
	   $error=1;
        }
  }
  if (empty($_POST["message"])) 
  {
    $message_error = "Please, write your message here.";
	$error=1;
  } 
  else
  {
    $message = test_input($_POST["message"]);
    if (!preg_match("/^[a-zA-Z .,0-9()']*$/",$message)) 
 	   {
        $message_error = "Only letters and white space allowed"; 
	    $error=1;
       }
     }
}
if ($error == 0)
  {
	  $message=str_replace("'","^",$message);
	  $subj=str_replace("'","^",$subj);
	  // if ($fname_error == '' and $fname_error == '' and $email_error == '' and $subj_error == '' and $message_error == ''){
      $message_body = '';
      	  //$_POST is an array so we are using for each to loop through each element $k refers to field name and $v refers to value in it for example $_POST['email'] hello@yahoo.com then $key is email and $value is hello@yahoo.com 
      foreach ($_POST as $k => $v)
	     {
          $message_body .=  "$k: $v\n";
		  // $message_body .= means $message_body=$message_body . "msg";
          }
  //echo $message_body;
  // code to insert record in the database
 include ('db.php');
 $qcon="INSERT INTO `contact`(`fname`, `lname`, `email`, `subject`, `message`) VALUES ('".$fname."','".$lname."','".$email."','".$subj."','".$message."')";
 // echo $q;
    $conn->query($qcon);
    $msg="Your form has been completed successfully";
	$fname = $lname = $email =  $message = $subj = "";
  
     // sending message to administrator change the address where you want to send the email
      $to = 'isabelleprenez@outlook.com';
      $subject = 'Contact Form Submitted at Website';
	  //change from to your domain name
	  $headers = "From: isabelleprenez@outlook.com";
        //mail function has min three parameters and maximum 5 parameters
      if(mail($to, $subject, $message_body,$headers) && mail($email,"Thank you for Enquiry at iL&F",$tmsg,"From : isabelleprenez@outlook.com"))
      {
           echo "<script> alert('Message sent, thank you for contacting me!'); window.location='index.php'; </script>";
       }
    else
      {
            echo "<script> alert('Sorry, your email was not sent'); window.location='index.php'; </script>";
       }

    //confirmation email to the person who completed the form change the details as required
        $tmsg="Dear". $fname .", <br/> Thank you for completing the enquiry form at our site. We will get back to you in 24 hrs. Your enquiry is ". $message;
        mail($email,"Thank you for Enquiry at iL&F",$tmsg,"From : isabelleprenez@outlook.com");
	}
  if ($error==1 || $error== -1)
  {
  ?>
              
                <form action="contact.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="firstname">First Name</label><span class="error" style="color:#da0554;">*<?php echo $fname_error;?></span>
                        <input id="firstname" type="text" name="fname" class="form-control" value="<?php echo $fname;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="lastname">Last Name</label><span class="error" style="color:#da0554;">*<?php echo $lname_error;?></span>
                        <input id="lastname" type="text" class="form-control" name="lname"value="<?php echo $lname;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label><span class="error" style="color:#da0554;">*<?php echo $email_error;?></span>
                        <input id="email" type="text" class="form-control" name="email"value="<?php echo $email;?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="subject">Subject</label><span class="error" style="color:#da0554;">*<?php echo $subj_error;?></span>
                        <input id="subject" type="text" class="form-control"name="subj"value="<?php echo $subj;?>">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="message">Message</label><span class="error" style="color:#da0554;">*<?php echo $message_error;?></span>
                        <textarea id="message" class="form-control" name="message"><?php echo $message;?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-12 text-center">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Send message</button>
                    </div>
                  </div>
                </form>
              <?php
			  echo $msg; }
			  ?>
              </div>
          </div>
          </section>
          </div>
        </div>
         <!-- <div id="map"></div>
      </div>
      <!-- GET IT-->
    <!--  <div class="get-it">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 text-center p-3">
              <h3>Do you want cool website like this one?</h3>
            </div>
            <div class="col-lg-4 text-center p-3">   <a href="#" class="btn btn-template-outlined-white">Buy this template now</a></div>
          </div>
        </div>
      </div>
      <!-- FOOTER -->
     <!-- <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h4 class="h6">About Us</h4>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
              <hr>
              <h4 class="h6">Join Our Monthly Newsletter</h4>
              <form>
                <div class="input-group">
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i></button>
                  </div>
                </div>
              </form>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Blog</h4>
              <ul class="list-unstyled footer-blog-list">
                <li class="d-flex align-items-center">
                  <div class="image"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></div>
                  <div class="text">
                    <h5 class="mb-0"> <a href="post.html">Blog post name</a></h5>
                  </div>
                </li>
                <li class="d-flex align-items-center">
                  <div class="image"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></div>
                  <div class="text">
                    <h5 class="mb-0"> <a href="post.html">Blog post name</a></h5>
                  </div>
                </li>
                <li class="d-flex align-items-center">
                  <div class="image"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></div>
                  <div class="text">
                    <h5 class="mb-0"> <a href="post.html">Very very long blog post name</a></h5>
                  </div>
                </li>
              </ul>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Contact</h4>
              <p class="text-uppercase"><strong>Universal Ltd.</strong><br>13/25 New Avenue <br>Newtown upon River <br>45Y 73J <br>England <br><strong>Great Britain</strong></p><a href="contact.html" class="btn btn-template-main">Go to contact page</a>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <ul class="list-inline photo-stream">
                <li class="list-inline-item"><a href="#"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/detailsquare2.jpg" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/detailsquare3.jpg" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/detailsquare3.jpg" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/detailsquare2.jpg" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/detailsquare.jpg" alt="..." class="img-fluid"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2018. Your company / name goes here</p>
              </div>
              <div class="col-lg-8 text-right text-center-md">
                <p>Template design by <a href="https://bootstrapious.com/free-templates">Bootstrapious Templates </a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <!--  </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
   <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="js/gmaps.js"></script>
    <script src="js/gmaps.init.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>-->
<?php include('footer.html'); ?>