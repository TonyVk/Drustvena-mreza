<?php 
session_start();
include("connect_db.php");
$tekst = $_POST["status"];
if (empty($tekst)) 
{
	$_SESSION['Error'] = "Niste unjeli nikakav tekst!";
	header("location: index.php");
	return 1;
}
$ime=$_SESSION['login_ime'];
$prezime=$_SESSION['login_prezime'];
$email=$_SESSION['login_user'];
$ida=$_SESSION['ID'];
$upis = mysqli_query($conn,"INSERT INTO post(Ime, Prezime, Tekst, Email, Korisnik, Lajkova) VALUES ('$ime', '$prezime', '$tekst', '$email', '$ida', '0')");
header("location: index.php");
?>