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


  if(isset($_POST['table']) && isset($_POST['entry']) && isset($_POST['value']) && isset($_POST['id']) && isset($_POST['securitycode'])) {
    if($_POST['securitycode'] == sha1($config["admin_cookie_hash"]))

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

    $value = htmlspecialchars($_POST['value']);

    if(!is_numeric($_POST['id'])) {
      die(0);
    } else {
      $id = $_POST['id'];
    }
    $statement = $pdo->prepare("UPDATE `".$table."` SET `".$entry."` = ".$value." WHERE `row_id` = ".$id);
    $result = $statement->execute();
    if ($result == true) {
     echo 1;
   } else {
     die(0);
   }
  } else {
     echo 0;
  }
  exit;
?>
