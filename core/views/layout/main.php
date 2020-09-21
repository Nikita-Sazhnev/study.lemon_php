<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/assets/img/lemon.png" type="image/png">
    <link rel="stylesheet" href="/assets/css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/calendar.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/custom_2.css" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?=$this->title;?></title>
</head>

<body>

    <div class="page">
        <div class="container">
            <?php if ($action == 'index' || $action == null): ?>
            <div class="above__header">
                <img class="logo__main" src="/assets/img/Logo copy.png" alt="logo">
            </div>
            <?php endif;?>
            <nav class="navbar navbar-expand-lg navbar-light scrolling-navbar shadow__box">
                <div class="container menu__nav">
                    <a href="/" class="navbar-brand p-0 col-6 col-md-2 ml-1 ml-lg-3 mr-0">
                        <img class="ml-md-4" src="/assets/img/Lemon Logo small.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-lable="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarContent">
                        <div class="nav__string">
                            <ul class="navbar-nav col-auto">
                                <li class="nav-item">
                                    <a href="/" class="nav-link px-lg-0 px-xl-2">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-lg-0 px-xl-2">Recipes</a>
                                    <ul class="drop__menu">
                                        <li><a href="#">Recomended</a></li>
                                        <li><a href="#">Popular</a></li>
                                        <li><a href="#">Quick & Easy</a></li>
                                        <li><a href="#">Healthy</a></li>
                                        <li><a href="#">Newest</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-lg-0 px-xl-2">Photo Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-lg-0 px-xl-2">Videos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-lg-0 px-xl-2">All Categories</a>
                                </li>
                            </ul>
                        </div>
                        <div class="form__search col-12 col-lg-2 p-0 mr-lg-5 position-relative">
                            <form action="#" name="search" class="">
                                <input class="input__search" type="text" placeholder="FIND A RECIPE">
                                <span class="search__icon"><img src="/assets/img/search-icon.png" alt=""></span>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <?php include $this->basePath . $tplName . '.php';?>
        </div>
        <footer class="mt-auto d-flex justify-content-center">
            <div class="row w-100 container p-0">
                <div class="col-3 p-0">
                    <a href="#" class="">
                        <img src="/assets/img/Logo-footer.png" alt="Logo"
                            class="footer__logo mt-0 ml-0 ml-md-3 ml-lg-5">
                    </a>
                </div>
                <div class="col-5">
                    <div class="footer-nav text-decoration-none d-flex justify-content-center flex-wrap">
                        <ul class="d-flex text-uppercase flex-wrap mt-2 ml-5 mt-sm-0 ml-sm-0 p-0">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Recipes</a></li>
                            <li><a href="#">Photo Gallery</a></li>
                            <li><a href="#">Videos</a></li>
                            <li><a href="#">All Categories</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer__social col-4">
                    <div class="social__inner pl-0 pr-lg-5">
                        <p class="ml-0 ml-lg-5 mr-auto mr-lg-0 mb-0 copyrights text-center text-md-right">
                            &copy;2016-2017 Lemon all rights reserved</p>
                        <ul class="social__links list-unstyled d-flex justify-content-end">
                            <li><a target="_blank" href="https://www.google.com"><i class="fa fa-google-plus mr-2"
                                        aria-hidden="true"></i></a></li>
                            <li><a target="_blank" href="https://twitter.com"><i class="fa fa-twitter mr-2"
                                        aria-hidden="true"></i></a></li>
                            <li><a target="_blank" href="https://facebook.com"><i class="fa fa-facebook mr-2"
                                        aria-hidden="true"></i></a></li>
                            <li><a target="_blank" href="https://pinterest.com"><i class="fa fa-pinterest"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/e7d87bca6a.js"></script>
    <script src="/assets/js/modernizr.custom.63321.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="/assets/js/script.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.calendario.js"></script>
    <script type="text/javascript" src="/assets/js/data.js"></script>
    <script type="text/javascript" src="/assets/js/cal.js"></script>
</body>

</html>