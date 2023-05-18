<?php
require_once "partials/header.php";

if (isset($_POST['find'])) {
  $type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if ($type == 'All') {
    $query = " SELECT * FROM officers ORDER BY title DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Eld') {
    $query = " SELECT * FROM officers WHERE title='Eld'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Dcn') {
    $query = " SELECT * FROM officers WHERE title='Dcn'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Dcns') {
    $query = " SELECT * FROM officers WHERE title='Dcns'";
    $results = mysqli_query($connection, $query);
  }
} elseif (isset($_POST['find-group'])) {
  $type = filter_var($_POST['group'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if ($type == 'All') {
    $query = " SELECT * FROM officers ORDER BY title DESC";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Luke') {
    $query = " SELECT * FROM officers WHERE group_name='Luke'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'John') {
    $query = " SELECT * FROM officers WHERE group_name='John'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Mark') {
    $query = " SELECT * FROM officers WHERE group_name='Mark'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'James') {
    $query = " SELECT * FROM officers WHERE group_name='James'";
    $results = mysqli_query($connection, $query);
  } elseif ($type === 'Matthew') {
    $query = " SELECT * FROM officers WHERE group_name='Matthew'";
    $results = mysqli_query($connection, $query);
  }
} else {
  header('location:' . ROOT_URL . 'reports/officers.php');
  die();
}

require_once "../sub-templates/__loader.php";
?>

<main class="main__container">
  <div class="wrapper">
    <div class="links">
      <a href="<?= ROOT_URL ?>reports/officers.php">Back</a> &nbsp;/ &nbsp;
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
  $sno = 1;
  date_default_timezone_get();
  $date = date('M d, y -  l');
  ?>
  <?php
  if ($type == 'All') {
    $type = "Officers";
    $query1 = mysqli_query($connection, " SELECT * FROM officers");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Eld') {
    $type = "Elder's";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE title='Eld'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type === 'Dcn') {
    $type = "Deacon's";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE title='Dcn'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Dcns') {
    $type = "Deaconesses";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE title='Dcns'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Luke') {
    $type = "Luke's Officers";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE group_name='Luke'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Mark') {
    $type = "Mark's Officers";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE group_name='Mark'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'John') {
    $type = "John's Officers";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE group_name='John'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'James') {
    $type = "James's Officers";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE group_name='James'");
    $results1 = mysqli_num_rows($query1);
  } elseif ($type == 'Matthew') {
    $type = "Matthew's Officers";
    $query1 = mysqli_query($connection, " SELECT * FROM officers WHERE group_name='Matthew'");
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
                $record['title'] = 'Deaconesses';
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