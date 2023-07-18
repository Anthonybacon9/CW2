<?php
include('includes/header.php'); 
include('includes/navbar1.php'); 
include('includes/dbconnection.php');

$id = $_SESSION['uid'];

$query = "SELECT * FROM users WHERE id='$id' ";
$query_run = mysqli_query($con, $query);





?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb shadow-sm p-3 mb-5 bg-white rounded">
    <li class="breadcrumb-item"><a href="db.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Settings</li>
  </ol>
</nav>

<?php 
  if($query_run) {
    while($row = mysqli_fetch_array($query_run)) {
      ?>
      <div class="container">
      <div class="row">
          <div class="signup-form">
            <form action="" method="post" id= "" name="registrationform" class="mt-5 border p-5 bg-light shadow" >
            <p style="font-size:16px; color: red; align=center;">
              <?php
              
              
              ?>
            </p>
            <h2>Edit Details</h2>
            <!--
                <div class="row">
                <div class="mb-3 col-md-12">
                  <img src="images/icon.jpg" class="rounded-circle mx-auto d-block" alt="..."> 
                  <label>Change Profile Picture</label>
                  <input type="file" name="pfp" class="form-control" required="false" >
                </div>
-->

              <div class="row">
                <div class="mb-3 col-md-12">
                  <label>First Name</label>
                  <input type="text" name="firstname" class="form-control" required="true"value="<?php echo $row["First_Name"] ?>">
                </div>
    
                <div class="mb-3 col-md-12">
                  <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control" required="true" value="<?php echo $row["Last_Name"] ?>">
                </div>
    
                <div class="mb-3 col-md-12">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required="true" value="<?php echo $row["Username"] ?>">
                </div>
    
                <div class="mb-3 col-md-12">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" required="true" value="<?php echo $row["Password"] ?>">
                </div>

                <div class="mb-3 col-md-12">
                  <label>Bio</label>
                  <input type="text" name="bio" class="form-control" required="true" value="<?php echo $row["bio"] ?>">
                </div>
                
                <div class="mb-3 col-md-12 text-center">
                  <a href="" onclick="javascript:window.history.back(-1);return false;" class="btn btn-danger"> Cancel </a>
                  <button type="submit" value="submit" name="update" class="btn btn-success">Submit</button> 
                </div> 
              </div>
            </form>

                <?php 
                        if(isset($_POST['update'])) {
                            $firstname=$_POST['firstname'];
                            $lastname=$_POST['lastname'];
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            $bio=$_POST['bio'];
                          
            
                            $query="UPDATE users SET First_Name ='$firstname', Last_Name='$lastname', username='$username', password='$password', bio='$bio' WHERE id='$id'";
                            $query_run1 = mysqli_query($con, $query);
                            
                            if($query_run1) {
                              $_SESSION['FName1']=$row['First_Name'];
                              $_SESSION['uid'] =$row['ID'];
                              $_SESSION['un'] =$row['Username'];
                              $_SESSION['SName']=$row['Last_Name'];
                              $_SESSION['bio']=$row['bio'];
                                echo "<script>window.location.href='db.php'</script>";
                            }   else {
                                echo '<script> alert("Error") </script>';
                            }
                        }
                ?>

          </div>
        </div>
      </div>
    </div>
    <?php
    }
  }
?>


<?php include('includes/scripts.php'); ?>
<?php include('includes/footer.php'); ?>