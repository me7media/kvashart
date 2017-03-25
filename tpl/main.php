<!DOCTYPE html>
<html lang="<?= LANG?>" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Menshij">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="i/img/favicon.png">

    <title>KvashArt - Современное искусство</title>
    <?php IncludeCom('dev/jquery')?>
    <!--common style-->
    <link href="i/css/bootstrap.min.css" rel="stylesheet">
    <link href="i/css/font-awesome.min.css" rel="stylesheet">
    <link href="i/css/nav.css" rel="stylesheet">
    <link href="i/css/style.css" rel="stylesheet">
    <link href="i/css/theme-color.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="i/js/html5shiv.js"></script>
    <script src="i/js/respond.min.js"></script>
    <![endif]-->

</head>

<body  class="gray-bg">


<div class="wrapper">
    <!--content section start-->

    <?php IncludeCom('/nav') ?>


          <section class="content light-bg">
            <?= $content?> 
          </section>
            <!--footer section start-->
    <footer class="footer">
      
        <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="widget">
                                    <div class="title">
                                        <h6 class="text-uppercase">latest post</h6>
                                    </div>
                                    <ul class="widget-latest-post">
                                        <li>
                                        <div class="thumb"><a href="#"><img src="i/img/blog/thumb-2.jpg" alt=""></a></div>
                                            <div class="w-desk">
                                                <a href="#">NEVER EVER FORGOT YOUR
                                                    AWESOME CHILDHOOD</a>
                                                April 25, 2014
                                            </div>
                                        </li>
                                    </ul>
                                </div>
               </div>
                <div class="col-md-4">
                    <div class="footer-logo">
                        <a href="#"><img class="retina" src="i/img/logo.png" alt=""></a>
                        <span>Галерея</span>
                    </div>
                    <ul class="f-social-link">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>

                    <div class="copyright">
                        © 2016 KvashArt. Все права защищены.
                        <span>Powered by <a href="#">Us)</a>
<input type="image" src="i/img/arrow.png" id="lick"></span>
                    </div>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </footer>
    <!--footer section end-->

</div>

    <script src="i/js/bootstrap.min.js"></script>
    <script src="i/js/jquery.isotope.js"></script>
    <script src="i/js/imagesloaded.js"></script>
    <!--[if lt IE 9]>
    <script src="i/js/modernizr.js"></script>
    <![endif]-->
    <script src="i/js/superfish.js"></script>
    <script src="i/js/easyaspie.min.js"></script>

    <script src="i/js/scripts.js"></script>
    
<a id="tb-scroll-to-top" data-scroll="" class="tb-scroll-to-top-hide" href="#"><i class="fa fa-angle-up"></i></a>
    </body>
</html>