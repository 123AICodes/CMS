  <!-- cards -->
  <div class="card__container">
    <?php
    $query = " SELECT * FROM youth ";
    $query_results = mysqli_query($connection, $query);
    $results = mysqli_num_rows($query_results);
    ?>
    <article class="card">
      <h5>Total Youth</h5>
      <div class="flex">
        <small class="amt"><?php echo $results ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-people-group"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $query = " SELECT * FROM members WHERE title='Sis' OR title='Eno' ";
      $query_results = mysqli_query($connection, $query);
      $results = mysqli_num_rows($query_results);
      ?>
      <h5>Total Women</h5>
      <div class="flex">
        <small class="amt"><?php echo $results ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-users-viewfinder"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $query = " SELECT * FROM children ";
      $query_results = mysqli_query($connection, $query);
      $results = mysqli_num_rows($query_results);
      ?>
      <h5>Total Children</h5>
      <div class="flex">
        <small class="amt"><?php echo $results ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-users-line"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $query = " SELECT * FROM members WHERE title='Bro' ";
      $query_results = mysqli_query($connection, $query);
      $results = mysqli_num_rows($query_results);
      ?>
      <h5>Total Men</h5>
      <div class="flex">
        <small class="amt"><?php echo $results ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-user-shield"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $query = " SELECT * FROM officers ";
      $query_results = mysqli_query($connection, $query);
      $results = mysqli_num_rows($query_results);
      ?>
      <h5>Total Officers</h5>
      <div class="flex">
        <small class="amt"><?php echo $results ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-users-rectangle"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $query = " SELECT * FROM youth WHERE youth_type='Teenager' ";
      $query_results = mysqli_query($connection, $query);
      $results = mysqli_num_rows($query_results);
      ?>
      <h5>Total Teenagers</h5>
      <div class="flex">
        <small class="amt"><?php echo $results ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-person-circle-plus"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $query1 = " SELECT * FROM youth ";
      $query2 = " SELECT * FROM members ";
      $query3 = " SELECT * FROM officers ";
      $query4 = " SELECT * FROM children ";
      $query_results1 = mysqli_query($connection, $query1);
      $query_results2 = mysqli_query($connection, $query2);
      $query_results3 = mysqli_query($connection, $query3);
      $query_results4 = mysqli_query($connection, $query4);
      $results1 = mysqli_num_rows($query_results1);
      $results2 = mysqli_num_rows($query_results2);
      $results3 = mysqli_num_rows($query_results3);
      $results4 = mysqli_num_rows($query_results4);
      $total = $results1 + $results2 + $results3 + $results4;
      ?>
      <h5>Total Membership</h5>
      <div class="flex">
        <small class="amt"><?php echo $total ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-users"></i></span>
      </div>
    </article>

    <article class="card">
      <?php
      $query = " SELECT * FROM users ";
      $query_results = mysqli_query($connection, $query);
      $results = mysqli_num_rows($query_results);
      ?>
      <h5>System Users</h5>
      <div class="flex">
        <small class="amt"><?php echo $results ?? 0 ?></small>
        <span class="amt-icon"><i class="fa fa-user-circle"></i></span>
      </div>
    </article>
    <button class="load-more">Load more</button>
  </div>