<?php
    include 'backend/connection.php';
    $homeQuerry = "SELECT * FROM home";
    $homeResult = $conn->query($homeQuerry);
    $home = $homeResult->fetch_assoc();
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
                              <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Home</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <form class="form-horizontal form-material mx-2" method="post" action="backend/save_home.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <img src="../img/<?= $home['bgd_image'] ?>" class="img-fluid"/>
                                    <input type="file" name="file1" class="form-control">
                                </div>
                                <div class="card-body">
                                    <img src="../img/<?= $home['image'] ?>" class="img-fluid"/>
                                    <input type="file" name="file2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Brand Name</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $home['brand_name'] ?>"
                                                class="form-control form-control-line" name="brand">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Headline 1</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $home['display_text1'] ?>"
                                                class="form-control form-control-line" name="headline1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">headline 2</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $home['display_text1'] ?>"
                                                class="form-control form-control-line" name="headline2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Text</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" style="height: 100px" name="text" id=""><?= $home['text'] ?></textarea>
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
                </form>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>