<?php
require_once "partials/header.php";

if (isset($_POST['find'])) {
  $type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if ($type == 'All') {
    $query = " SELECT * FROM finance ORDER BY type DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type == 'Offering') {
    $query = " SELECT * FROM finance WHERE type='Offering' ORDER BY date DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type == 'Tithes') {
    $query = " SELECT * FROM finance WHERE type='Tithes'ORDER BY date DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type == 'Missions') {
    $query = " SELECT * FROM finance WHERE type='Missions'ORDER BY date DESC";
    $results = mysqli_query($connection, $query);
  }
} elseif (isset($_POST['find-group'])) {
  $type = filter_var($_POST['group'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if ($type == 'All') {
    $query = " SELECT * FROM finance ORDER BY ministry DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Youth') {
    $query = " SELECT * FROM finance WHERE ministry='Youth'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Pemem') {
    $query = " SELECT * FROM finance WHERE ministry='Pemem'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Women') {
    $query = " SELECT * FROM finance WHERE ministry='Women'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Welfare') {
    $query = " SELECT * FROM finance WHERE ministry='Welfare'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Children') {
    $query = " SELECT * FROM finance WHERE ministry='Children'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Evangelism') {
    $query = " SELECT * FROM finance WHERE ministry='Evangelism'";
    $results = mysqli_query($connection, $query);
  }
} else {
  header('location:' . ROOT_URL . 'reports/finance.php');
  die();
}

require_once "../sub-templates/__loader.php";

?>

<main class="main__container">
  <div class="wrapper">
    <div class="links">
      <a href="<?= ROOT_URL ?>reports/finance.php">Back</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/officers.php">Officers</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/members.php">Members</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/children.php">Children</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/youth.php">Youth</a>
    </div>
    <div class="single__container">
      <?php
      require_once "partials/__finance-form.php";
      ?>
    </div>
  </div>

  <?php
  $sno = 1;
  date_default_timezone_get();
  $date = date('M d, y -  l');
  ?>
  <?php
  if ($type == 'All') {
    $type = "Finance";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Offering') {
    $type = "Offerings";
    #total tithes recorded
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE type='Offering'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Tithes') {
    $type = "Tithes";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE type='Tithes'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Missions') {
    $type = "Missions Offering";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE type='Missions'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Youth') {
    $type = "Youth Financial";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Youth'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Pemem') {
    $type = "Pemem Financial";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Pemem'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Women') {
    $type = "Women Financial";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Women'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Welfare') {
    $type = "Welfare Financial";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Welfare'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Children') {
    $type = "Children Financial";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Children'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  } elseif ($type == 'Evangelism') {
    $type = "Evangelism Financial";
    $total1 = 0;
    $query1 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Evangelism'");
    while ($result1 = mysqli_fetch_array($query1)) {
      $total1 += $result1['amount'];
    }
  }
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
          <h4>All <?php echo $type ?> Data</h4>
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
        <!-- total -->
        <div class="total__container">
          <div class="total">
            <small style="background: none; border:none; color:#666;" class="text-black">Total: Ghc <?php echo number_format($total1, 2) ?? 0 ?></small>
          </div>
        </div>
      </div>
      <button type="button" onclick="window.print()" class="print-btn"><i class="fa fa-print"></i> Print Record</button>
    <?php else : ?>
      <div class="error-msg">
        <p>No Record Found</p>
        <button type="button" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
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