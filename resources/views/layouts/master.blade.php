<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <h2><a href="#">MyBlog</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="menu">
                            <ul>
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#">About Me</a></li>
                                <li><a href="#">Technologies</a></li>
                                <li><a href="#">Web Development</a></li>

                                <li>
                                    <div class="form-outline">
                                        <input type="search" id="form1" class="form-control" placeholder="Search"
                                            style="border-radius: 5px; border: 1px solid black;" />
                                        <!-- <label class="form-label" for="form1">Search</label> -->
                                    </div>
                                </li>


                                <!-- <li><a href="#">photography</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('index-content')

        <!-- footer section. -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bg">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="footer-menu">
                                        <ul>
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="#">lifestyle</a></li>
                                            <li><a href="#">Food</a></li>
                                            <li><a href="#">Nature</a></li>
                                            <li><a href="#">photography</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="footer-icon">
                                        <p>
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a
                                                href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a
                                                href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a
                                                href="#"><i class="fa fa-dribbble" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div> .
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/active.js') }}"></script>
</body>

</html>
