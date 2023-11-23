<?php
// require_once 'config/db.php';
// require_once 'config/functions.php';

//  Assuming dispaly_data() is correctly implemented in functions.php
// $result = dispaly_data();
require("config/db.php");
if ($conn){
  $sql="SELECT * FROM savings";
  $result=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
}

if (isset($_POST["delete"])){
  $rowid=$_POST['rowid'];
  $sql= "DELETE FROM savings WHERE id='$rowid'";
  mysqli_query($conn,$sql);
  header("Location:savings.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>SAVINGS</title>
</head>
<body class="bg-dark">
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">SAVINGS FORM</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="bg-dark text-white">
                  <td>ID</td>
                  <td>First name</td>
                  <td>Last name</td>
                  <td>Balance</td>
                  <td>Date</td>
                  <td>Edit</td>
                  <td>Delete</td>
                </tr>

                <?php
                foreach($rows as $row ){
                ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    <td><?php echo $row['date']; ?></td>


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
