<?php
require_once "./config/database.php";

#access control and fetching current user
require_once "./partials/access-control.php";

#head
require_once "./partials/head.php";

$title = $_SESSION['admin-data']['title'] ?? null;
$name = $_SESSION['admin-data']['name'] ?? null;
$username = $_SESSION['admin-data']['username'] ?? null;
$email = $_SESSION['admin-data']['email'] ?? null;
$contact = $_SESSION['admin-data']['contact'] ?? null;
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
      <!-- toggle header -->
      <?php
      #toggle header buttons
      require_once "./sub-templates/__toggle-button.php";
      ?>
      <!-- seach form -->
      <div class="search__container">
        <form action="" autocomplete="off" class="form">
          <input type="text" name="" class="box" placeholder="type here...">
          <button class="search-btn">Search</i></button>
        </form>
      </div>
      <button class="search-btn-small"><i class="fa fa-search"></i></button>
      <!-- notifications and messages container-->
      <?php
      #botificarions and messages
      require_once "./sub-templates/__notifications-and-messages.php";
      #admin account
      require_once "./partials/admin-account.php";
      ?>
    </header>

    <div class="profile-setting-container">
      <h3 class="sub-title">Settings</h3>
      <?php if (isset($_SESSION['admin'])) : ?>
        <div class="empty-msg empty-box error">
          <p>
            <?php
            echo $_SESSION['admin'];
            unset($_SESSION['admin']);
            ?>
          </p>
          <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
        </div>
      <?php elseif (isset($_SESSION['admin-success'])) : ?>
        <div class="empty-msg empty-box success">
          <p>
            <?php
            echo $_SESSION['admin-success'];
            unset($_SESSION['admin-success']);
            ?>
          </p>
          <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
        </div>
      <?php elseif (isset($_SESSION['change-pass'])) : ?>
        <div class="empty-msg empty-box error">
          <p>
            <?php
            echo $_SESSION['change-pass'];
            unset($_SESSION['change-pass']);
            ?>
          </p>
          <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
        </div>
      <?php elseif (isset($_SESSION['change-pass-success'])) : ?>
        <div class="empty-msg empty-box success">
          <p>
            <?php
            echo $_SESSION['change-pass-success'];
            unset($_SESSION['change-pass-success']);
            ?>
          </p>
          <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
        </div>
      <?php endif ?>
      <div class="ps-container">
        <!-- change profile -->
        <div class="main-wrapper">
          <div class="ps-wrapper" style="align-items: flex-start;">
            <h4 class="h4">Change Password</h4>
            <div class="ps-form" style="width: 100%;">
              <form style="margin-top: 1em;" action="<?= ROOT_URL ?>logic/change-password-logic.php" method="post" class="form">
                <div hidden class="field"><input type="text" name="id" value="<?= $user['id'] ?>" class="box"></div>
                <div class="field"><input type="password" name="password" class="box" placeholder="new password">
                </div>
                <button class="btn-save" name="change-password">Change Password</button>
              </form>
            </div>
          </div>
        </div>
        <!-- admin form -->
        <?php
        require_once "./forms/__admin-details-form.php";
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