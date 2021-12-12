<!DOCTYPE html>
<html dir="ltr" lang="de-DE">
  <head>
    <title>Installation | Materialverwaltungsystem</title>
    <meta charset="UTF-8"/>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <section class="container-sm" style="max-width: 540px;margin-top: 100px;">
      <h1>Installation</h1>
      <form mathod="post">
        <div class="mb-3">
          <label for="inputUsername" class="form-label">Benutzername</label>
          <input type="text" class="form-control" id="inputUsername">
        </div>

        <div class="mb-3">
          <label for="inputPassword" class="form-label">Passwort</label>
          <input type="text" class="form-control" id="inputPassword" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,32}$" aria-describedby="passwordHelp">
          <div id="passwordHelp" class="form-text">Das Passwort muss mindestens eine Zahl, einen Kleinbuchstaben, einen Großbuchstaben und ein Sonderzeichen enthalten und zwischen 8 und 32 Zeichen lang sein.</div>
        </div>

        <div class="mb-3">
          <label for="inputPassword2" class="form-label">Passwort wiederholen</label>
          <input type="text" class="form-control" id="inputPassword2" aria-describedby="password2Help">
          <div id="password2Help" class="form-text">Dies dient dazu, dass man das richtige Passwort eingibt, falls man sich in einem Feld vertippt hat.</div>
        </div>

        <div class="mb-3">
          <label for="inputHost" class="form-label">Datenbank Host</label>
          <input type="text" class="form-control" id="inputHost" aria-describedby="hostHelp">
          <div id="hostHelp" class="form-text">Dieser ist normalerweise <i>localhost</i></div>
        </div>

        <div class="mb-3">
          <label for="inputDbname" class="form-label">Datenbank Name</label>
          <input type="text" class="form-control" id="inputDbname" aria-describedby="dbnameHelp">
          <div id="dbnameHelp" class="form-text">Die MySQL-Datenbank muss vom Systemadministrator manuell erstellt werden.</div>
        </div>

        <div class="mb-3">
          <label for="inputMysqlusername" class="form-label">MySQL Benutzername</label>
          <input type="text" class="form-control" id="inputMysqlusername" aria-describedby="mysqlusernameHelp">
          <div id="mysqlusernameHelp" class="form-text">Die MySQL-Datenbank muss vom Systemadministrator manuell erstellt werden.</div>
        </div>

        <div class="mb-3">
          <label for="inputMysqluserpassword" class="form-label">MySQL Benutzerpasswort</label>
          <input type="text" class="form-control" id="inputMysqluserpassword" aria-describedby="mysqluserpasswordHelp">
          <div id="mysqluserpasswordHelp" class="form-text">Die MySQL-Datenbank muss vom Systemadministrator manuell erstellt werden.</div>
        </div>

        <button type="submit" class="btn btn-primary">Installieren</button>
      </form>
    </section>
  </body>
</html>
