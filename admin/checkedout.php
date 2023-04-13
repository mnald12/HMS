<?php
    include 'backend/connection.php';
    $bookings = [];
    $bookingQuerry = "SELECT * FROM bookings Where status = 'Checked Out' Order By id desc";
    $bookingResults = $conn->query($bookingQuerry);
    while($row = $bookingResults->fetch_assoc()){
        $bookings[] = $row; 
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include './model/header.php' ?>
</head>
<body>
    <?php include './model/loader.php' ?>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php include './model/sidebar.php' ?>
        <div class="page-wrapper">

            <div class="page-breadcrumb pt-1 pb-1">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="dashboard.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Cheked Out</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Checked Out</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><b>Name</b></th>
                                        <th scope="col"><b>Room</b></th>
                                        <th scope="col"><b>Check In</b></th>
                                        <th scope="col"><b>Check Out</b></th>
                                        <th scope="col"><b>Room No.</b></th>
                                        <th scope="col"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $bookings as $row): ?>
                                        <tr>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['room'] ?></td>
                                            <td><?= $row['check_in'] ?></td>
                                            <td><?= $row['check_out'] ?></td>
                                            <td><?= $row['room_number'] ?></td>
                                            <td>
                                                <a href="backend/delete.php?id=<?= $row['id'] ?>&loc=checkedout"><span class="badge bg-danger">Delete</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>