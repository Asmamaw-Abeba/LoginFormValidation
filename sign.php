<?php

$user = 0;
$success = 0;

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('connect.php');
    
    echo '<br>';
    echo '<br>';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "insert into `registration`(username,password)
    // values('$username','$password')";

    // $result = mysqli_query($conn,$sql);

    // if($result){
    //   echo 'Data is inserted successfully';
    // }else {
    //   die(mysqli_error($conn));
    // }

    $sql = "select * from `registration` where 
    username = '$username'";

    $result = mysqli_query($conn,$sql);

    if($result){
      $num = mysqli_num_rows($result); // count the number of rows in DB
      if ($num > 0) {
        // echo 'User is already exist';
        $user = 1;
      }
    }else {
      $sql = "insert into `registration`(username,password)
      values('$username','$password')";

      $result = mysqli_query($conn,$sql);

      if($result){
        // echo 'signup successfully';
        $success = 1;
      }else {
        die(mysqli_error($conn));
      }
    }
  }
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp page</title>
  </head>
  <body>
  <?php
    if ($user) {
     echo 
        '<div class="alert alert-warning alert-danger fade show" role="alert">
          <strong>Sorry!</strong> User is already exist.
        </div>
      ';
    }
  ?>

<?php
  if ($success) {
    echo 
      '<div class="alert alert-warning alert-success fade show" role="alert">
        <strong>success</strong> signed up successfully.
      </div>
    ';
  }
  ?>

    <h2>sign up Form</h2>
    <form action="sign.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="signUp">
    </form>
  </body>
</html>