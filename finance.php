<?php
require_once "./config/database.php";

#access control and fetching current user
require_once "./partials/access-control.php";

#head
require_once "./partials/head.php";

$amount = $_SESSION['add-finance-data']['amount'] ?? null;
$type = $_SESSION['add-finance-data']['type'] ?? null;
$period = $_SESSION['add-finance-data']['period'] ?? null;
$rec_from = $_SESSION['add-finance-data']['rec_from'] ?? null;
$rec_by = $_SESSION['add-finance-data']['rec_by'] ?? null;
$free_will = $_SESSION['add-finance-data']['free_will'] ?? null;
$expenses = $_SESSION['add-finance-data']['expenses'] ?? null;
$purpose = $_SESSION['add-finance-data']['purpose'] ?? null;
unset($_SESSION['add-finance-data']);
?>

<main class="main__wrapper" style="opacity: 1; display:grid;">
  <!-- aside navbar -->
  <aside class="sidebar sticky">
    <div class="container flex-column">
      <a class='logo' href="<?= ROOT_URL ?>index.php">
        <img src="<?= ROOT_URL ?>images/logo.webp">
      </a>
      <ul class="navbar">
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>index.php" class="nav-link">
            <span target="_self" title="Dashboard" class="link__icon"><i class="fa fa-dashboard"></i></span>
            <p class="link__text">Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>officers.php" class="nav-link">
            <span target="_self" title="Officers" class="link__icon"><i class="fa fa-user-shield"></i></span>
            <p class="link__text">Officers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>members.php" class="nav-link">
            <span target="_self" title="Members" class="link__icon"><i class="fa fa-users-rays"></i></span>
            <p class="link__text">Members</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>youth.php" class="nav-link">
            <span target="_self" title="Youth" class="link__icon"><i class="fa fa-people-group"></i></span>
            <p class="link__text">Youth</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>children.php" class="nav-link">
            <span target="_self" title="Children" class="link__icon"><i class="fa fa-users-between-lines"></i></span>
            <p class="link__text">Children</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>views.php" class="nav-link">
            <span target="_self" title="Views" class="link__icon"><i class="fa fa-table-list"></i></span>
            <p class="link__text">Views</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>finance.php" class="nav-link active">
            <span target="_self" title="Finance" class="link__icon"><i class="fa fa-sack-dollar"></i></span>
            <p class="link__text">Finance</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ROOT_URL ?>auth/signup.php" class="nav-link">
            <span target="_self" title="Sign Up" class="link__icon"><i class="fa fa-sign-in"></i></span>
            <p class="link__text">Sign Up</p>
          </a>
        </li>
      </ul>
      <div class="toggle__navbar-container">
        <button class="toggle__navbar close-btn"><i class="fa fa-angle-left"></i></button>
        <button class="toggle__navbar open-btn"><i class="fa fa-angle-right"></i></button>
      </div>
    </div>
  </aside>

  <!-- main content // dashboard -->
  <div class="main__container">
    <!-- header -->
    <header class="header">
      <?php
      #toggle header buttons
      require_once "./sub-templates/__toggle-button.php";
      ?>
      <!-- seach form -->
      <div class="search__container">
        <form action="<?= ROOT_URL ?>search/finance.php" method="get" autocomplete="off" class="form">
          <input type="text" name="search" class="box" placeholder="search finance here...">
          <button class="search-btn" name="search-btn">Search</i></button>
        </form>
      </div>
      <button class="search-btn-small"><i class="fa fa-search"></i></button>

      <?php
      #botificarions and messages
      require_once "./sub-templates/__notifications-and-messages.php";
      #admin account
      require_once "./partials/admin-account.php";
      ?>
    </header>

    <!-- dashboard begins -->
    <div class="dashboard__container">
      <h4 class="sub-title">Finance</h4>
      <div class="finance__buttons">
        <a href="<?= ROOT_URL ?>finance.php" class="fn-btn active">New Data</a>
        <a href="<?= ROOT_URL ?>ministries-finance.php" class="fn-btn">Ministries</a>
      </div>
      <div class="officers__form-container">
        <?php
        #error message
        require_once './sub-templates/__error-message.php';

        #form
        require_once "./forms/__finance-form.php";
        ?>

      </div>


      <!-- table -->
      <div class="data__container">
        <div class="tabular__wrapper">
          <div class="flex">
            <h4 class="recent-hd">Recently Added</h4>
            <button class="ell-btn tbl-btn"><i class="fa fa-ellipsis-v"></i></button>
            <div class="ell-dropdown tbl-dropdown">
              <a href="<?= ROOT_URL ?>finance.php" class="ell-dpd-btn">
                <span class="primary"><i class="fa fa-eye"></i></span>&emsp;View
              </a>
              <a href="<?= ROOT_URL ?>reports/finance.php" class="ell-dpd-btn">
                <span class="text-green"><i class="fa fa-print"></i></span>&emsp;Print
              </a>
              <a class="ell-dpd-btn close">
                <span class="red-alt"><i class="fa fa-window-close"></i></span>&emsp;Close
              </a>
            </div>
          </div>

          <?php
          $sno = 1;
          $query = " SELECT * FROM finance WHERE type='Tithes' OR type='Offering' OR type='Missions' ORDER BY id DESC";
          $results = mysqli_query($connection, $query);
          ?>
          <?php
          #number of rows
          require_once "./sub-templates/__number-of-rows.php";
          ?>

          <?php if (mysqli_num_rows($results) > 0) : ?>
            <!-- table begins -->
            <table>
              <thead>
                <tr>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">No.</th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">Type</th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Date
                  </th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Amount
                  </th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Rec. By
                  </th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Free Will
                  </th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php while ($record = mysqli_fetch_assoc($results)) : ?>
                  <tr>
                    <td><?= $sno ?></td>
                    <td><?= $record['type'] ?></td>
                    <td><?= $record['date'] ?></td>
                    <td>ghc <?= number_format($record['amount'], 2) ?></td>
                    <td><?= $record['rec_by'] ?></td>
                    <td>ghc <?= number_format($record['free_will'], 2) ?></td>
                    <td>
                      <span class="td-action">
                        <a target="_parent" title="Edit" href="<?= ROOT_URL ?>edit/edit-finance.php?edit_finance_id_number=<?= $record['id'] ?>" class="atn-btn edit"><span><i class="fa fa-user-edit"></i></span></a>
                        <a target="_parent" title="Delete" href="<?= ROOT_URL ?>logic/delete-finance.php?delete_finance_id_number=<?= $record['id'] ?>" class="atn-btn delete"><span><i class="fa fa-trash-can"></i></span></a>
                      </span>
                    </td>
                  </tr>
                <?php $sno++;
                endwhile
                ?>
              </tbody>
            </table>
          <?php else : ?>
            <div class="no-data-fd">
              <p>No Data found!</p>
            </div>
          <?php endif ?>

          <?php
          #pagination
          require_once "./sub-templates/__pagination.php";
          ?>
        </div>

        <?php
        #upcoming events
        require_once "./sub-templates/__upcoming-events.php";
        ?>

      </div>

      <a href="#top" class="top-btn"><i class="fa fa-arrow-up-long"></i></a>
      <footer>
        <p>&copy;CopyRight 2022 | designed by AICL Inc.</p>
      </footer>
    </div>

</main>


<?php
require_once "./partials/footer.php";
?>