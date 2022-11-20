<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        #judul {
            font-family: 'Poppins', sans-serif;
            color: white;
        }


        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .list-down-btn {
            float: right;
            color: black;
            margin-top: 2px;
        }

        .list-group-collapse {
            overflow: hidden;
        }

        .list-group-collapse li ul {
            margin-left: -15px;
            margin-right: -15px;
            margin-bottom: -11px;
            border-radius: 0px;
        }

        .list-group-collapse li ul {
            border-radius: 0px !important;
            margin-top: 8px;
        }

        .list-group-collapse li ul li {
            border-radius: 0px !important;
            border-left: none;
            border-right: none;
            padding-left: 32px;
        }

        #filterList {
            display: none;
        }

        #subgroup {
            display: none;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- side nav -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="<?= site_url('pustakawan/AturAnggota_Pustakawan') ?>">Tambah, hapus, edit anggota</a>
            <a href="<?= site_url('pustakawan/AturBuku_Pustakawan') ?>">Tambah, hapus, edit buku</a>
        </div>
        <span style="font-size:30px;cursor:pointer; margin-right: 1%; color: white;" onclick="openNav()">&#9776;</span>

        <!-- Links -->
        <a id="judul">Sistem Peminjaman Buku di Perpustakaan dengan QR Code</a>
    

        <!-- Logout -->
        <a id="logout" style="margin-left: 60%" href="<?= site_url('Login/logout') ?>">Logout</a>
    </nav>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        $(document).ready(function() {
            $(document).on('click', '.list-down-btn', function(event) {
                event.preventDefault();
                var target = $(this).attr('data-toggle');
                $(target).slideToggle();
                var clicked = event.target;
                $(clicked).toggleClass("glyphicon-chevron-down  glyphicon-chevron-up");
            });
        });
    </script>
</body>

</html>