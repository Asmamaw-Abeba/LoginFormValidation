<?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $DBname = 'signupform';

  $conn=mysqli_connect($host, $username,$password,$DBname) 
  or die('connection is not successful '. mysqli_error($conn));
  

?>