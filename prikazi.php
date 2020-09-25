<?php 
        session_start();
	$id=$_POST['id'];
	$vrsta=$_POST["vrsta"];
	$prof=$_POST["prof"];
	$_SESSION["VidiKom$id"] = 1;
	if($vrsta == 1)
	{
		header("location: index.php#OdiDo$id");
	}
	else
	{
		header("location: profil.php?ID=$prof#OdiDo$id");
	}
?>
