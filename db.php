<?php
include('includes/header.php'); 
include('includes/navbar1.php'); 
include('includes/dbconnection.php');

$id = $_SESSION['uid'];

$result2 = mysqli_query($con, "SELECT SUM(amount) AS sum FROM Expense_expense WHERE user_id=$id && category='Entertainment'");
$row2 = mysqli_fetch_assoc($result2);

$result3 = mysqli_query($con, "SELECT SUM(amount) AS sum FROM Expense_expense WHERE user_id=$id && category='Bills'");
$row3 = mysqli_fetch_assoc($result3);

$result4 = mysqli_query($con, "SELECT SUM(amount) AS sum FROM Expense_expense WHERE user_id=$id && category='Fuel'");
$row4 = mysqli_fetch_assoc($result4);

$result5 = mysqli_query($con, "SELECT SUM(amount) AS sum FROM Expense_expense WHERE user_id=$id && category='Other'");
$row5 = mysqli_fetch_assoc($result5);
?>

<nav aria-label="breadcrumb ">
  <ol class="breadcrumb shadow-sm p-3 mb-5 bg-white rounded">
    <li class="breadcrumb-item active " aria-current="page">Dashboard</li>
  </ol>
</nav>


<h1 align="center">DASHBOARD</h1>


<div class="container shadow-sm p-3 mb-5 bg-white rounded"" >
  <div class="table-responsive shadow-sm p-3 mb-5 bg-white rounded">

    <form method="post">
      <div class="input-group">
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Search" name="ValueToSearch">
      <input type="submit" value="Search" name="search" class="btn btn-outline-danger" >
      </div>
    </form>

    <table class="table table-hover table-dark ">

      <?php
      $id = $_SESSION['uid'];

      $result = $con->query("SELECT id, item, amount, `date`, category FROM Expense_expense WHERE user_id=$id");
      $resultCheck = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);

      if(isset($_POST['search'])) {
          $ValueToSearch = $_POST['ValueToSearch'];
          $result = $con->query("SELECT id, item, amount, `date`, category FROM Expense_expense WHERE user_id=$id && CONCAT (item, amount, `date`, category) LIKE '%".$ValueToSearch."%'");
          $row = mysqli_fetch_assoc($result);
      }
      
      
      
      if(isset($_POST['delete'])) {

        $id = $_POST["id"];

        $query = "DELETE FROM Expense_expense WHERE id='$id' ";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
          
        } else {
          echo '<script> alert("ERROR") </script>';
        }
      }


      if ($resultCheck > 1) {
          echo "<tr><th> Name </th><th> Date </th><th> Amount (£) </th> <th> Category </th> <th> </th> <th> </th></tr>";
        // output data of each row
          while($row = $result->fetch_assoc()) {
            
            
            echo "<tr><td>". $row["item"]."</td>";
            echo "<td>".$row["date"]."</td>";
            echo "<td>".$row["amount"]."</td>";
            echo "<td>".$row["category"]."</td>";
            ?>
            <form  action="updateData.php" method="post">
              <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
              <td> <input type="submit" value="Edit" name="edit" class="btn btn-outline-success"></td>
            </form>

            <form method="post">
              <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
              <td> <input type="submit" value="Delete" name="delete" class="btn btn-outline-danger" ></td>
            </form>
          </tr>
            <?php 
            
          }
      } else {
        echo "<tr><td>0 Results</td></tr>";
      }


      ?>
    </table>
  </div>
  
  <!-- Chart.js goes here-->
  <div class="container">
  <canvas id="myChart" ></canvas>
  <script>
  const labels = [
    'Entertainment',
    'Bills',
    'Fuel',
    'Other'
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Amount Per Category',
      backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)', 'rgb(255,215,0)' ],
      data: [<?php echo $row2['sum'] ?>, <?php echo $row3['sum'] ?>, <?php echo $row4['sum'] ?>, <?php echo $row5['sum'] ?>],
      hoverOffset: 4
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</div>

  <h1> </h1>
</div>



<?php include('includes/scripts.php'); ?>
<?php include('includes/footer.php'); ?>