<?php

session_start();
if (!isset($_SESSION['username'])) {
	header('location:admin_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pocetna strana</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./style/dashboardHome.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@200;400;800&family=Unica+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>

<body>
	<div class="container">
		<div class="logout">
			<i class="fas fa-sign-out-alt"></i>
			<a href='logout.php'>Logout</a>
		</div>


		<h1> Dobrodošli nazad <span style="color: #FFBA49;"><?php echo $_SESSION['username']; ?></span>. </h1>
		<h3 class="text'center">Šta možemo da učinimo za vas danas?</h3>
	</div>
	<div class="buttons">
		<a href="Unesi_film.php"> Unesi novi film </a>
		<a href="./prikazi_filmove.php"> Pokaži mi sve filmove</a>
	</div>

</body>

</html>