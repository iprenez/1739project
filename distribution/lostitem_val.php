 <?php
 include ('db.php');
$item_name = $category = $brand =  $description = $weight = $height = $width = $material = $size = $weight = $color = $weight = $item_picture = $weight =  $item_fate = "";
$item_nameErr = $categoryErr = $brandErr =  $descriptionErr = $weightErr = $heightErr = $widthErr = $materialErr = $sizeErr = $weightErr = $colorErr = $weightErr = $item_pictureErr = $weightErr = $item_fateErr = "";
$error = -1;
$msg = "";
$uploadOk=0;
if($_POST)
{
  $error = 0;
  if (empty($_POST["item_name"]))  
{
    $item_nameErr="You must give a title describing your possession!";
    $error=1;
} 
  else
{
     $item_name=checkdata($_POST['item_name']);
      if (!preg_match("/^[a-zA-Z ]*$/",$item_name))
      {
      $item_name="Only letters and white space allowed!"; 
	  $error=1;
    }
}
if (empty($_POST["category"]))    
{
    $categoryErr = "Please, select a category!";
    $error=1;
}
	else
{
	$category=$_POST['category'];

}
if (empty($_POST["material"]))    
{
    $materialErr = "Please, specify the material of the item!";
    $error=1;
}
	else
{
	$material=$_POST['material'];

}
if (empty($_POST["color"]))    
{
    $colorErr = "Please, specify the color of the item!";
    $error=1;
}
	else
{
	$color=$_POST['color'];

}
if (empty($_POST["description"]))
 {
     $descriptionErr = "A description of the item is required!";
     $error=1;
 }
 else
 {
     $description = checkdata($_POST["description"]);
     $description=str_replace("'","^",$description);
 }
 if (empty($_POST["item_fate"]))    
{
    $item_fateErr = "Please, select your preferred option!";
    $error=1;
}
	else
{
	$item_fate=$_POST['item_fate'];
}
$brand=$_POST["brand"];
$height=$_POST["height"];
$weight=$_POST["weight"];
$width=$_POST["width"];
$size=$_POST["size"];
//$shipping=$_POST["est_shipping_cost"];
$uploadOk="";
    if($error == 0)	
	  { //if ($name_error == '' and $desc_error == '' and $picfile_error == '' and $locfile_error == ''  )
     $error=-1;
	  if($_FILES["item_picture"]["name"]=" ")
	  	  {
			  echo "testing";
		echo $_FILES["item_picture"];
		  $uploadOk = 1;
		  $item_picture="";
	  }
		if(strlen($_FILES["item_picture"]["name"])>2)
	 {
	    echo "not empty";
		echo $_FILES["item_picture"]["name"];
		$target_dir = "mypic/";
		$target_file = $target_dir .basename($_FILES["item_picture"]["name"]);
		echo $target_file;
		$uploadOk = 1;
	  
	  if (file_exists($target_file))
	    {
		$item_pictureErr="Sorry, file already exists.";
		$uploadOk = 0;
		}
		if ($_FILES["item_picture"]["size"] > 500000) 
		{
		$item_pictureErr= "Sorry, your file is too large.";
        $uploadOk = 0;
		}
	
		$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
        $item_pictureErr= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
		}
		if ($uploadOk == 0) 
		{
			$item_pictureErr= "Sorry, your file does not match upload criteria.";
		}
		 else 
	   {
		if (move_uploaded_file($_FILES["item_picture"]["tmp_name"], $target_file))
		 {
			  echo "The file ". $target_file. " has been uploaded.";
			  $item_picture=basename($_FILES["item_picture"]["name"]);
		 }
		else 
		 {
          $item_pictureErr= "Sorry, there was an error uploading your file.";
		 }
	    }//end of else
	   } // end of empty
	 } // has error
   
}
echo "seekers".$seekers;
echo "lost".$lost_item;
echo "item".$uploadOk;
 if($seekers==1 && $lost_item==1 && $uploadOk ==1 )
 {
include ('db.php');
//insert seeker
 $q="INSERT INTO `seekers`(`firstname`, `lastname`, `nationality`, `email`, `telno`, `address`, `postcode`, `city`, `country`) VALUES ('".$firstname."','".$lastname."','".$nationality."','".$email."','".$telno."','".$address."','".$postcode."','".$city."','".$country."')";
// echo $q;
$conn->query($q);
    $msg="Your form has been completed successfully";
	$seekerID = $firstname = $lastname = $nationality = $email = $telno = $address = $postcode = $city = $country  = "";
	$seekeradded="";
	$q="select max(seekerID) as seekerID from seekers";
	$rowseeker=mysqli_fetch_assoc($conn->query($q));
	$seekeradded=$rowseeker['seekerID'];
	echo $seekeradded;	
	//insert lost_item
	 $qli="INSERT INTO `lost_item`(`seekerID`,`lost_date`, `lost_time`, `lost_location`, `lost_country`, `reward`, `reward_details`) VALUES  ('".$seekeradded ."','".$lost_date."','".$lost_time."','".$lost_location."','".$lost_country."','".$reward."','".$reward_details."')";
$conn->query($qli);
    echo $qli;
    $msg="Your form has been completed successfully";
	$lost_date = $lost_time = $lost_location = $lost_country = $reward = $reward_details = "";
	$lostitemadded="";
	$q="select max(lostID) as lostID from lost_item";
	$rowlitem=mysqli_fetch_assoc($conn->query($q));
	$lostitemadded=$rowlitem['lostID'];
	echo $lostitemadded;
	// insert item
		  include ('db.php');
	$qi="INSERT INTO `item`(`categoryID`, `item_name`, `brand`, `description`, `weight`, `height`, `width`, `material`, `size`, `color`, `item_picture`, `item_fate`,lostID,status) VALUES ('".$category."','".$item_name."','".$brand."','".$description."','".$weight."','".$height."','".$width."','".$material."','".$size."','".$color."','".$item_picture."','".$item_fate."','".$lostitemadded ."','lost')";
$conn->query($qi);
//echo $qi;
    $msg="Your form has been completed successfully";
$item_name = $category = $brand =  $description = $weight = $height = $width = $material = $size = $weight = $color = $weight = $item_picture = $weight = $item_fate = "";
   
 }
 
 
 
 
if($error == 1 || $error == -1)
{
?>


 
 <!-- <form class="form-group" action="lostform.php" method="POST" enctype="multipart/form-data">-->
  <div class="row">
                 <div class="col-md-12">
                      <div class="form-group">
                        <label for="item_name">Item Name</label><span class="error" style="color:#da0554;">*<?php echo $item_nameErr; ?></span>
                        <input id="item_name" name="item_name" type="text" class="form-control" value="<?php echo $item_name;?>" >
                      </div>
                    </div>
                    </div>
 				 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category">Category</label><span class="error" style="color:#da0554;">*<?php echo $categoryErr; ?></span>
                        <select id="category" name="category" class="form-control">
                        <option value="select" selected disabled>Please, select...</option>
                        <option value="3">Clothes</option>
                        <option value="5">Glasses</option>
                        <option value="6">Bags and Wallets</option>
                        <option value="7">Mobile Phones</option>
                        <option value="8">Tech Accessories</option>
                        <option value="9">Tech Devices</option>
                        <option value="10">Toys</option>
                        <option value="11">Pets</option>
                        <option value="12">Jewellery</option>
                        <option value="13">Other Items</option>
                        </select>
                        <span> <?php if(!$category=="") 
						echo "Please, select a category!";?></span>
                      
                  </div>
                    </div>
                   
                 
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="brand">Brand</label>
                        <input id="brand" name="brand" type="text" class="form-control" value="<?php echo $brand;?>" >
                      </div>
                    </div>
                       
                  </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="weight">Weight(kg)</label>
                        <input id="weight" name="weight" type="number" step="0.01" min="0.00" max="9999999999.99" class="form-control" value="<?php echo $weight;?>">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="height">Height(M)</label>
                        <input id="height" name="height" type="number" step="0.01" min="0.00" max="9999999999.99" class="form-control" value="<?php echo $height;?>">
                      </div>
                    </div>
                   
                      
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="width">Width(M)</label>
                        <input id="width" name="width" type="number" step="0.01" min="0.00" max="9999999999.99" class="form-control" value="<?php echo $width;?>">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="size">Size</label>
                        <input id="size" name="size" type="text" class="form-control" value="<?php echo $size;?>">
                      </div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="material">Material</label><span class="error" style="color:#da0554;">*<?php echo $materialErr;?></span>
                        <input id="material" name="material" type="text" class="form-control" value="<?php echo $material;?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="color">Color</label><span class="error" style="color:#da0554;">*<?php echo $colorErr;?></span>
                        <input id="color" name="color" class="form-control" value="<?php echo $color;?>">
                      </div>
                    </div>
                  </div>
                    
                     <div class="row">
                         <div class="col-md-6">
                      <div class="form-group">
                        <label for="description">Description</label><span class="error" style="color:#da0554;">*<?php echo $descriptionErr;?></span>
                         <textarea id="description" name="description" type="text" class="form-control"></textarea value="><?php echo $description;?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="picture">Picture</label><br/>
                        <input id="picture" name="item_picture" type="file" />
                       </div>
                     </div>    
                    </div>
                    
                          <div class="row">                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fate">What do you want to happen to your item</label><span class="error" style="color:#da0554;">*<?php echo $item_fateErr;?></span>
                        <select id="fate" class="form-control" name="item_fate">
                        <option value="select" selected disabled>Please, select...</option>
                        <option value="Keeping allowed">Sent back</option>
                        <option value="Return to administrator">Returned to iL&F administrators</option>
                        <option value="Given to charities">Given to charities</option>
                        <option value="Send item back to seeker">Sent back to you</option>
                        </select>
                        <span> <?php if(!$item_fate=="") 
						echo "Your last selection was ".$item_fate;?></span>
                      </div>
                     </div>
                 </div>
                 
                    <div class="col-md-12 text-center" style="margin-top:50px; margin-bottom:20px;">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i> Save </button>
                    </div>
                
                </form></div>
                <?php
}
echo "<div class='row'>";
echo $item_pictureErr;
echo $msg;
echo "</div>";
/*function checkdata($valuetocheck) {
		$valuetocheck=htmlspecialchars($valuetocheck);
		$valuetocheck=trim($valuetocheck);
		$valuetocheck=stripcslashes($valuetocheck);
		return $valuetocheck;}*/
?>