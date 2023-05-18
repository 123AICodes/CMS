<?php
require_once "../config/database.php";

#access control and fetching current user
require_once "../partials/access-control.php";

#head
require_once "../partials/head.php";

if (isset($_GET['edit_children_id_number'])) {
  $child_id = filter_var($_GET['edit_children_id_number'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM children WHERE id='$child_id' ";
  $query_result = mysqli_query($connection, $query);
  $child = mysqli_fetch_assoc($query_result);
} else {
  header('location:' . ROOT_URL . 'children.php');
  die();
}
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
    <!-- header -->
    <header class="header">
      <?php
      #toggle header buttons
      require_once "../sub-templates/__toggle-button.php";
      ?>
      <!-- seach form -->
      <div class="search__container">
        <form action="" autocomplete="off" class="form">
          <input type="text" name="" class="box" placeholder="type here...">
          <button class="search-btn">Search</i></button>
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
      <h4 class="sub-title">Update Child</h4>
      <div class="officers__form-container">

        <?php
        require_once "../forms/__edit-children's-form.php";
        ?>

      </div>


      <!-- table -->
      <div class="data__container">
        <div class="tabular__wrapper">
          <div class="flex">
            <h4 class="recent-hd">Recently Added Youth</h4>
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
          $query = " SELECT * FROM children ORDER BY id DESC";
          $results = mysqli_query($connection, $query);
          ?>
          <?php
          #number of rows
          require_once "../sub-templates/__number-of-rows.php";
          ?>
          <!-- table begins -->
          <table>
            <thead>
              <tr>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">No.</th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">Title</th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">Name</th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                  Residence
                </th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">Parent</th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                  Contact
                </th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                  Profile
                </th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                  Status
                </th>
                <th style="font-size:.8em;padding:.8em;font-weight:600;border-bottom:var(--border-bottom)">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <?php while ($record = mysqli_fetch_assoc($results)) : ?>
                <tr>
                  <td><?= $sno ?></td>
                  <td><?= $record['title'] ?></td>
                  <td><?= $record['name'] ?></td>
                  <td><?= $record['residence'] ?></td>
                  <td><?= $record['mother'] ?></td>
                  <td><?= $record['contact'] ?></td>
                  <td>
                    <div class="img-round-sm"><img src="<?= ROOT_URL ?>thumbnails/<?= $record['profile'] ?>"></div>
                  </td>
                  <td style="text-align: center;">
                    <?php if ($record['status'] === 'Active') : ?>
                      <a href="<?= ROOT_URL ?>page/child-profile.php?child_profile_id_numder=<?= $record['id'] ?>" target="_parent" title="Active" class="status-btn active"><i class="fa fa-check-circle"></i></a>
                    <?php elseif ($record['status'] === 'Normal') : ?>
                      <a href="<?= ROOT_URL ?>page/child-profile.php?child_profile_id_numder=<?= $record['id'] ?>" target="_parent" title="Normal" class="status-btn normal"><i class="fa fa-exclamation-circle"></i></a>
                    <?php else : ?>
                      <a href="<?= ROOT_URL ?>page/child-profile.php?child_profile_id_numder=<?= $record['id'] ?>" target="_parent" title="InActive" class="status-btn inactive"><i class="fa fa-times-circle"></i></a>
                    <?php endif ?>
                  </td>
                  <td>
                    <span class="td-action">
                      <a target="_parent" title="Edit" href="<?= ROOT_URL ?>edit/edit-children.php?edit_children_id_number=<?= $record['id'] ?>" class="atn-btn edit"><span><i class="fa fa-user-edit"></i></span></a>
                      <a target="_parent" title="Delete" href="<?= ROOT_URL ?>logic/delete-children.php?delete_children_id_number=<?= $record['id'] ?>" class="atn-btn delete"><span><i class="fa fa-trash-can"></i></span></a>
                    </span>
                  </td>
                </tr>
              <?php
                $sno++;
              endwhile
              ?>

            </tbody>
          </table>
          <?php
          #number of rows
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