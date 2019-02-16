<?php
// require('repository/repositories.php');
// require('domain/domain.php');
include 'repository/database.php';

if($_POST)
{
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'psw');

  if($username && $password)
  {
    $db = new Database();
    $reg = [];
    $db->connect();
    $db->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    $db->bindParam(':username', $username);
    $db->bindParam(':password', $password);
    $db->execute();
    $logged = $db->$result[0];
    $db->close();
    if($logged && $logged['id'])
    {
      session_start();

      $_SESSION['userId'] = $logged['id'];
      $_SESSION['isAdmin'] = $logged['isAdmin'];
      $_SESSION['user'] = $logged;
      header('Location: views/home/home.php');
    }
    else
    {
      echo '<script>alert(\'Username or Password incorrect!\');</script>';
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<div class="topnav">
  <a class="active" href="">X-Force</a>
  <a href="views/add-user/add-user.php">SignUp</a>
  <div class="login-container">
    <form method="post">
      <input type="text" placeholder="Username" name="username">
      <input type="password" placeholder="Password" name="psw">
      <button type="submit">Login</button>
    </form>
  </div>
</div>

<div style="padding-left:16px">
  <p id="img-index"><img src="assets/images/xforce.gif"></p>
</div>

</body>
</html>
