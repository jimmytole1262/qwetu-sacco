<?php
$conn = mysqli_connect('localhost','root','Jimmytole@1262','qwetu');
if ($conn) {
    session_start();
    echo($_SESSION['user_id']);
    // Savings query
    // $sql = "SELECT * FROM savings WHERE id={$_SESSION['user_id']}";
    // $savings_result=mysqli_query($conn,$sql);
    // $savings = mysqli_fetch_all($savings_result,MYSQLI_ASSOC);
    // print_r($savings);
}

?>