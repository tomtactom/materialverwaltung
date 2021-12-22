<form method="post" action="?packing_degree=1">
  <input type="text" name="product_id">
  <input type="submit">
</form>
<?php
require('./inc/config.inc.php');
if($_POST['securitycode'] != sha1($config["admin_cookie_hash"])) {
  //die("Falscher Securitycode.");
}

if(isset($_GET['packing_degree']) && isset($_POST['product_id'])) {
  if(!is_numeric($_POST['product_id'])) {
    die("Fehler: Die product_id entspricht nicht den Vorgaben");
  }
  $statement = $pdo->prepare("SELECT `packing_degree` FROM `product` WHERE `row_id` = ".trim($_POST['product_id']));
  $result = $statement->execute();
  if ($result == true) {
    echo $statement->fetch()['packing_degree'];
    exit();
  } else {
    die("Fehler: Fehler mit der SQL Abfrage.");
  }
  exit();
}
