<?php session_start(); ?>
<?php
	include("connect_db.php");
	$ida=$_GET['ID'];
	$vrsta=$_POST['vrsta'];
	$kor=$_POST['Kor'];
    mysqli_query($conn,"DELETE FROM lajkovi WHERE Post=$ida");
	$rezultat = mysqli_query($conn,"SELECT Lajkova FROM post WHERE ID=$ida") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		$lajk=$redak["Lajkova"]-1;
		mysqli_query($conn,"UPDATE post SET Lajkova='$lajk' where ID='$ida'");
	}
	unset($_SESSION["Post$ida"]);
	if($vrsta == 1)
	{
		header("location: index.php#Koment$ida");
	}
	else
	{
		header("location: profil.php?ID=$kor#Koment$ida");
	}
?>
