<?php

include 'db/connection.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
$checkout = mysqli_real_escape_string($conn, $_POST['checkout']);
$adult = mysqli_real_escape_string($conn, $_POST['adult']);
$child = mysqli_real_escape_string($conn, $_POST['child']);
$room = mysqli_real_escape_string($conn, $_POST['room']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$date = date("m/d/Y");

$insert="INSERT Into bookings (name, email, check_in, check_out, adult, child, room, status, request, created) 
VALUES ('$name', '$email', '$checkin', '$checkout', '$adult', '$child', '$room', 'Pending', '$message', '$date')";
$res=mysqli_query($conn, $insert);

session_start();
$_SESSION['booking'] = 'Your request has been sent! Please check your email for our response, Thank You!';

header('location: booking.php#booking');

?>