<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header("location:admin_login.php");
	}
	
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"filmovi");

	function unistiPodatke(){
		unset($_SESSION['id_izmjeni']);
		unset($_SESSION['promjena']);
		unset($_SESSION['kontent']);
		unset($_SESSION['ime_filma']);
		unset($_SESSION['zanr_filma']);
		unset($_SESSION['ocjena_filma']);
		unset($_SESSION['sadrzaj']);
		unset($_SESSION['slika']);
	
	}
	$id = $_SESSION["id_izmjeni"];
	if(isset($_POST['Da'])){
		$ime_filma = $_SESSION['ime_filma'];
		$zanr_filma = $_SESSION['zanr_filma'];
		$ocjena = $_SESSION['ocjena_filma'];
		$sadrzaj = $_SESSION['sadrzaj'];
		$slika = $_SESSION['slika'];

		$upit = "UPDATE slike SET ime_filma='$ime_filma', zanr_filma='$zanr_filma', ocjena='$ocjena', sadrzaj='$sadrzaj', slika = '$slika' WHERE id='$id'";
		$output = mysqli_query($conn,$upit);
		echo $output;
		unistiPodatke();
		header("location:prikazi_filmove.php");
		
	}
	if (isset($_POST['Ne'])){
		unlink("slike/".$_SESSION['slika']);
		unistiPodatke();
		header("location:prikazi_filmove.php");
	}


?>
<!doctype html>
<html lang="en">
  <head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@200;400;800&family=Unica+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="./style/areUSure.css">
  </head>
  <body>
  <div> <h1>Da li ste sigurni da zelite da izmjenite film pod rednim brojem# <?php echo $id;?> </h1>
	<form action="izmjena.php" method="POST">
		<button type="submit" name="Da"> Da </button>
		<button type="submit" name="Ne"> Ne </button>
	</form></div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>