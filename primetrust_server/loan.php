<?php
require 'connection.php';
require_once 'loaduser.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_COOKIE['isLoggedIn'];
    $amount = $_POST['amount'];
    $pubkey = $_POST['pubkey'];
    $password = $_POST['pass'];

    $state = "";

    if ($data['password'] == $password) {
        $sql = "INSERT INTO `loan`(`user_id`, `amount`, `pubkey`) VALUES ('$id','$amount','$pubkey')";
        $result = mysqli_query($conn, $sql);
        $state = "correctpassword";
    }else {
        $state = "incorrectpassword";
    }

    
    // $url = "";
    // if (isset($_SERVER['HTTPS'] && $_SERVER['HTTPS'] === 'on')) {
    //     $url = "https://";
    // }else {
    //     $url = "http://";
    // }

    // $url.=$_SERVER['HTTP_HOST'];
    $url = "http://localhost";
    header("Location: " . $url . "/premium trust finance/html/dashboard/loan/loan.html?pass=$state");
}

mysqli_close($conn);
?>
