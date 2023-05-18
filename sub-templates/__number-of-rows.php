  <!-- number of rows per page-->
  <?php if (mysqli_num_rows($results) < 11) : ?>
  <?php else : ?>
    <div class="number-of-rows">
      <select id="itemperpage">
        <option value="11">11</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
      </select>
      <p>Rows Per page</p>
    </div>
  <?php endif ?>