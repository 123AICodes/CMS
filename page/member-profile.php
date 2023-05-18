<?php
require_once "../config/database.php";

#access control and fetching current user
require_once "../partials/access-control.php";

require_once "../partials/profile-head.php";

if (isset($_GET['member_profile_id_numder'])) {
  $member_id = filter_var($_GET['member_profile_id_numder'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM members WHERE id='$member_id' ";
  $results = mysqli_query($connection, $query);
  $member = mysqli_fetch_assoc($results);
} else {
  header('location:' . ROOT_URL . 'members.php');
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
      <form action="<?= ROOT_URL ?>search/members.php" method="get" autocomplete="off" class="form">
        <input type="text" name="search" class="box" placeholder="search members here...">
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

  <main class="member__profile-container">
    <div class="prev_wrp">
      <a href="<?= ROOT_URL ?>members.php" target="_parent" title="Go Back" class="previous">
        <span><i class="fa fa-arrow-left-long"></i></span>
      </a>
    </div>
    <?php
    if ($member['title'] === "Sis") {
      $member['title'] = "Sister";
    } elseif ($member['title'] === "Bro") {
      $member['title'] = "Brother";
    }
    ?>
    <div class="member__container">
      <article class="m-pf__wrapper">
        <img src="<?= ROOT_URL ?>thumbnails/<?= $member['profile'] ?>" alt="member">
      </article>
      <article class="m-data__wrapper">
        <h4>Member Profile</h4>
        <?php
        #data
        require_once "../sub-templates/__mo-profile-data.php";
        ?>
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