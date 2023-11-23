<?php
require("config/db.php");
if ($conn){
  $sql="SELECT * FROM loans";
  $result=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
}

if (isset($_POST["delete"])){
  $rowid=$_POST['rowid'];
  $sql= "DELETE FROM loans WHERE id='$rowid'";
  mysqli_query($conn,$sql);
  header("Location:loans.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>LOANS FORM</title>
</head>
<body class="bg-dark">
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">LOAN FORM</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <tr class="bg-dark text-white">
                    <td>ID</td>
                    <td>Loan id</td>
                    <td>Loan type</td>
                    <td>Loan amount</td>
                    <td>Loan term</td>
                    <td>Issue date</td>
                    <td> Due date</td>
                    <td> Approval status</td>
                    <td> Interest percentage</td>
                    <td> Penalty rate</td>
                    <td>Edit</td>
                    <td>Delete</td>
                  </tr>
                <tr>
                <?php 

                foreach($rows as $row ){
                  
                ?>
                 <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['loan_id']; ?></td>
                <td><?php echo $row['loan_type']; ?></td>
                <td><?php echo $row['loan_amount']; ?></td>
                <td><?php echo $row['loan_term']; ?></td>
                <td><?php echo $row['issue_date']; ?></td>
                <td><?php echo $row['due_date']; ?></td>
                <td><?php echo $row['Approval_status']; ?></td>
                <td><?php echo $row['Interest_percentage']; ?></td>
                <td><?php echo $row['Penalty_rate']; ?></td>

                  <td><a href="#" class="btn btn-primary">Edit</a></td>  
                  <td><form action="Users.php" method="POST"> <input name="rowid"style="display:none" type="number" value='<?php echo($row['id']) ?>'> <button type="submit" name="delete" class="btn btn-danger">Delete</button></form></td>  
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
