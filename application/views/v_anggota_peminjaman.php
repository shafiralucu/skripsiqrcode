<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

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

        .screenshot-image {
            width: 150px;
            height: 90px;
            border-radius: 4px;
            border: 2px solid whitesmoke;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            position: absolute;
            bottom: 5px;
            left: 10px;
            background: white;
        }

        .display-cover {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 70%;
            margin: 5% auto;
            position: relative;
        }

        video {
            width: 100%;
            background: rgba(0, 0, 0, 0.2);
        }

        .video-options {
            position: absolute;
            left: 20px;
            top: 30px;
        }

        .controls {
            position: absolute;
            right: 20px;
            top: 20px;
            display: flex;
        }

        .controls>button {
            width: 45px;
            height: 45px;
            text-align: center;
            border-radius: 100%;
            margin: 0 6px;
            background: transparent;
        }

        .controls>button:hover svg {
            color: white !important;
        }

        @media (min-width: 300px) and (max-width: 400px) {
            .controls {
                flex-direction: column;
            }

            .controls button {
                margin: 5px 0 !important;
            }
        }

        .controls>button>svg {
            height: 20px;
            width: 18px;
            text-align: center;
            margin: 0 auto;
            padding: 0;
        }

        .controls button:nth-child(1) {
            border: 2px solid #D2002E;
        }

        .controls button:nth-child(1) svg {
            color: #D2002E;
        }

        .controls button:nth-child(2) {
            border: 2px solid #008496;
        }

        .controls button:nth-child(2) svg {
            color: #008496;
        }

        .controls button:nth-child(3) {
            border: 2px solid #00B541;
        }

        .controls button:nth-child(3) svg {
            color: #00B541;
        }

        .controls>button {
            width: 45px;
            height: 45px;
            text-align: center;
            border-radius: 100%;
            margin: 0 6px;
            background: transparent;
        }

        .controls>button:hover svg {
            color: white;
        }
    </style>
</head>

<body>
    <div class="main">
        <h1 class="text-center">Peminjaman Buku</h1>
        <h3 class="text-center">Scan QR Code pada Buku untuk melakukan peminjaman</h1>
            <video id="preview"></video>
    </div>
    </div>



</body>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        scanPeriod: 5,
        mirror: false
    });
    scanner.addListener('scan', function(content) {
        // alert('content'); 
        $.post("StatusPinjam_Anggota/scan", {
                id: content,
                nama: 'shafira',
            },
            function(data, status) {
                alert(status);
                console.log(data);
            });
            
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
            $('[name="options"]').on('change', function() {
                if ($(this).val() == 1) {
                    if (cameras[0] != "") {
                        scanner.start(cameras[0]);
                    } else {
                        alert('No Front camera found!');
                    }
                } else if ($(this).val() == 2) {
                    if (cameras[1] != "") {
                        scanner.start(cameras[1]);
                    } else {
                        alert('No Back camera found!');
                    }
                }
            });
        } else {
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
        alert(e);
    });
</script>

<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
    <label class="btn btn-primary active">
        <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
    </label>
</div>
<?php include 'templates/footer_anggota.php'; ?>

</html>