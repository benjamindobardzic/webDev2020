<?php
session_start();

$database = mysqli_connect("localhost", "root", "");
mysqli_select_db($database, "filmovi");

if ($_REQUEST['id']) {
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM slike WHERE id=$id";
    $query = mysqli_query($database, $sql);
}
mysqli_close($database)


?>
<?php foreach ($query as $q) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <title><?php echo $q['ime_filma']; ?></title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@200;400;800&family=Unica+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="./Filmovi/style/navigation.css">
        <link rel="stylesheet" href="./style/style.css">
        <link rel="stylesheet" href="./style/movie.css">
    </head>

    <body>
        <div class="navigationOuter">
            <div class="navigation">

                <div class="goBack">
                    <i class="fas fa-angle-double-left"></i>
                    <a href="./index.php">Home</a>
                </div>

                <div class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="./Filmovi/admin_login.php">Login</a>
                </div>
            </div>
        </div>
        <header style="background-image: url('./Filmovi/slike/<?php echo $q['slika']; ?>')">


        </header>
        <div class="container">
          
        <h1><?php echo $q['ime_filma']; ?></h1>
        <div class="d-flex m-auto">
            <p>Zanr: </p>
            <p class="ml-3" style="font-family:'Montserrat'; font-weight:700"><?php echo $q['zanr_filma'] ?></p>
        </div>
        <div class="d-flex">
            <p>Ocjena: </p>
            <p class="ml-3" style="font-family:'Montserrat'; font-weight:700"><?php echo $q['ocjena'] ?></p>
        </div>
        <div class="description">
        <p>Opis filma:</p>
        <p><?php echo $q['sadrzaj'] ?></p>
        </div>
        </div>
        



    </body>
<footer>
                <div class="newsletter">
                    <h2>Subscribe to our newsletter.</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis fugiat dolor quasi rerum
                        ut
                        velit
                        deleniti error porro exercitationem dolorum vel architecto esse cumque quisquam odit, nobis
                        repudiandae?</p>
                    <div class="email-box">
                        <i class="far fa-envelope"></i>
                        <input class="tbox" type="text" value="" placeholder="Enter your email here...">
                        <button class="subscribeBtn" type="button" name="button">Subscribe</button>

                    </div>
                    <p class="text-muted">(Hover me!)</p>
                </div>
                <div class="footerDetails">
                    <div class="row">
                        <div class="col-12 col-lg-2 mt-3 mt-md-none">
                            <h1 class="text-white">Filmophil</h1>
                            <p class="text-white">We create possibilites for the connected <span style="font-weight: 700;">world</span>.</p>
                        </div>
                        <hr class="d-md-none">
                        <div class="col-12  col-lg-2 mt-3 mt-md-none">
                            <h5>About us</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos quasi tempore reiciendis
                                est fuga dolorum, unde quia maiores odio. Maiores, earum ducimus ipsum ad alias
                                voluptatibus eum consectetur debitis repudiandae?</p>

                        </div>
                        <div class="col-12  col-lg-2 mt-3 mt-md-none">
                            <h5>Visit us</h5>
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Vukasina Markovica 186, Podgorica, Crna Gora</p>
                        </div>
                        <div class="col-12 col-lg-2 mt-3 mt-md-none">
                            <h5>Follow us</h5>
                            <i class="fab fa-instagram"></i>
                            <p>Instagram</p>
                            <i class="fab fa-facebook-square"></i>
                            <p>Facebook</p>
                            <i class="fab fa-twitter-square"></i>
                            <p>Twitter</p>
                        </div>
                        <div class="col-12  col-lg-2 mt-3 mt-md-none">
                            <h5>Legal</h5>
                            <a class="d-block" href="#">Terms</a>
                            <a class="d-block" href="#">Privacy</a>
                        </div>
                        <div class="col-12  col-lg-2 mt-3 mt-md-none">
                            <h5>Explore</h5>
                            <a class="d-block" href="#">All movies</a>
                            <a class="d-block" href="#">Comedies</a>
                            <a class="d-block" href="#">Drama</a>
                            <a class="d-block" href="#">Love</a>
                        </div>

                    </div>
                </div>
                <div class="bottomFooter d-flex justify-content-center">
                    <i style="color: white;" class="far fa-copyright m-1 text-center"></i>
                    <p class="text-center text-white">All right reserved by <span style="font-weight: 700;"> Benjamin
                            Dobardzic & Dejan Babic.</span></p>
                </div>
            </footer>

    </html>
<?php } ?>