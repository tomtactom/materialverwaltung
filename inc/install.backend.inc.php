<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (isset($_POST['install'])) {
  // WICHTIG → RegEx-Überprüfung muss noch gemacht werden!
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  $host = trim($_POST['host']);
  $database = trim($_POST['database']);
  $mysqlusername = trim($_POST['mysqlusername']);
  $mysqluserpassword = $_POST['mysqluserpassword'];


  // Check connection
  $connection = @new mysqli($host, $mysqlusername, $mysqluserpassword, $database);
  if ($connection->connect_errno) {
    $msg = "Es konnte sich leider nicht mit dem MySQL-Server verbunden werden. Bitte überprüfe, ob Deine Eingaben korrekt war und versuche es erneut. (".$connection->connect_errno.") ".$connection->connect_error;
  } else {
    $salt1 = generateRandomString();
    $salt2 = generateRandomString();
      echo $connection->connect_error;
      $query = file_get_contents('./inc/import.sql');
      mysqli_query($connection,$query); #or die('Problem beim Ausführen der SQL-Abfrage.');
      $msg = "Die grundlegenden Einstellungen konnten alle vorgenommen werden.";
      // Informationen in ./inc/config.inc.php schreiben
      file_put_contents('./inc/config.inc.php', '<?php
  $config["mysqlhost"] = "'.$host.'";
  $config["mysqldatabase"] = "'.$database.'";
  $config["mysqlusername"] = "'.$mysqlusername.'";
  $config["mysqluserpassword"] = "'.base64_encode($mysqluserpassword).'";
  $config["salt1"] = "'.$salt1.'";
  $config["salt2"] = "'.$salt2.'";
  $config["password"] = "'.hash('sha256', $salt1.$password.$salt2).'";
  $config["admin_cookie_hash"] = "'.generateRandomString(32).'";
  $pdo = new PDO("mysql:host=".$config[\'mysqlhost\'].";dbname=".$config[\'mysqldatabase\'], $config[\'mysqlusername\'], base64_decode($config[\'mysqluserpassword\']));');
  #unlink('./inc/install.backend.inc.php');
  #unlink('./inc/install.inc.php');
      header('Location: /');

    }
  } else {
    $show_form = true;
  }
?>
