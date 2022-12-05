<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <?php include 'templates/header_anggota.php'; ?>

  <style>
    .main {
      width: 50%;
      margin: 50px auto;
    }

    /* Bootstrap 4 text input with search icon */

    .has-search .form-control {
      padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
      position: absolute;
      z-index: 2;
      display: block;
      width: 2.375rem;
      height: 2.375rem;
      line-height: 2.375rem;
      text-align: center;
      pointer-events: none;
      color: #aaa;
    }

    h1.logo {
      font-size: 80px;
      font-family: 'Poppins', sans-serif;
      text-align: center;
      color: #666;
      text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* Set a style for all buttons */
    button {
      background-color: #3D68A3;
      color: white;


      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }

    img.avatar {
      width: 40%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
      padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto;
      /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 20%;
      /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes animatezoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }


    body {
      background-image: #a9d6e5;
    }


    html * {
      font-family: 'Poppins', sans-serif;
    }


    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
    }

    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 80%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <!-- search box -->
  <div class="main">
    <h1 class="text-center">Sistem Peminjaman Buku di Perpustakaan dengan QR Code</h1>

    <br>
    <br>
    <div class="container">
      <div class="row" style="margin-top: 50px">
        <div class="col-xs-4 col-xs-offset-4">
          <form action="<?= base_url('index.php/anggota/Home_Anggota/index/') ?>" method="get">
            <div class="input-group">
              <input type="text" class="form-control" name="keyword" placeholder="Masukan Kata Kunci...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Cari</button>
              </span>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4 text-center">
          <h3>Data Buku</h3>
          <h5>*anda hanya bisa melakukan pencarian dengan judul buku</h5>
          <?php if (!empty($keyword)) { ?>
            <p style="color:orange"><b>Menampilkan data buku dengan kata kunci: "<?= $keyword; ?>"</b></p>
          <?php } ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ISBN Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Bahasa</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row) { ?>
                <tr>
                  <th scope="row"><?= $row['ISBN_buku'] ?></th>
                  <td><?= $row['judul_buku'] ?></td>
                  <td><?= $row['bahasa'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <!-- card pinjam dan pengembalian buku -->
  <div class="container">
    <div class="card-deck mb-3 text-center">
      <div class="card mb-8 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Peminjaman Buku</h4>
        </div>
        <div class="card-body">
          <br>
          <img src="<?= base_url('assets/'); ?>/img/borrow.png" alt="logo" class="img-fluid" width="20%" height="20%">
          <br>
          <br>
          <br>
          <h5>Scan QR untuk peminjaman buku disini</h5>
          <br>
          <br>
          <button type="button" class="btn btn-lg btn-block btn-primary" name="btn_jadwal_pribadi" onclick="location.href='<?php echo base_url(); ?>index.php/anggota/ScanPinjam_Anggota'">Pinjam Buku</button>
        </div>
      </div>
      <div class="card mb-8 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Pengembalian Buku</h4>
        </div>
        <div class="card-body">
          <br>
          <img src="<?= base_url('assets/'); ?>/img/return.png" alt="logo" class="img-fluid" width="20%" height="20%">
          <br>
          <br>
          <br>
          <h5>Scan QR untuk pengembalian buku disini</h5>
          <br>
          <br>
          <button type="button" class="btn btn-lg btn-block btn-primary" name="btn_jadwal_umum" onclick="location.href='<?php echo base_url(); ?>index.php/anggota/ScanKembalikan_Anggota'">Pengembalian buku</button>
        </div>
      </div>

    </div>


  </div>

</body>
<?php include 'templates/footer_anggota.php'; ?>

</html>