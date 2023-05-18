  <!-- cards -->
  <div class="card__container">
    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Youth'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Youth Finance</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Women'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Women Finance</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $c_total_amt = 0;
      $c_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Children'");
      while ($y_result = mysqli_fetch_array($c_query)) {
        $c_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Children Finance</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($c_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Pemem'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Pemem Finance</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Evangelism'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Evangelism Finance</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Welfare'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Welfare Finance</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE type='Offering'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Offering</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE type='Tithes'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Tithes</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['free_will'];
      }
      ?>
      <h5>Free Will</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE type='Offering' OR type='Tithes' OR type='Missions'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Offertory</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Youth' OR ministry='Pemem' OR ministry='Women' OR ministry='Children' OR ministry='Evangelism' OR ministry='Welfare'");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Ministries</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <article class="card total">
      <?php
      $y_total_amt = 0;
      $y_query = mysqli_query($connection, " SELECT * FROM finance");
      while ($y_result = mysqli_fetch_array($y_query)) {
        $y_total_amt += $y_result['amount'];
      }
      ?>
      <h5>Total</h5>
      <div class="flex">
        <small class="amt"><?php echo number_format($y_total_amt, 2) ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-dollar"></i></span>
      </div>
    </article>

    <button class="load-more">Load more</button>
  </div>