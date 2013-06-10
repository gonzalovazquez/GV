<?php
session_name("fancyform");
session_start();

$_SESSION['n1'] = rand(1,20);
$_SESSION['n2'] = rand(1,20);
$_SESSION['expect'] = $_SESSION['n1']+$_SESSION['n2'];

$str='';
if($_SESSION['errStr'])
{
  $str='<div class="error">'.$_SESSION['errStr'].'</div>';
  unset($_SESSION['errStr']);
}

$success='';
if($_SESSION['sent'])
{
  $success='<h1>Thank you!</h1>';
  
  $css='<style type="text/css">#contact-form{display:none;}</style>';
  
  unset($_SESSION['sent']);
}
?>
<!DOCTYPE html>
<!-- saved from url=(0058)http://twitter.github.com/bootstrap/examples/carousel.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Gonzalo Vazquez</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="jqtransformplugin/jqtransform.css" />
    <link rel="stylesheet" type="text/css" href="formValidator/validationEngine.jquery.css" />
    <link rel="stylesheet" type="text/css" href="./css/contact.css" />

    <!--Le JS -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js"></script>
    <script type="text/javascript" src="formValidator/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>

    <style>

    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
      padding-bottom: 40px;
      color: #5a5a5a;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li >a {
      padding: 15px 20px;
    }


    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }



    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }



    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }


    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }



    /* RESPONSIVE CSS
    -------------------------------------------------- */

    /* Smartphones (portrait and landscape) ----------- */
    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
    #form-container{
            width: 280px;
            margin-left: 40px;
          }
      }

    @media (min-width:950px){
      #form-container{
        margin-top: -100px;
      }
    }
    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
      #form-container{
        margin-top: 0px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 20px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }

      h1.featurette-heading{
        font-size: 40px;
      }

      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }
      div #popup p {
        font-size: 12px;
      }

    }
    /* CUSTOMIZE THE Languages button
    -------------------------------------------------- */
    .span4{
      padding-top: 40px;
      padding-bottom: 40px;
    }
    div #popup p {
      position: absolute;
      font-size: 18px;
      left:50px;
      margin-top:-80px;
      color:#006dcc;
      -webkit-text-stroke-width: .3px;
      -webkit-text-stroke-color: #ccc;
    }

    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./img/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./img/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="./img/ico/apple-touch-icon-57-precomposed.png">
                    <link rel="shortcut icon" href="./img/ico/favicon.ico" type="image/x-icon">
                    <link rel="icon" href="./img/ico/favicon.ico" type="image/x-icon">
  <style type="text/css"></style><style id="holderjs-style" type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style>
</head>

  <body>



    <!-- NAVBAR
    ================================================== -->
    <div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="index.html">Gonzalo Vazquez</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="about.html">About</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="http://gonzalovazquez.github.io/">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->



     <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="./img/banner/slide-01.png" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Art in the blood is liable to take the strangest forms.<br>&minus;Sherlock Holmes</h1>
            </div><!--/carousel-caption-->
          </div><!-- container-->
        </div><!--/item active-->
        <div class="item">
          <img src="./img/banner/slide-03.png" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>You live your life between your ears.<br>&minus;Bebe Moore Campbell</h1>
           </div><!--/carousel-caption-->
          </div><!-- container-->
        </div><!--/item-->
        <div class="item">
          <img src="./img/banner/slide-02.png" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Technical skill is mastery of complexity. Creativity is mastery of simplicity.<br>&minus;E.C. Zeeman</h1>
            </div><!--/carousel-caption-->
          </div><!-- container-->
        </div><!--/item-->
      </div><!--/carousel-inner-->
      <a class="left carousel-control" href="http://twitter.github.com/bootstrap/examples/carousel.html#myCarousel" data-slide="prev">‹</a>
      <a class="right carousel-control" href="http://twitter.github.com/bootstrap/examples/carousel.html#myCarousel" data-slide="next">›</a>
    </div><!-- /.carousel -->



    <!-- Contact Form
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
 

      <h1 class="featurette-heading" style="text-align:center">Contact Me!</h1>
      <div class="featurette">
        <div id="main-container">
  <div id="form-container">    
          <p class="lead"> 
            If you want to share an idea with me—or a cup of coffee—or just
            talk about code, contact me! I would love to chat and get to know
            you.
          </p>
    <form id="contact-form" name="contact-form" method="post" action="submit.php">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="15%"><label for="name">Name</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="name" id="name" value="<?=$_SESSION['post']['name']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="email">Email</label></td>
          <td><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?=$_SESSION['post']['email']?>" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="subject">Subject</label></td>
          <td><select name="subject" id="subject">
            <option value="" selected="selected"> - Choose -</option>
            <option value="Coffee">Coffee</option>
            <option value="Freelance">Freelance</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><label for="message">Message</label></td>
          <td><textarea name="message" id="message" class="validate[required]" cols="35" rows="5"><?=$_SESSION['post']['message']?></textarea></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="captcha"><?=$_SESSION['n1']?> + <?=$_SESSION['n2']?> =</label></td>
          <td><input type="text" class="validate[required,custom[onlyNumber]]" name="captcha" id="captcha" /></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td colspan="2"><input type="submit" name="button" id="button" value="Submit" />
          <input type="reset" name="button2" id="button2" value="Reset" />
          
          <?=$str?>          <img id="loading" src="img/ajax-load.gif" width="16" height="16" alt="loading" /></td>
        </tr>
        </table>
        </form>
        <?=$success?>
      </div>
  </div>

        
      </div>
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p style="margin-top: -50px">© 2013 Gonzalo Vazquez</p>
      </footer>

    </div><!-- /.container -->

    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30540621-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  </script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/main.js"></script>
    <script src="./js/libs/jquery.js"></script>
    <script src="./js/libs/transition.js"></script>
    <script src="./js/libs/alert.js"></script>
    <script src="./js/libs/modal.js"></script>
    <script src="./js/libs/dropdown.js"></script>
    <script src="./js/libs/scrollspy.js"></script>
    <script src="./js/libs/tab.js"></script>
    <script src="./js/libs/tooltip.js"></script>
    <script src="./js/libs/popover.js"></script>
    <script src="./js/libs/button.js"></script>
    <script src="./js/libs/collapse.js"></script>
    <script src="./js/libs/carousel.js"></script>
    <script src="./js/libs/typeahead.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="./js/libs/holder.js"></script>
  </body>
</html>