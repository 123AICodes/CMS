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
      <?php
      #botificarions and messages
      require_once "./sub-templates/__notifications-and-messages.php";
      #admin account
      require_once "./partials/admin-account.php";
      ?>
    </header>

    <div class="profile-setting-container">
      <h3 class="sub-title">Profile</h3>
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
      <?php elseif (isset($_SESSION['change-picture'])) : ?>
        <div class="empty-msg empty-box error">
          <p>
            <?php
            echo $_SESSION['change-picture'];
            unset($_SESSION['change-picture']);
            ?>
          </p>
          <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
        </div>
      <?php elseif (isset($_SESSION['change-picture-success'])) : ?>
        <div class="empty-msg empty-box success">
          <p>
            <?php
            echo $_SESSION['change-picture-success'];
            unset($_SESSION['change-picture-success']);
            ?>
          </p>
          <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
        </div>
      <?php endif ?>
      <div class="ps-container">
        <!-- change profile -->
        <div class="main-wrapper">
          <div class="ps-wrapper">
            <h4 class="h4">Change Profile</h4>
            <article class="thumbnail"><img src="<?= ROOT_URL ?>thumbnails/<?= $user['profile'] ?>"></article>
            <div class="ps-form">
              <form action="<?= ROOT_URL ?>logic/change-profile-logic.php" method="post" enctype="multipart/form-data" class="form">
                <div hidden class="field"><input type="text" name="id" value="<?= $user['id'] ?>" class="box"></div>
                <div class="field"><input type="file" name="profile" class="box"></div>
                <div hidden class="field"><input type="text" name="prev_profile" value="<?= $user['profile'] ?>" class="box">
                </div>
                <button class="btn-save" name="change-picture">Change Picture</button>
              </form>
            </div>
          </div>
        </div>

        <?php
        #admin-profile
        require_once "./forms/__admin-profile-form.php";
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