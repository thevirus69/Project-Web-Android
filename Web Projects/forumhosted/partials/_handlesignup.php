<?php
include '_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $email = $_POST['useremail'];
  $email = str_replace( "<" , "&lt", $email  );
  $email = str_replace( ">" , "&gt", $email  );
  $pass = $_POST['password'];
  $pass = str_replace( "<" , "&lt", $pass  );
  $pass = str_replace( ">" , "&gt", $pass  );
  $cpass = $_POST['cpassword'];
  $sql = "Select * from `users` where email = '$email'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num>0) {
    $showerror = "Email is already in use";
    header("location: /forum/index.php?error=$showerror");
    exit;
  } 
  else{
    if ($pass == $cpass) {
      $hash = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ( '$username', '$email', '$hash')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showalert = "Account created successfully now you can login......";
        header("location: /forum/index.php?alert=$showalert");
        exit;
      }
    }
    else{
      $showerror = "Passwords don't matched";
      header("location: /forum/index.php?error=$showerror");
      exit;
    }
  }

  

}


?>
