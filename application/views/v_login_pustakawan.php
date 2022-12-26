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
		body {
			background-image: url('../assets/img/perpustakaan.jpg');
		}
		

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

		h4 {
			font-size: 30px;
			color: #2596be;
			text-shadow: 1px 1px #333;
			margin-bottom: -2px;
		}
	</style>
</head>

<body>

	<br>
<!-- <h2 class = "text-center">Sistem Peminjaman Buku di Perpustakaan dengan QR Code</h2> -->

	<div class="container">

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


	<!-- login untuk anggota -->
	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
          <div class="center">
			<h4>Sistem Peminjaman Buku di Perpustakaan dengan QR Code</h4>
			<br>
            <h4 text-align="center" style="color: red;">
                  <?php
                      $info = $this->session->flashdata('info');
                      if(!empty($info)){
                                  echo $info;
                      }
                  ?>
          </h4>
          </div>
            <form action="<?= site_url('Login_Pustakawan/attempt_pustakawan_login') ?>" method="post">
              <div class="form-floating mb-3">
              <label for="floatingInput">Email Pustakawan</label>
              <input type="text" class="form-control" id="floatingInput" name="email_pustakawan" placeholder="name@example.com" value="<?php echo set_value('email'); ?>" required>
              <span class="text-danger"><?php echo form_error('email'); ?></span>
              </div>

              <div class="form-floating mb-3">
              <label for="floatingPassword">Password</label>
              <input type="password" class="form-control" id="floatingPassword" name="password_pustakawan" placeholder="Password" value="<?php echo set_value('email'); ?>" required>
              <span class="text-danger"><?php echo form_error('email'); ?></span>
              </div>

              <div class="d-grid">
              <input type="submit" name="login" class="btn btn-info" value="Login">
			  <br>
			  <br>
			  <a href="<?php echo site_url('Login') ?>">Klik disini untuk login anggota</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

















































</body>


</html>