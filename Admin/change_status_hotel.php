<?php

    require 'config.php';

    $enquiry_id= $_GET['enquiry_id'];

	$statement="UPDATE hotel_enquiry SET status='Confirm' WHERE enquiry_id= '$enquiry_id' ";
	
	mysqli_query($conn,$statement);
	mysqli_close($conn);
	header("location:all-hotels-enquiry.php");
?>
