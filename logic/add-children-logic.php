<?php
require_once "../config/database.php";

if (isset($_POST['add-child'])) {
  #variables
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $residence = filter_var($_POST['residence'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $mother = filter_var($_POST['mother'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $father = filter_var($_POST['father'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $p_status = filter_var($_POST['p_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $contact = filter_var($_POST['contact'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $ministry = filter_var($_POST['ministry'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $cur_status = filter_var($_POST['cur_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $school = filter_var($_POST['school'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $profile = $_FILES['profile'];

  #validations
  if (empty($name)) {
    $_SESSION['add-child'] = "Please provide name";
  } elseif (empty($residence)) {
    $_SESSION['add-child'] = "Please enter residence";
  } elseif (empty($contact)) {
    $_SESSION['add-child'] = "Please enter phone number";
  } elseif (empty($profile['name'])) {
    $_SESSION['add-child'] = "Please select profile";
  } else {
    #verifying if officer already exist
    $verify_query = " SELECT * FROM children WHERE name='$name' OR contact='$contact' ";
    $verify_results = mysqli_query($connection, $verify_query);
    if (mysqli_num_rows($verify_results) > 0) {
      $_SESSION['add-child'] = "Please name, or phone already exist";
    } else {
      #working on image
      $time = time();
      $profile_name = $time . $profile['name'];
      $profile_tmp_name = $profile['tmp_name'];
      $profile_destination_path = '../thumbnails/' . $profile_name;

      #allowed files
      $allowed_files = ['jpg', 'png', 'jpg', 'webp'];
      $extension = explode('.', $profile_name);
      $extension = end($extension);
      if (in_array($extension, $allowed_files)) {
        #checking image size
        if ($profile['size'] > 1000000) {
          $_SESSION['add-child'] = "Please file size is big. 1mb Max";
        } else {
          move_uploaded_file($profile_tmp_name, $profile_destination_path);
        }
      } else {
        $_SESSION['add-child'] = "File is not supported";
      }
    }
  }

  #checking if there was an error
  if (isset($_SESSION['add-child'])) {
    $_SESSION['add-child-data'] = $_POST;
    header('location:' . ROOT_URL . 'children.php');
    die();
  } else {
    #inserting data
    date_default_timezone_set('Africa/Accra');
    $date = date('M d, y l H:i:s');
    $insert_query = " INSERT INTO children(title, name, residence, mother, father, p_status, contact, ministry, cur_status, school, status, profile, date) 
                VALUES('$title', '$name', '$residence', '$mother', '$father', '$p_status', '$contact', '$ministry', '$cur_status', '$school', '$status', '$profile_name', '$date')";
    $insert_results = mysqli_query($connection, $insert_query);
    #checking connection
    if (mysqli_errno($connection)) {
      header('location:' . ROOT_URL . 'children.php');
      die(mysqli_errno($connection));
    } else {
      $_SESSION['add-child-success'] = "New child added successfully";
      header('location:' . ROOT_URL . 'children.php');
    }
  }
} else {
  header('location:' . ROOT_URL . 'children.php');
  die();
}
