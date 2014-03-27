<?php 
	include('header.php');
	include('imageform.php'); 
?>

<?php

  $imageform = new ImageUpload();
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $imageform->process();
  }else { $imageform->build(); }
?>

<?php include('footer.php'); ?>