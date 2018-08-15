<?php
if(!isset($_SESSION)) { session_start(); }

if($_SERVER['REQUEST_METHOD']== "POST")
{
  require 'config.php';

  $target_dir = "dist/img";
  $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
  move_uploaded_file($_FILES["user_img"]["tmp_name"], $target_file);

  $hotel_id=$_POST['hotel_id'];
  $room_type=$_POST['room_type'];
  $room_price=$_POST['room_price'];
  $room_desc=$_POST['room_desc'];

  $statement="insert into room_type(hotel_id,room_name,room_desc, price,image) values ('$hotel_id','$room_type', '$room_desc', '$room_price', '$target_file')";

  if(mysqli_query($conn,$statement))
  {
    $notifyMsg="New Room Type Added";
  }
  else
  {
    $notifyMsg="Unable to add New Room Type";
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
  <title>Add New Room Type</title>

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
            <form role="form" name="room-type-new" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label>Hotel Name</label>
                  <select class="form-control" name="hotel_id">
                    <option value="">-SELECT-</option>
                  <?php
                      require 'config.php';

                      $statement="select hotel_id, title from hotels where deletedAt is null order by hotel_id asc";
                      $result = mysqli_query($conn, $statement);

                      if (mysqli_num_rows($result) > 0)
                      {
                          while($row = mysqli_fetch_assoc($result))
                          {
                            echo "<option value=\"$row[hotel_id]\">$row[title]</option>";
                          }
                      }
                      else
                      {
                          echo "Nothing found in db";
                      }
                      mysqli_close($conn);
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Room Type</label>
                  <select class="form-control" name="room_type">
                    <option value="">-SELECT-</option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Triple">Triple</option>
                    <option value="Quad">Quad</option>
                    <option value="Presidential">Presidential</option>
                    <option value="Family">Family</option>Triple
                  </select>
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" id="room-price" placeholder="Price" name="room_price">
                </div>
                <div class="form-group">
                  <label>Room Description</label>
                  <textarea class="form-control" rows="3" placeholder="Room Description" name="room_desc"></textarea>
                </div>   
                <div class="form-group">
                  <label for="user-img">Upload Room Photo</label>
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