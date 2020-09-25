<?php
        session_start();
        $vrsta=$_GET['vrsta'];
	$id=$_GET['ID'];
	$_SESSION["Trazi"] = 1;
	if($vrsta == 1)
	{
		header("location: index.php");
	}
	else if($vrsta == 2)
	{
		header("location: profil.php?ID=$id");
	}
	else if($vrsta == 3)
	{
		header("location: prijatelji.php");
	}
	else if($vrsta == 4)
	{
		header("location: poruke.php");
	}
	else if($vrsta == 5)
	{
		header("location: postavke.php");
	}
?>