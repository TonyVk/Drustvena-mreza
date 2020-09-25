<?php session_start(); ?>
<html>
<head>
	<title>Drustvena</title>
	<style>
	body
	{
		background-image: url("slike/background.jpg");
		background-repeat: no-repeat;
		background-position: center; 
		background-size: cover;
	}
	body textarea
	{
		margin-top: 4px;
		border-radius: 8px;
		border: 2px solid #ccc;
		height: 100px;
		width: 500px;
		max-height: 100px;
		max-width: 500px;
	}
	#main 
	{
		width: 972px;
		font-family:raleway
	}
	#tabla 
	{
		float: left;
		border-radius: 5px;
		font-family: raleway;
		border: 1px solid #ccc;
		padding: 3px 3px 3px;
		margin-top: 62px;
		background: rgba(21, 148, 217, 0.39);
		background-clip: padding-box;
	}
	#tabla th
	{
		padding-top: 5px;
	}
	</style>
</head>
<body>

<center>
<h2>Pocetna</h2>
<form action='postaj.php' method='POST'>
<?php
include("connect_db.php");
if(isset($_SESSION['login_user'])){
	echo "<textarea placeholder='Napisite vas status ovdje' name='status' disabled></textarea>";
}
else
{
	echo "<textarea placeholder='Prvo se logirajte ili registrirajte' name='status' disabled></textarea>";
}
echo "<br>";
if(isset($_SESSION['login_user'])){
echo "<input type='submit' value='Objavi' hidden>";
}
else
{
	echo "<input type='submit' value='Objavi' hidden>";
}
?>
</form>
</center>
<?php
$rezultat = mysqli_query($conn, "SELECT * FROM post where ID={$_GET['ID']} LIMIT 1");
while($redak = mysqli_fetch_assoc($rezultat))
{
	echo "<form action='uredio.php' method='POST'>";
	echo "<input type='hidden' name='id' value='"; 
	echo $redak["ID"];
	echo "'>";
	$ime = $redak["Ime"] . " " . $redak["Prezime"];
	echo "<center>";
	echo "<div id='main'>";
	echo "<div id='tabla'>";
	echo "<table bgcolor=white width=960>";
	echo "<tr valign='top'><th align=left>";
	echo $ime;
	echo "</th>";
	echo "</tr>";
	echo "<tr valign='top' align=center><th colspan=2><textarea name='tekst'>";
	echo $redak["Tekst"];
	echo "</textarea></th></tr>";
	echo "<tr><th colspan=2><hr></th></tr>";
	if(isset($_SESSION['login_user']))
	{
		if($_SESSION['login_user'] == $redak["Email"])
		{
			echo "<tr><th align='left'><input type ='submit' value='Uredi'></th></tr>";
		}
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</center>";
	echo "</form>";
}
?>
</body>
</html>