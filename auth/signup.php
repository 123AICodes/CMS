<?php
require_once "./partials/header.php";

$name = $_SESSION['signup-data']['name'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$password = $_SESSION['signup-data']['password'] ?? null;
$cpassword = $_SESSION['signup-data']['cpassword'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$contact = $_SESSION['signup-data']['contact'] ?? null;
unset($_SESSION['signup-data']);
?>


<body>

  <div class="overlay"></div>
  <main class="container">
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
        <?php if (isset($_SESSION['signup'])) : ?>
          <div class="empty-box error">
            <p>
              <?php
              echo $_SESSION['signup'];
              unset($_SESSION['signup']);
              ?>
            </p>
            <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
          </div>
        <?php endif ?>

        <h3 class="title">Sign Up</h3>
        <form action="<?= ROOT_URL ?>auth/signup-logic.php" method="post" class="form" autocomplete="off" enctype="multipart/form-data">
          <div class="flex">
            <div class="inputBox">
              <select class="box" name="title">
                <option value="Eld">Elder</option>
                <option value="Sis">Sister</option>
                <option value="Bro">Brother</option>
                <option value="Dcn">Deacon</option>
                <option value="Dcns">Deaconess</option>
              </select>
            </div>
            <div class="inputBox">
              <input type="text" name="name" placeholder="enter fullname" class="box" value="<?= $name ?>">
            </div>
          </div>
          <div class="flex">
            <div class="inputBox">
              <input type="text" name="username" placeholder="enter username" class="box" value="<?= $username ?>">
            </div>
            <div class="inputBox">
              <input type="password" name="password" placeholder="enter password" class="box" value="<?= $password ?>">
            </div>
            <div class="inputBox">
              <input type="password" name="cpassword" placeholder="confirm password" class="box" value="<?= $cpassword ?>">
            </div>
          </div>
          <div class="flex">
            <div class="inputBox">
              <input type="email" name="email" placeholder="email address" class="box" value="<?= $email ?>">
            </div>
          </div>
          <div class="flex">
            <div class="inputBox">
              <input type="number" name="contact" placeholder="enter contact" minlength="10" maxlength="10" class="box" value="<?= $contact ?>">
            </div>
            <div class="inputBox">
              <input type="file" class="box" name="profile">
            </div>
          </div>
          <p class="msg">already have an account?<a href="<?= ROOT_URL ?>auth/signin.php">Sign In</a></p>
          <button class="btn-submit" name="signup">Sign Up</button>
        </form>
      </div>
    </div>
  </main>



  <script src="<?= ROOT_URL ?>js/all.min.js"></script>
</body>

</html>