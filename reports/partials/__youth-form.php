<div class="single">
  <p>Type: </p>
  <form action="<?= ROOT_URL ?>reports/single-youth.php" method="post" class="form">
    <div class="flex">
      <select name="type">
        <option value="All">All</option>
        <option value="Teenager">Teenagers</option>
        <option value="Young Adult">Young Adults</option>
      </select>
      <button type="submit" class="btn" name="find"><span><i class="fa fa-search"></i></span></button>
    </div>
  </form>
</div>
<div class="single">
  <p>Groups: </p>
  <form action="<?= ROOT_URL ?>reports/single-youth.php" method="post" class="form">
    <div class="flex">
      <select name="group">
        <option value="All">All</option>
        <option value="John">John</option>
        <option value="Luke">Luke</option>
        <option value="Mark">Mark</option>
        <option value="James">James</option>
        <option value="Matthew">Matthew</option>
      </select>
      <button type="submit" class="btn" name="find-group"><span><i class="fa fa-search"></i></span></button>
    </div>
  </form>
</div>