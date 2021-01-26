<html>
<head>
	<title> Brisanje filma </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@200;400;800&family=Unica+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="./style/areUSure.css">
<head>
<body>
<?php
	session_start();
	$database = mysqli_connect("localhost", "root", "");
    mysqli_select_db($database,"filmovi");
	
	if (isset($_POST['delete'])){
		
		$id = $_SESSION['id'];
		
		$upit = "DELETE FROM slike WHERE id = $id";
		
		mysqli_query($database,$upit);
		
		mysqli_close($database);
		
		echo "Uspjesno ste obrisali film";
		header ("location:prikazi_filmove.php");
	}
	$film = $_SESSION['id'];
?>

<div> <h1>Da li ste sigurni da zelite da obrisete pod pod id brojem # <?php echo $film;?></h1> 
<form action="brisanje_filma.php" method="POST">
	<button type="submit" name="delete"> Da </button>
	<a class="button" href="../Filmovi/prikazi_filmove.php">Ne</a>
</form></div>

</body>
</html>