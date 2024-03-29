<?php
  if(!file_exists('./inc/config.inc.php')) {
    if(file_exists('./inc/install.inc.php')) {
      require('./inc/install.inc.php');
    } else {
      die("<strong>Fehler:</strong> Die Konfigurationsdatei, und die Installationsdatei um die Konfigurationsdatei zu erstellen, konnten nicht gefunden werden.");
    }
    die();
  }
 ?>

<?php require('./inc/config.inc.php');
//$pdo = new PDO("mysql:host=".$options['db_host'].";dbname=".$options['db_name'], $options['db_user'], $options['db_password']);
/* TEMP */
$login_status = rand(0,1);

?>
<!DOCTYPE html>
<html dir="ltr" lang="de-DE">
  <head>
    <title><?php if(!empty($options['sitetitle'])) { echo $options["sitetitle"].' | '; } ?>Materialverwaltungsystem</title>
    <meta charset="UTF-8"/>

    <!-- Einbinden des Bootstrap-Stylesheets -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="./assets/css/main.css" rel="stylesheet">

    <!-- optional: Einbinden der jQuery-Bibliothek -->
    <script src="./assets/js/jquery-3.6.0.min.js"></script>

    <!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
    <script src="./assets/js/bootstrap.min.js"></script>

    <script src="./assets/js/table.js"></script>

  </head>

  <body>
    <section class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand" href="/">Materialverwaltung</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="./fahrzeuge">Fahrzeuge</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="./rucksaecke">Rucksäcke</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="./produkte">Produkte</a>
				</li>
				<!--<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Dropdown
				  </a>
				  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Another action</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="#">Something else here</a></li>
				  </ul>
				</li>-->
			  </ul>
			  <form class="d-flex" method="post">
        <?php if ($login_status == true) { ?>
          <button class="btn btn-outline-danger" type="submit">Ausloggen</button>
        <?php } else { ?>
          <!--<input class="form-control me-2" type="text" name="username" placeholder="Benutzername" required maxlength="255">-->
  				<input class="form-control me-2" type="password" name="password" placeholder="Passwort" required maxlength="255">
          <input type="hidden" name="securitycode" value="<?php echo $config["unique_securitycode"]; ?>" required>
  				<button class="btn btn-outline-success" type="submit">Einloggen</button>
        <?php } ?>
			  </form>
			</div>
		  </div>
		</nav>
