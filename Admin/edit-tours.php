<?php
    if(!isset($_SESSION)) { session_start(); }
    require("config.php");

  $tour_id = $_GET['tour_id'];
  $_SESSION['tour_id']= $tour_id;

  $result = mysqli_query($conn, "select * from tours WHERE tour_id='$tour_id' ");

  while($res = mysqli_fetch_array($result))
  {
    $package_title= $res['title'];
    $package_location= $res['location'];
    $package_price= $res['price'];
    $package_days= $res['days'];
    $package_desc= $res['description'];
    $image= $res['image'];

  }

  if($_SERVER['REQUEST_METHOD']== "POST")
  {
    require 'config.php';

    $target_dir = "dist/img/";
    $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
    if(move_uploaded_file($_FILES["user_img"]["tmp_name"], $target_file))
    {
      //$_SESSION['image']=$target_file;
      $image=$target_file;
    }

    $package_titleUpdated=$_POST['package_name'];
    $package_locationUpdated=$_POST['package_location'];
    $package_priceUpdated=$_POST['package_price'];
    $package_daysUpdated=$_POST['package_duration'];
    $package_descUpdated=$_POST['package_desc'];

    
   $statement="UPDATE tours SET title= '$package_titleUpdated' , price= '$package_priceUpdated', days='$package_daysUpdated', location='$package_locationUpdated', description='$package_descUpdated', image='$image' where tour_id= '$_SESSION[tour_id]'";


    if(mysqli_query($conn,$statement))
    {
        $notifyMsg="Package Updated";
        //header("location: $uri");
    }
    else
    {
        $notifyMsg="Unable To Update Package";
        mysqli_error($conn);
    }

    mysqli_close($conn);   
  }
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Tour Packages</title>

<?php include 'header.php';?>

<?php include 'sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Welcome!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add New</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="tour-edit" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label>Package Name</label>
                  <input type="text" class="form-control" id="package-name" placeholder="Package Name" name="package_name" value="<?php echo empty($package_titleUpdated) ? $package_title : $package_titleUpdated ?>">
                </div>
                <div class="form-group">
                  <label>Package Location</label>
                  <input type="text" class="form-control" id="package-location" placeholder="Package Location" name="package_location" value="<?php echo empty($package_locationUpdated) ? $package_location : $package_locationUpdated ?>">
                </div>
                <div class="form-group">
                  <label>Package Duration</label>
                  <input type="text" class="form-control" id="package-duration" placeholder="Package Duration" name="package_duration" value="<?php echo empty($package_daysUpdated) ? $package_days : $package_daysUpdated ?>">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" id="package-price" placeholder="Price" name="package_price" value="<?php echo empty($package_priceUpdated) ? $package_price : $package_priceUpdated ?>">
                </div>
                <div class="form-group">
                  <label>Package Description</label>
                  <textarea class="form-control" rows="3" id="packageDesc" placeholder="Package Description" name="package_desc"><?php echo empty($package_descUpdated) ? $package_desc : $package_descUpdated ?></textarea>
                </div>  
                <div class="form-group">
                  <label for="user-img">Upload A Photo</label>
                  <input type="file" id="user-img" name="user_img">
                </div>              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">

               <div class="error">
                 <?php

                   if (!empty($notifyMsg)) 
                   {
                    echo "<p><span id=\"error\">$notifyMsg</span></p>";
                   }

                 ?>
              </div>

                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
            </form>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
<?php include 'footer.php';?>