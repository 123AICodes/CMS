<?php
require_once "./config/database.php";

#access control and fetching current user
require_once "./partials/access-control.php";

#head
require_once "./partials/head.php";
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
          <a href="<?= ROOT_URL ?>views.php" class="nav-link active">
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
      require_once "./sub-templates/__toggle-button.php";
      ?>
      <!-- seach form -->
      <div class="search__container">
        <form action="<?= ROOT_URL ?>search/member.php" method="get" autocomplete="off" class="form">
          <input type="text" name="search" class="box" placeholder="search member here...">
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
      <h4 class="sub-title">View All Data</h4>
      <div class="views__buttons-container">
        <span>
          <a href="<?= ROOT_URL ?>views.php" class="view-btn">All Members</a>
          <a href="<?= ROOT_URL ?>view-men.php" class="view-btn active">Men</a>
        </span>
        <span>
          <a href="<?= ROOT_URL ?>view-aged.php" class="view-btn">Aged</a>
          <a href="<?= ROOT_URL ?>view-youth.php" class="view-btn">Youth</a>
        </span>
        <span>
          <a href="<?= ROOT_URL ?>view-women.php" class="view-btn">Women</a>
          <a href="<?= ROOT_URL ?>view-officers.php" class="view-btn">Officers</a>
          <a href="<?= ROOT_URL ?>view-children.php" class="view-btn">Children</a>
        </span>
      </div>


      <!-- table -->
      <div class="data__container">
        <div class="tabular__wrapper">
          <div class="flex">
            <h4 class="recent-hd">Recently Added Members</h4>
            <button class="ell-btn tbl-btn"><i class="fa fa-ellipsis-v"></i></button>
            <div class="ell-dropdown tbl-dropdown">
              <a href="<?= ROOT_URL ?>views.php" class="ell-dpd-btn">
                <span class="primary"><i class="fa fa-eye"></i></span>&emsp;View
              </a>
              <a href="<?= ROOT_URL ?>reports/members.php" class="ell-dpd-btn">
                <span class="text-green"><i class="fa fa-print"></i></span>&emsp;Print
              </a>
              <a class="ell-dpd-btn close">
                <span class="red-alt"><i class="fa fa-window-close"></i></span>&emsp;Close
              </a>
            </div>
          </div>



          <?php
          $sno = 1;
          $query = " SELECT * FROM members WHERE title='Bro' ORDER BY id DESC";
          $results = mysqli_query($connection, $query);
          ?>
          <?php
          #number of rows
          require_once "./sub-templates/__number-of-rows.php";
          ?>

          <!-- table begins -->
          <table>
            <?php
            require_once "./sub-templates/__table-head.php";
            ?>
            <tbody>
              <?php while ($record = mysqli_fetch_assoc($results)) : ?>
                <tr>
                  <td><?= $sno ?></td>
                  <td><?= $record['title'] ?></td>
                  <td><?= $record['name'] ?></td>
                  <td><?= $record['residence'] ?></td>
                  <td><?= $record['group_name'] ?></td>
                  <td><?= $record['contact'] ?></td>
                  <td>
                    <div class="img-round-sm"><img src="<?= ROOT_URL ?>thumbnails/<?= $record['profile'] ?>"></div>
                  </td>
                  <td style="text-align: center;">
                    <?php if ($record['status'] === 'Active') : ?>
                      <a href="<?= ROOT_URL ?>page/member-profile.php?member_profile_id_numder=<?= $record['id'] ?>" target="_parent" title="Active" class="status-btn active"><i class="fa fa-check-circle"></i></a>
                    <?php elseif ($record['status'] === 'Normal') : ?>
                      <a href="<?= ROOT_URL ?>page/member-profile.php?member_profile_id_numder=<?= $record['id'] ?>" target="_parent" title="Normal" class="status-btn normal"><i class="fa fa-exclamation-circle"></i></a>
                    <?php else : ?>
                      <a href="<?= ROOT_URL ?>page/member-profile.php?member_profile_id_numder=<?= $record['id'] ?>" target="_parent" title="InActive" class="status-btn inactive"><i class="fa fa-times-circle"></i></a>
                    <?php endif ?>
                  </td>
                  <td>
                    <span class="td-action">
                      <a target="_parent" title="Edit" href="<?= ROOT_URL ?>edit/edit-member.php?edit_member_id_number=<?= $record['id'] ?>" class="atn-btn edit"><span><i class="fa fa-user-edit"></i></span></a>
                      <a target="_parent" title="Delete" href="<?= ROOT_URL ?>logic/delete-member.php?delete_member_id_number=<?= $record['id'] ?>" class="atn-btn delete"><span><i class="fa fa-trash-can"></i></span></a>
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