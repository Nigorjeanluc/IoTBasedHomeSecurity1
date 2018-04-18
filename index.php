<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IoT based - Home Monitoring</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">

</head>
<?php
    if(isset($_GET['lightSensor'])){
        $lightSensor = $_GET['lightSensor'];
        $flameSensor1 = $_GET['flameSensor1'];
        $flameSensor2 = $_GET['flameSensor2'];
        $flameSensor3 = $_GET['flameSensor3'];
        $flameSensor4 = $_GET['flameSensor4'];
        $celcius = $_GET['celcius'];
        $fahrenheit = $_GET['fahrenheit'];
        $sql= "INSERT INTO sensors(LightSensor,FlameSensor1,FlameSensor2,FlameSensor3,FlameSensor4,Celcius,Fahrenheit,created_at,updated_at) 
        VALUES('$lightSensor','$flameSensor1','$flameSensor2','$flameSensor3','$flameSensor4','$celcius','$fahrenheit',now(),now())";
        $res= mysqli_query($dbcon,$sql) or die ("Failed to insert".mysqli_error());
        if(isset($res)){
        echo "<meta http-equiv='refresh' content='0;url=response.php?yes=1'>";
        }else{
        echo "<meta http-equiv='refresh' content='0;url=response.php?yes=0'>";
        }
    }
?>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">IoT Based Home Security</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#download">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="admin/login.php">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Apply Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <h1 style="font-size:2.5em;text-align:left;" class="mb-5">Security monitoring system, <br>Receive accurate data anywhere on your screens.</h1>
                        <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Get started</a>
                    </div>
                </div>
                <div class="col-lg-5 my-auto">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="download bg-primary text-center" id="download">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2 class="section-heading">Coming soon!</h2>
                    <p>We will be soon available on any mobile device!</p>
                    <div class="badges">
                        <a class="badge-link" href="#"><img src="img/google-play-badge.svg" alt=""></a>
                        <a class="badge-link" href="#"><img src="img/app-store-badge.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Unlimited Features, Unlimited control</h2>
                <p class="text-muted">Check out what you can do this platform!</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 my-auto">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 my-auto">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-screen-smartphone text-primary"></i>
                                    <h3>Danger Alerts</h3>
                                    <p class="text-muted">Receive alerts in case of fire outbreaks or theifs!</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-lock-open text-primary"></i>
                                    <h3>Light control</h3>
                                    <p class="text-muted">Control lightings of you house.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <i class="icon-graph text-primary"></i>
                                    <h3>Temperture display</h3>
                                    <p class="text-muted">Temperature variation over time in your house.</p>
                                </div>
                            </div>
                            <!--<div class="col-lg-6">
                              <div class="feature-item">
                                <i class="icon-lock-open text-primary"></i>
                                <h3>Open Source</h3>
                                <p class="text-muted">Since this theme is MIT licensed, you can use it commercially!</p>
                              </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2 style="font-size:2.0em">Start securing your place now.<br>Receive information of your place at any place.</h2>
                <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section class="contact bg-primary" id="contact">
        <div class="container">
            <h2>We
                <i class="fa fa-heart"></i> new users!</h2>
            <ul class="list-inline list-social">
                <li class="list-inline-item social-twitter">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item social-facebook">
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item social-google-plus">
                    <a href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2018 Home Safety System. All Rights Reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#">Privacy</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">Terms</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">Admin</a>
                </li>
            </ul>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

</body>

</html>