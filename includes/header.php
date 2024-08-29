<?php
require 'db.php';
require 'function.php';
session_start();

if(!isset($_SESSION['login_status'])){
    $_SESSION['error'] = 'DO NOT TRY TO UNAUTORIZE ACCESS!';
    header('location:../authentication/login.php');
}

//users data
$id = $_SESSION['login_status'];
$select = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $select);
$after_assoc = mysqli_fetch_assoc($result);

//Message data
$select_message = "SELECT * FROM messages ORDER BY id DESC LIMIT 5";
$result_message = mysqli_query($conn, $select_message);

//Review data
$select_review = "SELECT * FROM reviews ORDER BY id DESC LIMIT 5";
$result_review = mysqli_query($conn, $select_review);

//web_info
$select_web = "SELECT * FROM web_info";
$web_result = mysqli_query($conn, $select_web);
$web_show = mysqli_fetch_assoc($web_result);

//Activitys data
$select_activity = "SELECT * FROM activitys ORDER BY id DESC LIMIT 20";
$activity_result = mysqli_query($conn, $select_activity);
$activity_assoc = mysqli_fetch_assoc($activity_result);

// Notification color array
$color = ['primary', 'info', 'danger', 'success', 'warning', 'dark'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= $web_show['web_title'] ?> | ADMIN</title>
<!-- Favicon icon -->

<link rel="icon" type="image/png" sizes="16x16" href="../../php-portfolio/assets/uploads/icon/<?=$web_show['icon']?>">
<link rel="stylesheet" href="../../php-portfolio/assets/vendor/chartist/css/chartist.min.css">
<link href="../../php-portfolio/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../../php-portfolio/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="../../php-portfolio/assets/css/style.css" rel="stylesheet">
<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
rel="stylesheet">
</head>

<body>

<!--*******************
Preloader start
********************-->
<div id="preloader">
<div class="sk-three-bounce">
	<div class="sk-child sk-bounce1"></div>
	<div class="sk-child sk-bounce2"></div>
	<div class="sk-child sk-bounce3"></div>
</div>
</div>
<!--*******************
Preloader end
********************-->

<!--**********************************
Main wrapper start
***********************************-->
<div id="main-wrapper">

<!--**********************************
	Nav header start
***********************************-->
<div class="nav-header">
	<a href="../../php-portfolio/admin.php" class="brand-logo">
		<img class="logo-abbr" src="../../php-portfolio/assets/uploads/logo/<?= $web_show['image_logo'] ?>" alt="">
		<!-- <img class="brand-title" src="../../php-portfolio/assets/images/logo-text.png" alt=""> -->
		<h2 class="logo pl-2 pt-2"><b><?= $web_show['text_logo'] ?>.</b></h2>
	</a>

	<div class="nav-control">
		<div class="hamburger">
			<span class="line"></span><span class="line"></span><span class="line"></span>
		</div>
	</div>
</div>
<!--**********************************
	Nav header end
***********************************-->


<!--**********************************
	Header start
***********************************-->
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
						<?php
						if(isset($_GET['page_name'])){
							$_SESSION['page_name'] = $_GET['page_name'];
						}
						if(isset($_SESSION['page_name'])){
							echo $_SESSION['page_name'];
						}else{
							echo 'Dashboard';
						}

						?>

					
					</div>
				</div>
				<ul class="navbar-nav header-right">
					
<!------------------------------------ Message start -------------------------------------->
					<li class="nav-item dropdown notification_dropdown">
						<!-- Notification highlighter -->
						<a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
						<svg width="28x" height="28px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12L12 14M12 14L14 12M12 14V8M21 20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20Z" stroke="#0B2A97" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
							<!-- Alert status -->
							<?php foreach($result_message as $message) { 
								if($message['status'] == 0){
							?>
								<div class="pulse-css"></div>
							<?php break; } } ?>
						</a>
						<div class="dropdown-menu rounded dropdown-menu-right">
							<div id="DZ_W_TimeLine11Home" class="widget-timeline dz-scroll style-1 p-3 height370 ps ps--active-y">
								<ul class="timeline">
									<!-- Time before -->
									<?php 
									$i = 0;
									foreach($result_message as $message) {
										$i ++;
										?>
	
										<!-- Message Data show -->
									<li class="<?= ($message['status'] == 0 ? 'bg-light':'') ?>">
										<div class="timeline-badge <?= $color[$i]?>"></div>
										<a class="timeline-panel text-muted" href="../../php-portfolio/messages/view.php?id=<?= $message['id'] ?>">
											<strong class="text-primary"><?= $message['name'] ?></strong>
											<p class="mb-0"><?= $message['message'] ?>.</p>
											<span><?=time_before($message['datetime'])?></span>
										</a>
									</li>
									
									<?php } ?>
									
								</ul>
							</div>
							<a class="all-notification" href="../../php-portfolio/messages/see_messages.php">See all messages <i
									class="ti-arrow-right"></i></a>
						</div>
					</li>

<!------------------------------------- Review Start -------------------------------------->

					<li class="nav-item dropdown notification_dropdown">
						<!-- Notification highlighter -->
						<a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
						<svg fill="#0B2A97" height="28px" width="28px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 390 390" xml:space="preserve" stroke="#0091ff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M158.32,199.035c0.582,1.85,1.298,3.745,2.136,5.625c1.706,4.46,4.168,9.086,7.13,13.367 c1.246,1.813,2.887,3.999,4.831,6.165c-1.766,1.255-3.032,2.743-3.6,4.472l-23.582,7.146c-11.41,3.277-19.677,38.19-23.731,59.703 c21.487,13.069,46.639,20.579,73.376,20.579c0.005,0,0.007,0,0.012,0c3.137-0.002,6.316-0.108,9.45-0.313 c23.124-1.525,45.05-8.532,64.322-20.283c-4.041-21.863-12.391-56.377-23.9-59.685l-23.582-7.146 c-0.567-1.729-1.834-3.217-3.598-4.472c1.942-2.166,3.584-4.35,4.83-6.164c2.961-4.283,5.424-8.908,7.131-13.37 c0.837-1.878,1.553-3.767,2.136-5.62c2.294-1.925,3.646-4.793,3.646-7.81v-7.383c0-2.12-0.668-4.193-1.894-5.912v-10.397 c0-18.237-14.836-33.075-33.073-33.075h-10.72c-18.236,0-33.073,14.838-33.073,33.075v10.398c-1.226,1.718-1.894,3.793-1.894,5.911 v7.383C154.673,194.24,156.025,197.112,158.32,199.035z M188.654,254.377c-0.089,0.865-0.701,1.595-1.541,1.825 c-0.189,0.057-0.378,0.082-0.569,0.082c-0.654,0-1.285-0.309-1.692-0.851l-5.955-7.895c-0.277-0.371-0.427-0.818-0.427-1.279 l0.008-12.668c0.001-0.747,0.388-1.434,1.024-1.819c0.638-0.379,1.429-0.405,2.086-0.055c1.732,0.92,3.462,1.531,5.145,1.829 c1.012,0.178,1.749,1.059,1.749,2.088v5.283c0.301,0.119,0.575,0.312,0.799,0.555c0.403,0.443,0.597,1.04,0.535,1.639 L188.654,254.377z M211.521,246.26c0,0.461-0.149,0.908-0.425,1.279l-5.949,7.895c-0.408,0.538-1.039,0.839-1.692,0.839 c-0.191,0-0.38-0.02-0.569-0.076c-0.839-0.232-1.451-0.954-1.54-1.819l-1.162-11.266c-0.062-0.599,0.133-1.195,0.536-1.639 c0.224-0.243,0.497-0.436,0.797-0.555v-5.283c0-1.029,0.739-1.91,1.751-2.088c1.681-0.298,3.412-0.909,5.143-1.827 c0.657-0.352,1.448-0.325,2.086,0.054c0.638,0.385,1.025,1.072,1.025,1.818V246.26z M166.005,186.405 c0-1.174,0.947-2.122,2.118-2.122h0.866v-3.779c0-0.804,0.455-1.538,1.173-1.897c2.92-1.456,8.712-3.898,14.709-3.898 c4.783,0,8.75,1.585,11.789,4.73c3.79,3.915,8.153,5.899,12.974,5.899c2.729,0,5.552-0.643,8.387-1.916 c0.656-0.292,1.415-0.234,2.019,0.155c0.283,0.178,0.514,0.429,0.678,0.706h1.158c1.169,0,2.118,0.948,2.118,2.122v3.488 c0,0.718-0.364,1.386-0.963,1.778l-2.059,1.333l-0.113,0.879c-0.67,5.065-3.514,11.635-7.607,17.564 c-5.186,7.521-10.042,10.885-12.558,10.885h-11.392c-2.515,0-7.373-3.363-12.557-10.885c-4.095-5.93-6.938-12.497-7.607-17.563 l-0.114-0.881l-2.059-1.333c-0.599-0.393-0.962-1.061-0.962-1.778V186.405z"></path> <path d="M103.908,103.902c-18.237,0-33.073,14.839-33.073,33.075v10.398c-1.227,1.718-1.894,3.794-1.894,5.911v7.383 c0,3.012,1.352,5.883,3.648,7.807c0.581,1.854,1.298,3.745,2.136,5.629c1.707,4.46,4.169,9.081,7.13,13.367 c1.246,1.809,2.888,3.999,4.832,6.161c-1.767,1.256-3.032,2.747-3.6,4.473l-23.582,7.148c-0.924,0.267-1.828,0.749-2.712,1.409 c7.951,33.694,27.903,62.671,54.937,82.326h2.396c0.954-4.747,2.08-9.922,3.371-15.169c9.1-36.958,18.31-44.104,25.332-46.148 l17.453-5.289c-3.14-4.615-5.785-9.608-7.669-14.477c-0.622-1.412-1.189-2.836-1.696-4.26c-0.325-0.363-0.626-0.744-0.921-1.132 l-14.544-4.409c-0.567-1.726-1.833-3.217-3.598-4.473c1.942-2.162,3.584-4.349,4.83-6.16c2.961-4.288,5.424-8.908,7.131-13.37 c0.837-1.882,1.553-3.768,2.136-5.624c2.294-1.922,3.646-4.794,3.646-7.809v-7.383c0-2.119-0.667-4.193-1.894-5.912v-10.398 c0-18.236-14.836-33.075-33.071-33.075H103.908z M102.922,223.819c-0.089,0.867-0.701,1.594-1.541,1.824 c-0.189,0.057-0.378,0.082-0.57,0.082c-0.653,0-1.283-0.309-1.691-0.847l-5.955-7.898c-0.277-0.368-0.427-0.818-0.427-1.28 l0.008-12.667c0.001-0.745,0.388-1.432,1.024-1.816c0.638-0.38,1.429-0.408,2.086-0.059c1.732,0.919,3.463,1.531,5.145,1.83 c1.012,0.181,1.75,1.058,1.75,2.088v5.286c0.301,0.119,0.575,0.31,0.799,0.55c0.402,0.445,0.597,1.044,0.535,1.639L102.922,223.819 z M125.789,215.7c0,0.462-0.15,0.912-0.426,1.28l-5.949,7.898c-0.407,0.534-1.039,0.839-1.692,0.839 c-0.191,0-0.38-0.023-0.57-0.076c-0.838-0.233-1.451-0.955-1.539-1.822l-1.163-11.268c-0.061-0.595,0.133-1.193,0.536-1.639 c0.224-0.24,0.497-0.431,0.797-0.55v-5.286c0-1.03,0.739-1.907,1.75-2.088c1.682-0.299,3.413-0.911,5.144-1.828 c0.656-0.351,1.448-0.322,2.086,0.058c0.638,0.384,1.026,1.071,1.026,1.815V215.7z M132.29,152.863 c0.655-0.293,1.415-0.233,2.019,0.154c0.283,0.182,0.514,0.429,0.678,0.709h1.158c1.169,0,2.118,0.949,2.118,2.12v3.487 c0,0.722-0.363,1.387-0.963,1.781l-2.059,1.334l-0.113,0.878c-0.67,5.065-3.513,11.631-7.607,17.563 c-5.185,7.521-10.042,10.887-12.557,10.887h-11.392c-2.515,0-7.372-3.365-12.555-10.887c-4.095-5.932-6.938-12.495-7.608-17.56 l-0.114-0.881l-2.058-1.334c-0.599-0.395-0.963-1.06-0.963-1.781v-3.487c0-1.171,0.947-2.12,2.119-2.12h0.865v-3.782 c0-0.804,0.455-1.538,1.173-1.895c2.92-1.458,8.712-3.901,14.709-3.901c4.783,0,8.751,1.588,11.789,4.731 c3.79,3.914,8.154,5.898,12.975,5.898C126.632,154.779,129.455,154.136,132.29,152.863z"></path> <path d="M247.175,227.672c7.061,2.057,16.311,9.136,25.366,45.488c1.344,5.395,2.524,10.802,3.522,15.829h2.352 c8.44-6.162,16.264-13.307,23.326-21.366c15.57-17.77,26.254-38.63,31.508-60.95c-0.896-0.662-1.813-1.149-2.752-1.419 l-23.582-7.148c-0.567-1.726-1.833-3.217-3.599-4.473c1.942-2.162,3.584-4.349,4.83-6.16c2.961-4.288,5.423-8.908,7.131-13.37 c0.837-1.882,1.552-3.768,2.136-5.624c2.294-1.922,3.646-4.794,3.646-7.809v-7.383c0-2.119-0.667-4.193-1.894-5.912v-10.398 c0-18.236-14.836-33.075-33.072-33.075h-10.721c-18.235,0-33.072,14.839-33.072,33.075v10.398 c-1.227,1.718-1.894,3.794-1.894,5.911v7.383c0,3.012,1.352,5.883,3.647,7.807c0.582,1.854,1.298,3.745,2.136,5.629 c1.705,4.46,4.168,9.081,7.13,13.367c1.246,1.809,2.888,3.999,4.831,6.161c-1.767,1.256-3.032,2.747-3.6,4.473l-14.541,4.409 c-0.295,0.388-0.597,0.769-0.924,1.136c-0.506,1.421-1.072,2.843-1.695,4.256c-1.881,4.861-4.525,9.851-7.669,14.477 L247.175,227.672z M274.387,223.819c-0.088,0.867-0.701,1.594-1.54,1.824c-0.189,0.057-0.378,0.082-0.57,0.082 c-0.654,0-1.284-0.309-1.692-0.847l-5.956-7.898c-0.277-0.368-0.427-0.818-0.427-1.28l0.008-12.667 c0.001-0.745,0.388-1.432,1.025-1.816c0.638-0.38,1.429-0.408,2.085-0.059c1.732,0.919,3.463,1.531,5.146,1.83 c1.011,0.181,1.75,1.058,1.75,2.088v5.286c0.301,0.119,0.575,0.31,0.798,0.55c0.403,0.445,0.598,1.044,0.535,1.639L274.387,223.819 z M297.253,215.7c0,0.462-0.149,0.912-0.425,1.28l-5.948,7.898c-0.409,0.534-1.04,0.839-1.692,0.839 c-0.191,0-0.38-0.023-0.569-0.076c-0.839-0.233-1.451-0.955-1.54-1.822l-1.162-11.268c-0.061-0.595,0.133-1.193,0.536-1.639 c0.224-0.24,0.496-0.431,0.797-0.55v-5.286c0-1.03,0.739-1.907,1.75-2.088c1.681-0.299,3.412-0.911,5.143-1.828 c0.657-0.351,1.448-0.322,2.086,0.058c0.638,0.384,1.025,1.071,1.025,1.815V215.7z M254.873,163.33l-0.114-0.881l-2.059-1.334 c-0.6-0.395-0.963-1.06-0.963-1.781v-3.487c0-1.171,0.948-2.12,2.118-2.12h0.866v-3.782c0-0.804,0.455-1.538,1.173-1.895 c2.921-1.458,8.713-3.901,14.71-3.901c4.784,0,8.751,1.588,11.79,4.731c3.79,3.914,8.153,5.898,12.974,5.898 c2.729,0,5.553-0.643,8.388-1.915c0.655-0.293,1.415-0.233,2.019,0.154c0.283,0.182,0.514,0.429,0.678,0.709h1.157 c1.17,0,2.119,0.949,2.119,2.12v3.487c0,0.722-0.364,1.387-0.963,1.781l-2.059,1.334l-0.113,0.878 c-0.67,5.065-3.514,11.631-7.608,17.563c-5.184,7.521-10.041,10.887-12.556,10.887h-11.392c-2.515,0-7.372-3.365-12.557-10.887 C258.385,174.958,255.543,168.395,254.873,163.33z"></path> <path d="M389.567,169.479c-1.772-26.869-8.872-52.546-21.102-76.313c-9.272-18.021-21.194-34.353-35.49-48.635l4.973-7.583 c2.494-3.805,2.77-8.651,0.723-12.713c-2.047-4.063-6.106-6.726-10.648-6.982l-54.865-3.118c-4.544-0.254-8.875,1.925-11.37,5.729 c-2.495,3.803-2.771,8.648-0.723,12.712l24.727,49.077c2.048,4.062,6.106,6.725,10.647,6.983c4.54,0.26,8.876-1.926,11.371-5.73 l2.491-3.798c23.011,25.618,36.799,58.273,39.089,93.021c5.615,85.132-59.077,158.962-144.21,164.574 c-85.132,5.616-158.96-59.076-164.576-144.208c-3.81-57.767,24.583-112.358,74.1-142.477c9.483-5.771,12.504-18.178,6.737-27.66 c-3.914-6.435-11.017-10.125-18.536-9.628c-3.254,0.213-6.323,1.186-9.127,2.89C31.397,53.564-4.372,122.353,0.429,195.143 c3.427,51.974,26.889,99.5,66.061,133.825c39.172,34.324,89.368,51.341,141.339,47.913c51.971-3.428,99.497-26.89,133.823-66.061 C375.978,271.648,392.995,221.451,389.567,169.479z"></path> </g> </g></svg>
							<!-- Alert status -->
							<?php foreach($result_review as $review) { 
								if($review['status'] == 0){
							?>
								<div class="pulse-css"></div>
							<?php break; } } ?>
						</a>
						<div class="dropdown-menu rounded dropdown-menu-right">
							<div id="DZ_W_TimeLine11Home" class="widget-timeline dz-scroll style-1 p-3 height370 ps ps--active-y">
								<ul class="timeline">
									<!-- Time before -->
									<?php 
									$i = 0;
									foreach($result_review as $review) {
										$i ++;										
										?>
	
										<!--Review Data show -->
									<li class="<?= ($review['status'] == 0 ? 'bg-light':'') ?>">
										<div class="timeline-badge <?= $color[$i]?>"></div>
										<a class="timeline-panel text-muted" href="../../php-portfolio/reviews/view.php?id=<?= $review['id'] ?>">
											<strong class="text-primary"><?= $review['name'] ?></strong>
											<p class="mb-0"><?= $review['review'] ?>.</p>
											<span><?= time_before($review['datetime']) ?></span>
										</a>
									</li>
									
									<?php } ?>
									
								</ul>
							</div>
						</div>
					</li>



					
					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
							<img src="../assets/uploads/<?= ($after_assoc['image'] != null ? 'profile/'.$after_assoc['image']:'profile.jpg') ?>" width="20" alt="" />
							<div class="header-info">
								<span class="text-black"><strong><?= $after_assoc['name'] ?></strong></span>
								<p class="fs-12 mb-0"><?= ($after_assoc['role'] == 0 ? 'Admin':'Modarator') ?></p>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="../../php-portfolio/profile/profile.php?page_name=Dashboard>Profile" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
									width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
									stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								<span class="ml-2">Profile </span>
							</a>
							<a href="../../php-portfolio/messages/see_messages.php" class="dropdown-item ai-icon">
								<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success"
									width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
									stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path
										d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
									</path>
									<polyline points="22,6 12,13 2,6"></polyline>
								</svg>
								<span class="ml-2">Inbox </span>
							</a>
							<a href="../../php-portfolio/authentication/logout.php" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
									width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
									stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
									<polyline points="16 17 21 12 16 7"></polyline>
									<line x1="21" y1="12" x2="9" y2="12"></line>
								</svg>
								<span class="ml-2">Logout </span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!--**********************************
	Header end ti-comment-alt
***********************************-->

<!--**********************************
	Sidebar start
***********************************-->
<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-networking"></i>
					<span class="nav-text">Dashboard</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="../../php-portfolio/admin/admin.php?page_name=Dashboard>Admin">Admin</a></li>
					<li <?= ($after_assoc['role'] == 0 ? '':'hidden') ?>><a href="../../php-portfolio/authentication/register.php?page_name=Dashboard>Register Admin">Register Admin</a></li>
					<li><a href="../../php-portfolio/profile/profile.php?page_name=Dashboard>Profile">Profile</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-television"></i>
					<span class="nav-text">Skills</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="../../php-portfolio/skills/skills.php?page_name=Skills>Add Skills">Add skills</a></li>
					<li><a href="../../php-portfolio/skills/see_skills.php?page_name=Skills>See Skills">See skills</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-controls-3"></i>
					<span class="nav-text">Services</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="../../php-portfolio/services/services.php?page_name=Service>Add service">Add Service</a></li>
					<li><a href="../../php-portfolio/services/see_services.php?page_name=Service>See service">See Services</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-controls-3"></i>
					<span class="nav-text">Reviews
						<small class="text-danger">
							<?php foreach($result_review as $check){
								if($check['status'] == 0){
									echo 'New!';
									break;
								}
							} ?>
						</small>
					</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="../../php-portfolio/reviews/see_reviews.php?page_name=Reviews>See reviews">See Reviews</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-controls-3"></i>
					<span class="nav-text">Messages
						<small class="text-danger">
							<?php foreach($result_message as $check){
								if($check['status'] == 0){
									echo 'New!';
									break;
								}
							} ?>
						</small>
					</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="../../php-portfolio/messages/see_messages.php?page_name=Messages>See messages">See Messages</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-controls-3"></i>
					<span class="nav-text">Portfolio</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="../../php-portfolio/portfolios/portfolios.php?page_name=Portfolio/Add Portfolio">Add Portfolio</a></li>
					<li><a href="../../php-portfolio/portfolios/see_portfolios.php?page_name=Portfolio>See Portfolios">See Portfolios</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-controls-3"></i>
					<span class="nav-text">Web Info
						<small class="text-danger">
							<?php foreach($activity_result as $check){
								if($check['status'] == 0){
									echo 'New!';
									break;
								}
							} ?>
						</small>
					</span>
				</a>
				<ul aria-expanded="true">
					<li <?= ($after_assoc['role'] == 0 ? '':'hidden') ?>>>
						<a href="../../php-portfolio/web_info/activitys.php?page_name=Web Info>Activitys">Activitys 
							<small class="text-danger">
								<?php foreach($activity_result as $check){
									if($check['status'] == 0){
										echo 'New!';
										break;
									}
								} ?>
							</small>
						</a>
					</li>
					<li><a href="../../php-portfolio/web_info/update_info.php?page_name=Web Info>Change Info">Change Info</a></li>
					<li><a href="../../php-portfolio/web_info/update_icon.php?page_name=Web Info>Change Icon">Change Icon</a></li>
					<li><a href="../../php-portfolio/web_info/update_logo_image.php?page_name=Web Info>Change Logo">Change Logo</a></li>
					<li><a href="../../php-portfolio/web_info/update_landing_image.php?page_name=Web Info>Change Image">Change Image</a></li>
					<li><a href="../../php-portfolio/web_info/settings.php?page_name=Web Info>Settings">Settings</a></li>
				</ul>
			</li>
		</ul>
		<div class="add-menu-sidebar">
			<img src="images/calendar.png" alt="" class="mr-3">
			<p class="	font-w500 mb-0">Create New Plan Now</p>
		</div>
		<div class="copyright">
			<p><strong>SAMIUL. Admin Dashboard</strong> © 2020 All Rights Reserved</p>
			<p>Made with <span class="heart"></span> by Samiul</p>
		</div>
	</div>
</div>
<!--**********************************
	Sidebar end
***********************************-->

<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">