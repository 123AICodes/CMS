  <!-- admin account -->
  <div class="admin__account-container">
    <button class="has-content admin__info">
      <div class="info">
        <h5><?= $user['name'] ?></h5>
        <small>Admin</small>
      </div>
      <div class="image__round"><img src="<?= ROOT_URL ?>thumbnails/<?= $user['profile'] ?>"></div>
    </button>
    <div class="admin__box dropdown">
      <a href="<?= ROOT_URL ?>profile.php">
        <span class="text-blue"><i class="fa fa-user-alt"></i></span>&nbsp;
        Profile
      </a>
      <a href="<?= ROOT_URL ?>settings.php">
        <span class="primary"><i class="fa fa-cogs"></i></span>&nbsp;
        Settings
      </a>
      <a style="pointer-events:none;" href="<?= ROOT_URL ?>activity.php">
        <span class="text-green"><i class="fa fa-list"></i></span>&nbsp;
        Activity Logs
      </a>
      <a href="<?= ROOT_URL ?>signout.php" class="close">
        <span class="red-alt"><i class="fa fa-sign-out"></i></span>&nbsp;
        Sign Out
      </a>
    </div>
  </div>