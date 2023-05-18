<?php
require_once "./partials/header.php";

$username = $_SESSION['signin-data']['username'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>

<body>

  <div class="overlay"></div>
  <main class="container signin">
    <div class="grid">
      <div class="wrapper">
        <div class="content info">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ullam laudantium nobis repellat, ipsum
            tempore sint repellendus architecto laborum fuga reprehenderit ab sapiente eum debitis explicabo quisquam,
            quas facere est perspiciatis reiciendis nulla! Libero ad ab nesciunt minima. Ab quisquam dolorum voluptas
            laudantium odit molestiae? Labore harum animi possimus eos.
          </p>
        </div>
      </div>
      <div class="form__container">
        <!-- error message -->
        <?php if (isset($_SESSION['signup-success'])) : ?>
          <div class="empty-box success">
            <p>
              <?php
              echo $_SESSION['signup-success'];
              unset($_SESSION['signup-success']);
              ?>
            </p>
            <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
          </div>
        <?php elseif (isset($_SESSION['signin'])) : ?>
          <div class="empty-box error">
            <p>
              <?php
              echo $_SESSION['signin'];
              unset($_SESSION['signin']);
              ?>
            </p>
            <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
          </div>
        <?php endif ?>

        <h3 class="title">Sign In</h3>
        <form action="<?= ROOT_URL ?>auth/signin-logic.php" class="form" autocomplete="off" method="post">
          <div class="flex">
            <div class="inputBox">
              <input type="text" name="username" placeholder="enter username" class="box" value="<?= $username ?>">
            </div>
            <div class="inputBox">
              <input type="password" name="password" placeholder="enter password" class="box" value="<?= $password ?>">
            </div>
          </div>
          <p class="msg">don't have an account?<a href="<?= ROOT_URL ?>auth/signup.php">Sign Up</a></p>
          <button class="btn-submit" name="signin">Sign In</button>
        </form>
      </div>
    </div>
  </main>




  <!-- js files -->
  <script src="<?= ROOT_URL ?>js/all.min.js"></script>
</body>

</html>