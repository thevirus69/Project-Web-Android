<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>iDiscuss - ThreadList</title>
    <style>
      .container{
        height: 100vh;
      }
    </style>
  </head>
  <body>
    <?php 
    include 'partials/_dbconnect.php';
    include 'partials/_navbar.php';

    ?>
    <div class="container">
    <h1 class="display-4"> Search result for "<?php echo $_GET['search'] ?>"</h1>

 

    <?php
    
    $search = $_GET['search'];
    $showerror = true;
    $sql = "SELECT * FROM `threads` WHERE MATCH (`thread_title`, `thread_description`) against ('$search') ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $showerror = false;
    echo '
    <div class="my-4 shadow-sm py-3 px-3 d-flex align-items-center">
      <div class="flex-shrink-0">
        <img src="img/user.png" width="30" height="30" alt="...">
      </div>
      
      <div class="flex-grow-1 ms-3">
      
        <h6><a href="threads.php?tid='.$row['thread_id'].'">'.$row['thread_title'].'</a></h6>
        
      <p> '.$row['thread_description'].'</p>
      </div>
    
    </div>';

    }
if($showerror){

    echo '<div class="container ">
    <div class="jumbotron my-3 shadow-sm py-3 px-3 bg-light">
   <h1 class="display-4"> No Results Found</h1>
   <p class="lead"></p>
   <li>Make sure that all words are spelled correctly.</li>
<li>Try different keywords.</li>
<li>Try more general keywords.</li>';
}
    ?>
</div>
<?php include 'partials/_footer.php' ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  
  </body>
</html>