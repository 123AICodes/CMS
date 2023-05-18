<?php
require_once "../config/database.php";

#access control and fetching current user
require_once "../partials/access-control.php";

require_once "../partials/head.php";

if (isset($_GET['search-btn'])) {
  $sno = 1;
  $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if (empty($_GET['search'])) {
    header('location:' . ROOT_URL . 'finance.php');
    die();
  } else {
    $query = " SELECT * FROM finance WHERE CONCAT(type, period, amount, rec_from,rec_by,ministry) LIKE '%$search%' ORDER BY id DESC";
    $results = mysqli_query($connection, $query);
  }
} else {
  header('location:' . ROOT_URL . 'finance.php');
  die();
}

?>
<?php
require_once "../sub-templates/__loader.php";
?>
<main class="m-prof">
  <header class="header">
    <!-- seach form -->
    <div class="search__container">
      <form class="form">
        <a href="<?= ROOT_URL ?>index.php">Dashbord</a>&nbsp;/&nbsp;
        <a href="<?= ROOT_URL ?>finance.php">Finance</a>
      </form>
    </div>
    <button class="search-btn-small"><i class="fa fa-bars"></i></button>
    <?php
    #botificarions and messages
    require_once "../sub-templates/__notifications-and-messages.php";
    #admin account
    require_once "../partials/admin-account.php";
    ?>
  </header>


  <div style="padding: 1em 3%; margin-top: 2em; width:100%">
    <h5 class="search-rslt" style="font-size: 2em;font-weight:500;">Search Results</h5>
  </div>
  <div style="padding: 0 3%; display:grid; grid-template-columns: repeat(1,1fr);" class="data__container">
    <div class="tabular__wrapper">
      <div class="flex">
        <h4 class="recent-hd">Data Found</h4>
      </div>

      <?php
      #number of rows
      require_once "../sub-templates/__number-of-rows.php";
      ?>

      <!-- table begins -->
      <table>
        <?php if (mysqli_num_rows($results) > 0) : ?>
          <thead>
            <tr>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">No.</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">Type</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">Ministry</th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                Date
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                Amount
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                Received From
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                Received By
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                Free Will
              </th>
              <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                Action
              </th>
            </tr>
          </thead>
          <?php while ($member = mysqli_fetch_assoc($results)) : ?>
            <?php
            if ($member['type'] == '') {
              $member['type'] = '-';
            } elseif ($member['ministry'] == '') {
              $member['ministry'] = '-';
            } elseif ($member['free_will'] == '') {
              $member['free_will'] = '-';
            }

            ?>

            <tbody>
              <tr>
                <td><?= $sno ?></td>
                <td><?= $member['type'] ?></td>
                <td><?= $member['ministry'] ?></td>
                <td><?= $member['date'] ?></td>
                <td>ghc <?= number_format($member['amount'], 2) ?></td>
                <td><?= $member['rec_from'] ?></td>
                <td><?= $member['rec_by'] ?></td>
                <td><?= number_format($member['free_will'], 2) ?></td>
                <td>
                  <span class="td-action">
                    <a target="_parent" title="Edit" href="<?= ROOT_URL ?>edit/edit-finance.php?edit_finance_id_number=<?= $member['id'] ?>" class="atn-btn edit"><span><i class="fa fa-user-edit"></i></span></a>
                    <a target="_parent" title="Delete" href="<?= ROOT_URL ?>logic/delete-finance.php?delete_finance_id_number=<?= $member['id'] ?>" class="atn-btn delete"><span><i class="fa fa-trash-can"></i></span></a>
                  </span>
                </td>
              </tr>

            </tbody>
          <?php
            $sno++;
          endwhile;
          ?>
        <?php else : ?>
          <div class="no-data-fd">
            <p>No Data found!</p>
          </div>
        <?php endif ?>
      </table>

      <?php
      #number of rows
      require_once "../sub-templates/__pagination.php";
      ?>

    </div>
  </div>


  <a href="#top" class="top-btn"><i class="fa fa-arrow-up-long"></i></a>
  <footer>
    <p>&copy;CopyRight 2022 | designed by AICL Inc.</p>
  </footer>
</main>


<?php
require_once "../partials/profile-footer.php";
?>