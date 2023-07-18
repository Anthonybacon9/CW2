<?php
include('includes/header.php'); 
include('includes/navbar1.php'); 
include('includes/dbconnection.php');

//https://getbootstrap.com/docs/4.1/utilities/borders/
//https://getbootstrap.com/docs/4.1/utilities/sizing/
//



?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb shadow-sm p-3 mb-5 bg-white rounded">
    <li class="breadcrumb-item"><a href="db.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
  </ol>
</nav>

<img src="images/icon.jpg" class="rounded-circle mx-auto d-block" alt="...">

<h1 align="center"> Welcome, <?php echo $_SESSION['FName1']; ?> </h1>
<h3 align="center"> Surname: <?php echo $_SESSION['SName']; ?> </h1>
<h3 align="center"> Username:  <?php echo $_SESSION['un']; ?> </h1>
<p> </p>
<p class="text-center"> Bio:  <?php echo $_SESSION['bio']; ?> </p>





<?php include('includes/scripts.php'); ?>
<?php include('includes/footer.php'); ?>