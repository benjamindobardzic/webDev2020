<?php
	session_start();
	//redirekcija za login stranicu
    $konekcija = mysqli_connect('localhost', 'root','');
	mysqli_select_db($konekcija,'filmovi');
	
	$ime = $_POST['username'];
	$pass = $_POST['password'];
	
	$query = "SELECT * FROM admin where name = '$ime' && password = '$pass'";
	
	$result = mysqli_query($konekcija, $query);
	
	$brojKorisnika = mysqli_num_rows($result);
	
	if ($brojKorisnika == 1){
		$_SESSION['username'] = $ime;
		header('location:pocetna.php');
	
	}else{
		header('location:admin_login.php?info=wrongCredentials');
	}







?>