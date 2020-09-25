<?php 
        session_start();
	$id=$_SESSION['ID'];
	$ida=$_POST['id'];
	$vrsta=$_POST['vrsta'];
	include("connect_db.php");
	$rezultat = mysqli_query($conn,"DELETE FROM prijatelji WHERE ID=$id AND Korisnik={$_POST['id']} LIMIT 1") or die("<br/><br/>".mysql_error());
	if($vrsta == 1)
	{
		header("location: profil.php?ID=$ida");
	}
	else
	{
		header("location: prijatelji.php");
	}
?>