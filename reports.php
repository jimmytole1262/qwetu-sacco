<?php
require("config/db.php");

if ($conn){
  $sql = "SELECT * FROM report";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if (isset($_POST["delete"])){
  $rowid = $_POST['rowid'];
  $sql = "DELETE FROM report WHERE id='$rowid'";
  mysqli_query($conn, $sql);
  header("Location: reports.php");
}

// Index to keep track of the current report being displayed
$currentReportIndex = 0;

// Check if the user has clicked "Next" or "Previous"
if (isset($_POST["next"])) {
  $currentReportIndex = min($currentReportIndex + 1, count($rows) - 1);
} elseif (isset($_POST["previous"])) {
  $currentReportIndex = max($currentReportIndex - 1, 0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>User Report</title>
</head>
<body class="bg-light" style="background-color: #F8F9FA; height: 500px;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8" style="background: linear-gradient(45deg, #FFFFFF, #FF0000); padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <!-- User Card -->
                <?php
                // Display the current report based on the index
                $user = $rows[$currentReportIndex];
                ?>
                <div class="card user-card" style="font-weight: bold; font-size: 16px; background-color: transparent; color: #000000; margin-bottom: 20px;">
                    <h4>User Information</h4>
                    <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
                    <!-- Include other fields as needed -->
                    <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
                    <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
                    <p><strong>Loan Amount:</strong> <?php echo $user['loan_amount']; ?></p>
                    <p><strong>Loan Term:</strong> <?php echo $user['loan_term']; ?> years</p>
                    <p><strong>Approval Status:</strong> <?php echo $user['approved_status']; ?></p>
                </div>
                <!-- End User Card -->

                <!-- Navigation Buttons -->
                <form method="post">
                    <button type="submit" name="previous" class="btn btn-secondary" style="margin-right: 10px; background-color: #000000; color: #FFFFFF; margin-bottom: 20px;">Previous</button>
                    <button type="submit" name="next" class="btn btn-secondary" style="background-color: #000000; color: #FFFFFF; margin-bottom: 20px;">Next</button>
                </form>
                <!-- End Navigation Buttons -->

                <!-- Print Button -->
                <button onclick="window.print()" class="btn btn-primary" style="background-color: #000000; color: #FFFFFF;">Print</button>
            </div>
        </div>
    </div>
</body>
</html>
