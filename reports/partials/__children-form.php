<div class="single">
  <p>Parents: </p>
  <form action="<?= ROOT_URL ?>reports/single-child.php" method="post" class="form">
    <div class="flex">
      <select name="type">
        <option value="All">All</option>
        <option value="Members">Members</option>
        <option value="Not Members">Not Members</option>
      </select>
      <button type="submit" class="btn" name="find"><span><i class="fa fa-search"></i></span></button>
    </div>
  </form>
</div>
<div class="single">
  <p>Type: </p>
  <form action="<?= ROOT_URL ?>reports/single-child.php" method="post" class="form">
    <div class="flex">
      <select name="group">
        <option value="All">All</option>
        <option value="Boys">Boys</option>
        <option value="Girls">Girls</option>
      </select>
      <button type="submit" class="btn" name="find-group"><span><i class="fa fa-search"></i></span></button>
    </div>
  </form>
</div>