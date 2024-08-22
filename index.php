<?php
session_start();
require 'includes/db.php';

//Skill data
$select_skill = "SELECT * FROM skills WHERE status = 1";
$result_skill = mysqli_query($conn, $select_skill);

//Service data
$select_service = "SELECT * FROM services WHERE status = 1";
$result_service = mysqli_query($conn, $select_service);

//Review data
$select_review = "SELECT * FROM reviews WHERE status = 1";
$result_review = mysqli_query($conn, $select_review);

//Portfolio data
$select_portfolio = "SELECT * FROM portfolios WHERE status = 1";
$result_portfolio = mysqli_query($conn, $select_portfolio);

//web_info
$select_web = "SELECT * FROM web_info";
$web_result = mysqli_query($conn, $select_web);
$web_show = mysqli_fetch_assoc($web_result);


?>

<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="portfolio,creative,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themeturn.com">

  <title><?= $web_show['web_title'] ?></title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/ratsaan/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Themeify Icon Css -->
  <link rel="stylesheet" href="assets/ratsaan/plugins/themify/css/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/ratsaan/plugins/animate-css/animate.css">
  <link rel="stylesheet" href="assets/ratsaan/plugins/aos/aos.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="assets/ratsaan/plugins/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/ratsaan/plugins/owl/assets/owl.theme.default.min.css" >
  <!-- Slick slider CSS -->
  <link rel="stylesheet" href="assets/ratsaan/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="assets/ratsaan/plugins/slick-carousel/slick/slick-theme.css">
  <!-- Icon -->
   <link rel="icon" href="assets/uploads/icon/<?= $web_show['icon'] ?>">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/ratsaan/css/style.css">

</head>

<body class="portfolio" id="top">


<!-- Navigation start -->
<!-- Header Start --> 

<nav class="navbar p-0 navbar-expand-lg bg-transprent fixed-top navigation" id="navbar">
	<div class="container">
	  <a class="navbar-brand" href="index.html">
		  <div class="row" >
			<?php if($web_show['logo_status'] == 1){ ?>
		  		<img class="navbar-brand" height="70px"  src="assets/uploads/logo/<?= $web_show['image_logo']?>" alt="">
			<?php }else{ ?>
	  			<h2 class="logo pt-2"><?= $web_show['text_logo']?>.</h2>
			<?php } ?>
		  </div>

	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
		<span class="ti-view-list"></span>
	  </button>
  
	  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			   <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#skillbar">Expertise</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#service">Services</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#portfolio">Portfolio</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#testimonial">Testimonial</a></li>
			   <li class="nav-item"><a class="nav-link smoth-scroll" href="#contact">Contact</a></li>
			</ul>
	  </div>
	</div>
</nav>


<!-- Navigation End -->

<!-- Banner start -->

<!-- Slider Start -->
<section class="slider py-7 ">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5 col-sm-12 col-12 col-md-5">
				<div class="slider-img position-relative">
					<img src="assets/uploads/landing_image/<?= $web_show['image'] ?>" alt="" class="img-fluid w-100">
				</div>
			</div>

			<div class="col-lg-6 col-12 col-md-7">
				<div class="ml-5 position-relative mt-5 mt-lg-0">
					<span class="head-trans"><?= $web_show['watermark']?></span>
					<h1 class="font-weight-normal text-color text-md"><i class="ti-minus mr-2"></i><?= $web_show['tag']?></h1>
					<h2 class="mt-3 text-lg mb-3 text-capitalize"><?= $web_show['heading']?></h2>
					<p class="animated fadeInUp lead mt-4 mb-5 text-white-50 lh-35"><?= $web_show['description']?></p>
					<a href="assets/cv/cv.pdf" download class="btn btn-solid-border">Download Resume!</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner End -->

<!-- Skills start -->
<section class="section bg-gray" id="skillbar" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>Skills Set</span>
					<h2 class="title">Expertise</h2>
				</div>
			</div>
		</div>
		<div class="row">
		<?php if($result_skill->num_rows > 0){ ?>
            <?php foreach($result_skill as $skill){ ?>
			<div class="col-lg-6 col-md-6">
                <div class="skill-bar mb-4 mb-lg-0">
                    <div class="mb-4 text-right"><h4 class="font-weight-normal"><?= $skill['skill']?></h4></div>
					<div class="progress">
                        <div class="progress-bar" data-percent="<?= $skill['percentage']?>">
                            <span class="percent-text"><span class="count"><?= $skill['percentage']?></span>%</span>
						</div>
					</div>
				</div>
			</div>
            <?php } ?>
			<?php }else{ ?>
				<div class="m-auto">
				<h3>No Data to show!</h3>
				</div>
			<?php } ?>
		</div>
	</div>
</section>	

<!-- Skills End -->

<!-- Service start -->
<section class="section bg-gray" id="service" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>What i do</span>
					<h2 class="title">Services</h2>
				</div>
			</div>
		</div>

		<div class="row no-gutters">
		<?php if($result_service->num_rows > 0){ ?>
        <?php foreach($result_service as $service){ ?>
			<div class="col-lg-4 col-md-6">
				<div class="card p-5 rounded-0">
					<h3 class="my-4 text-capitalize"><?=$service['title']?></h3>
					<p><?=$service['description']?></p>
				</div>
			</div>
            <?php }?>
			<?php }else{ ?>
				<div class="m-auto">
				<h3>No Data to show!</h3>
				</div>
			<?php } ?>
		</div>

		<div class="row align-items-center mt-5" data-aos="fade-up">
			<div class="col-lg-6 mt-5">
				<h2 class="mb-5 text-lg-2 text-white-50">Let's <span class="text-white">work together</span> on your next project </h2>
			</div>
			<div class="col-lg-4 ml-auto text-right">
				<a href="#contact" class="btn btn-main text-white smoth-scroll">Hire Me</a>







			</div>
		</div>
	</div>
</section>
<!-- Service End -->

<!-- Portfolio start -->
<section class="section" id="portfolio" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus"></i>works</span>
					<h2 class="title">Portfolio</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<?php if($result_portfolio->num_rows > 0){ ?>
			<div class="post_gallery owl-carousel owl-theme">
				<?php foreach($result_portfolio as $portfolio){ ?>
					<div class="item">
						<div class="portfolio-item position-relative">
							<img src="assets/uploads/portfolios/<?= $portfolio['image'] ?>" class="img-fluid" height="500px">
	
							<div class="portoflio-item-overlay">
								<a href="portfolio-single.html"><i class="ti-plus"></i></a>
							</div>
						</div>
						<div class="text mt-3">
							<h4 class="mb-1 text-capitalize"><?= $portfolio['title'] ?></h4>
							<p class="text-uppercase letter-spacing text-sm"><?= $portfolio['sub_title'] ?></p>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php }else{ ?>
					<div class="m-auto">
					<h3>No Data to show!</h3>
					</div>
				<?php } ?>

		</div>
	</div>
</section>
<!-- Portfolio End -->

<!-- Tetsimonial start -->
<section id="testimonial" class="section testomionial" data-aos="fade-up">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="section-title">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>testimonial</span>
					<h1 class="title">What People Say About me</h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="testimonial-slider">
					<?php foreach($result_review as $review){ ?>
						<div class="testimonial-item position-relative">
							<i class="ti-quote-left text-white-50"></i>
							<div class="testimonial-content">
								<p class="text-md mt-3"><?= $review['review']?></p>
	
								<div class="media mt-5 align-items-center">
									<div class="media-body">
										<h3 class="mb-0"><?= $review['name']?></h3>
										<span class="text-muted"><?= $review['profession']?></span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- Tetsimonial End -->

<!-- Reviews start -->
<section class="section" id="review" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>INSPIRE ME!</span>
					<h1 class="title">Leave a review</h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-8">
				<?php if(isset($_SESSION['error_review'])){ ?>
					<div class="alert alert-danger">
						<?= $_SESSION['error_review'] ?>
					</div>
				<?php } unset($_SESSION['error_review'])?>
				<?php if(isset($_SESSION['success_review'])){ ?>
					<div class="alert alert-success">
						<?= $_SESSION['success_review'] ?>
					</div>
				<?php } unset($_SESSION['success_review']) ?>
					<form class="contact__form form-row contact-form" method="POST" action="reviews/review_post.php" id="contactForm">
					 <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
					<div class="form-group col-lg-6 mb-5">
						<input type="text" id="name" name="reviewer_name" class="form-control bg-transparent" placeholder="Your Name">
					</div>
					<div class="form-group col-lg-6 mb-5">
						<input type="text" name="reviewer_profession" id="email" class="form-control bg-transparent" placeholder="Your Profession">
					</div>	
                    <div class="form-group col-lg-12 mb-5">
						<input type="email" name="reviewer_email" id="email" class="form-control bg-transparent" placeholder="Your Email">
					</div>					
					<div class="form-group col-lg-12 mb-5">
						<textarea id="message" name="reviewer_review" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Review"></textarea>
						
						<div class="text-center">
							 <input class="btn btn-main text-white mt-5" id="submit" name="review" type="submit" class="btn btn-hero" value="Submit Review">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Reviews End -->

<!-- Contact start -->
<section class="section" id="contact" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>Contact</span>
					<h1 class="title">Get in Touch</h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-8">

					<?php if(isset($_SESSION['error_message'])){ ?>
						<div class="alert alert-danger">
							<?= $_SESSION['error_message'] ?>
						</div>
					<?php } unset($_SESSION['error_message'])?>
					<?php if(isset($_SESSION['success_message'])){ ?>
						<div class="alert alert-success">
							<?= $_SESSION['success_message'] ?>
						</div>
					<?php } unset($_SESSION['success_message']) ?>

					<form class="contact__form form-row contact-form" method="POST" action="messages/message_post.php" id="contactForm">
					<div class="form-group col-lg-6 mb-5">
						<input type="text" id="name" name="sender_name" class="form-control bg-transparent" placeholder="Your Name">
					</div>
					<div class="form-group col-lg-6 mb-5">
						<input type="email" name="sender_email" id="email" class="form-control bg-transparent" placeholder="Your Email">
					</div>
					<div class="form-group col-lg-12 mb-5">
						<input type="text" name="sender_subject" id="subject" class="form-control bg-transparent" placeholder="Your Subject">
					</div>
					
					<div class="form-group col-lg-12 mb-5">
						<textarea id="message" name="sender_message" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Message"></textarea>
						
						<div class="text-center">
							 <input class="btn btn-main text-white mt-5" id="submit" name="message" type="submit" class="btn btn-hero" value="Send Message">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Contact End -->

<!-- Footer start -->
<footer class="footer border-top-1">
	<div class="container">
		<div class="row align-items-center text-center text-lg-left">
			<div class="col-lg-2">
				<h2 class="logo mb-4">Samiul.</h2>
			</div>
			<div class="col-lg-10">
				<div class="text-right">
					<p class="lead"><span class="text-color">CreativeIT</span> © 2019 All Right Reserved by Samiul.</p>
					<a href="#top" class="backtop smoth-scroll"><i class="ti-angle-up"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer End -->


    <!-- 
    Essential Scripts
    =====================================-->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Main jQuery -->
    <script src="assets/ratsaan/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="assets/ratsaan/plugins/bootstrap/js/popper.js"></script>
    <script src="assets/ratsaan/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/ratsaan/plugins/nav/jquery.easing.1.3.html"></script>
    
    <!-- Slick Slider -->
    <script src="assets/ratsaan/plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="assets/ratsaan/plugins/owl/owl.carousel.min.js"></script>
  
    <!-- Skill COunt -->
    <script src="assets/ratsaan/plugins/counto/apear.js"></script>
    <script src="assets/ratsaan/plugins/counto/counTo.js"></script>
    <!-- AOS Animation -->
    <script src="assets/ratsaan/plugins/aos/aos.js"></script>
    
    <script src="assets/ratsaan/js/script.js"></script>
    <script src="assets/ratsaan/js/ajax-contact.html"></script>


  </body>
</html>
   