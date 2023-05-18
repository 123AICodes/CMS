<?php
#including database
require_once "../config/database.php";

#checking if register button is clicked
if (isset($_POST['signup'])) {
  #defining variables
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $contact = filter_var($_POST['contact'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $profile = $_FILES['profile'];

  #checking validations
  if (empty($name)) {
    $_SESSION['signup'] = "Please enter name";
  } else if (empty($username)) {
    $_SESSION['signup'] = "Please enter username";
  } else if (empty($password)) {
    $_SESSION['signup'] = "Please enter password";
  } else if (empty($cpassword)) {
    $_SESSION['signup'] = "Please confirm password";
  } else if (empty($email)) {
    $_SESSION['signup'] = "Please enter email address";
  } else if (empty($contact)) {
    $_SESSION['signup'] = "Please enter phone number";
  } else if (empty($profile['name'])) {
    $_SESSION['signup'] = "Please select profile picture";
  } else {
    #validating password
    if ($password != $cpassword) {
      $_SESSION['signup'] = "Comfirm password do not match";
    } else {
      #hashing password
      $hash_password = password_hash($password, PASSWORD_DEFAULT);
      #checking if username or email is taken
      $verify_query = " SELECT * FROM users WHERE username='$username' OR email='$email' OR contact='$contact'";
      $verify_query_result = mysqli_query($connection, $verify_query);
      #verifying
      if (mysqli_num_rows($verify_query_result) > 0) {
        $_SESSION['signup'] = "Username, email or phone exist";
      } else {
        #working on image
        $time = time();
        $profile_name = $time . $profile['name'];
        $profile_tmp_name = $profile['tmp_name'];
        $profile_destination_path = '../thumbnails/' . $profile_name;
        #allowed files
        $allowed_files = ['jpg', 'png', 'jpeg', 'webp'];
        $extension = explode('.', $profile_name);
        $extension = end($extension);
        #verifying file ext
        if (in_array($extension, $allowed_files)) {
          #checking file size
          if ($profile['size'] < 1000000) {
            move_uploaded_file($profile_tmp_name, $profile_destination_path);
          } else {
            $_SESSION['signup'] = "File size is big. 4mb Max";
          }
        } else {
          $_SESSION['signup'] = "File is not supported";
        }
      }
    }
  }

  #redirecting
  if (isset($_SESSION['signup'])) {
    $_SESSION['signup-data'] = $_POST;
    header('location:' . ROOT_URL . 'auth/signup.php');
    die();
  } else {
    #saving user records
    $query = " INSERT INTO users(title, name, username, password, email, contact, profile) 
                VALUES('$title', '$name', '$username', '$hash_password', '$email', '$contact', '$profile_name')";
    $query_results = mysqli_query($connection, $query);
    #checking connection
    if (!mysqli_errno($connection)) {
      $_SESSION['signup-success'] = "New account created successfully";
      header('location: ' . ROOT_URL . 'auth/signin.php');
    } else {
      die();
    }
  }
} else {
  header('location:' . ROOT_URL . 'auth/signup.php');
  die();
}
