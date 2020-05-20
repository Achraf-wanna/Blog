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
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home </a>
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

<?php

require('config.php');
require('class.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
    
    $user = new USER();

  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $user->username = stripslashes($_REQUEST['username']);
  $user->username = mysqli_real_escape_string($conn, $user->username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $user->email = stripslashes($_REQUEST['email']);
  $user->email = mysqli_real_escape_string($conn, $user->email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $user->password = stripslashes($_REQUEST['password']);
  $user->password = mysqli_real_escape_string($conn, $user->password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `user` (username, email, password)
              VALUES ('$user->username', '$user->email', '$user->password')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
      header("Location: index.php");
    }
}else{
?>
<center>
<h1 class="title" id="login">Sign up</h1>
<div class="all2" >

<div class="form-container ">
<form  action="" method="post">
<img src="User_icon_2.svg.png" alt="" width="20%" height="10%" id="img"> <br> <br>

    
    <input type="text" name="username" placeholder="Nom d'utilisateur" id="inputA" required /> <br>
  
    <input type="email"  name="email" placeholder="Email"   id="inputA" required /> <br>
    
    <input type="password"  name="password" placeholder="Mot de passe" required  id="inputA"/> <br>
    <input type="submit" name="submit" value="S'inscrire"  id="btncn" />  <br>
    <p class="box-register">Already registered? <a href="login.php">Log in here</a></p>


</div>
</div></center>

<?php } ?>
</body>
</html>

