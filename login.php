<?php 
session_start();
$content = 'Login Page Content';
include('includes/header.php');
include('includes/navbar.php');
include('includes/dbconnection.php');
//https://getbootstrap.com/docs/5.1/components/alerts/



if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $_SESSION['LoggedIn'] = false;

  $query = mysqli_query($con, "SELECT ID FROM users WHERE Username = '$username' && Password = '$password'");
  $result = mysqli_fetch_array($query);
  $num = mysqli_num_rows($query);
  $row2 = mysqli_fetch_assoc($query);

  $query3 = mysqli_query($con, "SELECT * FROM users WHERE Username = '$username' && Password = '$password'");
  $row=mysqli_fetch_assoc($query3);



  if($num == 1) {
    //$_SESSION['FName']=$username;
    $_SESSION['FName1']=$row['First_Name'];
    $_SESSION['uid'] =$row['ID'];
    $_SESSION['un'] =$row['Username'];
    $_SESSION['SName']=$row['Last_Name'];
    $_SESSION['bio']=$row['bio'];
    header('location:db.php');
  } else {
    $msg = "Invalid Details.";
  }
}

?>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="login-form">
        <form action="" method="post" id="login" class="mt-5 border p-5 bg-light shadow">
        <h2>Login</h2>
            <div class="mb-3 col-md-12">
              <label>Username</label>
              <input type="text" name="username" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12 text-center">
              <button type="submit" name="login" class="btn btn-success">Login</button> 
            </div>
            <p>Don't have an account? <a href="register.php">Click Here</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>