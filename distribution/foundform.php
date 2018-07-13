<?php include('header.html');

?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Found Item Form</h1>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container clearfix" style="margin-bottom:20px;">
          <div class="row bar" style="margin-bottom:20px;">
        <div class="mt-0">
               <div class="bo3">
                <div class="heading">
                  <h3 class="text-uppercase">Personal Details</h3>
                </div>
                   <?php 
				
				include('valid_finders2.php'); ?>        
              </div>
           
          
           <!--Found DETAILS-->

  <div class="bo3">
                <div class="heading">
                  <h3 class="text-uppercase">Found Details</h3>
                </div>
                <?php include('val_founddetails.php'); ?>
                 </div>


                                                        <!-- ITEM DETAILS-->

              <div class="bo3">
                <div class="heading">
                  <h3 class="text-uppercase">Item Details</h3>
                </div>
                
                
                
                
                <?php include('founditem_val.php'); ?>
                                </div>
              </div>
          </div>
    </div>
</div>
</div>
  <?php 
include('footer.html');
?>