<?php
require_once "../config/database.php";

#access control and fetching current user
require_once "../partials/access-control.php";

#head
require_once "../partials/head.php";

if (isset($_GET['edit_min-finance_id_number'])) {
  $finance_id = filter_var($_GET['edit_min-finance_id_number'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM finance WHERE id='$finance_id' ";
  $query_result = mysqli_query($connection, $query);
  $finance = mysqli_fetch_assoc($query_result);
} else {
  header('location:' . ROOT_URL . 'ministries-finance.php');
  die();
}
?>


<main class="main__wrapper" style="opacity: 1; display:grid;">
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
          <a href="<?= ROOT_URL ?>finance.php" class="nav-link">
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
    <header class="header">
      <?php
      #toggle header buttons
      require_once "../sub-templates/__toggle-button.php";
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
      require_once "../sub-templates/__notifications-and-messages.php";
      #admin account
      require_once "../partials/admin-account.php";
      ?>
    </header>


    <!-- dashboard begins -->
    <div class="dashboard__container">
      <h4 class="sub-title">Edit <?= $finance['ministry'] ?> Ministry Finance</h4>


      <div style="margin-top: 1em;" class="officers__form-container">
        <?php
        require_once "../forms/__edit-min-finance-form.php";
        ?>
      </div>


      <!-- table -->
      <div class="data__container">
        <div class="tabular__wrapper">
          <div class="flex">
            <h4 class="recent-hd">Recently Added</h4>
            <button class="ell-btn tbl-btn"><i class="fa fa-ellipsis-v"></i></button>
            <div class="ell-dropdown tbl-dropdown">
              <a href="" class="ell-dpd-btn">
                <span class="primary"><i class="fa fa-eye"></i></span>&emsp;View
              </a>
              <a href="" class="ell-dpd-btn">
                <span class="text-green"><i class="fa fa-print"></i></span>&emsp;Print
              </a>
              <a class="ell-dpd-btn close">
                <span class="red-alt"><i class="fa fa-window-close"></i></span>&emsp;Close
              </a>
            </div>
          </div>
          <?php
          $sno = 1;
          $query = " SELECT * FROM finance WHERE ministry='Youth' OR ministry='Pemem' OR ministry='Women' OR ministry='Children' OR ministry='Welfare' OR ministry='Evangelism' ORDER BY id DESC";
          $results = mysqli_query($connection, $query);
          ?>
          <?php
          #number of rows
          require_once "../sub-templates/__number-of-rows.php";
          ?>

          <?php if (mysqli_num_rows($results) > 0) : ?>
            <!-- table begins -->
            <table>
              <thead>
                <tr>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">No.</th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">Ministry</th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Date
                  </th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Amount
                  </th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Rec. From
                  </th>
                  <th style="font-size: .8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                    Rec. By
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
                    <td><?= $record['ministry'] ?></td>
                    <td><?= $record['date'] ?></td>
                    <td>ghc <?= number_format($record['amount'], 0) ?></td>
                    <td><?= $record['rec_from'] ?></td>
                    <td><?= $record['rec_by'] ?></td>
                    <td>
                      <span class="td-action">
                        <a target="_parent" title="Edit" href="<?= ROOT_URL ?>edit/edit-min-finance.php?edit_min-finance_id_number=<?= $record['id'] ?>" class="atn-btn edit"><span><i class="fa fa-user-edit"></i></span></a>
                        <a target="_parent" title="Delete" href="<?= ROOT_URL ?>logic/delete-min-finance.php?delete_min-finance_id_number=<?= $record['id'] ?>" class="atn-btn delete"><span><i class="fa fa-trash-can"></i></span></a>
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
          require_once "../sub-templates/__pagination.php";
          ?>
        </div>

        <?php
        #upcoming events
        require_once "../sub-templates/__upcoming-events.php";
        ?>

      </div>

      <a href="#top" class="top-btn"><i class="fa fa-arrow-up-long"></i></a>
      <footer>
        <p>&copy;CopyRight 2022 | designed by AICL Inc.</p>
      </footer>
    </div>

</main>


<?php
require_once "../partials/footer.php";
?>