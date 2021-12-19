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
    					$statement = $pdo->prepare("SELECT * FROM `main` ORDER BY `row_id`");
    					$result = $statement->execute();
    					$count = 1;
    						while($row = $statement->fetch()) {
                $pack_name = $pdo->prepare("SELECT `pack_name` FROM `pack` WHERE `row_id` = ".$row['pack_id']);
                $product_name = $pdo->prepare("SELECT `product_name` FROM `product` WHERE `row_id` = ".$row['product_id']);
        				$pack_name->execute();
        				$product_name->execute();
  					?>
  					<tr>
  						<td>
                <div class='edit' > <?php echo $pack_name->fetch()['pack_name']; ?></div>
                <select name="change_pack" class='txtedit'>
                  <?php
                    $statement = $pdo->prepare("SELECT * FROM `pack` ORDER BY `row_id`");
                    $result = $statement->execute();
                    while($packs = $statement->fetch()) {
                  ?>
                  <option
                    value="<?php echo $packs['row_id']; ?>"
                    <?php if ($packs['row_id'] == $row['pack_id']) { echo 'selected'; } ?>
                    called="<?php echo $packs['pack_name']; ?>"
                    securitycode="<?php echo sha1($config['admin_cookie_hash']); ?>"
                    entry="pack_id"
                    table="main"
                  >
                    <?php echo $packs['pack_name']; ?>
                  </option>
                  <?php } ?>
                </select>
                <?php echo $pack_name->fetch()['pack_name']; ?>
              </td>
              <td><?php if($row['compartment_name'] == false) { echo 'Allgemein'; } else { echo $row['compartment_name']; } ?></td>
              <td><?php echo $row['number']; ?></td>
              <td><?php echo $product_name->fetch()['product_name']; ?></td>
              <td><?php echo $row['expiry_date']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
<?php require('./inc/footer.inc.php'); ?>
