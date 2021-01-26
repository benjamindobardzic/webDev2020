<?php
    session_start();
    $conn = mysqli_connect("localhost","root","") or die("Konekcija sa serverom nije uspotavljena");
    mysqli_select_db($conn,"filmovi") or die("Konekcija sa serverom nije uspostavljena");

    $upit = $_SESSION['kveri'];
    
    $string_kveri = "SELECT * from slike WHERE `ime_filma` LIKE '%".$upit."%'";

    $raw_rezultat = mysqli_query($conn, $string_kveri);
    //radi
    if(mysqli_num_rows($raw_rezultat)>0){
        $rezultat = array();
        while($row=mysqli_fetch_assoc($raw_rezultat)){
            $rezultat[] = $row;
        }
        mysqli_close($conn);
    }
    else{
        mysqli_close($conn);
        echo "Nema rezultata";
    }







?>
<!doctype html>
<html lang="en">
  <head>
    <title>Rezultat Pretrage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/navigation.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@200;400;800&family=Unica+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="./style/showMovies.css">
  </head>
  <body>
            <div class="navigation">

                <div class="goBack">
                    <i class="fas fa-angle-double-left"></i>
                    <a href="../index.php">Nazad</a>
                </div>
            </div>
            <div class="movies">
			<?php foreach ($rezultat as $f) {

				
				echo "<div class='box'><h1>" . $f['ime_filma'] . "</h1>" . $f['zanr_filma'] . "<h3>" . $f['ocjena'] . "</h3><p>"
					. $f['sadrzaj'] . "</p> <img src=" . "'" . "slike/" . $f['slika'] . "'" . "/>" .
					"</div>";
					
			}
			?></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>