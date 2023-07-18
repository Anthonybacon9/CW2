
      <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="table-responsive">
          <table class="table table-hover table-dark">

            <?php
            $id = $_SESSION['uid'];

            $result = $con->query("SELECT id, item, amount, `date`, category FROM Expense_expense WHERE user_id=$id");
            $resultCheck = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            if(isset($_POST['delete'])) {

              $id = $_POST["id"];

              $query = "DELETE FROM Expense_expense WHERE id='$id' ";
              $query_run = mysqli_query($con, $query);

              if($query_run) {
                
              } else {
                echo '<script> alert("ERROR") </script>';
              }
            }


            if ($resultCheck > 0) {
                echo "<tr><th> Name </th><th> Date </th><th> Amount (£) </th> <th> Category </th> <th> </th></tr>";
              // output data of each row
                while($row = $result->fetch_assoc()) {
                  
                  
                  echo "<tr><td>". $row["item"]."</td>";
                  echo "<td>".$row["date"]."</td>";
                  echo "<td>".$row["amount"]."</td>";
                  echo "<td>".$row["category"]."</td>";
                  ?>
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
      </div>