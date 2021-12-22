<?php
require('./inc/config.inc.php');
if(isset($_POST['securitycode']) && $_POST['securitycode'] == sha1($config["admin_cookie_hash"])) {
  if(isset($_GET['packing_degree']) && isset($_POST['product_id'])) {
    if(is_numeric($_POST['product_id'])) {
      $statement = $pdo->prepare("SELECT `packing_degree` FROM `product` WHERE `row_id` = ".trim($_POST['product_id']));
      $result = $statement->execute();
      if ($result == true) {
        echo $statement->fetch()['packing_degree'];
        exit();
      }
      exit();
    }
  }
}
