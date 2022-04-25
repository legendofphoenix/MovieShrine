<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Font+Awesome+5+Free&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">
    <title>MovieShrine</title>
</head>

<body>
    <div class="navbar">
        <ul class="nav-list">
        <div class="logo"><img src="img/logoo.png" onclick="window.location.href = 'account.php';" alt="logo"></div>
            <li><a href="home.html">Home</a></li>
            <li><a href="movie.html">Movies</a></li>
            <li><a href="tvseries.html">TvSeries</a></li>
            <li><a href="Aboutus.html">About Us</a></li>
        </ul>
        <div class="rightNav">
            <input type="type" name="search" id="search">
            <button class="btn btn-sm">Search</button>
        </div>
    </div>
    <section class="background firstSectionindex">
        <div class="box-main">
            <div class="firsthalf">
                <p class="text-big"> John Wick </p>
                <p class="text-small">John wick has a very simple revenge story. It can be summarized as
                    "Keanu gets angry and shoots bad guys" but what makes it special? Directed by Chad
                    Stahelski who's a stunt specialist boy does it show because the main selling point in
                    the film are some real virtuoso action sequences, well made choreographies. Unlike
                    today's action movies, it doesn't use quick-cuts or shaky cameras actually see what's going on.</p>
                <div class="buttons">
                    <button class="btn" onclick="window.location.href = 'index.html';">Give Review</button>
                </div>
            </div>
            <div class="secondhalf">
                <img src="img/johnwick.jpg" alt="Movie Image">
            </div>
        </div>
        <h2 class="text-center">Review</h2>
        <div class="form">
            <form action="index.php" method="post">
            <input class="form-input" type="text" name="name" id="name" placeholder="Enter Your Name">
            <input class="form-input" type="text" name="number" id="phone" placeholder="Enter Your Number">
            <input class="form-input" type="text" name="sreview" id="sreview" placeholder="How was the Movie ?">
            <input class="form-input" type="text" name="nreview" id="nreview" placeholder="Your Review out of 10 ?">
            <textarea class="form-input" name="lreview" id="lreview" cols="30" rows="10" placeholder="Write your Review ?"></textarea>
            <form action="index.php" method="post">
            <input type="submit" name="submit" class="btn" Value ="Submit">
            </form>
        </div>
   
    </section>
    <footer>
            <p class="text-footer">
                Copyright &copy; 2022 - www.movieshrine.com All rights resreved
            </p>
        </footer>
</body>

</html>



<?php
if(isset($_POST['submit'])){
    $server = "localhost";
    $username="root";
    $password="";
    $db="moviereview";
    $con = mysqli_connect($server,$username,$password,$db);
    if(!$con){
        die("connection to this database faild due to".mysqli_connect_error());
    }
    //echo "Success connecting to db";
    $name = $_POST['name'];
    $number = $_POST['number'];
    $sreview = $_POST['sreview'];
    $nreview = $_POST['nreview'];
    $lreview = $_POST['lreview'];
    $sql = "INSERT INTO `moviereview`.`review` ( `name`, `number`, `sreview`, `nreview`, `lreview`, `dt`)
    VALUES ( '$name', '$number', '$sreview', '$nreview', '$lreview', current_timestamp());";
     //echo $sql;
    if($con->query($sql) == true)
    {
        ?>
        <script>
        alert( "successfully inserted");
        </script>
        <?php
    }
    else{
        ?>
        <script>
         alert( "ERROR: $sql <br> $con->error");
         </script>
        <?php
    }
    $con->close();
}
?>