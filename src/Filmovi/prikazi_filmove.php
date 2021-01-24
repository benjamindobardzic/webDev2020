<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:admin_login.php');
	}
    $database = mysqli_connect("localhost", "root", "");
    mysqli_select_db($database,"filmovi");
    $kveri = "SELECT * FROM slike";
	$output = mysqli_query($database, $kveri);
	
	$filmovi = array();
	
		while($row = mysqli_fetch_assoc($output)){
			$filmovi [] = $row; 
		}
	
	if(isset($_POST['delete'])){
		if(!isset($_POST['id']) || !is_numeric($_POST['id'])){
			die("Nevalidan id filma");
		}
		$_SESSION['id']=$_POST['id'];
		header("location:brisanje_filma.php");
		
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
  </head>
  <body>
	<table border="1">
		<thead>
			<tr>
				<th>Ime filma</th>
				<th>Zanr</th>
				<th>Ocjena</th>
				<th>Sadrzaj</th>
				<th>Slika</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($filmovi as $f){
				echo "<tr><td>".$f['ime_filma']."</td><td>".$f['zanr_filma']."</td><td>".$f['ocjena']."</td><td style=max-width:180px;max-height:200px><div style=width:180px;height:200px;overflow:auto>"
				.$f['sadrzaj']."</div></td><td> <img src="."'"."slike/".$f['slika']."'"."style=max-width:180px;max-height:200px/>".
				"<td style=padding:5px>
					<form action='prikazi_filmove.php' method='POST'>
						<input type='hidden' name='id' value="."'".$f['id']."'"."/>
						<button type='submit' name='delete'  style=width:150px;height:50px; vertical-align:middle> Obrisi </button>
					</form>
					</td></tr>";
			}
			?>
		</tbody>
	</table>
	
  
  
  
  
  
    <div style="margin:auto; text-align:center; margin-top:100px;">
		<a class="float-center" href="pocetna.php" style="font-size:30px; border-style:solid; border-radius:10px;"> Vrati se nazad </a>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>