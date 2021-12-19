<?php
  require('./inc/config.inc.php');

  // Write all columns from table in array
  $statement = $pdo->prepare("DESCRIBE `main`");
  $statement->execute();
  $table_main = $statement->fetchAll(PDO::FETCH_COLUMN);

  $statement = $pdo->prepare("DESCRIBE `pack`");
  $statement->execute();
  $table_pack = $statement->fetchAll(PDO::FETCH_COLUMN);

  $statement = $pdo->prepare("DESCRIBE `product`");
  $statement->execute();
  $table_product = $statement->fetchAll(PDO::FETCH_COLUMN);

  $statement = $pdo->prepare("DESCRIBE `section`");
  $statement->execute();
  $table_section = $statement->fetchAll(PDO::FETCH_COLUMN);

  $column_names = array_merge($table_main, $table_pack, $table_product, $table_section);


  if(isset($_POST['table']) && isset($_POST['entry']) && isset($_POST['value']) && isset($_POST['id'])) {
    if ($_POST['table'] != 'main' and $_POST['table'] != 'pack' and $_POST['table'] != 'product' and $_POST['table'] != 'section') {
      die(0);
    } else {
      $table = $_POST['table'];
    }

    if (!in_array($_POST['entry'], $column_names)) {
      die(0);
    } else {
      $entry = $_POST['entry'];
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
