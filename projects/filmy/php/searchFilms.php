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
                    /* Connect to Database */
                    $dbLink = new mysqli("localhost", $user, $passwd, $dbName);
                    if ($dbLink->connect_errno) {
                        echo "Failed to connect to MySQL: " . $dbLink->connect_error;
                    } else {
                       // echo "Yey! Connected!";
                       // echo "<br>";
                    }
                    /* Store the search input from the user */
                    $criteria = $_POST["optRadios"];
                    $search = $_POST["searchFilm"];
                    $count = 0;
                    /*TODO: Protect against MYSQL Injestion by escaping*/
                    echo '<div>';
                    echo '<h1>Search Results</h1>';
                    echo "<h4>Films where ".$criteria ." matches <strong>".$search."</strong></h4><br>";
                    /* Query */
                    $result = mysqli_query($dbLink, "SELECT * FROM movies
                    WHERE $criteria LIKE'$search%'");

                    if ($result === FALSE) {
                        echo(mysqli_error($dbLink));
                        echo("Error");
                    } else {
                        echo "<div>";
                        while ($row = mysqli_fetch_array($result)) {                
                            echo "<h2>";
                            echo $row['title'];
                            echo "</h2><p>";
                            echo "<strong>Genre</strong>: ".$row['genre'];
                            echo "</p><p>";
                            echo "<strong>Year:</strong> ". $row['year'];
                            echo "</p><p>";
                            echo "<strong>Runtime:</strong> ".$row['runtime'].' min';
                            echo "</p><p>";
                            echo "<strong>Director:</strong> ".$row['director'];
                            echo "</p><div>";
                            echo "<img src=\"".$row['poster']."\" alt=\"".$row['poster']."\"/>";
                            echo "</div><p>";
                            echo "<strong>Plot:</strong> ".$row['plot'];
                            echo "</p>";
                            $count++;
                        }
                        echo "</div>";
                        echo "<p>".$count.' film(s) found</p>';
                        echo '<a href="../index.html">Search Again</a>';
                        echo '</div>';
                      }
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