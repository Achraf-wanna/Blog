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
<body >


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
session_start();
if (isset($_POST['username'])){

    $user = new USER();

  $user->username = stripslashes($_REQUEST['username']);
  $user->username = mysqli_real_escape_string($conn, $user->username);
  $user->password = stripslashes($_REQUEST['password']);
  $user->password = mysqli_real_escape_string($conn, $user->password);
    $query = "SELECT * FROM `user` WHERE username='$user->username' and password='$user->password'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  if($rows==1){
      $_SESSION['id']    = $row['id'];
      $_SESSION['username'] = $user->username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";

  }
}
?>

<center>
  <h1 class="title" id="login">Welcome</h1>
    <P style="color:#222f3e"> Enter your credentials to login</P>
  <div class="all">
  <div class="form-container">
  

      <form class="" action="" method="post" name="login">
        <img src="User_icon_2.svg.png" alt="" width="20%" height="20%" id="img"> <br> <br>
        <input type="text"  name="username" placeholder="Username" id="inputA"><br>
        <input type="password"  name="password" placeholder="Password"  id="inputA"><br>
        <input type="submit" value="Sign in " name="submit" id="btncn" >
        <p>You are new here?<a href="register.php"> Sign up!</a></p>
        <?php if (! empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
      </form>
  </div>
</div>
</center>
  


</form>
</body>
</html>