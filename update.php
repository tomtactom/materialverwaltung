<?php
  require('./inc/config.inc.php');

  if(isset($_POST['field']) && isset($_POST['id'])){
    $editid = $_POST['id'];
    $statement = $pdo->prepare("UPDATE `main` SET `pack_id` = ".$pack_id." WHERE `row_id` = ".$editid);

     echo 1;
  } else {
     echo 0;
  }
  exit;
?>
