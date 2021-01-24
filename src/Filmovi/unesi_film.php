<?php
	$porukica = "";
    session_start();
	if(!isset($_SESSION['username'])){
		header('location:admin_login.php');
	}
	if(isset($_POST['submit'])){
		//put do slike mili
		$put = "slike/".basename($_FILES['image']['name']);
		
		//konekcija na bazu
		
		$database = mysqli_connect("localhost", "root", "");
		
		mysqli_select_db($database,"filmovi");
		
		//kupljenje podataka
		
		$slika = $_FILES['image']['name'];
		$ime_filma = $_POST['ime_filma'];
		$zanr_filma = $_POST['zanr_filma'];
		$ocjena_filma = $_POST['ocjena_filma'];
		// ovo je zbog specijalnih karaktera koji se mogu pojaviti u tekstu, MYSQL nece drugacije da primi tekst bez escape
		$sadrzaj = $database -> real_escape_string($_POST['text']);
		
		
		$kveri = "INSERT INTO slike (ime_filma, zanr_filma, ocjena, sadrzaj, slika) VALUES ('$ime_filma', '$zanr_filma', '$ocjena_filma', '$sadrzaj', '$slika')";
		
		mysqli_query($database, $kveri); //cuva podatke u bazu
		
		//prebacanje slike 
		
		if(move_uploaded_file($_FILES['image']['tmp_name'], $put)){
			$porukica = "Film uspjesno ucitan";
		}else{
			$porukica = "Postavljanje filma nije bilo uspjesno, provjerite da li ste unijeli sve potrebne podatke?";
			
		}
		
	}
?>
<!doctype html>
<html lang="en">
  <head>
	<title>Unos filma</title>
	<!-- Required meta tags -->
	<link rel="stylesheet" type="text/css" href="forma-stil.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="validacija_klijent.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
	<div id="content" class="container">
		<div id="error"></div>
		<form action="unesi_film.php" method="post" enctype="multipart/form-data" id="forma" name="form">
			<input type="hidden" name="size" value="1000000">
			<div>
				<label for="ime-filma"> Ime filma: </label>
				<input type="text" id="ime-filma" name="ime_filma" required>
			</div>
			<div>
				<label for="zanr-filma"> Zanr filma: </label>
				<input type="text" id="zanr-filma" name="zanr_filma" required>
			</div>
			<div>
				<label for="Ocjena-filma"> Ocjena filma: </label>
				<input type="number" id="ocjena-filma" name="ocjena_filma" required>
			</div>
			<div>
				<textarea name="text" cols="30" rows="4" placeholder="Unesite kratak sadrzaj filma.." required></textarea>
			</div>
			<div>  
				<input type="file" name="image" id="slika" multiple onchange="procesuirajfajl(this)" required>
			</div>
			<input type="submit" name="submit">
		</form>
	</div>
	
	<div style="margin:auto; text-align:center; margin-top:100px;">
		<a class="float-center" href="pocetna.php" style="font-size:30px; border-style:solid; border-radius:10px;"> Vrati se nazad </a>
	</div>

	<!-- Optional JavaScript -->
	<script> 
		function procesuirajfajl(fileInput){
			var form = document.getElementById("forma");
			var greska = document.getElementById("error");
			var fajl = fileInput.files;
			var validne_ekstenzije = ["jpeg","png","jpg"];
			var ime_fajla = fajl[0].name;
			var trenutna_ekstenzija = ime_fajla.substring(ime_fajla.lastIndexOf(".")+1);

			if (!validne_ekstenzije.includes(trenutna_ekstenzija)){
				greska.innerText = "Fajl koji ste izabrali nije validan format slike";
				document.getElementById("slika").value=null;
				return;
			}
			else{
				pass;
			}
		}
	
		var forma = document.getElementById("forma");
		var ime_filma = document.getElementById("ime-filma");
		var zanr_filma = document.getElementById("zanr-filma");
		var ocjena_filma = document.getElementById("ocjena-filma");
		var greska = document.getElementById("error");


		forma.addEventListener("submit", (e)=>{
			let greske = [];
			regex = /\d/;
			if (regex.test(zanr_filma.value))
			{
				greske.push("Zanr filma ne moze sadrzati broj!");
			}
			if (ocjena_filma.value>10 || ocjena_filma.value<1)
			{
				greske.push("Ocjena filma mora biti u rasponu izmedju 1 i 10");
			}
			if (greske.length>0)
			{
				e.preventDefault();
				greska.innerText = greske.join(", ")
				return False;
			}
			if(greske.length==0)
			{
				greska.innerText = "Uspijesno unijet film";
				return True;
			}
		})
		
			
	
		
	
		</script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
