<?php
include('includes/header.php'); 
include('includes/navbar1.php'); 


$id = $_POST["id"];

$query = "SELECT * FROM Expense_expense WHERE id='$id' ";
$query_run = mysqli_query($con, $query);

if($query_run) {
    while($row = mysqli_fetch_array($query_run)) {
        ?>

        <div class="container">
            <div class="row">
                <div class="signup-form">
                    <form action="" method="post" id= "" name="registrationform" class="mt-5 border p-5 bg-light shadow" >
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <p style="font-size:16px; color: red; align=center;">
                    <?php
                    
                    $msg = "";

                    if($msg) {
                        echo $msg;
                    } 
                    
                    ?>
                    </p>
                    <h2>Edit an Expense</h2>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                        <label>Date of Expense</label>
                        <input type="date" name="dateexpense" class="form-control" required="true" value="<?php echo $row["date"] ?>">
                        </div>

                        <div class="mb-3 col-md-12">
                        <label>Item</label>
                        <input type="text" name="item" class="form-control" required="true" value="<?php echo $row['Item'] ?>">
                        </div>

                        <div class="mb-3 col-md-12">
                        <label for="exampleFormControlSelect1">Category select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category" required="true" value="<?php echo $row['category'] ?>">
                            <option>Entertainment</option>
                            <option>Bills</option>
                            <option>Fuel</option>
                            <option>Other</option>
                        </select>
                        </div>

                        <div class="mb-3 col-md-12">
                        <label>Cost of Item (£)</label>
                        <input type="text" name="costitem" class="form-control" required="true" value="<?php echo $row['amount'] ?>">
                        </div>
                        
                        <div class="mb-3 col-md-12 text-center">
                        <a href="db.php" class="btn btn-danger"> Cancel </a>
                        <button type="submit" value="submit" name="update" class="btn btn-success">Submit</button> 
                        </div>  
                    </div>
                    </form>

                    <?php 
                        if(isset($_POST['update'])) {
                            $dateexpense=$_POST['dateexpense'];
                            $item=$_POST['item'];
                            $costitem=$_POST['costitem'];
                            $category=$_POST['category'];
            
                            $query="UPDATE Expense_expense SET item ='$item', `date`='$dateexpense', category='$category', amount='$costitem' WHERE id='$id'";
                            $query_run1 = mysqli_query($con, $query);
                            
                            if($query_run1) {
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