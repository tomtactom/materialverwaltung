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
      <div class="table-scrollable">
        <table class="table table-striped table-bordered">
          <thead>
  					<tr>
  						<th>Box</th>
              <th></th>
  					</tr>
  				</thead>
  				<tbody>
            <?php
    					$statement = $pdo->prepare("SELECT * FROM `main` ORDER BY `row_id`");
    					$result = $statement->execute();
    					$count = 1;
    						while($row = $statement->fetch()) {
                $pack_name = $pdo->prepare("SELECT `pack_name` FROM `pack` WHERE `row_id` = ".$row['pack_id'])->execute();
  					?>
  					<tr>
  						<td><?php print_r($pack_name->fetch()['pack_name']); ?></td>
              <td></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
<?php require('./inc/footer.inc.php'); ?>
