<?php
 require ('connect.php');
 if ($conn){
    // echo ("Connected:");

 } else {
    echo ('Connection error: '. mysqli_connect_error());
 }

//  INSERT INTO `users` (`first_name`, `last_name`, `email`, `phone_number`, `pass_word`)
// VALUES 
// ('Mary', 'Mwangi', 'marymwangi@gmail.com', 0782546790, 'password123');
// SHOW CREATE TABLE users;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>QWETU SACCO</title>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-d34df686-fe42-434c-8f28-63d0e952d3a6" data-elfsight-app-lazy></div>
    <!-- Bootstrap javascript link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #3A3E4B;
            height: 80%;
            width: 40;
        }

        .brand {
            color: #FF9138;
        }

        .border-hover {
            border-top: 5px solid transparent;
            transform: translateY(-4px);
        }

        .border-hover:hover {
            border-top: 5px solid #ff9138;
            transform: translateY(-4px);
        }

        #sign-in {
            background: #FF9138;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }

        .navbar-toggler {
            border: 3px solid #FF9138;
        }


        .navbar-toggler-icon {
            background-image: url(/static_files/svgs3/list.svg)
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        #nav-length {
            width: 90%;
        }

        @media screen and (max-width : 992px) {
            #nav-length {
                width: 100%;
            }

            .border-hover {
                border-top: 0;
            }

            .border-hover:hover {
                border-top: 0;
            }

            #sign-in {
                border-radius: 50px;
            }
        }

        /* body section */
        .icon-height {
            height: 28px;
            width: 28px;
        }

        .icon-container {
            background: #FF9138;
        }

        .dark-background {
            background: #2b3944;
        }
        #socialWrap {
            border-radius: 0px 24px 24px 0px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="navbar navbar-expand-lg pt-4">
            <div class="container-fluid">
                <a href="#" class="brand text-decoration-none d-block d-lg-none fw-bold fs-1 ">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul id="nav-length" class="navbar-nav justify-content-between border-top border-2 text-center">
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link border-hover py-3 text-white">Home</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link border-hover py-3 text-white dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Our Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Loans</a></li>
                                <li><a class="dropdown-item" href="#">Savings Accounts</a></li>
                                <li><a class="dropdown-item" href="#">Financial Education</a></li>
                                <li><a class="dropdown-item" href="#">Online Banking</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="/About Us.php" class="nav-link border-hover py-3 text-white">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="/Contact.php" class="nav-link border-hover py-3 text-white">Contact Us</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="/user.php" class="nav-link border-hover py-3 text-white">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a href="/Userlog.php" id="sign-in" class="nav-link my-2 px-4 text-white">
                                Sign In
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main id="body-content">
        <div class="d-flex position-fixed">
        </div>
        <div class="container text-white w-75">
            <p class="fs-2 fw-light m-0 mt-lg-5"></p>
            <h1 class="display-2 fw-bold mb-5">QWETU SACCO <br> MAKING DREAMS<span class="brand">  COME TRUE</span>
            </h1>
            <p class="w-50 fs-5 mb-5">
            Welcome to Qwetu Sacco, where your financial goals meet a caring community! We're thrilled to have you as a part of our family. At Qwetu, we believe in empowering your financial journey and building a brighter future together. Feel free to explore our range of services, and if you have any questions or need assistance, our dedicated team is here for you. Here's to a prosperous and fulfilling journey with Qwetu Sacco
            </p>
        </div>
    </main>
    <!-- bootstrap Script File -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>