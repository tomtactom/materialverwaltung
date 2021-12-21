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
    					while($row = $main_statement->fetch()) {
  					?>
  					<tr>
              <!-- Rucksack/Box - <select> -->
  						<td>
                <?php
                  $pack_name = $pdo->prepare("SELECT `pack_name` FROM `pack` WHERE `row_id` = ".$row['pack_id']);
                  $pack_name->execute();
                ?>
                <div class="edit"><?php echo $pack_name->fetch()['pack_name']; ?></div>
                <select name="change_pack" class="txtedit" securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>" entry="pack_id" table="main" rowid="<?php echo $row['row_id']; ?>">
                  <?php
                    $pack_statement = $pdo->prepare("SELECT * FROM `pack` ORDER BY `row_id`");
                    $pack_result = $pack_statement->execute();
                    while($pack_row = $pack_statement->fetch()) {
                  ?>
                  <option value="<?php echo $pack_row['row_id']; ?>" called="<?php echo $pack_row['pack_name']; ?>" <?php if ($pack_row['row_id'] == $row['pack_id']) { echo 'selected'; } ?>><?php echo $pack_row['pack_name']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <!-- Fach <select> -->
              <td>
                <?php
                  $compartment_name = $pdo->prepare("SELECT `compartment_name` FROM `compartment` WHERE `row_id` = ".$row['compartment_id']);
                  $compartment_name->execute();
                ?>
                <div class="edit"><?php echo $compartment_name->fetch()['compartment_name']; ?></div>
                <select name="change_compartment" class="txtedit" securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>" entry="compartment_id" table="main" rowid="<?php echo $row['row_id']; ?>">
                  <?php
                    $compartment_statement = $pdo->prepare("SELECT * FROM `compartment` ORDER BY `row_id`");
                    $compartment_result = $compartment_statement->execute();
                    while($compartment_row = $compartment_statement->fetch()) {
                  ?>
                  <option value="<?php echo $compartment_row['row_id']; ?>" called="<?php echo $compartment_row['compartment_name']; ?>" <?php if ($compartment_row['row_id'] == $row['compartment_id']) { echo 'selected'; } ?>><?php echo $compartment_row['compartment_name']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <td>
                <div class="edit"><?php echo $row['number']; ?></div>
                <input type="number" name="change_number" class="txtedit" securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>" entry="number" table="main" rowid="<?php echo $row['row_id']; ?>">
              </td>
              <!-- Produkt -->
              <td>
                <?php
                  $product_name = $pdo->prepare("SELECT `product_name` FROM `product` WHERE `row_id` = ".$row['product_id']);
                  $product_name->execute();
                ?>
                <?php echo $product_name->fetch()['product_name']; ?>
              </td>
              <td><?php echo $row['expiry_date']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
<?php require('./inc/footer.inc.php'); ?>
