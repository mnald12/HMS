<?php
    include 'backend/connection.php';
    $rooms = [];
    $roomsQuerry = "SELECT * FROM rooms";
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
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Rooms</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
            <?php foreach( $rooms as $row): ?>
                <div class="card">
                    <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <img src="../img/<?= $row['images'] ?>" class="img-fluid"/>
                        <input type="file" class="form-control mt-1">
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <input type="text" value="<?= $row['name'] ?>"
                                                class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Price</label>
                                                <input type="text" value="<?= $row['price'] ?>"
                                                class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-12">Text</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" style="height: 60px" name="" id=""><?= $row['text'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Bed</label>
                                                <input type="text" value="<?= $row['bed'] ?>"
                                                class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Bath</label>
                                                <input type="text" value="<?= $row['bath'] ?>"
                                                class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Wifi</label>
                                                <input type="text" value="<?= $row['wifi'] ?>"
                                                class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Total Rooms</label>
                                                <input type="text" value="<?= $row['rooms'] ?>"
                                                class="form-control form-control-line">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white">Update</button>
                                        </div>
                                    </div>
                    </div>
                </div>
                </div>
                </div>
                <br>
                <?php endforeach ?>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>