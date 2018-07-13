<?php include('header.html');
?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Found Items</h1>
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
					$q = "SELECT * FROM `item` WHERE `status`='Found' and categoryID='". $_GET['catid']."'";
					}
					elseif(isset($_GET['ll']))
					{
					$q = "SELECT * FROM `item` WHERE `status`='Found' and foundID in (select foundID from found_item where found_location='". $_GET['fl']."')";
					}
					elseif(isset($_GET['fd']))
					{
					$q = "SELECT * FROM `item` WHERE `status`='Found' and foundID in (select foundID from found_item where found_date='". $_GET['fd']."')";
					}
					else
					{
					$q = "SELECT * FROM `item` WHERE `status`='Found'";
					}
					//echo $q;
					$res = $conn->query($q); 
					               
					while($rec = mysqli_fetch_assoc($res))
					{	echo '<div class="col-lg-4 col-md-6">';
                        echo '<div class="product">';
                        echo "<div class='image'>";
						if($rec['item_picture']=='')
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
                <a href="found_display.php?catid=<?php echo $reccat['categoryID']?>"><?php echo $reccat['Cat_name'] ?></a>
                 </div>
                   <?php } ?>
              </div>
          </div>
          <div class="panel panel-default sidebar-menu">
            <div class="panel-heading d-flex align-items-center justify-content-between">
              <h3 class="h4 panel-title">Date </h3>
            </div>
            <div class="panel-body">
             <?php $fdq = "SELECT distinct found_date FROM found_item where foundID in (select foundID from item where status='Found')";

                $resfdate = $conn->query($fdq);

                while($recfdate = mysqli_fetch_assoc($resfdate))
                {
                    ?>
                <div class="form-group">
                <a href="found_display.php?fd=<?php echo $recfdate['found_date']?>"><?php echo $recfdate['found_date'] ?></a>
                 </div>
                   <?php } ?>
            </div>
          </div>
          <div class="panel panel-default sidebar-menu">
            <div class="panel-heading d-flex align-items-center justify-content-between">
              <h3 class="h4 panel-title">Location </h3>
            </div>
            <div class="panel-body">
               <?php $flq = "SELECT distinct found_location FROM found_item where foundID in (select foundID from item where status='Found')";

                $resfloc = $conn->query($flq);

                while($recfloc = mysqli_fetch_assoc($resfloc))
                {
                    ?>
                <div class="form-group">
                <a href="found_display.php?fl=<?php echo $recfloc['found_location']?>"><?php echo $recfloc['found_location'] ?></a>
                 </div>
                   <?php } ?>
            </div>
          </div>
      </div>
   </div>
   <div class="row">
      <p class="loadMore col-md-9"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
   </div>
</div>
        

      </div>


  <?php include('footer.html');
?>