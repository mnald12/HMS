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
                              <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Booking</h1> 
                    </div>
                </div>
            </div>

            <!-- contents here -->

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>