<?php

    session_start();
	if(!isset($_SESSION['username'])){
		header('location:admin_login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocetna strana</title>
	<link rel="stylesheet" type="text/css" href="stil.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="pocetna.css">
</head>
<body>
    <div class="container">
        <a class="float-right" href='logout.php'> LOGOUT </a>
        <h1> DOBRODOSLI NA VASU POCETNU STRANU  <?php echo $_SESSION['username']; ?> </h1>
    </div>
	<div style="margin:auto; text-align:center; margin-top:100px;">
		<a class="float-center" href="Unesi_film.php" style="font-size:30px; border-style:solid; border-radius:10px;"> Unesite novi film </a>
	</div>
	<div style="margin:auto; text-align:center; margin-top:100px;">
		<a class="float-center" href="./prikazi_filmove.php" style="font-size:30px; border-style:solid; border-radius:10px;"> Svi filmovi </a>
	</div>
	
</body>
</html>