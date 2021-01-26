<?php
session_start();

$database = mysqli_connect("localhost", "root", "");
mysqli_select_db($database, "filmovi");

$kveri = "SELECT id, ime_filma,zanr_filma, ocjena, SUBSTRING(`sadrzaj`, 1, 150) AS sadrzaj, slika FROM `slike` LIMIT 8";


$final = mysqli_query($database, $kveri);

$filmovi = array();

while ($row = mysqli_fetch_assoc($final)) {
    $filmovi[] = $row;
}
mysqli_close($database)


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@200;400;800&family=Unica+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="./style/lightslider.css">

</head>

<body>
    <main>
        <div id="header">

            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#"> <i class="fas fa-film sectionHeaderIcon"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#aboutUs">About us <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#movies">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#accordion">FAQ</a>
                        </li>

                    </ul>
                    <a href="./Filmovi/admin_login.php">
                        <div class="login">
                            <p class="p-0 m-0">Login</p>
                            <i class="fas fa-sign-in-alt ml-2 mt-1"></i>
                        </div>
                    </a>

                </div>
            </nav>

            <!--<div class="headerText">
                    <h1 class="text-white">Birdbox</h1>
                    <h6 class="text-white">The movie that has won so many Oscars!</h6>
                </div> -->
            <!--Carousel-->
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner myCarousel">
                    <div class="carousel-item active">
                        <img src="./img/headerImage.jpg" alt="...">
                        <div class="carousel-caption ">
                            <!--d-none d-md-block-->
                            <h1>Birdbox</h1>
                            <p>What a movie!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/headerImage.jpg" alt="...">
                        <div class="carousel-caption">
                            <!--d-none d-md-block-->
                            <h1>Tokyo Drift</h1>
                            <p>American best seller movie!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/headerImage.jpg" alt="...">
                        <div class="carousel-caption">
                            <!--d-none d-md-block-->
                            <h1>Up in the air</h1>
                            <p>George Cloney's amazing movie!</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>



        </div>

        <!--About us-->
        <div class="container-fluid grayBg">
            <h1 id="backgroundAbout">about</h1>
            <div class="container">
                <div id="aboutUs">
                    <h1 class="text-center pt-5">WHO WE ARE</h1>
                    <div class="row pb-5  text-center text-md-left">
                        <div class="col-12 col-md-4">
                            <h3>We turn ideas into works of art.</h3>
                            <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolores,
                                earum, quidem
                                aliquid enim quae atque eum nisi delectus recusandae placeat distinctio! Quae esse
                                voluptate
                                aut nemo accusantium quas id! Aperiam ea eligendi distinctio ullam, blanditiis esse
                                eveniet
                                obcaecati eos at! Distinctio minus voluptatibus cum praesentium quibusdam numquam
                                deleniti
                                repellendus.</p>


                        </div>
                        <div class="vl d-none d-lg-block"></div>
                        <div class="col-12 col-md-4 ">
                            <h3>Our social media:</h3>
                            <div class="facebook mt-5">
                                <img src="./img/facebook (1).png" alt="">
                                <h6 class="text-white">Our facebook page: The best movie</h6>
                            </div>
                            <div class="instagram mt-3">
                                <img src="./img/instagram (2).png" alt="">
                                <h6 class="text-white">Our Instagram page: @thebestmovie</h6>
                            </div>
                            <div class="twitter mt-3">
                                <img src="./img/twitter.png" alt="">
                                <h6 class="text-white">Our Twitter page: thebestofthebest</h6>
                            </div>
                        </div>
                        <div class="vl d-none d-lg-block"></div>
                        <div class="col-12 col-md-3">
                            <img class="img-fluid" src="./img/AboutUs.jpg" alt="" height="100%" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--movies-->
        <div id="movies" class="container mt-5 mb-5 text-center">
            <i class="fas fa-film sectionHeaderIcon"></i>
            <h1>Movies</h1>
            <p class="unicaFont">You can check movies we have over here. Just slide right or left!</p>
            <ul id="autoWidth" class="cs-hidden">
                <?php foreach($filmovi as $f){?>
                
                    <li class='item-a'>
                        <div class='box'>
                        <img src="./Filmovi/slike/<?php echo $f['slika']; ?>"/>
                            <div class='details'>
                            <h4><?php echo $f['ime_filma'];?></h4>
                            <p><?php echo $f['sadrzaj'];?>...</p>
                            <a href="movie.php?id=<?php echo $f['id']; ?>">See more</a>
                            </div>
                        </div>
                        </li>
                <?php } ?>

                <!-- <li class="item-a">
                    <div class="box">
                        <img src="https://motivatevalmorgan.com/wp-content/uploads/2019/11/Gear-Up-For-The-Level-Up-Jumanji-The-Next-Level-1024x512.png"
                            alt="">
                        <div class="details">
                            <h4>Jumanji</h4>
                            <p>The Next Level is a 2019 American fantasy adventure comedy film directed by Jake Kasdan
                                and co-written by Kasdan, Jeff Pinkner, and Scott Rosenberg. </p>
                            <button type="button">See more</button>
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="box">
                        <img src="https://motivatevalmorgan.com/wp-content/uploads/2019/11/Gear-Up-For-The-Level-Up-Jumanji-The-Next-Level-1024x512.png"
                            alt="">
                        <div class="details">
                            <h4>Jumanji</h4>
                            <p>The Next Level is a 2019 American fantasy adventure comedy film directed by Jake Kasdan
                                and co-written by Kasdan, Jeff Pinkner, and Scott Rosenberg. </p>
                            <button type="button">See more</button>
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="box">
                        <img src="https://motivatevalmorgan.com/wp-content/uploads/2019/11/Gear-Up-For-The-Level-Up-Jumanji-The-Next-Level-1024x512.png"
                            alt="">
                        <div class="details">
                            <h4>Jumanji</h4>
                            <p>The Next Level is a 2019 American fantasy adventure comedy film directed by Jake Kasdan
                                and co-written by Kasdan, Jeff Pinkner, and Scott Rosenberg. </p>
                            <button type="button">See more</button>
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="box">
                        <img src="https://motivatevalmorgan.com/wp-content/uploads/2019/11/Gear-Up-For-The-Level-Up-Jumanji-The-Next-Level-1024x512.png"
                            alt="">
                        <div class="details">
                            <h4>Jumanji</h4>
                            <p>The Next Level is a 2019 American fantasy adventure comedy film directed by Jake Kasdan
                                and co-written by Kasdan, Jeff Pinkner, and Scott Rosenberg. </p>
                            <button type="button">See more</button>
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="box">
                        <img src="https://motivatevalmorgan.com/wp-content/uploads/2019/11/Gear-Up-For-The-Level-Up-Jumanji-The-Next-Level-1024x512.png"
                            alt="">
                        <div class="details">
                            <h4>Jumanji</h4>
                            <p>The Next Level is a 2019 American fantasy adventure comedy film directed by Jake Kasdan
                                and co-written by Kasdan, Jeff Pinkner, and Scott Rosenberg. </p>
                            <button type="button">See more</button>
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="box">
                        <img src="https://motivatevalmorgan.com/wp-content/uploads/2019/11/Gear-Up-For-The-Level-Up-Jumanji-The-Next-Level-1024x512.png"
                            alt="">
                        <div class="details">
                            <h4>Jumanji</h4>
                            <p>The Next Level is a 2019 American fantasy adventure comedy film directed by Jake Kasdan
                                and co-written by Kasdan, Jeff Pinkner, and Scott Rosenberg. </p>
                            <button type="button">See more</button>
                        </div>
                    </div>
                </li>-->
            </ul>
        </div>

        <div class="container-fluid">
            <div class="references">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="referencesText">
                            <i class="far fa-user text-white"></i>
                            <div class="counter" data-target="5000">0</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, ut.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="referencesText">
                            <i class="far fa-user text-white"></i>
                            <div class="counter" data-target="5000">0</div>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, ut.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="referencesText">
                            <i class="far fa-user text-white"></i>
                            <div class="counter" data-target="5000">0</div>
                            <p>Lorem1 ipsum dolor sit amet consectetur adipisicing elit. Eum, ut.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="referencesText">
                            <i class="far fa-user text-white"></i>
                            <div class="counter" data-target="5000">0</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, ut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <div class="contactUs">
                <div class="row">
                    <div class="col-12 col-md-6 m-auto">
                        <h4>Your personal data:</h4>
                        <hr>
                        <label for="name">Your first name</label><span
                            style="color: #d88d16; font-size:1.1rem;">&#42</span>
                        <input class="form-control" name="name" type="text" placeholder="Benjamin">

                        <label for="lastname">Your last name</label><span
                            style="color: #d88d16; font-size:1.1rem;">&#42</span>
                        <input class="form-control" name="lastname" type="text" placeholder="Dobardzic">

                        <label for="email">Your email adress</label><span
                            style="color: #d88d16; font-size:1.1rem;">&#42</span>
                        <input class="form-control" name="lastname" type="email"
                            placeholder="benjamin.dobardzic@udg.edu.me">

                        <label for="address">Your address:</label>
                        <input class="form-control" name="address" type="text"
                            placeholder="Vukasina Markovica 186, Podgorica">


                        <h6 class="mt-3">Your gender:<span style="color: #d88d16; font-size:1.1rem;">&#42</span></h6>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label><br>

                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label><br>

                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label><br>

                    </div>

                    <div class="col-12 col-md-6">
                        <h4>The movie you want to recommend us:</h4>
                        <hr>

                        <label for="movie">Movie name</label><span
                        style="color: #d88d16; font-size:1.1rem;">&#42</span>
                        <input class="form-control" type="text" name="movie" placeholder="Batman">

                        <div class="div d-flex mt-3">
                            <div class="genres">
                                <p>Choose primary genre:</p>
                                <select class="form-control" name="cars" id="primaryGenre">
                                    <option selected disabled></option>
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <div class="genres ml-3">
                                <p>Choose secondary genre:</p>
                                <select class="form-control" name="cars" id="cars">
                                    <option selected disabled></option>
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>

                        <p class="mt-3">Main actors:</p>
                        <div class="actors d-flex">
                            <p class="m-1">1.</p>
                            <input type="text" class="form-control w-50" placeholder="Robert De Niro"><span
                            style="color: #d88d16; font-size:1.1rem;" class="m-2">&#42</span>
                        </div>
                        <div class="actors d-flex mt-3">
                            <p class="m-1">2.</p>
                            <input type="text" class="form-control w-50"><p class="text-muted m-2">Optional</p>
                        </div>
                       <div class="actors d-flex mt-3">
                            <p class="m-1">2.</p>
                            <input type="text" class="form-control w-50"><p class="text-muted m-2">Optional</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="container">
            <div id="contact" class="contactUs">
                <i class="fas fa-pen-fancy sectionHeaderIcon"></i>
                <h1 class="text-center">Contact us</h1>
                <p class="text-center">Feel free to contact us and recommend us a movie!</p>
                <h4 class="text-left">Your personal data:</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="nameAndSurname d-block d-md-flex">
                            <div class="name w-100 w-md-50 mr-md-4">
                                <label for="name">Your first name</label><span style="color: #d88d16; font-size:1.1rem;">&#42</span>
                                <input class="form-control" name="name" type="text" placeholder="Benjamin">
                            </div>

                            <div class="surname w-100 w-md-50 ml-md-4">
                                <label for="lastname">Your last name</label><span style="color: #d88d16; font-size:1.1rem;">&#42</span>
                                <input class="form-control" name="lastname" type="text" placeholder="Dobardzic">
                            </div>
                        </div>
                        <hr class="mt-3 mb-3">
                        <div class="emailAndAdress d-block d-md-flex">
                            <div class="email w-100 w-md-50 mr-md-4">
                                <label for="email">Your email adress</label><span style="color: #d88d16; font-size:1.1rem;">&#42</span>
                                <input class="form-control" name="lastname" type="email" placeholder="benjamin.dobardzic@udg.edu.me">
                            </div>
                            <div class="adress w-100 w-md-50 ml-md-4">
                                <label for="address">Your address:</label>
                                <input class="form-control" name="address" type="text" placeholder="Vukasina Markovica 186, Podgorica">
                            </div>
                        </div>
                        <hr class="mt-3">
                        <div class="recommendation">

                            <h4 class="text-left mt-3">Movie you are recommending:</h4>

                            <div class="recommendation-inner d-block d-md-flex">

                                <div class="detailsAbout w-100 w-md-50 mr-md-4">
                                    <label for="movie">Movie name</label><span style="color: #d88d16; font-size:1.1rem;">&#42</span>
                                    <input class="form-control" type="text" name="movie" placeholder="Batman">
                                    <div class="genres d-block d-md-flex mt-3">
                                        <div class="d-flex mt-3">
                                            <div>
                                                <p>Choose primary genre:</p>
                                                <select class="form-control" name="cars" id="primaryGenre">
                                                    <option selected disabled></option>
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="mercedes">Mercedes</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                            <div class="ml-3">
                                                <p>Choose secondary genre:</p>
                                                <select class="form-control" name="cars" id="cars">
                                                    <option selected disabled></option>
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="mercedes">Mercedes</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-4">Main actors:</p>
                                    <div class="actors d-flex">
                                        <p class="m-1">1.</p>
                                        <input type="text" class="form-control w-100" placeholder="Robert De Niro"><span style="color: #d88d16; font-size:1.1rem;" class="m-2">&#42</span>
                                    </div>
                                    <div class="actors d-flex mt-3">
                                        <p class="m-1">2.</p>
                                        <input type="text" class="form-control w-100">
                                        <p class="text-muted m-2">Optional</p>
                                    </div>
                                    <div class="actors d-flex mt-3">
                                        <p class="m-1">3.</p>
                                        <input type="text" class="form-control w-100">
                                        <p class="text-muted m-2">Optional</p>
                                    </div>
                                </div>


                                <div class="content w-100 w-md-50 ml-md-4">
                                    <label class="mt-4" for="content">Description:</label>
                                    <input name="content" type="textarea" class="form-control w-100 h-50 " placeholder="Write some description here...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Frequently asked questions-->
        <div id="accordion" class="container-fluid" style="background-color: #f0f0f0;">
            <div class="container">
                <div class="frequenltyAsked">
                    <h1 class="text-center">FAQ</h1>
                    <p class="text-center unicaFont">Probablly all the question you have are here!</p>
                    <div class="divider d-block d-md-flex mt-5">
                        <div class="leftSide mr-md-4">
                            <div class="accordion">
                                <button type="button" class="accordionButton">1.Prvo pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="accordion">
                                <button type="button" class="accordionButton">2.Drugo pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="accordion">
                                <button type="button" class="accordionButton">3.Trece pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="accordion">
                                <button type="button" class="accordionButton">3.Trece pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="rightSide ml-md-4">

                            <div class="accordion">
                                <button type="button" class="accordionButton">3.Trece pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="accordion">
                                <button type="button" class="accordionButton">3.Trece pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="accordion">
                                <button type="button" class="accordionButton">3.Trece pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="accordion">
                                <button type="button" class="accordionButton">3.Trece pitanje</button>
                                <div class="accordionContent">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi provident
                                        tenetur
                                        natus
                                        nam dolor magni, sed ducimus ut recusandae laboriosam. Voluptatem debitis nihil
                                        ad
                                        modi
                                        ipsum
                                        illum beatae totam, ut assumenda mollitia doloremque cum, repellat accusamus
                                        architecto
                                        veniam
                                        magni. Labore sed sapiente sequi dicta nobis! Impedit distinctio minus mollitia!
                                    </p>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
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
        </div>
    </main>









    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/accordion.js"></script>
    <script src="./js/counter.js"></script>
    <script src="./js/JQuery3.3.1.js"></script>
    <script src="./js/lightslider.js"></script>
    <script src="./js/mySlider.js"></script>
    <script src="./js/fixedNav.js"></script>
</body>

</html>