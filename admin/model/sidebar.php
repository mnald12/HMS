<?php
    if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
        header('location: ../admin/index.php');
     }
    include './backend/connection.php';
    $userQuerry = "SELECT * FROM user";
    $userResult = $conn->query($userQuerry);
    $user = $userResult->fetch_assoc();
?>
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="dashboard.php">
                <span class="logo-text">
                    <b>HOTELBOOK</b>
                </span>
            </a>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="mdi mdi-menu"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-start me-auto">
            </ul>
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../img/<?= $user['avatar'] ?>" alt="user" class="rounded-circle" width="31">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php"><i class="ti-user m-r-5 m-l-5"></i>
                            My Profile</a>
                        <a class="dropdown-item" href="./backend/logout.php"><i class="ti-wallet m-r-5 m-l-5"></i>
                            Logout</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="dashboard.php" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="booking.php" aria-expanded="false">
                        <i class="mdi mdi-book"></i><span class="hide-menu">Booking</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="home.php" aria-expanded="false">
                        <i class="mdi mdi-home"></i><span class="hide-menu">Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="about.php" aria-expanded="false">
                        <i class="mdi mdi-information-outline"></i><span class="hide-menu">About</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="services.php" aria-expanded="false">
                        <i class="mdi mdi-ticket-account"></i><span class="hide-menu">Services</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="rooms.php" aria-expanded="false">
                        <i class="mdi mdi-hospital-building"></i><span class="hide-menu">Rooms</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="contacts.php" aria-expanded="false">
                        <i class="mdi mdi-phone"></i><span class="hide-menu">Contacts</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>