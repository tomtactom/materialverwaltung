<?php
  $options['sitetitle'] = 'Materialverwaltung';
  require('./inc/header.inc.php');
?>
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
<?php require('./inc/footer.inc.php'); ?>
