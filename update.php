<?php   require('./inc/config.inc.php');
/*
<form method="post">Test
  <input name="table" value="main">
  <input name="entry" value="pack_id">
  <input name="value" value="1">
  <input name="id" value="1">
  <input name="securitycode" value="<?php echo sha1($config["admin_cookie_hash"]); ?>">
  <input type="submit">
</form>*/

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

  if(!isset($_POST['table']) || !isset($_POST['entry']) || !isset($_POST['value']) || !isset($_POST['id']) || !isset($_POST['securitycode'])) {
    die("Es wurden nicht alle Werte übermittelt.");
  }

  if($_POST['securitycode'] != sha1($config["admin_cookie_hash"])) {
    die("Falscher Securitycode.");
  }

  if ($_POST['table'] != 'main' && $_POST['table'] != 'pack' && $_POST['table'] != 'product' && $_POST['table'] != 'section') {
    die("Falscher 'table' Wert.");
  } else {
    $table = $_POST['table'];
  }

  if (!in_array($_POST['entry'], $column_names)) {
    die("Die angegeben Spalte existiert nicht.");
  } else {
    $entry = $_POST['entry'];
  }

  $value = htmlspecialchars($_POST['value']);

  if(!is_numeric($_POST['id'])) {
    die("Fehlerhafte ID.");
  } else {
    $id = $_POST['id'];
  }
  $statement = $pdo->prepare("UPDATE `".$table."` SET `".$entry."` = ".$value." WHERE `row_id` = ".$id);
  $result = $statement->execute();
  if ($result == true) {
   echo 1;
 } else {
   die("Die Daten konnten nicht gespeichert werden.");
 }
  exit;
?>
