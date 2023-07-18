<?php date_default_timezone_set('Europe/London') ?>
<?php
    include('includes/header.php');
    include('includes/navbar1.php');

    include('includes/dbconnection.php');
    //if (strlen($_SESSION['ID']==0)) {
        //header('location:index.php');  //change to logout when page is made
        //} else{
      
            if(isset($_POST['submit']))
                {
                $userid=$_SESSION['ID'];
                $dateexpense=$_POST['dateexpense'];
                $item=$_POST['item'];
                $costitem=$_POST['costitem'];
                $id = $_SESSION['uid'];

                $query=mysqli_query($con, "insert into expense_expense(ID,date,Item,amount,user_id) value('$userid','$dateexpense','$item','$costitem','$id')");
            if($query){
            echo "<script>alert('Expense has been added');</script>";
            echo "<script>window.location.href='db.php'</script>";
            } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
      
      }
        
      } 
    //}
?> 

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="db.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Expense</li>
  </ol>
</nav>

<div class="container">
  <div class="row">
      <div class="signup-form">
        <form action="" method="post" id= "" name="registrationform" class="mt-5 border p-5 bg-light shadow" >
        <p style="font-size:16px; color: red; align=center;">
          <?php
          
          $msg = "";

          if($msg) {
            echo $msg;
          } 
          
          ?>
        </p>
        <h2>New Expense</h2>
          <div class="row">
            <div class="mb-3 col-md-12">
              <label>Date of Expense</label>
              <input type="date" value="" name="dateexpense" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12">
              <label>Item</label>
              <input type="text" name="item" class="form-control" required="true">
            </div>

            <div class="mb-3 col-md-12">
              <label>Cost of Item (£)</label>
              <input type="text" name="costitem" class="form-control" required="true">
            </div>
            
            <div class="mb-3 col-md-12 text-center">
              <button type="submit" value="submit" name="submit" class="btn btn-success">Submit</button> 
            </div>  
          </div>
        </form>
      </div>
    </div>
  </div>
</div>