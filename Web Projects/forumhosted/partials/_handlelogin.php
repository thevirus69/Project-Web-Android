<?php
include '_dbconnect.php';
$loggedin = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['uemail'];
  $email = str_replace( "<" , "&lt", $email  );
  $email = str_replace( ">" , "&gt", $email  );
  $password = $_POST['upassword'];
  $password = str_replace( "<" , "&lt", $password  );
  $password = str_replace( ">" , "&gt", $password  );
  $sql = "Select * from `users` where email = '$email'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $row['username'];
      $_SESSION['useremail'] = $row['email'];
      $_SESSION['id'] = $row['user_id'];
    }
  } 
}
header("location: /forum/index.php");


?>
