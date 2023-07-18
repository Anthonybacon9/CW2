<?php date_default_timezone_set('Europe/London') ?>



<?php
    session_start();
    include('includes/header.php');
    include('includes/navbar.php');
    

    include('includes/dbconnection.php');

    if(isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $confirmpassword = 'confirmpassword';
        $pass = $_POST['password'];

        $ret = mysqli_query($con, "SELECT Username FROM users where Username = '$username'");
        $result = mysqli_fetch_array($ret);

        $query = mysqli_query($con, "SELECT ID FROM users WHERE Username = '$username' && Password = '$password'");
        $result = mysqli_fetch_array($query);
        $num = mysqli_num_rows($query);
        $row2 = mysqli_fetch_assoc($query);

        $query3 = mysqli_query($con, "SELECT * FROM users WHERE Username = '$username' && Password = '$password'");
        $row=mysqli_fetch_assoc($query3);

        if($confirmpassword = $pass) {
          if($result > 0) {
          $msg = "Sorry, this username has been taken, please enter another one.";
          } else {
          $query = mysqli_query($con, "INSERT INTO users(Username, Password, First_Name, Last_Name) value('$username', '$password', '$firstname', '$lastname')");
          
          $query3 = mysqli_query($con, "SELECT * FROM users WHERE Username = '$username' && Password = '$password'");
          $row=mysqli_fetch_assoc($query3);

          $_SESSION['FName1']=$row['First_Name'];
          $_SESSION['uid'] = $row['ID'];

          $id=$_SESSION['uid'];
            if ($query) {
                $query=mysqli_query($con, "insert into expense_expense(ID,date,Item,amount,user_id,category) value('NULL', 'NULL', 'NULL', 'NULL', '$id', 'NULL')");
                $msg="You have successfully registered";
                $_SESSION['']=$result['ID'];
                echo '<script> alert("Error") </script>';
                header('location:login.php');
                
            }
            else
                {
                $msg="Something Went Wrong. Please try again";
                }
            } 
          
        }
        else {
          $msg="DHNUIYAFHIAWFOP";
        }
    }
    ?>



<div class="container">
  <div class="row">
      <div class="signup-form">
        <form action="" method="post" id= "" name="registrationform" class="mt-5 border p-5 bg-light shadow" >
        <p style="font-size:16px; color: red; align=center;">
          <?php
          
          
          ?>
        </p>
        <h2>Registration Form</h2>
          <div class="row">
            <div class="mb-3 col-md-12">
              <label>First Name</label>
              <input type="text" name="firstname" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12">
              <label>Last Name</label>
              <input type="text" name="lastname" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12">
              <label>Username</label>
              <input type="text" name="username" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12">
              <label>Confirm Password</label>
              <input type="password" name="confirmpassword" class="form-control" required="true">
            </div>   
            
            <div class="mb-3 col-md-12 text-center">
              <button type="submit" value="submit" name="submit" class="btn btn-success">Register</button> 
            </div>  
            <p>Already have an account? <a href="login.php">Click Here</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>