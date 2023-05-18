  <!-- pagination -->
  <?php if (mysqli_num_rows($results) < 11) : ?>
  <?php else : ?>
    <div class="bottom-field">
      <ul class="pagination">
        <li class="prev"><a href="#" id="prev">&#139;</a></li>
        <li class="next"><a href="#" id="next">&#155;</a></li>
      </ul>
    </div>
  <?php endif ?>