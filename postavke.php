<?php session_start(); ?>
<html>
<head>
	<title>Drustvena</title>
	<style>
	::-webkit-scrollbar 
	{
			width: 8px;
			height: 7px;
			cursor: pointer;
	}
	::-webkit-scrollbar-track 
	{
			background-color: #737E94;
	}
	::-webkit-scrollbar-thumb 
	{
			background-color: #333;
	}
	#navig
	{
		top: 0px;
		left: 0;
		position: fixed;
		width: 100%;
	}
	#navig ul 
	{
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}
	#navig li 
	{
		float: left;
		border-right:1px solid #bbb;
	}
	#navig li:last-child 
	{
		border-right: none;
	}
	#navig li a 
	{
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	#navig li a:hover:not(.active) 
	{
		background-color: #111;
	}
	.active 
	{
		background-color: #2e6cb7;
	}
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
	#trazi img
	{
		height: 44px;
		width: 45px;
		margin: -13px;
	}
	#trazi input[type=text] 
	{
		margin-bottom: -3px;
	}
	#postavke img
	{
		height: 44px;
		width: 45px;
		margin: -13px;
	}
	#foot
	{
		color: white;
		background-color: #333;
		float: left;
		width: 100%;
		height: 30px;
		left: 0;
		bottom: 0;
		text-align: center;
		position: fixed;
	}
	#foot footer
	{
		width: 100%;
		height: 25px;
		bottom: 0;
		position: fixed;
	}
	#main
	{
		background-color: #333;
		margin-top: 74px;
		width: 435px;
		border: 2px solid #fff;
		border-radius: 20px;
	}
	#main input
	{
		margin-top: 12px;
		margin-bottom: 10px;
	}
	#main select
	{
		margin-top: 12px;
		margin-bottom: 10px;
	}
	</style>
</head>
<body>

<center>
<div id="navig">
<ul>
  <?php
	include("connect_db.php");
	echo "<li><a href='index.php'>Pocetna</a></li>";
	if(isset($_SESSION["ID"]))
	{
		$kora=$_SESSION["ID"];
		echo "<li><a href='profil.php?ID=$kora'>Profil</a></li>";
	}
	else
	{
		echo "<li><a href='index.php'>Profil</a></li>";
	}
	if(isset($_SESSION["ID"]))
	{
		echo "<li><a href='prijatelji.php'>Prijatelji</a></li>";
	}
	else
	{
		echo "<li><a href='index.php'>Prijatelji</a></li>";
	}
	if(isset($_SESSION["ID"]))
	{
		$rezultat = mysqli_query($conn,"SELECT * FROM poruke WHERE Primatelj={$_SESSION['ID']}") or die("<br/><br/>".mysql_error());
		$count=0;
		while($redak = mysqli_fetch_array($rezultat))
		{
			if($redak["Novo"] == 1)
			{
				$count++;
			}
		}
		echo "<li><a href='poruke.php'>Poruke ($count)</a></li>";
	}
	else
	{
		echo "<li><a href='index.php'>Poruke</a></li>";
	}
	if(isset($_SESSION['login_user']))
	{
		echo "<li style='float:right'><a href='logout.php'>Odjavi se</a></li>";
		echo "<div id='postavke'><li style='float:right'><a class='active' href='postavke.php'><img src='slike/postavke.png'></a></li></div>";
		if(isset($_SESSION['Trazi']))
		{
			echo "<form action='trazio.php' method='POST'><div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=5'><img src='slike/search.png'></a></li></div>";
			echo "<div id='trazi'><li style='float:right'><a><input type='text' placeholder='Upisite ime ili prezime osobe' name='trazi'></a></li></div></form>";
			unset($_SESSION['Trazi']);
		}
		else
		{
			echo "<div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=5'><img src='slike/search.png'></a></li></div>";
		}
		echo "<li style='float:right'>";
		if( isset($_SESSION['Error']) )
		{
				echo "<font color='white'><a>";
				echo $_SESSION['Error'];
				echo "</a></font>";
				unset($_SESSION['Error']);
		}
		echo "</li>";
	}
  ?>
</ul>
</div>
<br />
<br />
<div id="main">
<font color='white'><h2>Postavke</h2></font>
<hr>
<?php
	$rezultat = mysqli_query($conn,"SELECT * FROM racuni WHERE ID={$_SESSION['ID']}") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		$ime = $redak["Ime"];
		$prezime = $redak["Prezime"];
		$email = $redak["Email"];
		$grad = $redak["Grad"];
		$drzava = $redak["Drzava"];
		$datum = $redak["Datum"];
		$spol = $redak["Spol"];
		echo "<form action='ppostavke.php' method='POST'>";
		echo "<font color='white'>";
		echo "Ime: <input type='text' value='$ime' name='ime'><hr>";
		echo "Prezime: <input type='text' value='$prezime' name='prezime'><hr>";
		echo "Email: <input type='text' value='$email' name='email'><hr>";
		echo "Nova sifra: <input type='password' name='lozinka'><hr>";
		echo "Ponovite sifru: <input type='password' name='plozinka'><hr>";
		echo "Datum rodjenja: <input type='date' name='datum' value='$datum'><hr>";
		echo "Spol:";
		echo "<select name='odabir'>";
		if($spol == 1 || $spol == 0)
		{
			echo "<option value='1'>Musko</option>";
			echo "<option value='2'>Zensko</option>";
		}
		else if($spol == 2)
		{
			echo "<option value='2'>Zensko</option>";
			echo "<option value='1'>Musko</option>";
		}
		echo "</select><hr>";
		echo "Grad: <input type='text' name='grad' value='$grad'><hr>";
		echo "Drzava: <input type='text' name='drzava' value='$drzava'><hr>";
		echo "Trenutna sifra: <input type='password' name='trenutna' placeholder='Obavezno prilikom promjene'><hr>";
		echo "<input type='submit' value='Spremi'>";
		echo "</font>";
		echo "</form>";
	}
?>
</div>
<div id="foot">
<footer>Design by #Sikora</footer>
</div>
</center>
</body>
</html>