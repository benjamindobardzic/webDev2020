<?php
session_start(); 
if (!isset($_SESSION['username'])) {
	header('location:admin_login.php');
}
$database = mysqli_connect("localhost", "root", "");
mysqli_select_db($database, "filmovi");
$kveri = "SELECT * FROM slike";
$output = mysqli_query($database, $kveri);

$filmovi = array();

while ($row = mysqli_fetch_assoc($output)) {
	$filmovi[] = $row;
}

if (isset($_POST['delete'])) {
	if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
		die("Nevalidan id filma");
	}
	$_SESSION['id'] = $_POST['id'];
	header("location:brisanje_filma.php");
}
if(isset($_POST['izmjeni'])){
		if(!isset($_POST['id_izmjeni'])||!is_numeric($_POST['id_izmjeni'])){
		
			die("Nevalidan id filma");
		}
		$_SESSION['id_izmjeni'] = $_POST['id_izmjeni'];
		header("location:izmjeni_film.php");
		
	}
mysqli_close($database);

?>
<!doctype html>
<html lang="en">

<head>
	<title> Svi filmovi </title>
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
			<a href="../Filmovi/pocetna.php">Nazad</a>
		</div>

		<div class="logout">
			<i class="fas fa-sign-out-alt"></i>
			<a href="../index.php">Logout</a>
		</div>
	</div>
	
		
			<div class="movies">
			<?php foreach ($filmovi as $f) {

				
				echo "<div class='box'><h1>" . $f['ime_filma'] . "</h1>" . $f['zanr_filma'] . "<h3>" . $f['ocjena'] . "</h3><p>"
					. $f['sadrzaj'] . "</p> <img src=" . "'" . "slike/" . $f['slika'] . "'" . "/>" .
					"
					<form action='prikazi_filmove.php' method='POST'>
						<input type='hidden' name='id' value=" . "'" . $f['id'] . "'" . "/>
						<div class='delete'><button type='submit' name='delete'> Obrisi </button><i class='far fa-trash-alt'></i></div>
					</form> 
					<form action='prikazi_filmove.php' method='POST'>
						<input type='hidden' name='id_izmjeni' value="."'".$f['id']."'"."/>
						<div class='change'><button type='submit' name='izmjeni'> Izmjeni </button><i class='fas fa-exchange-alt'></i></div>
					</form></div>";
					
			}
			?></div>
	

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>