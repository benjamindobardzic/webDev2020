<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:admin_login.php");
	}
	DEFINE("SERVER","localhost");
	DEFINE("USERNAME","root");
	DEFINE("PASSWORD","");
	DEFINE("DATABASE","filmovi");
	
	$conn = mysqli_connect(SERVER,USERNAME,PASSWORD) or die("Greska u uspostavljanju konekcije");
	
	mysqli_select_db($conn,DATABASE) or die ("Greska prilikom ucitavanja filmova");
	
	$id_izmjeni = $_SESSION['id_izmjeni'];
	
	$kveri = "SELECT * FROM slike WHERE id = $id_izmjeni";
	
	$output = mysqli_query($conn,$kveri);
	// posto ce uvijek biti jedan rezultat za jedan id, samo jedan film, sam output ce imati samo jedan red
	
	$film= mysqli_fetch_assoc($output);
	
	
	
	// forma generise post zahtjev za izmjenu i radi izmjenu
	if(isset($_POST['izmjeni'])){
		if(!isset($_SESSION['id_izmjeni'])|| !is_numeric($_SESSION['id_izmjeni'])){
				die("Nesto se ujebalo");
		}
		$_SESSION['ime_filma'] = $_POST['ime_filma'];
		$_SESSION['zanr_filma'] = $_POST['zanr_filma'];
		$_SESSION['ocjena_filma'] = $_POST['ocjena_filma'];
		$_SESSION['sadrzaj'] = $conn -> real_escape_string($_POST['text']);
		if($_FILES['image']['name']==""){
			$_SESSION['slika'] = $film['slika'];
			header("location:izmjena.php");
		}
		else{
			$put = "slike/".basename($_FILES['image']['name']);
			if(move_uploaded_file($_FILES['image']['tmp_name'],$put)){
				$_SESSION['slika'] = $_FILES['image']['name'];
				header("location:izmjena.php");
			}
			else{
				die("Greska");

			}
		}
		
		
	}

	mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Izmjena</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     	<div id="content" class="container">
		<div id="error" style="color:red"></div>
		<form action="izmjeni_film.php" method="post" enctype="multipart/form-data" id="forma" name="form">
			<input type="hidden" name="size" value="1000000">
			<div>
				<label for="ime-filma"> Ime filma: </label>
				<input type="text" id="ime-filma" name="ime_filma" value="<?php  echo $film['ime_filma']?>" required>
			</div>
			<div>
				<label for="zanr-filma"> Zanr filma: </label>
				<!--<input type="text" id="zanr-filma" name="zanr_filma" value= ""required>-->
				<select name="zanr_filma" id="zanr-filma">
					<option value = "Akcioni"<?php if($film['zanr_filma']=="Akcioni"){echo 'selected="selected"';}?>>Akcioni</option>
					<option value = "Ljubavni"<?php if($film['zanr_filma']=="Ljubavni"){echo 'selected="selected"';}?>>Ljubavni</option>
					<option value = "Komedija"<?php if($film['zanr_filma']=="Komedija"){echo 'selected="selected"';}?>>Komedija</option>
					<option value = "Triler"<?php if($film['zanr_filma']=="Triler"){echo 'selected="selected"';}?>>Triler</option>
					<option value = "Drama"<?php if($film['zanr_filma']=="Drama"){echo 'selected="selected"';}?>>Drama</option>
					<option value = "Dokumentarac"<?php if($film['zanr_filma']=="Dokumentarac"){echo 'selected="selected"';}?>>Dokumentarac</option>
					<option value = "Fantastika"<?php if($film['zanr_filma']=="Fantastika"){echo 'selected="selected"';}?>>Fantastika</option>
					<option value = "Psiholoski"<?php if($film['zanr_filma']=="Psiholoski"){echo 'selected="selected"';}?>>Psiholoski</option>
				</select>
			</div>
			<div>
				<label for="Ocjena-filma"> Ocjena filma: </label>
				<input type="number" id="ocjena-filma" name="ocjena_filma" value= "<?php echo $film['ocjena']?>" required>
			</div>
			<div>
				<textarea name="text" cols="30" rows="4" placeholder="Unesite kratak sadrzaj filma.."required><?php echo $film['sadrzaj']?></textarea>
			</div>
			<div>
				<div>
				<img id="slicica" src="slike/<?php echo $film['slika']?>" style="width:180px; height:200px">
				</div>
				<input type="file" name="image" id="slika" multiple onchange="procesuirajfajl(this)">
			</div>
			<input type="submit" name="izmjeni" value="Izmjeni">
		</form>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script>
		function procesuirajfajl(fileInput){
			//odje zelimo i da se vidi slika kad se ubaci da vidimo o kojoj slici se radi
			var form = document.getElementById("forma");
			var greska = document.getElementById("error");
			var fajl = fileInput.files;
			var validne_ekstenzije = ["jpeg","png","jpg"];
			var ime_fajla = fajl[0].name;
			var trenutna_ekstenzija = ime_fajla.substring(ime_fajla.lastIndexOf(".")+1);

			if (!validne_ekstenzije.includes(trenutna_ekstenzija)){
				greska.innerText = "Fajl koji ste izabrali nije validan format slike!";
				document.getElementById("slika").value=null;
				return;
			}
			else{
				var slika = document.querySelector("img");
				slika.src = URL.createObjectURL(fileInput.files[0]);
				slika.onload = () => {
                    URL.revokeObjectUrl(slika.src);
                }
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>