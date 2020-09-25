<?php 
session_start();
$vrsta=$_POST["vrsta"];
if($vrsta == 1)
{
$id=$_SESSION['ID'];
$_SESSION["Slika"] = 1;
header("location: profil.php?ID=$id");
}
else
{
$id=$_SESSION['ID'];
$_SESSION["Slika"] = 2;
header("location: profil.php?ID=$id");
}
?>