<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MANGO FEVER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
	<?php
	include('controller/database.php');

	$settings_val = $mysqli->query("SELECT * from pos_settings");
    $sval = $settings_val->fetch_row();
	
	
	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uri_segments = explode('/', $uri_path);
	$page =  $uri_segments[2];
	
	
	?>
    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
	.ribbon {
    position: absolute;
    right: -5px;
    top: -5px;
    z-index: 1;
    overflow: hidden;
    width: 75px;
    height: 75px;
	text-align: center;
	}

    .ribbon span {
        font-size: 8px;
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        font-weight: bold;
        line-height: 20px;
        transform: rotate(45deg);
        width: 100px;
        display: block;
        background: #F62459;
        background: linear-gradient(#ff89b1 0%, #ff006e 100%);
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
        position: absolute;
        top: 19px;
        right: -21px;

    }

        .ribbon span::before {
            content: '';
            position: absolute;
            left: 0%;
            top: 100%;
            z-index: -1;
            border-left: 3px solid #F62459;
            border-right: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #F62459;
        }

        .ribbon span::after {
            content: '';
            position: absolute;
            right: 0%;
            top: 100%;
            z-index: -1;
            border-right: 3px solid #F62459;
            border-left: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #F62459;
        }


#inventory .card:hover {
    transition: all 0.3s ease;
    box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
}


#inventory .view-btn {
    background-color: #e6de08;
    margin: -25px 0 0 0;
    border-radius: 0 0 0 0;
    font-size: 14px;
    border: #e6de08;
    color: #000;

}


    #inventory .btn:hover {
        background-color: #ff4444;
        color: #fff;
        border: 2px solid #ff4444;
        transition: all 0.3s ease;
        box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
    }

	</style>
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
       
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <img src="assets/logo.jpg" width="250px" height="120px">
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products" name="product">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary" name="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
               
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
	


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0" style="background-color:#ffcc01 !important;">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                    <img src="assets/logo.png" width="200px">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link"  style="color:#fff !important;">Home</a>
							<?php
							$category1 = $mysqli->query("SELECT * from pos_item_category ");
							while($val1 = $category1->fetch_object()){	
							?>
                            <a href="index.php?data=<?php echo $val1->category_id;?>&category=<?php echo $val1->name;?>" class="nav-item nav-link"  style="color:#fff !important;"><?php echo $val1->name;?></a>
							<?php } ?>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="login.php" class="nav-item nav-link"  style="color:#fff !important;">Login</a>
                            <a href="register.php" class="nav-item nav-link"  style="color:#fff !important;">Register</a>
                        </div>
                    </div>
                </nav>
            <?php if(isset($_GET['data']) || $page == 'product-details.php' ){}else{?>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="assets/img/carousel-1.jpg" alt="Image">
                           
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="assets/img/carousel-2.jpg" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
				<section class="py-0 bg-primary-gradient">

					<div class="container">
					  <div class="row justify-content-center g-0">
						<div class="col-xl-12">
						  <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
							<h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">ABOUT</h5>
						  </div>
						  <div class="row">
							<?php echo $sval[8];?>
						  </div>
						</div>
						
						<div class="col-xl-12">
						<hr>
						  <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
							<h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">TERMS AND CONDITION</h5>
						  </div>
						  <div class="row">
							<?php echo $sval[6];?>
						  </div>
						</div>
						
						<div class="col-xl-12">
						<hr>
						  <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
							<h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">FREQUENTLY ASK QUESTION</h5>
						  </div>
						  <div class="row">
							<?php echo $sval[9];?>
						  </div>
						</div>
					  </div>
					</div><!-- end of .container-->

			  </section>
				<?php } ?>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
