
<!DOCTYPE html>
<html>
  <head>
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#222f3e;">
<div class="collapse navbar-collapse d-flex justify-content-center">
  <ul class="navbar-nav ">
      <li class="nav-item active ">
        <a class="nav-link " href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mypub.php"> Posts</a>
      </li>
    </ul>
    </div>
  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarText">
    
    <span class="navbar-text white-text">
          <?php
        
       
        
        
        if(!isset($_SESSION["username"])){
          
         
          echo '<a href="login.php"> Sign in</a>';
          
        }else {
          echo '<span style="color:white;font-family: "Comic Sans MS", cursive, sans-serif;"> '. $_SESSION["username"].'  </span>';
          echo '&nbsp;<a href="logout.php">Logout</a>';
        }
      ?>
    </span>
  </div>
</nav>

<div class="all1" style="margin:2%;margin-left:5%">
<div class="container" style="margin:0%;">
<center>
<h2 class="title"  style="color:#0c2461;">Add Post</h2>

</center>

<div class="curs" >


<?php

require('config.php');
require('class.php');


$sql = "SELECT post.*, user.username FROM post JOIN user ON post.id_user = user.id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row

while($row = $result->fetch_assoc()) {
  
  echo ' 
  <div class="blog-card alt flex">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-2.jpg)"></div>
      
    </div>
    <div class="description"  >
      <h3 style="color:#222f3e">'. $row["title"].' </h3>
      <h4>' . $row["username"]. ' , '. $row["date"].'</h4>
      <p style="color:black">' . $row["content"].'</p>
      <p class="read-more">
      </p>
    </div>
  </div>';
}
} else {
echo "<p style='color:black'>There is no post yet ! <a href='addpost.php'> Click Here</a> to add a post! </p>";
}

 ?>
 <div class="flexx">
 <a class="btn " href="addpost.php"  style="color:#0c2461; background-color:white;color: #222f3e; 
    width: 10%;
    height: 55px;
    font-size: 20px;
    border-radius: 20px;">Add</a>
 </div>
</div>

</div>
</div>


  </body>
</html>