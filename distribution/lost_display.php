<?php include('header.html');
?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Lost Items</h1>
            </div>
           
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-9">
              <div class="row products products-big">
                
                    
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
					{echo '<div class="col-lg-4 col-md-6">';
                        echo '<div class="product">';
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
					 echo $rec['itemID']."-".$rec['item_name'];
					 echo  "</h3>";               
                  echo "</div>";
                     echo "</div>";
                        echo "</div>";
                  	}
			   ?>
               </div>
               </div>
                         
              <div class="row">
                <!--<div class="col-md-12 banner mb-small"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>-->
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
                    <a href="lost_display.php?catid=<?php echo $reccat['categoryID']?>"><?php echo $reccat['Cat_name'] ?></a>
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
                  <h3 class="h4 panel-title">Location </h3>
                </div>
                <div class="panel-body">
                    <?php $llq = "SELECT distinct lost_location FROM lost_item where lostID in (select lostID from item where status='lost')";

					$reslloc = $conn->query($llq);

					while($reclloc = mysqli_fetch_assoc($reslloc))
					{
						?>
                    <div class="form-group">
                    <a href="lost_display.php?ll=<?php echo $reclloc['lost_location']?>"><?php echo $reclloc['lost_location'] ?></a>
                     </div>
                       <?php } ?>
               
            
             </div>
              </div>
            
             </div>
              </div>
            
          </div>
        </div>
        
        <div class="row">
          <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
            </div>
      </div>
      </div>
  <?php include('footer.html');
?>