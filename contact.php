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
  $success='<h2>Message Sent!</h2><script>alert("Message Sent, Thank you!")</script>';
  
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
    <link href="./css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/lib/jqtransform.css" />
    <link rel="stylesheet" type="text/css" href="./css/lib/validationEngine.jquery.css" />
    <link rel="stylesheet" type="text/css" href="./css/contact.css" />

    <style>
    .social li {
      float: right;
      display: inline;
      padding: 0px 5px 0px 5px ;
    }
    </style>

    <!--Le JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="./js/libs/jquery.jqtransform.js"></script>
    <script type="text/javascript" src="./js/libs/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
  
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



<!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.html"><p>Gonzalo Vazquez</p></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
                <li><a href="projects.html">Projects</a></li>
                <li><a href="passion.html">Passion</a></li>
                <li><a href="skills.html">Skills</a></li>
                <li><a href="http://gonzalovazquez.github.io/">Blog</a></li>
                <li class="active"><a href="contact.php">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner contactMe">
        <div class="item active">
          <div class="container">
            <div class="carousel-caption dearTitle">
              <h1 class="hello">Dear...</h1>
            </div><!--/carousel-caption-->
          </div><!-- container-->
        </div><!--/item active-->
      </div><!--/carousel-inner-->
    </div><!-- /.carousel -->



    <!-- Contact Form
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <div class="featurette">
        <div id="main-container">
          <div id="form-container"> 
          <?=$success?>   
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
        
      </div>
  </div>

        
      </div>
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <ul class="social" style="list-style-type: none;">
          <li><i class="icon-comment"></i><a href="http://twitter.com/gonzalovazzquez" target="_blank"> Twitter</a></li>
          <li><i class="icon-briefcase"></i><a href="http://www.linkedin.com/in/gonzalovazzquez" target="_blank"> LinkedIn</a></li>
          <li><i class="icon-hdd"></i><a href="https://github.com/gonzalovazquez" target="_blank"> GitHub</a></li>
          <li><i class="icon-envelope"></i><a href="mailto:gonzalo.segura1@gmail.com?subject=Hi%20There!" target="_blank" id="mail" class="icons" title="[GMCP] Compose a new mail to " onclick="window.open('https://mail.google.com/mail/u/0/?view=cm&amp;fs=1&amp;tf=1&amp;to=gonzalo.segura1@gmail.com&amp;su=Hi%20There!','Compose new message','width=640,height=480');return false" rel="noreferrer"> Mail</a></li>
          <li><i class="icon-facetime-video"></i><a href="http://vimeo.com/gonza" target="_blank"> Vimeo</a></li>
          <li><i class="icon-globe"></i><a href="http://coderbits.com/gonzalovazquez" target="_blank"> CoderBits</a></li>
      </ul>
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
    <script type="text/javascript" src="./js/libs/mousetrap.min.js"></script>
    <script src="./js/code.js"></script>
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
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
  </body>
</html>