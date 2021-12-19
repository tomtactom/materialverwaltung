<?php
  require('./inc/config.inc.php');

  $statement = $pdo->prepare("DESCRIBE `main`");
  $statement->execute();
  $table_fields = $statement->fetchAll(PDO::FETCH_COLUMN);
  print_r($table_fields[0]);
  die();


  if(isset($_POST['table']) && isset($_POST['entry']) && isset($_POST['value']) && isset($_POST['id'])) {
    if ($_POST['table'] != 'main' and $_POST['table'] != 'pack' and $_POST['table'] != 'product' and $_POST['table'] != 'section') {
      die(0);
    } else {
      $table = $_POST['table'];
    }

    /*
    $entry
    $value
    $id*/
    //$statement = $pdo->prepare("UPDATE `main` SET `pack_id` = ".$pack_id." WHERE `row_id` = ".$editid);

     echo 1;
  } else {
     echo 0;
  }
  exit;
?>
