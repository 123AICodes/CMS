<?php
require_once "partials/header.php";
require_once "../sub-templates/__loader.php";
?>

<main class="main__container">
  <div class="wrapper">
    <div class="links">
      <a href="<?= ROOT_URL ?>index.php">Home</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/officers.php">Officers</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/members.php">Members</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/children.php">Children</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/youth.php">Youth</a>
    </div>
    <div class="single__container">
      <?php
      #form
      require_once "partials/__finance-form.php";
      ?>
    </div>
  </div>

  <?php
  date_default_timezone_get();
  $date = date('M d, y -  l');
  $sno = 1;
  $query = " SELECT * FROM finance ORDER BY type DESC";
  $results = mysqli_query($connection, $query);
  ?>
  <div class="data__container">
    <?php if (mysqli_num_rows($results) > 0) : ?>
      <div class="design">
        <div class="ch__logo">
          <img src="<?= ROOT_URL ?>images/cop.jpg" alt="logo">
        </div>
        <div class="content">
          <h2>The Church Of Pentecost - Ashtown District</h2>
          <h3>Ashtown Central Assembly</h3>
          <h4>All Finance Data</h4>
          <h5>Date: <?php echo $date ?></h5>
        </div>
      </div>

      <div class="tabular__wrapper">
        <?php
        #number of rows
        require_once "../sub-templates/__number-of-rows.php";
        ?>

        <!-- table begins -->
        <table>
          <thead>
            <tr>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">No.</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Type</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Ministry</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Date</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Amount
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Received From
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Received By
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Free Will
              </th>
            </tr>
          </thead>
          <tbody>
            <?php while ($record = mysqli_fetch_assoc($results)) : ?>
              <tr>
                <td><?= $sno ?></td>
                <td><?= $record['type'] ?></td>
                <td><?= $record['ministry'] ?></td>
                <td><?= $record['date'] ?></td>
                <td>Ghc <?= number_format($record['amount'], 2) ?></td>
                <td><?= $record['rec_from'] ?></td>
                <td><?= $record['rec_by'] ?></td>
                <td>Ghc <?= number_format($record['free_will'], 2) ?></td>
              </tr>
            <?php
              $sno++;
            endwhile;
            ?>
          </tbody>
        </table>

        <?php
        #number of rows
        require_once "../sub-templates/__pagination.php";
        ?>

        <?php
        #finance
        require_once "partials/__finance.php";
        ?>
        <!-- total -->
        <div class="total__container">
          <div class="total">
            <small>Tithes: Ghc <?php echo number_format($total4, 2) ?? 0 ?></small>
            <small>Offering: Ghc <?php echo number_format($total5, 2) ?? 0 ?></small>
            <small>Missions: Ghc <?php echo number_format($total6, 2) ?? 0 ?></small>
          </div>
          <div class="total">
            <small>Youth: Ghc <?php echo number_format($total7, 2) ?? 0 ?></small>
            <small>Pemem: Ghc <?php echo number_format($total8, 2) ?? 0 ?></small>
            <small>Women: Ghc <?php echo number_format($total9, 2) ?? 0 ?></small>
          </div>
          <div class="total">
            <small>Welfare: Ghc <?php echo number_format($total10, 2) ?? 0 ?></small>
            <small>Chidren: Ghc <?php echo number_format($total11, 2) ?? 0 ?></small>
            <small>Evangelism: Ghc <?php echo number_format($total12, 2) ?? 0 ?></small>
          </div>
          <div class="total">
            <small>Free Will: Ghc <?php echo number_format($total2, 2) ?? 0 ?></small>
            <small>Offertory: Ghc <?php echo number_format($total13, 2) ?? 0 ?></small>
            <small>Ministries: Ghc <?php echo number_format($total3, 2) ?? 0 ?></small>
            <small class="bg-green">Gross Total: Ghc <?php echo number_format($total1, 2) ?? 0 ?></small>
          </div>
        </div>
      </div>
      <button type="button" onclick="window.print()" class="print-btn"><i class="fa fa-print"></i> Print Record</button>
    <?php else : ?>
      <div class="error-msg">
        <p>No Record Found</p>
      </div>
    <?php endif ?>
  </div>

  <?php if (mysqli_num_rows($results) > 0) : ?>
    <a href="#top" class="top-btn"><i class="fa fa-arrow-up-long"></i></a>
    <footer>
      <p>&copy;CopyRight 2022 | designed by AICL Inc.</p>
    </footer>
  <?php else : ?>
    <a style="display: none;" href="#top" class="top-btn"><i class="fa fa-arrow-up-long"></i></a>
    <footer class="absolute">
      <p>&copy;CopyRight 2022 | designed by AICL Inc.</p>
    </footer>
  <?php endif ?>
</main>

<?php
require_once "partials/footer.php";
?>