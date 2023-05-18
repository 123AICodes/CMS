<div class="single">
  <p>Type: </p>
  <form action="<?= ROOT_URL ?>reports/finance-type.php" method="post" class="form">
    <div class="flex">
      <select name="type">
        <option value="All">All</option>
        <option value="Tithes">Tithes</option>
        <option value="Offering">Offering</option>
        <option value="Missions">Missions</option>
      </select>
      <button type="submit" class="btn" name="find"><span><i class="fa fa-search"></i></span></button>
    </div>
  </form>
</div>
<div class="single">
  <p>Ministries: </p>
  <form action="<?= ROOT_URL ?>reports/finance-type.php" method="post" class="form">
    <div class="flex">
      <select name="group">
        <option value="All">All</option>
        <option value="Youth">Youth</option>
        <option value="Pemem">Pemem</option>
        <option value="Women">Women</option>
        <option value="Welfare">Welfare</option>
        <option value="Children">Children</option>
        <option value="Evangelism">Evangelism</option>
      </select>
      <button type="submit" class="btn" name="find-group"><span><i class="fa fa-search"></i></span></button>
    </div>
  </form>
</div>