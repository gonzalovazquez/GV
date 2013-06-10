<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'connectInfo.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Search Collection</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div data-role="page" id="home" data-theme="c">
 
            <div data-role="header" data-theme="c">
                <h1>Filmy</h1>
                <a href="../index.html" data-direction="reverse" data-theme="c" data-icon="back" class="ui-btn-right">Back</a>
            </div><!-- /header -->
         
            <div data-role="content">
            <?php
                include("connectInfo.php");
                
                /*Connect to Database*/
                $dbLink = new mysqli("localhost", $user, $passwd, $dbName);
                if ($dbLink->connect_errno) {
                    echo "Failed to connect to MySQL: " . $dbLink->connect_error;
                }else{
                    //echo "Connected!";
                }

                
                /*Stores title result if the user typed something, else it sets the 
                variable to null*/
                $filmTitle = (isset($_POST["title"])) ? $_POST["title"] : "";
                $filmGenre = (isset($_POST["genre"])) ? $_POST["genre"] : "";
                $filmYear = (isset($_POST["year"])) ? $_POST["year"] : "";
                $filmRuntime = (isset($_POST["runtime"])) ? $_POST["runtime"] : "";
                $filmDirector = (isset($_POST["director"])) ? $_POST["director"] : "";
                $filmPoster = (isset($_POST["poster"])) ? $_POST["poster"] : "";
                $filmPlot = (isset($_POST["plot"])) ? $_POST["plot"] : "";

                
                /*Execute INSERT query statement
                 Note: We dont put '' around cdPrice because it's*/
                $sql = "INSERT INTO movies (title, genre, year, runtime, director, poster, plot) VALUES ('$filmTitle',
                 '$filmGenre', $filmYear, $filmRuntime, '$filmDirector', '$filmPoster', '$filmPlot');";
                /*We store the result*/
                $result = $dbLink->query($sql);
                
                if ($result === TRUE) {
                    echo "<h3>Success!! <strong>".$filmTitle. "</strong>  added to database!</h3>";      
                          echo '<a href="../index.html">Add more?';
                } else {
                        // if using oop code:
                        echo "<p><b>Error:.$dbLink->error.</b><br>"; 

                }
                
                /*Close Database*/
                mysqli_close($dbLink);
            ?>
                

            </div><!-- /content -->
         
            <div class='footer-wrapper'>
                <div data-role='footer' data-theme="c">
                    <p>Gonzalo Vazquez &copy</p>
                </div>
            </div>
                
            </div><!-- /header -->
        </div><!-- /page -->
      
    </body>
</html>