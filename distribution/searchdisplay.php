<?php include('header.html');
?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Search Results</h1>
            </div>
           
          </div>
        </div>
      </div>
      <div id="content">
           <div class="container">
          <div class="row bar">
            <div class="col-md-9">
              <div class="row products products-big">
	  <?php
include ('db.php');
if($_POST)
{
$st=$_POST['searchtext'];
if(!empty($st))
{
$q="select * from item where item_name like '%".$st."%' or brand like '%".$st."%' or description like '%".$st."%' or material like '%".$st."%' or color like '%".$st."%' order by item_name";
$res=$conn->query($q);
while($rec=mysqli_fetch_assoc($res))
{echo '<div class="col-lg-4 col-md-6">';
                        echo '<div class="product">';
	        echo "<div class='image'>";
					echo"<a href='found_display.php?id=";
						echo $rec['itemID'];
						echo "'>";
						echo "<img src='mypic/";
						echo $rec['item_picture'];
						echo "'/>";
						echo "</a>";
						echo "</div>";
                       echo "<div class='text'>";
				        echo "<h3 class='h5'>";
					 echo $rec['itemID']."-".$rec['item_name'];
                        echo "<br/>";
                      echo $rec['status'];
					  echo  "</h3>";               
                  echo "</div>";
                echo "</div>";
            echo "</div>";
 
                  	}}
					else
					echo "No data given to search";
					}
					else
					echo "No data available to search";
			   ?>
               </div>
              </div>
              <!-- </div>
               </div>-->
                                    
              <div class="row">
                <!--<div class="col-md-12 banner mb-small"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>-->
              </div>
             <!-- <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>-->
            <div class="col-md-3">
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