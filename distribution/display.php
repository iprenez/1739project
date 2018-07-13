<?php include('header.html');
?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Display</h1>
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
					$q = "SELECT * FROM `item` WHERE `status`='Found' and categoryID='". $_GET['catid']."'";
					}
					else
					{
					$q = "SELECT * FROM `item` WHERE `status`='Found'";
					}
					$res = $conn->query($q);

					while($rec = mysqli_fetch_assoc($res))
					{
                    echo "<div class='image'>";
					echo"<a href='display.php?id=";
						echo $rec['ID'];
						echo "<img src='images/";
						echo $rec['item_picture'];
						echo "' />";
						echo "</a>";
						echo "</div>";
                       echo "<div class='text'>";
				        echo "<h3 class='h5'>";
					 echo $rec['item_name'];
					 echo  "</h3>";               
                  echo "</div>";
                  	}
			   ?>
               </div>
               </div>
                                    
              <div class="row">
                <div class="col-md-12 banner mb-small"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>
              </div>
              <div class="pages">
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
                    <a href="display.php?catid=<?php echo $reccat['categoryID']?>"><?php echo $reccat['Cat_name'] ?></a>
                     </div>
                       <?php } ?>
                  </div>
              </div>
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading d-flex align-items-center justify-content-between">
                  <h3 class="h4 panel-title">Date Range</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
                </div>
                <div class="panel-body">
                  <form>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">2018
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> 2017
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> 2016
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> 2015
                        </label>
                      </div>
                    </div>
                    <button class="btn btn-sm btn-template-outlined"><i class="fa fa-pencil"></i> Apply</button>
                  </form>
                </div>
              </div>
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading d-flex align-items-center justify-content-between">
                  <h3 class="h4 panel-title">Location</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
                </div>
              
              </div>
            
          </div>
        </div>
          <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
      </div>
      </div>
   

  <?php include('footer.html');
?>