<!DOCTYPE html>
<html>
<title>Home Pustakawan</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<head>
    <?php include "templates/header.php"; ?>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        /* card */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #3D68A3;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
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

        h1 {
            margin-top: 5%;
            margin-bottom: 2%;
        }
    </style>
</head>

<body>
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/'); ?>img/la.jpg" alt="Los Angeles">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/'); ?>img/chicago.jpg" alt="Chicago">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/'); ?>img/ny.jpg" alt="New York">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <br> 
    <h1 class="display-5 text-center">Selamat datang, Lionov!</h1>
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-8 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Edit Anggota</h4>
                </div>
                <div class="card-body">
                    <br>
                    <img src="<?= base_url('assets/'); ?>/img/personal.png" alt="logo" class="img-fluid" width="20%" height="20%">
                    <br>
                    <br>
                    <br>
                    <h2>Atur anggota disini</h2>
                    <h7>Anda bisa tambah, hapus dan edit anggota di halaman ini</h7>
                    <br>
                    <br>
                    <button type="button" class="btn btn-lg btn-block btn-primary" name="btn_jadwal_pribadi" onclick="location.href='<?php echo base_url(); ?>pustakawan/AturAnggota_Pustakawan'">Atur anggota</button>
                </div>
            </div>
            <div class="card mb-8 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Edit Buku</h4>
                </div>
                <div class="card-body">
                    <br>
                    <img src="<?= base_url('assets/'); ?>/img/books.png" alt="logo" class="img-fluid" width="20%" height="20%">
                    <br>
                    <br>
                    <br>
                    <h2>Atur buku disini</h2>
                    <h7>Anda bisa tambah, hapus dan edit buku di halaman ini</h7>
                    <br>
                    <br>
                    <button type="button" class="btn btn-lg btn-block btn-primary" name="btn_jadwal_umum" onclick="location.href='<?php echo base_url(); ?>pustakawan/AturBuku_Pustakawan'">Atur buku</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "templates/footer.php"; ?>
</body>

</html>