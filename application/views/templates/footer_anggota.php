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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>


<style>
    a {
        color: white;
    }

    .shfooter .collapse {
        display: inherit;
    }

    @media (max-width: 767px) {
        .shfooter ul {
            margin-bottom: 0;
        }

        .shfooter .collapse {
            display: none;
        }

        .shfooter .collapse.show {
            display: block;
        }

        .shfooter .title .fa-angle-up,
        .shfooter .title[aria-expanded="true"] .fa-angle-down {
            display: none;
        }

        .shfooter .title[aria-expanded="true"] .fa-angle-up {
            display: block;
        }

        .shfooter .navbar-toggler {
            display: inline-block;
            padding: 0;
        }
    }

    .resize {
        text-align: center;
    }

    .resize {
        margin-top: 3rem;
        font-size: 1.25rem;
    }

    /*RESIZESCREEN ANIMATION*/
    .fa-angle-double-right {
        animation: rightanime 1s linear infinite;
    }

    .fa-angle-double-left {
        animation: leftanime 1s linear infinite;
    }

    @keyframes rightanime {
        50% {
            transform: translateX(10px);
            opacity: 0.5;
        }

        100% {
            transform: translateX(10px);
            opacity: 0;
        }
    }

    @keyframes leftanime {
        50% {
            transform: translateX(-10px);
            opacity: 0.5;
        }

        100% {
            transform: translateX(-10px);
            opacity: 0;
        }
    }
</style>

</head>

<body>
    <footer id="footer" class="bg-primary text-white d-flex-column text-center">
        <hr class="mt-0">
        <!--Social buttons-->
        <div class="text-center">
            <h4>You can find us at</h4>
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Facebook">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Linkedin">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Twitter">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="sbtn btn-large mx-1" title="Youtube">
                        <i class="fab fa-youtube-square fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!--/.Social buttons-->
        <hr class="mb-0">
        <!--Footer Links-->
        <div class="container text-left text-md-center">
            <div class="row">
                <!--First column-->
                <div class="col-md-3 mx-auto shfooter">
                    <h5 class="my-2 font-weight-bold d-none d-md-block">Product</h5>
                    <div class="d-md-none title" data-target="#Product" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold">Product
                            <div class="float-right navbar-toggler">
                                <i class="fas fa-angle-down"></i>
                                <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled collapse" id="Product">
                        <li><a href="#">Create Websites</a></li>
                        <li><a href="#">Secure Cloud Hosting</a></li>
                        <li><a href="#">Engage Your Audience</a></li>
                        <li><a href="#">Website Support</a></li>
                    </ul>
                </div>
                <!--/.First column-->
                <hr class="clearfix w-100 d-md-none mb-0">
                <!--Second column-->
                <div class="col-md-3 mx-auto shfooter">
                    <h5 class="my-2 font-weight-bold d-none d-md-block">Company</h5>
                    <div class="d-md-none title" data-target="#Company" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold">Company
                            <div class="float-right navbar-toggler">
                                <i class="fas fa-angle-down"></i>
                                <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled collapse" id="Company">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <!--/.Second column-->
                <hr class="clearfix w-100 d-md-none mb-0">
                <!--Third column-->
                <div class="col-md-3 mx-auto shfooter">
                    <h5 class="my-2 font-weight-bold d-none d-md-block">Resources</h5>
                    <div class="d-md-none title" data-target="#Resources" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold">Resources
                            <div class="float-right navbar-toggler">
                                <i class="fas fa-angle-down"></i>
                                <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled collapse" id="Resources">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">eBooks</a></li>
                        <li><a href="#">Whitepapers</a></li>
                        <li><a href="#">Comparison Guide</a></li>
                        <li><a href="#">Website Grader</a></li>
                    </ul>
                </div>
                <!--/.Third column-->
                <hr class="clearfix w-100 d-md-none mb-0">
                <!--Fourth column-->
                <div class="col-md-3 mx-auto shfooter">
                    <h5 class="my-2 font-weight-bold d-none d-md-block">Get Help</h5>
                    <div class="d-md-none title" data-target="#Get-Help" data-toggle="collapse">
                        <div class="mt-3 font-weight-bold">Get Help
                            <div class="float-right navbar-toggler">
                                <i class="fas fa-angle-down"></i>
                                <i class="fas fa-angle-up"></i>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled collapse" id="Get-Help">
                        <li><a href="#" target="_blank">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
                <!--/.Fourth column-->
            </div>
        </div>
        <!--/.Footer Links-->
        <hr class="mb-0">
        <!--Copyright-->
        <div class="py-3 text-center">
            Sistem Peminjaman Buku di Perpustakaan dengan QR Code
        </div>
    </footer>

</body>

</html>