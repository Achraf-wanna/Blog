<?php
  // $id = isset($_GET['edit']) ? $_GET['edit'] : die('ERROR: missing ID.');

  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
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
<body style="background-color:#222f3e;">
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

    if(isset($_POST['title']) && isset($_POST['text'])){

    // check username and email empty or not
    if(!empty($_POST['title']) && !empty($_POST['text'])){

        // Escape special characters.
        $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
        $text = mysqli_real_escape_string($conn, htmlspecialchars($_POST['text']));

        //CHECK EMAIL IS VALID OR NOT

            $id = $_GET['id'];


                // UPDATE USER DATA
                $update_query = mysqli_query($conn,"UPDATE post SET title = '" . $title . "', content = '" . $text . "' WHERE id = '" . $id . "'");
    }
  
    if($update_query){
      
      header("Location: mypub.php");
    }
}else{
?>
<div class="all1">
<div class="form-container">
<h1 class="title">Edit Your Post</h1>

<form  action="" method="post">

    <input type="text"   name="title" placeholder="Titre" id="inputad" required /><br>
    
    <textarea name="text" placeholder=" Texte..." rows="3" cols="60" ></textarea><br><br>
    <input type="submit" name="submit" value="Publier !" id="btnpub" />


</div>
</div>
<!-- <?php } ?> -->
</body>
</html>