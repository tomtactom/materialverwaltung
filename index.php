<?php
  $options['sitetitle'] = 'Materialverwaltung';
  require('./inc/header.inc.php');
?>
      <h1>Suche</h1>

      <p>Beispiel für ein einfaches Suchformular.</p>

      <!-- Suchformular mit Eingabefeld und Button -->
      <form class="well form-search">
        <input type="text" class="input-medium search-query"/>
        <button type="submit" class="btn btn-primary">Suchen</button>
      </form>
      <div id="alertarea"></div>

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
                  $pack_row = $pdo->prepare("SELECT * FROM `pack` WHERE `row_id` = ".$row['pack_id']);
                  $pack_row->execute();
                  $selected_pack_row = $pack_row->fetch();
                  $pack_row = false;
                ?>
                <div class="edit"
                  selected_section_id="<?php echo $selected_pack_row['section_id']; ?>"
                  selected_pack_type="<?php echo $selected_pack_row['pack_type']; ?>"
                  selected_pack_name="<?php echo $selected_pack_row['pack_name']; ?>"
                  selected_din_format="<?php echo $selected_pack_row['din_format']; ?>"
                  selected_description="<?php echo $selected_pack_row['description']; ?>"
                  selected_timestamp_created="<?php echo $selected_pack_row['timestamp_created']; ?>"
                  selected_created_by_user_id="<?php echo $selected_pack_row['created_by_user_id']; ?>"
                  selected_timestamp_changed="<?php echo $selected_pack_row['timestamp_changed']; ?>"
                  selected_changed_by_user_id="<?php echo $selected_pack_row['changed_by_user_id']; ?>"
                ><?php echo $selected_pack_row['pack_name']; ?></div>
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

              <!-- Anzahl <input type="number"> (NOT 0 DEFAULT 1) -->
              <td>
                <div class="edit"><?php echo $row['number']; ?></div>
                <input type="number" name="change_number" class="txtedit" securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>" entry="number" table="main" value="<?php echo $row['number']; ?>" rowid="<?php echo $row['row_id']; ?>">
              </td>

              <!-- Produkt <select> -->
              <td>
                <?php
                  $product_name = $pdo->prepare("SELECT `product_name` FROM `product` WHERE `row_id` = ".$row['product_id']);
                  $product_name->execute();
                ?>
                <div class="edit"><?php echo $product_name->fetch()['product_name']; ?></div>
                <select name="change_product" class="txtedit" securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>" entry="product_id" table="main" rowid="<?php echo $row['row_id']; ?>">
                  <?php
                    $product_statement = $pdo->prepare("SELECT * FROM `product` ORDER BY `row_id`");
                    $product_result = $product_statement->execute();
                    while($product_row = $product_statement->fetch()) {
                  ?>
                  <option value="<?php echo $product_row['row_id']; ?>" called="<?php echo $product_row['product_name']; ?>" <?php if ($product_row['row_id'] == $row['product_id']) { echo 'selected'; } ?>><?php echo $product_row['product_name']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <!-- Anzahl <input type="date">  -->
              <td>
                <div class="edit"><?php if(empty($row['expiry_date'])) { echo '<i>Kein Ablaufdatum</i>'; } else { echo $row['expiry_date']; } ?></div>
                <input type="date" name="change_expiry_date" class="txtedit" securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>" entry="expiry_date" table="main" value="<?php echo $row['expiry_date']; ?>" rowid="<?php echo $row['row_id']; ?>">
              </td>

              <td>
                <button class="btn btn-dark">Löschen</button>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
<?php require('./inc/footer.inc.php'); ?>
