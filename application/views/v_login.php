<!DOCTYPE html>
<html>

<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

	<style>
		.login-container {
			margin-top: 5%;
			margin-bottom: 5%;
		}

		.login-form-1 {
			padding: 5%;
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
		}

		.login-form-1 h3 {
			text-align: center;
			color: #333;
		}

		.login-form-2 {
			padding: 5%;
			background: #0062cc;
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
		}

		.login-form-2 h3 {
			text-align: center;
			color: #fff;
		}

		.login-container form {
			padding: 10%;
		}

		.btnSubmit {
			width: 50%;
			border-radius: 1rem;
			padding: 1.5%;
			border: none;
			cursor: pointer;
		}

		.login-form-1 .btnSubmit {
			font-weight: 600;
			color: #fff;
			background-color: #0062cc;
		}

		.login-form-2 .btnSubmit {
			font-weight: 600;
			color: #0062cc;
			background-color: #fff;
		}

		.login-form-2 .ForgetPwd {
			color: #fff;
			font-weight: 600;
			text-decoration: none;
		}

		.login-form-1 .ForgetPwd {
			color: #0062cc;
			font-weight: 600;
			text-decoration: none;
		}
	</style>
</head>

<body>
	<div class="container">
		<h2>Sistem Peminjaman Buku di Perpustakaan dengan QR Code</h2>
		<br>

		<h4 align="center" style="color: red;">
			<?php
			$info = $this->session->flashdata('info');
			if (!empty($info)) {
				echo $info;
			}
			?>

			<?php
			$info2 = $this->session->flashdata('info_login');
			if (!empty($info2)) {
				echo $info2;
			}
			?>

<?php
			$info3 = $this->session->flashdata('info_login_2');
			if (!empty($info3)) {
				echo $info3;
			}
			?>

<?php
			$info4 = $this->session->flashdata('info_salah');
			if (!empty($info4)) {
				echo $info4;
			}
			?>
		</h4>

		<!-- Nav pills -->
		<ul class="nav nav-pills row h-100 justify-content-center align-items-center" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="pill" href="#loginanggota">Login Anggota</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="pill" href="#loginpustakawan">Login Pustakawan</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div id="loginanggota" class="container tab-pane"><br>
				<div class="col-md-6 .offset-md-3 login-form-1">
					<h3>Login untuk Anggota</h3>
					<form action="<?= site_url('Login/attempt_anggota_login') ?>" method="post">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Masukkan email anggota anda" name="email_anggota" value="<?php echo set_value('email_anggota'); ?>" required />
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Masukkan password anggota anda" name="password_anggota" value="<?php echo set_value('email_anggota'); ?>" required />
						</div>
						<div class="form-group">
							<input type="submit" class="btnSubmitAnggota" value="Login" />
						</div>
						<div class="form-group">
							<a href="#" class="ForgetPwd">Lupa password?</a>
						</div>
						<span class="text-danger"><?php echo form_error('email'); ?></span>
					</form>
				</div>
			</div>
			<div id="loginpustakawan" class="container tab-pane fade"><br>
				<div class="col-md-6 login-form-2">
					<h3>Login untuk Pustakawan</h3>
					<form action="<?= site_url('Login/attempt_pustakawan_login') ?>" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="email_pustakawan" placeholder="Masukkan email pustakawan anda" value="<?php echo set_value('email_pustakawan'); ?>" required />
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password_pustakawan" placeholder="Masukkan password pustakawan anda" value="<?php echo set_value('email_pustakawan'); ?>" required />
						</div>
						<div class="form-group">
							<input type="submit" class="btnSubmitPustakawan" value="Login" />
						</div>
						<div class="form-group">
							<a href="#" class="ForgetPwd" value="Login">Lupa password?</a>
						</div>
						<span class="text-danger"><?php echo form_error('email'); ?></span>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>