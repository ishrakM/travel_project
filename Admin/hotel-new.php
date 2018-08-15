<?php
if(!isset($_SESSION)) { session_start(); }

if($_SERVER['REQUEST_METHOD']== "POST")
{
  require 'config.php';

  $target_dir = "dist/img";
  $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
  move_uploaded_file($_FILES["user_img"]["tmp_name"], $target_file);

  $hotel_title=$_POST['hotel_title'];
  $hotel_location=$_POST['hotel_location'];
  $hotel_desc=$_POST['hotel_desc'];
  $addedBy= $_SESSION['user'];

  $statement="insert into hotels(title,location,image,hotel_desc,addedBy) values ('$hotel_title','$hotel_location', '$target_file', '$hotel_desc', '$addedBy')";

  if(mysqli_query($conn,$statement))
  {
    $notifyMsg="New Hotel Added";
  }
  else
  {
    $notifyMsg="Unable to add New Hotel";
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
  <title>Add New Hotel</title>

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
            <form role="form" name="hotels-new" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label>Hotel Name</label>
                  <input type="text" class="form-control" id="hotel-title" placeholder="Hotel Name" name="hotel_title">
                </div>
                <div class="form-group">
                  <label>Hotel Location</label>
                  <input type="text" class="form-control" id="hotel-location" placeholder="Hotel Name" name="hotel_location">
                </div>
                <div class="form-group">
                  <label>Hotel Description</label>
                  <textarea class="form-control" rows="3" id="hotel-desc" placeholder="Hotel Description" name="hotel_desc"></textarea>
                </div>  
                <div class="form-group">
                  <label for="user-img">Upload Hotel Photo</label>
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