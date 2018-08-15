<?php
if(!isset($_SESSION)) { session_start(); }

if($_SERVER['REQUEST_METHOD']== "POST")
{
  require 'config.php';

  $target_dir = "dist/img";
  $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
  move_uploaded_file($_FILES["user_img"]["tmp_name"], $target_file);

  $package_name=$_POST['package_name'];
  $package_location=$_POST['package_location'];
  $package_price=$_POST['package_price'];
  $package_duration=$_POST['package_duration'];
  $package_desc=$_POST['package_desc'];
  $addedBy= $_SESSION['user'];

  $statement="insert into tours(title,price,days,location,description,image,addedBy) values ('$package_name','$package_price', '$package_duration', '$package_location', '$package_desc', '$target_file', '$addedBy')";

  if(mysqli_query($conn,$statement))
  {
    $notifyMsg="New Package Added";
  }
  else
  {
    $notifyMsg="Unable to add New Package";
    mysqli_error($conn);
  }
  
  //var_dump($statement);
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
  <title>Add New Tour Package</title>

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
            <form role="form" name="package-new" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label>Package Name</label>
                  <input type="text" class="form-control" id="package-name" placeholder="Package Name" name="package_name">
                </div>
                <div class="form-group">
                  <label>Package Location</label>
                  <input type="text" class="form-control" id="package-location" placeholder="Package Location" name="package_location">
                </div>
                <div class="form-group">
                  <label>Package Duration</label>
                  <input type="text" class="form-control" id="package-duration" placeholder="Package Duration" name="package_duration">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" id="package-price" placeholder="Price" name="package_price">
                </div>
                <div class="form-group">
                  <label>Package Description</label>
                  <textarea class="form-control" rows="3" id="packageDesc" placeholder="Package Description" name="package_desc"></textarea>
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