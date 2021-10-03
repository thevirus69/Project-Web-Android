<?php
session_start();
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
       
        $sql = "Select * from category limit 5";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){ 
        echo'  <li><a class="dropdown-item" href="/forum/threadlist.php?id='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
        }
      
        echo '</ul>
      </li>
   
    </ul>
    <div class="mx-2" style="display: flex; flex-direction:row;">
     ';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
    echo ' <form class="d-flex" action="search.php" method="GET" >
    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-secondary" type="submit">Search</button> 
    </form>
   <p class="mx-2 my-2" style="color:white";> Welcome '.$_SESSION['username'].'</p>
   <a href="partials/_logout.php"><button class="btn btn-danger" type="submit">Logout</button></a>
   ';
}
else{
echo '   <form class="d-flex" action="search.php" method="GET" >
<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-secondary" type="submit">Search</button>
    
  </form>   <button class="btn btn-outline-primary mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
<button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
';
}
echo'</div>
</div>
</nav>';




include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
?>