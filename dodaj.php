<?php session_start(); ?>
<?php
	include("connect_db.php");
	$id=$_SESSION['ID'];
	$ida=$_POST['id'];
    $result = mysqli_query($conn,"INSERT INTO prijatelji(ID, Korisnik) VALUES ('$id', '$ida')");
	header("location: profil.php?ID=$ida");
?>
