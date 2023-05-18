<?php
require_once "../config/database.php";

#access control and fetching current user
require_once "../partials/access-control.php";

require_once "../partials/profile-head.php";

if (isset($_GET['youth_profile_id_numder'])) {
  $member_id = filter_var($_GET['youth_profile_id_numder'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM youth WHERE id='$member_id' ";
  $results = mysqli_query($connection, $query);
  $member = mysqli_fetch_assoc($results);
} else {
  header('location:' . ROOT_URL . 'youth.php');
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
      <form action="<?= ROOT_URL ?>search/youth.php" method="get" autocomplete="off" class="form">
        <input type="text" name="search" class="box" placeholder="search youth here...">
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

  <?php
  if ($member['title'] === "Sis") {
    $member['title'] = "Sister";
  } elseif ($member['title'] === "Bro") {
    $member['title'] = "Brother";
  }
  ?>
  <main class="member__profile-container">
    <div class="prev_wrp">
      <a href="<?= ROOT_URL ?>youth.php" target="_parent" title="Go Back" class="previous">
        <span><i class="fa fa-arrow-left-long"></i></span>
      </a>
    </div>
    <div class="member__container">
      <article class="m-pf__wrapper">
        <img src="<?= ROOT_URL ?>thumbnails/<?= $member['profile'] ?>" alt="member">
      </article>
      <article class="m-data__wrapper">
        <h4>Youth Profile</h4>
        <div class="m-flx-ctn">
          <p>Title : <b><?= $member['title'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Name : <b><?= $member['name'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Marital Status :<b><?= $member['marital_status'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Residence : <b><?= $member['residence'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Group Name :<b><?= $member['group_name'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Email : <b><?= $member['email'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Phone No : <b><?= $member['contact'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Ministry : <b><?= $member['ministry'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <div class="m-flx-ctn">
          <p>Current Stats : <b><?= $member['current_status'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <?php if ($member['school'] == '') : ?>
        <?php else : ?>
          <div class="m-flx-ctn">
            <p>School : <b><?= $member['school'] ?></b></p>
            <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
          </div>
        <?php endif ?>
        <div class="m-flx-ctn">
          <p>Youth Type : <b><?= $member['youth_type'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
        <!-- status -->
        <?php if ($member['status'] == 'Active') : ?>
          <div class="m-flx-ctn">
            <p>Status : <b><?= $member['status'] ?></b></p>
            <span class="m-icn active" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
          </div>
        <?php elseif ($member['status'] == 'Normal') : ?>
          <div class="m-flx-ctn">
            <p>Status : <b><?= $member['status'] ?></b></p>
            <span class="m-icn normal" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
          </div>
        <?php else : ?>
          <div class="m-flx-ctn">
            <p>Status : <b><?= $member['status'] ?></b></p>
            <span class="m-icn inactive" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
          </div>
        <?php endif ?>
        <div class="m-flx-ctn">
          <p>Date : <b><?= $member['date'] ?></b></p>
          <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
        </div>
      </article>
    </div>
  </main>

  <a href="#top" class="top-btn"><i class="fa fa-arrow-up-long"></i></a>
  <footer>
    <p>&copy;CopyRight 2022 | designed by AICL Inc.</p>
  </footer>
</main>

<?php
require_once "../partials/profile-footer.php";
?>