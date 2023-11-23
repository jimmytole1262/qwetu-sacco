<?php 


/*require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con,$query);
*/

// require_once 'config/db.php';
// require_once 'config/functions.php';

// $result = dispaly_data();

  require("config/db.php");
  if ($conn){
    $sql="SELECT * FROM payments";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
  }

  if (isset($_POST["delete"])){
    $rowid=$_POST['rowid'];
    $sql= "DELETE FROM payments WHERE id='$rowid'";
    mysqli_query($conn,$sql);
    header("Location:payments.php");
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>PAYMENTS</title>
</head>
<body class="bg-dark">
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">PAYMENTS</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td>  ID </td>
                  <td> Loan id </td>
                  <td> Payee</td>
                  <td> Amount </td>
                  <td> Penalty_amount</td>
                  <td> Overdue</td>
                  <td>Date_created</td>
                  <td> Edit </td>
                  <td> Delete </td>
                </tr>
                <tr>
                <?php 

                  foreach($rows as $row ){
                  
                ?>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['loan_id']; ?></td>
                  <td><?php echo $row['payee']; ?></td>
                  <td><?php echo $row['amount']; ?></td>
                  <td><?php echo $row['penalty_amount']; ?></td>
                  <td><?php echo $row['overdue']; ?></td>
                  <td><?php echo $row['date_created']; ?></td>
                  
                  
                  <td><a href="#" class="btn btn-primary">Edit</a></td>  
                  <td><form action="payments.php" method="POST"> <input name="rowid"style="display:none" type="number" value='<?php echo($row['id']) ?>'> <button type="submit" name="delete" class="btn btn-danger">Delete</button></form></td>  
                </tr>
                <?php    
                  }
                
                ?>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>