<?php include('db.php');
					if(isset($_GET['catid'])&& isset($_GET['lostID']))
					{
					$q = "SELECT * FROM `item` WHERE `status`='Found' and categoryID='". $_GET['catid']."' and lostID='".$_GET['ldid']."'";
					}
					else
					{
					$q = "SELECT * FROM `item` WHERE `status`='Found'";
					}
					$res = $conn->query($q);
                      if($res->num_rows <1)
					  {
						  echo "<b style='color:red;'> Sorry, No Results Found </b>";
					  }
					  else
					  {
					while($rec = mysqli_fetch_assoc($res))
					{
                    echo "<div class='image'>";
						echo "<img src='mypic/";
						echo $rec['item_picture'];
						echo "'/>";
						echo "</div>";
                       echo "<div class='text'>";
				        echo "<h3 class='h5'>";
					 echo $rec['item_name'];
					 echo  "</h3>";               
                  echo "</div>";
				 
                  	}}
			   ?>  <div class="panel panel-default sidebar-menu">
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
                    <a href="trial.php?catid=<?php echo $reccat['categoryID']?>"><?php echo $reccat['Cat_name'] ?></a>
                     </div>
                       <?php } ?>
					     <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Categories</h3>
                </div>
                <div class="panel-body">
          <?php $ldq = "SELECT * FROM lost_item";

					$resld = $conn->query($ldq);

					while($recld = mysqli_fetch_assoc($resld))
					{
						
						?>
                    <div class="form-group">
                    <a href="trial.php?ldid=<?php echo $recld['lostID']?>"><?php echo $recld['lost_date'] ?></a>
                     </div>
                       <?php } ?>