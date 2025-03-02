<?php 
$session = session();
$loggedInData = $session->get('loggedIn_data');
$this->uri = service('uri');
$current_url = $this->uri->getSegment(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="<?= base_url('public/admin/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?= base_url('public/admin/css/ready.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/admin/css/demo.css') ?>">
	<script src="<?= base_url('public/admin/js/core/jquery.3.2.1.min.js') ?>"></script>
</head>
<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
				<a href="<?= base_url('admin/dashboard') ?>" class="logo">Ready Dashboard</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
            <nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="<?= base_url('public/admin/img/profile2.jpg') ?>" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="<?= base_url('public/admin/img/profile.jpg') ?>" alt="user-img" width="36" class="img-circle"><span ><?= $loggedInData['first_name'] ?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="<?= base_url('public/admin/img/profile.jpg') ?>" alt="user"></div>
										<div class="u-text">
											<h4><?= $loggedInData['first_name'] ?></h4>
											<p class="text-muted"><?= $loggedInData['email'] ?></p><a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= base_url('admin/logout') ?>"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
                <div class="sidebar">
                    <div class="scrollbar-inner sidebar-wrapper">
                        <div class="user">
                            <div class="photo">
                                <img src="<?= base_url('public/admin/img/profile.jpg') ?>">
                            </div>
                            <div class="info">
                                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        <?= $loggedInData['first_name'] ?>
                                        <span class="user-level"><?= $loggedInData['role'] ?></span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <ul class="nav">
                            <li class="nav-item <?= ($current_url === 'dashboard') ? 'active' : '' ?>">
                                <a href="<?= base_url('user/dashboard') ?>">
                                    <i class="la la-dashboard"></i>
                                    <p>Dashboard</p>
                                    <span class="badge badge-count">5</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="main-panel">
                    <?= $this->renderSection('content') ?>
                </div>
			</div>
        </div>
    </div>
    <script src="<?= base_url('public/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/chartist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/jquery-mapael/jquery.mapael.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/jquery-mapael/maps/world_countries.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/chart-circle/circles.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/ready.min.js') ?>"></script>
    <script src="<?= base_url('public/admin/js/demo.js') ?>"></script>
</body>
</html>