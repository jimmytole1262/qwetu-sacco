<?php
require ('connect.php');
if ($conn)
  session_start();
  if (isset($_SESSION['logged_in'])){
    if ($_SESSION['logged_in']){
      // echo ($_SESSION['user_id']);
      $sql = "SELECT * FROM users WHERE id={$_SESSION['user_id']}";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_all($result,MYSQLI_ASSOC);}
      // print_r($user);

      // Savings query
      $sql = "SELECT * FROM savings WHERE id={$_SESSION['user_id']}";
      $savings_result = mysqli_query($conn,$sql);
      $savings = mysqli_fetch_all($savings_result,MYSQLI_ASSOC);
    }
      // print_r($savings);

      // SLoans query
      // $sql = "SELECT * FROM loans where id={$_SESSION['user_id']}";
      // $loans_result = mysqli_query($conn, $sql);
      // $loans = mysqli_fetch_all($result,MYSQLI_ASSOC);

      // Loan application;
    // Loan application;
if(isset($_POST['apply'])){
  // $id = $_POST['id']; // Assuming this line is not needed
  $loan_type = $_POST['loan_type'];
  $loan_amount = $_POST['loan_amount'];
  $loan_term = $_POST['loan_term'];
  $issue_date = $_POST['issue_date'];
  $due_date = $_POST['due_date'];
  
  // Don't include loan_id in the INSERT statement if it's an auto-incrementing primary key
  $sql = "INSERT INTO loans (loan_type, loan_amount, loan_term, issue_date) 
      VALUES ('$loan_type', '$loan_amount', '$loan_term', '$issue_date')";

  if (mysqli_query($conn, $sql)) {
      echo "Loan application submitted successfully!";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | By Code Info</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style>
    /* Additional styles for member details, send money, loan form, and savings details */
    .send-money,
    .loan-form,
    .savings-details {
      display: none;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <img src="/assests/jimlogo.png" alt="logo">
            <span class="nav-item">DashBoard</span>
          </a>
        </li>
        <!-- <li><a href="/userdashboard.php" onclick="showMemberDetails()">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li> -->
        
        <li><a href="#" onclick="showSavings()">
          <i class="fas fa-wallet"></i>
          <span class="nav-item">Savings</span>
        </a></li>
        <li><a href="#" onclick="showSendMoney()">
          <i class="fas fa-money-check"></i>
          <span class="nav-item">Send Money</span>
        </a></li>
        <li><a href="#" onclick="showLoanForm()">
          <i class="fas fa-coins"></i>
          <span class="nav-item">Loan</span>
        </a></li>
      <li><a href="/reading.php" onclick="showReadingMaterials()">
        <i class="fas fa-book-open"></i>
        <span class="nav-item">Reading Materials</span>
      </a></li>
        <li><a href="userlog.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log Out</span>
        </a></li>
      </ul>
    </nav>
        
    <!-- Member Details Section -->
    <section class="member-details" style="background-color: #3498db; color: white; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; padding: 20px; text-align: center; width: 400px;">

<h2 style="font-size: 24px; margin-bottom: 20px;">Member Details</h2>

<form action="#" method="post">
  <label for="firstName" style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 18px;">First Name:</label>
  <input type="text" id="firstName" name="firstName" style="width: 100%; box-sizing: border-box; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;" value="<?php echo $user[0]["first_name"]; ?>" />

  <label for="lastName" style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 18px;">Last Name:</label>
  <input type="text" id="lastName" name="lastName" style="width: 100%; box-sizing: border-box; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;" value="<?php echo $user[0]["last_name"]; ?>" />

  <label for="phoneNumber" style="display: block; font-weight: bold; margin-bottom: 5px; font-size: 18px;">Phone Number:</label>
  <input type="text" id="phoneNumber" name="phoneNumber" style="width: 100%; box-sizing: border-box; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;" value="<?php echo $user[0]["phone_number"]; ?>" />
</form>

</section>

    <!-- Send Money Section -->
    <section class="send-money">
        <section style="width: 800px;">
            <form onsubmit="processPayment(event)" style="background-color: #add8e6; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; padding: 20px; text-align: left; width: 400px; margin: 20px auto;">
                <div style="background-color: #3498db; color: #fff; padding: 15px; text-align: center; font-weight: bold; font-size: 16px;">Payment Form</div>
                <div style="margin-bottom: 15px;">
                    <label for="paymentMethod" style="font-weight: bold; display: block; font-size: 16px;">Payment Method:</label>
                    <select id="paymentMethod" name="paymentMethod" style="width: 100%; box-sizing: border-box; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
                        <option value="mpesa">M-Pesa</option>
                        <!-- Add other payment methods as needed -->
                    </select>
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="phoneNumber" style="font-weight: bold; display: block; font-size: 16px;">Phone Number:</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" style="width: 100%; box-sizing: border-box; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="amount" style="font-weight: bold; display: block; font-size: 16px;">Amount:</label>
                    <input type="text" id="amount" name="amount" placeholder="Enter amount" style="width: 100%; box-sizing: border-box; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
                </div>
                <button type="submit" style="background-color: #3498db; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; max-width: 300px; margin: 0 auto;">Send</button>
            </form>
        </section>
    </section>

    <!-- Loan Form Section -->
    <section class="loan-form">
      <h2>Loan Form</h2>
      <div style="width: 800px; margin: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 10px; background: linear-gradient(to right, lightblue, lightcoral);">
        <form action="userdashboard.php" method="POST" style="width: 100%;">
          <label for="memberID" style="display: block; width: 100%; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Member ID:</label>
          <input name="id" type="text" id="memberID" placeholder="Enter Member ID" style="display: block; width: 100%; margin-bottom: 10px;">
      
          <label for="loanID" style="display: block; width: 100%; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Loan ID:</label>
          <input type="number" id="loanID" name="loan_id" placeholder="Enter Loan ID" style="display: block; width: 100%; margin-bottom: 10px;">
      
          <label for="loanType" style="display: block; width: 100%; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Loan Type:</label>
          <select id="loanType" name="loan_type" style="display: block; width: 100%; margin-bottom: 10px;">
            <option value="personal">Personal Loan</option>
            <option value="business">Business Loan</option>
          </select>
      
          <label for="loanAmount" style="display: block; width: 100%; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Loan Amount:</label>
          <input type="text" name="loan_amount" date="loan_amount" id="loanAmount" placeholder="Enter Loan Amount" style="display: block; width: 100%; margin-bottom: 10px;">
      
          <label for="loanTerm" style="display: block; width: 100%; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Loan Term:</label>
          <select id="loanTerm" name="loan_term" style="display: block; width: 100%; margin-bottom: 10px;">
            <option value="1">1 year</option>
            <option value="2">2 years</option>
            <option value="3">3 years</option>
          </select>
      
          <label for="issueDate" style="display: block; width: 100%; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Issue Date:</label>
          <input type="date" name="issue_date" id="issueDate" style="display: block; width: 100%; margin-bottom: 10px;">
      
          <label for="dueDate" style="display: block; width: 100%; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Due Date:</label>
          <input type="date" name="due_date" id="dueDate" style="display: block; width: 100%; margin-bottom: 10px;">
      
          <button type="submit" name="apply" style="display: block; width: 100%; margin-bottom: 10px; background-color: #4CAF50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
          </form>
      </div>
        
      </form>
    </section>

    <!-- Savings Details Section -->
    <section class="savings-details">
      <h2>Savings Details</h2>
      <!-- Add savings-related content here -->
      <section style="width: 800px;">
        <div style="background: linear-gradient(to right, #28a745, #dc3545); border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; width: 300px; margin: 0 auto;">
          <div style="background-color: #28a745; color: #fff; padding: 15px; text-align: center; font-weight: bold; font-size: 16px;">SAVINGS</div>
          <div style="padding: 20px;">
            <div style="font-weight: bold; margin-bottom: 5px; font-size: 16px; color: #fff;">Savings ID</div>
            <div style="margin-bottom: 15px; font-size: 16px; color: #fff;"><?php echo($savings[0]['id']) ?></div>
        
            <div style="font-weight: bold; margin-bottom: 5px; font-size: 16px; color: #fff;">First Name:</div>
            <div style="margin-bottom: 15px; font-size: 16px; color: #fff;"><?php echo($savings[0]['first_name']) ?></div>
        
            <div style="font-weight: bold; margin-bottom: 5px; font-size: 16px; color: #fff;">Last Name:</div>
            <div style="margin-bottom: 15px; font-size: 16px; color: #fff;"><?php echo($savings[0]['last_name']) ?></div>
        
            <!-- <div style="font-weight: bold; margin-bottom: 5px; font-size: 16px; color: #fff;">Amount:</div>
            <div style="margin-bottom: 15px; font-size: 16px; color: #fff;"><?php echo($savings[0]['amount']) ?></div> -->
        
            <div style="font-weight: bold; margin-bottom: 5px; font-size: 16px; color: #fff;">Date:</div>
            <div style="margin-bottom: 15px; font-size: 16px; color: #fff;"><?php echo($savings[0]['date']) ?></div>
          </div>
        </div>
    </section>
    
  </section>
  
  
  
  <!-- ... Rest of your HTML content ... -->
  
  <style>
    /* Additional CSS to style the input fields */
    .input-field {
      display: block;
      margin-bottom: 10px;
    }
  </style>
  
  <script>
    function submitSavings() {
      // Handle the submission as needed, or leave this function empty
    }
  </script>
  
    </section>

    <!-- ... Rest of your HTML content ... -->

  </div>

  <script>
    function showMemberDetails() {
      var memberDetailsSection = document.querySelector('.member-details');
      var sendMoneySection = document.querySelector('.send-money');
      var loanFormSection = document.querySelector('.loan-form');
      var savingsDetailsSection = document.querySelector('.savings-details');

      memberDetailsSection.style.display = 'block';
      sendMoneySection.style.display = 'none';
      loanFormSection.style.display = 'none';
      savingsDetailsSection.style.display = 'none';
    }

    function showSendMoney() {
      var memberDetailsSection = document.querySelector('.member-details');
      var sendMoneySection = document.querySelector('.send-money');
      var loanFormSection = document.querySelector('.loan-form');
      var savingsDetailsSection = document.querySelector('.savings-details');

      memberDetailsSection.style.display = 'none';
      sendMoneySection.style.display = 'block';
      loanFormSection.style.display = 'none';
      savingsDetailsSection.style.display = 'none';
    }
    
    function showLoanForm() {
      var memberDetailsSection = document.querySelector('.member-details');
      var sendMoneySection = document.querySelector('.send-money');
      var loanFormSection = document.querySelector('.loan-form');
      var savingsDetailsSection = document.querySelector('.savings-details');

      memberDetailsSection.style.display = 'none';
      sendMoneySection.style.display = 'none';
      loanFormSection.style.display = 'block';
      savingsDetailsSection.style.display = 'none';
    }

    function showSavings() {
      var memberDetailsSection = document.querySelector('.member-details');
      var sendMoneySection = document.querySelector('.send-money');
      var loanFormSection = document.querySelector('.loan-form');
      var savingsDetailsSection = document.querySelector('.savings-details');

      memberDetailsSection.style.display = 'none';
      sendMoneySection.style.display = 'none';
      loanFormSection.style.display = 'none';
      savingsDetailsSection.style.display = 'block';
    }

        function processPayment(event) {
            event.preventDefault();
            alert('Sent successfully!');
            // Add your payment processing code here
        }

        
    
    
    // ... Existing functions for submitLoan(), declineLoan(), etc.
    
  </script>
</body>
</html>
