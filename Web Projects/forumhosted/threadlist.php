<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>iDiscuss - ThreadList</title>
  </head>
  <body>
    <?php 
    include 'partials/_dbconnect.php';
    include 'partials/_navbar.php';
    ?>
    <?php
    
    $id = $_GET['id'];
    $sql = "Select * from category where category_id = $id ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
   
    echo '<div class="container ">
    <div class="jumbotron my-3 shadow-sm py-3 px-3 bg-light">
   <h1 class="display-4">'.$row['category_name'].'</h1>
   <p class="lead">'.$row['category_description'].'</p>
   <hr class="my-4">
   <p>No Spam / Advertising / Self-promote in the forums. ...
 <li>Do not post copyright-infringing material. ...</li>
 <li>Do not post “offensive” posts, links or images. ...</li>
 <li>Do not cross post questions. ...</li>
 <li>Do not PM users asking for help. ...</li>
 <li>Remain respectful of other members at all times.</li></p>

   
 </div>
 </div>';
    ?>
 
<div class="container">

<div class="container shadow-sm py-2">
<h3>Post Your Question</h3>

<form action="<?php $_SERVER['REQUEST_URI']?>" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Make title as  short and crisp as much possible</div>
  </div>

  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" name="desc" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Description</label>
</div><br>
  <button type="submit" class="btn btn-outline-success">Post</button>
</form>
</div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){


if($_SERVER['REQUEST_METHOD']=='POST'){
  $th_title = $_POST['title'];
  $th_title = str_replace( "<" , "&lt", $th_title  );
  $th_title = str_replace( ">" , "&gt", $th_title  );
  $th_desc = $_POST['desc'];
  $th_desc = str_replace( "<" , "&lt", $th_desc );
  $th_desc = str_replace( ">" , "&gt", $th_desc  );
  $uid = $_SESSION['id'];
  $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `date`) VALUES ( '$th_title', '$th_desc', '$id', '$uid', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo '<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol></svg>
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      <strong>Success !</strong> Thread Created...
    </div>
  </div>';  
}
}}
else{
  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</symbol>
</svg>
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
  <strong>Please </strong>Login to create thread ...
  </div>
</div>
';
}


?>
<br><br>
<h3>Related - Threads</h3>
<?php 
$sql = "Select * from threads where thread_cat_id = $id";

$result = mysqli_query($conn, $sql);
$noresult = true;
while($row = mysqli_fetch_assoc($result)){
$thread_user = $row['thread_user_id'];
$noresult = false;
$sql2 = "SELECT username FROM `users` WHERE `user_id` = $thread_user";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);


echo '
<div class="my-4 shadow-sm py-3 px-3 d-flex align-items-center">
  <div class="flex-shrink-0">
    <img src="img/user.png" width="30" height="30" alt="...">
  </div>
  
  <div class="flex-grow-1 ms-3">
  
    <h6><a href="threads.php?tid='.$row['thread_id'].'">'.$row['thread_title'].'</a></h6>
    
  <p> '.$row['thread_description'].'</p>
  </div>
  Asked by : '.$row2['username'].'
</div>';
}


if($noresult){
  echo'
  <div class="container ">
  <div class="jumbotron my-3 shadow-sm py-3 px-3 bg-light">
 <h1 class="display-4">No Result Found</h1>
 <p class="lead">Be the first person to ask a question - Post your question in above form </p>
 <hr class="my-4">
</div>
</div>
  ';
}
?>

</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <?php include 'partials/_footer.php' ?>
</html>