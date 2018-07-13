<?php include('header.html');
?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Category with right sidebar</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Category with right sidebar</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-9">
              <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>
              <div class="row products products-big">
                <div class="col-lg-4 col-md-6">
                  <div class="product">
               <?php include('db.php');
					if(isset($_GET['catid']))
					{
					$q = "SELECT * FROM `item` WHERE `status`='Lost' and categoryID='". $_GET['catid']."'";
					}
					elseif(isset($_GET['ll']))
					{
					$q = "SELECT * FROM `item` WHERE `status`='Lost' and lostID in (select lostID from lost_item where lost_location='". $_GET['ll']."')";
					}
					elseif(isset($_GET['ld']))
					{
					$q = "SELECT * FROM `item` WHERE `status`='Lost' and lostID in (select lostID from lost_item where lost_date='". $_GET['ld']."')";
					}
					else
					{
					$q = "SELECT * FROM `item` WHERE `status`='Lost'";
					}
					//echo $q;
					$res = $conn->query($q);
					               
					while($rec = mysqli_fetch_assoc($res))
					{
                        echo "<div class='image'>";
						if(empty($rec['item_picture']))
						{echo "<img src='mypic/default.jpg'/>";}
						else 
						 {echo "<img src='mypic/";
						echo $rec['item_picture'];
						echo "' />";}
						echo "</div>";
                       echo "<div class='text'>";
				        echo "<h3 class='h5'>";
					 echo "REF:".$rec['itemID']."/".$rec['item_name'];
					 echo  "</h3>";               
                  echo "</div>";
                  	}
			   ?>
                    </div>
                  </div>
              
             
            </div>
            <div class="col-md-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                   <?php $cq = "SELECT * FROM categories";

					$rescat = $conn->query($cq);

					while($reccat = mysqli_fetch_assoc($rescat))
					{
						
						?>
                    <div class="form-group">
                    <a href="losttest.php?catid=<?php echo $reccat['categoryID']?>"><?php echo $reccat['Cat_name'] ?></a>
                     </div>
                     
                       <?php } ?>
                             <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Date</h3>
                </div>
                <div class="panel-body">
                   <?php $ldq = "SELECT distinct lost_date FROM lost_item where lostID in (select lostID from item where status='lost')";

					$resldate = $conn->query($ldq);

					while($recldate = mysqli_fetch_assoc($resldate))
					{
						?>
                    <div class="form-group">
                    <a href="lost_display.php?ld=<?php echo $recldate['lost_date']?>"><?php echo $recldate['lost_date'] ?></a>
                     </div>
                       <?php } ?>
                </div>
              </div>
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading d-flex align-items-center justify-content-between">
                  <h3 class="h4 panel-title">location</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
                </div>
                <div class="panel-body">
 <?php $llq = "SELECT distinct lost_location FROM lost_item where lostID in (select lostID from item where status='lost')";

					$reslloc = $conn->query($llq);

					while($reclloc = mysqli_fetch_assoc($reslloc))
					{
						?>
                    <div class="form-group">
                    <a href="losttest.php?ll=<?php echo $reclloc['lost_location']?>"><?php echo $reclloc['lost_location'] ?></a>
                     </div>
                       <?php } ?>
              </div>
        
              

            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      <!-- GET IT-->
     <!-- <div class="get-it">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 text-center p-3">
              <h3>Do you want cool website like this one?</h3>
            </div>
            <div class="col-lg-4 text-center p-3">   <a href="#" class="btn btn-template-outlined-white">Buy this template now</a></div>
          </div>
        </div>
      </div>-->
      <!-- FOOTER -->
      <footer class="main-footer">
      <!--  <div class="container">
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
        </div>-->
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2018. iL&F</p>
              </div>
              <div class="col-lg-8 text-right text-center-md">
                <p>Template design by <a href="https://bootstrapious.com/free-templates">Bootstrapious Templates </a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
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
    <script src="js/front.js"></script>
  </body>
</html>