<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DJ</title>
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/Logo-darmajaya.png">
	<link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body>

	<div id="preloader">
		<div class="loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
			</svg>
		</div>
	</div>


	<div id="main-wrapper">

		<div class="nav-header">
			<div class="brand-logo mt-2">
				<span class="d-flex justify-content-center">
					<img src="<?= base_url() ?>/assets/images/Logo-Darmajaya.png" alt="" width="60" height="60">
				</span>
				</a>
			</div>
		</div>

		<div class="header bg-primary">
			<div class="header-content clearfix">

				<div class="nav-control">
					<div class="hamburger">
						<span class="toggle-icon"><i class="icon-menu color-white"></i></span>
					</div>
				</div>
				<div class="header-left">
				</div>
				<div class="header-right">
					<ul class="clearfix">
						<li class="icons dropdown">
							<div class="user-img c-pointer position-relative" data-toggle="dropdown">
								<span class="activity active"></span>
								<img src="<?= base_url() ?>/assets/images/user/1.png" height="40" width="40" alt="">
							</div>
							<div class="drop-down dropdown-profile   dropdown-menu">
								<div class="dropdown-content-body">
									<ul>
										<li>
											<a href=""><i class="icon-user"></i> <span>Profile</span></a>
										</li>
										<hr class="my-2">
										<li><a href="<?= base_url('auth/logout') ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="nk-sidebar">
			<div class="nk-nav-scroll">
				<ul class="metismenu" id="menu">
					<li class="nav-label">Menu</li>
					<?php $menu = $this->db->query('SELECT * FROM user_menu JOIN user_access_menu on user_menu.id = user_access_menu.menu_id where user_access_menu.role_id = ' . $this->session->userdata('role_id'))->result_array() ?>
					<?php foreach ($menu as $m) : ?>
						<li class="<?= $this->uri->segment(1) == $m['url'] ? 'active' : '' ?>">
							<a href="<?= base_url($m['url']) ?>" aria-expanded="false" class="<?= $this->uri->segment(1) == $m['url'] ? 'active' : '' ?>">
								<i class="<?= $m['icon'] ?> menu-icon"></i><span class="nav-text"><?= $m['title']; ?></span>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>

		<div class="content-body">
			<div class="container-fluid pt-5">
				<?php if (isset($_view) && $_view)
					$this->load->view($_view);
				?>
			</div>
		</div>


		<div class="footer">
			<div class="copyright">
				<p>Copyright &copy; 2020</p>
			</div>
		</div>
	</div>

	<script src="<?= base_url() ?>/assets/plugins/common/common.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/custom.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/settings.js"></script>
	<script src="<?= base_url() ?>/assets/js/gleek.js"></script>
	<script src="<?= base_url() ?>/assets/js/styleSwitcher.js"></script>
	<script src="<?= base_url() ?>/assets/plugins/highlightjs/highlight.pack.min.js"></script>

	<script src="<?= base_url() ?>/assets//plugins/tables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>/assets//plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>/assets//plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

	<script>
		hljs.initHighlightingOnLoad();
	</script>

	<script>
		(function($) {
			"use strict"
			new quixSettings({
				version: "light", //2 options "light" and "dark"
				layout: "vertical", //2 options, "vertical" and "horizontal"
				navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
				headerBg: "color_1", //have 10 options, "color_1" to "color_10"
				sidebarStyle: "full", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
				sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
				sidebarPosition: "fixed", //have two options, "static" and "fixed"
				headerPosition: "fixed", //have two options, "static" and "fixed"
				containerLayout: "wide", //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
				direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
			});
		})(jQuery);
	</script>

</body>

</html>