<?php
require_once "partials/header.php";

if (isset($_POST['find'])) {
  $type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if ($type == 'All') {
    $query = " SELECT * FROM children ORDER BY title DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type == 'Members') {
    $query = " SELECT * FROM children WHERE p_status='Members' ORDER BY title DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type == 'Not Members') {
    $query = " SELECT * FROM children WHERE p_status='Not Members'ORDER BY title DESC";
    $results = mysqli_query($connection, $query);
  }
} elseif (isset($_POST['find-group'])) {
  $type = filter_var($_POST['group'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if ($type == 'All') {
    $query = " SELECT * FROM children ORDER BY title DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Boys') {
    $query = " SELECT * FROM children WHERE title='Bro'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Gilrs') {
    $query = " SELECT * FROM children WHERE title='Sis'";
    $results = mysqli_query($connection, $query);
  }
} else {
  header('location:' . ROOT_URL . 'reports/children.php');
  die();
}

require_once "../sub-templates/__loader.php";

?>

<main class="main__container">
  <div class="wrapper">
    <div class="links">
      <a href="<?= ROOT_URL ?>reports/children.php">Back</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/officers.php">Officers</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/members.php">Members</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/youth.php">Youth</a> &nbsp;/ &nbsp;
      <a href="<?= ROOT_URL ?>reports/finance.php">Finance</a>
    </div>
    <div class="single__container">
      <?php
      #form
      require_once "partials/__children-form.php";
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
    $type = "Children";
    $query1 = mysqli_query($connection, " SELECT * FROM children");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Members') {
    $type = "Parents Who Are Members";
    $query1 = mysqli_query($connection, " SELECT * FROM children WHERE p_status='Members'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Not Members') {
    $type = "Parents Who Are Not Members";
    $query1 = mysqli_query($connection, " SELECT * FROM children WHERE p_status='Not Members'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Girls') {
    $type = "Girls";
    $query1 = mysqli_query($connection, " SELECT * FROM children WHERE title='Sis'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Boys') {
    $type = "Boys";
    $query1 = mysqli_query($connection, " SELECT * FROM children WHERE title='Bro'");
    $results1 = mysqli_num_rows($query1);
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
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Title</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Name</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Residence
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Mother</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">Father</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                P-Status
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                Current Status
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border:var(--border)">
                School Name
              </th>
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
              if ($record['title'] == 'Bro') {
                $record['title'] = 'Brother';
              } elseif ($record['title'] == 'Sis') {
                $record['title'] = 'Sister';
              }
              ?>
              <tr>
                <td><?= $sno ?></td>
                <td><?= $record['title'] ?></td>
                <td><?= $record['name'] ?></td>
                <td><?= $record['residence'] ?></td>
                <td><?= $record['mother'] ?></td>
                <td><?= $record['father'] ?></td>
                <td><?= $record['p_status'] ?></td>
                <td><?= $record['cur_status'] ?></td>
                <td><?= $record['school'] ?></td>
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
        <!-- total -->
        <div class="total">
          <small class="text-black">Total: <?php echo $results1 ?? 0 ?></small>
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