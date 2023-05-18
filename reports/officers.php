<?php
require_once "partials/header.php";
require_once "../sub-templates/__loader.php";
?>
<main class="main__container">
  <div class="wrapper">
    <div class="links">
      <a href="<?= ROOT_URL ?>index.php">Home</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/members.php">Members</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/youth.php">Youth</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/children.php">Children</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/finance.php">Finance</a>
    </div>
    <div class="single__container">
      <?php
      #form
      require_once "partials/__officers-form.php";
      ?>
    </div>
  </div>

  <?php
  date_default_timezone_get();
  $date = date('M d, y -  l');
  $sno = 1;
  $query = " SELECT * FROM officers ORDER BY title DESC";
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
          <h4>All Officers Data</h4>
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
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Title</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Name</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Residence
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Group</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Contact
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Status
              </th>
            </tr>
          </thead>
          <tbody>
            <?php while ($record = mysqli_fetch_assoc($results)) : ?>
              <?php
              if ($record['title'] == 'Eld') {
                $record['title'] = 'Elder';
              } elseif ($record['title'] === 'Dcn') {
                $record['title'] = 'Deacon';
              } elseif ($record['title'] === 'Dcns') {
                $record['title'] = 'Deaconess';
              }
              ?>
              <tr>
                <td><?= $sno ?></td>
                <td><?= $record['title'] ?></td>
                <td><?= $record['name'] ?></td>
                <td><?= $record['residence'] ?></td>
                <td><?= $record['group_name'] ?></td>
                <td><?= $record['contact'] ?></td>
                <td><?= $record['status'] ?></td>
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
        $query1 = " SELECT * FROM officers ";
        $query2 = " SELECT * FROM officers WHERE title='Eld'";
        $query3 = " SELECT * FROM officers WHERE title='Dcn'";
        $query4 = " SELECT * FROM officers WHERE title='Dcns'";
        $query_results1 = mysqli_query($connection, $query1);
        $query_results2 = mysqli_query($connection, $query2);
        $query_results3 = mysqli_query($connection, $query3);
        $query_results4 = mysqli_query($connection, $query4);
        $results1 = mysqli_num_rows($query_results1);
        $results2 = mysqli_num_rows($query_results2);
        $results3 = mysqli_num_rows($query_results3);
        $results4 = mysqli_num_rows($query_results4);
        ?>
        <!-- total -->
        <div class="total">
          <small>Elders: <?php echo $results2 ?? 0 ?></small>
          <small>Deacons: <?php echo $results3 ?? 0 ?></small>
          <small>Deaconesses: <?php echo $results4 ?? 0 ?></small>
          <small>Total: <?php echo $results1 ?? 0 ?></small>
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