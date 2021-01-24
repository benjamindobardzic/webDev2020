<html>
<head>
	<title> Brisanje filma </title>
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

<div> Da li ste sigurni da zelite da obrisete pod pod id brojem # <?php echo $film;?></div>
<form action="brisanje_filma.php" method="POST">
	<button type="submit" name="delete"> Da </button>
	<button type="submit" name="odustajem"> Ne </button>
</form>

</body>
</html>