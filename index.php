<?php
  $options['sitetitle'] = 'Materialverwaltung';
  require('./inc/header.inc.php');
?>
      <h1>Suche1</h1>

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
  						<th>Rucksack/Box</th>
              <th>Fach</th>
              <th>Anzahl</th>
              <th>Produkt</th>
              <th>Ablaufdatum</th>
              <th>Löschen</th>
  					</tr>
  				</thead>
  				<tbody>
            <?php
    					$main_statement = $pdo->prepare("SELECT * FROM `main` ORDER BY `row_id`");
    					$main_result = $main_statement->execute();
    					$count = 1;
    					while($row = $main_statement->fetch()) {
                //
                $pack_name = $pdo->prepare("SELECT `pack_name` FROM `pack` WHERE `row_id` = ".$row['pack_id']);
                $pack_name->execute();

                //
                $product_name = $pdo->prepare("SELECT `product_name` FROM `product` WHERE `row_id` = ".$row['product_id']);
        				$product_name->execute();
  					?>
  					<tr>
              <!-- Rucksack/Box - <select> -->
  						<td>
                <div class='edit' id="pack_<?php echo $row['row_id']; ?>"> <?php echo $pack_name->fetch()['pack_name']; ?></div>
                <select name="change_pack" class="txtedit" securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>" entry="pack_id" table="main" rowid="<?php echo $row['row_id']; ?>">
                  <?php
                    $pack_statement = $pdo->prepare("SELECT * FROM `pack` ORDER BY `row_id`");
                    $pack_result = $pack_statement->execute();
                    while($pack_row = $pack_statement->fetch()) {
                  ?>
                  <option value="<?php echo $pack_row['row_id']; ?>_<?php echo $pack_row['pack_name']; ?>" <?php if ($pack_row['row_id'] == $row['pack_id']) { echo 'selected'; } ?>><?php echo $pack_row['pack_name']; ?></option>
                  <?php } ?>
                </select>
                
              </td>

              <!-- Fach <select> -->
              <td></td>
              <td><?php echo $row['number']; ?></td>
              <td><?php echo $product_name->fetch()['product_name']; ?></td>
              <td><?php echo $row['expiry_date']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
<?php require('./inc/footer.inc.php'); ?>
