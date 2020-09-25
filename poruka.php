<?php 
        session_start();
	$vrsta=$_POST["vrsta"];
	$id=$_POST['id'];
	$_SESSION["Poruka"] = 1;
	header("location: profil.php?ID=$id");
?>