<?php 
session_start();
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $userid=$_SESSION['ID'];
    $dateexpense=$_POST['dateexpense'];
    $item=$_POST['item'];
    $costitem=$_POST['costitem'];
    $category=$_POST['category'];
    $id = $_SESSION['uid'];

    $query=mysqli_query($con, "insert into expense_expense(ID,date,Item,amount,user_id,category) value('$userid','$dateexpense','$item','$costitem','$id','$category')");
    if($query){
        echo "<script>window.location.href='db.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    } 


?>


<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info ">
            <a class="navbar-brand nav-link" href="db.php">Expense Manager</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item">
                    <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal">New Expense</a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome, <?php echo $_SESSION['FName1'] ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="accountSettings.php">Account Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Sign Out</a>
                    </div>
                </li>
            </ul>
            
        </div>
        </nav>
    </header>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id= "" name="registrationform" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date of Expense</label>
            <input type="date" class="form-control" id="recipient-name" name="dateexpense" required="true">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Item</label>
            <input type="text" class="form-control" id="recipient-name" name="item" required="true">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Category select</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category" required="true">
                <option>Entertainment</option>
                <option>Bills</option>
                <option>Fuel</option>
                <option>Other</option>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cost of Item (£)</label>
            <input type="text" class="form-control" id="recipient-name" name="costitem" required="true">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>
