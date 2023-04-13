<?php
    include 'backend/connection.php';

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $bookingQuerry = "SELECT * FROM bookings where id = '$id' ";
    $bookingResults = $conn->query($bookingQuerry);
    $bookings = $bookingResults->fetch_assoc();

    $type = $bookings['room'];

    $rooms = [];
    $roomsQuerry = "SELECT * FROM room where room_type = '$type' ";
    $roomsResults = $conn->query($roomsQuerry);
    while($row = $roomsResults->fetch_assoc()){
        $rooms[] = $row; 
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
                              <li class="breadcrumb-item active" aria-current="page">Manage</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Manage</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-12">Name</label>
                                            <input type="text" value="<?= $bookings['name'] ?>"
                                            class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-12">Email</label>
                                            <input type="text" value="<?= $bookings['email'] ?>"
                                            class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-12">Check In</label>
                                            <div class="col-md-12">
                                                <input type="text" value="<?= $bookings['check_in'] ?>"
                                                class="form-control form-control-line" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-12">Check Out</label>
                                            <div class="col-md-12">
                                                <input type="text" value="<?= $bookings['check_out'] ?>"
                                                class="form-control form-control-line" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-md-12">Adult</label>
                                            <input type="text" value="<?= $bookings['adult'] ?>"
                                            class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-md-12">Child</label>
                                            <input type="text" value="<?= $bookings['child'] ?>"
                                            class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-md-12">Room Type</label>
                                            <input type="text" value="<?= $bookings['room'] ?>"
                                            class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="col-md-12">Created</label>
                                            <input type="text" value="<?= $bookings['created'] ?>"
                                            class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12">Request</label>
                                            <input type="text" value="<?= $bookings['request'] ?>"
                                            class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#reject">Reject</button>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reserve">Reserve</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    
    <div class="modal fade" id="reserve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">
                        Select a Room
                    </h2>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="row gap-2 justify-content-center">
                            <?php foreach( $rooms as $row): ?>
                                <?php
                                    $rn = $row['room_number'];
                                    $schedules = [];
                                    $sched = "SELECT * FROM schedule Where room_number = '$rn' ";
                                    $schedule = $conn->query($sched);
                                    if($schedule){
                                        while($rows = $schedule->fetch_assoc()){
                                            $schedules[] = $rows; 
                                        }
                                    }
                                ?>
                                <div class="col-lg-12">
                                    <form action="backend/reserve.php" method="post" style="width: 100%; position: relative">
                                        <input type="text" name="id" value="<?= $id ?>" hidden>
                                        <input type="text" name="name" value="<?= $bookings['name'] ?>" hidden>
                                        <input type="text" name="email" value="<?= $bookings['email'] ?>" hidden>
                                        <input type="text" name="room" value="<?= $row['room_number'] ?>" hidden>
                                        <button class="btn btn-primary" style="width: 100%; position: relative">
                                            <p class="fs-5">Room <?= $row['room_number'] ?></p>
                                            <hr>
                                            <p class="fs-7"><?= count($schedules) === 0 ? "No Schedule" : "" ?></p>
                                            <?php foreach( $schedules as $rows): ?>
                                                <?php $ci = $rows['check_in']; $co = $rows['check_out']; ?>
                                                <p class="fs-7 pt-1 pb-1"><?= "$ci - $co" ?></p>
                                            <?php endforeach ?>
                                        </button>
                                    </form>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">
                        Message for Rejection
                    </h2>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="backend/reject.php" method="post">
                        <input type="text" name="id" value="<?= $bookings['id'] ?>" hidden>
                        <input type="text" name="name" value="<?= $bookings['name'] ?>" hidden>
                        <input type="text" name="email" value="<?= $bookings['email'] ?>" hidden>
                        <textarea name="msg" id="" class="form-control border-2" required></textarea>
                        <br>
                        <button class="btn btn-danger text-white">Reject and send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>