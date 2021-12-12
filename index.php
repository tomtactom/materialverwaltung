<!DOCTYPE html>
<html dir="ltr" lang="de-DE">
  <head>
    <title>Bootstrap Beispiel</title>
    <meta charset="UTF-8"/>
	<style>
	@import "bootstrap"; 
	$body-bg: #000;
	$body-color: #111;
	$theme-colors: (
	  "primary": #ff0000,
	  "danger": #ff3333,
	  "dark": #ccc
	);
	</style>

    <!-- Einbinden des Bootstrap-Stylesheets -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- optional: Einbinden der jQuery-Bibliothek -->
    <script src="./assets/js/jquery-3.6.0.min.js"></script>

    <!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
    <script src="./assets/js/bootstrap.min.js"></script>

  </head>

  <body>
    <section class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand" href="./materialverwaltung">Materialverwaltung</a>
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
			  <form class="d-flex">
				<input class="form-control me-2" type="text" placeholder="Benutzername">
				<input class="form-control me-2" type="password" placeholder="Passwort">
				<button class="btn btn-outline-success" type="submit">Einloggen</button>
				<button class="btn btn-outline-success" type="submit">Ausloggen</button>
			  </form>
			</div>
		  </div>
		</nav>
      <h1>Suche</h1>

      <p>Beispiel für ein einfaches Suchformular.</p>

      <!-- Suchformular mit Eingabefeld und Button -->
      <form class="well form-search">
        <input type="text" class="input-medium search-query"/>
        <button type="submit" class="btn btn-primary">Search</button>
      </form>

      <h2>Ergebnisse</h2>

      <!-- Tabelle mit abwechselnder Zellenhintergrundfarbe und Außenrahmen -->
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Lorem ipsum dolor sit amet</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Consetetur sadipscing elitr</td>
          </tr>
          <tr>
            <td>3</td>
            <td>At vero eos et accusam</td>
          </tr>
        </tbody>
      </table>
    </section>
  </body>

</html>