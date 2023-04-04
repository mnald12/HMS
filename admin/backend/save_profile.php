<?php

include 'connection.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);

$query = "SELECT * FROM user ";
$result = $conn->query($query);
$user = $result->fetch_assoc();


if($name !== $user['name']){
    $update = "UPDATE user SET name = '$name' ";
    $result = $conn->query($update);
}

if($address !== $user['address']){
    $update = "UPDATE user SET address = '$address' ";
    $result = $conn->query($update);
}

if($email !== $user['email']){
    $update = "UPDATE user SET email = '$email' ";
    $result = $conn->query($update);
}

if($username !== $user['username']){
    $update = "UPDATE user SET username = '$username' ";
    $result = $conn->query($update);
}

header('location: ../profile.php');

?>