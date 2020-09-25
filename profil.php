<?php 
session_start();
?>
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
		font-family: raleway;
		background-color: #333;
		margin-top: 140px;
		position: absolute;
		margin: auto;
		top: 175px;
		left: 0;
		right: 0;
		width: 972px;
		height: auto;
	}
	#profilna img
	{
		left: 330px;
		margin-top: -65px;
		width: 220px;
		height: 147px;
		border-radius: 20px;
		border: 2px solid white;
	}
	#profilna input
	{
		left: 0px;
		top: -96px;
		right: 0px;
		bottom: 0;
		margin: auto;
		width: 212px;
		border-radius: 20px;
		border: 0px solid white;
		position: absolute;
		height: 21px;
		background: rgba(21, 148, 217, 0);
	}
	#profilna input:hover
	{
		color: white;
		background: rgba(0, 0, 0, 0.6);
	}
	#cover img
	{
		float: left;
		height: 180px;
		width: 100%;
	}
	#cover input
	{
		left: 0px;
		top: -329px;
		right: 0px;
		bottom: 0;
		margin: auto;
		width: 212px;
		border-radius: 20px;
		border: 0px solid white;
		position: absolute;
		height: 21px;
		background: rgba(21, 148, 217, 0);
	}
	#cover input:hover
	{
		color: white;
		background: rgba(0, 0, 0, 0.6);
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
	#tabla 
	{
		float: left;
		border-radius: 5px;
		font-family: raleway;
		border: 1px solid #ccc;
		padding: 3px 3px 3px;
		margin-top: 25px;
		margin-bottom: 31px;
		background: rgba(21, 148, 217, 0.39);
		background-clip: padding-box;
	}
	#tabla th
	{
		padding-top: 5px;
		white-space: pre-wrap;
	}
	#tabla a
	{
		text-decoration: none;
		color: black;
	}
	#tabla a:hover
	{
		text-decoration: underline;
		color: black;
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
	#dodaj input
	{
		border: 2px solid #ccc;
		background-color: #333;
		color: white;
		margin-bottom: 8px;
	}
	#dodaj input:hover
	{
		border-radius: 8px;
		border: 2px solid #ccc;
		background-color: #333;
		color: white;
	}
	#maina
	{
		width: 972px;
		font-family:raleway;
		margin-top: 469px;
	}
	#poruk input
	{
		margin-top: -5px;
		margin-left: 624px;
		margin-bottom: -12px;
	}
	#poruk input[type=text]
	{
		margin-top: -126px;
		margin-left: 628px;
	}
	#poruk textarea
	{
		margin-top: -98px;
		margin-left: 618px;
		width: 259px;
		height: 87px;
		max-height: 87px;
		max-width: 259px;
		white-space: pre-wrap;
	}
	#cova input
	{
		top: -236px;
	}
	#cova input[type=file]
	{
		top: -279px;
		background-color: #333;
	}
	#profa input
	{
		top: -8px;
	}
	#profa input[type=file]
	{
		top: -49px;
		background-color: #333;
	}
	#prikaz input[type=submit] 
	{
		background:none;
		border:none; 
		padding:0;
		font-family:arial,sans-serif; /*input has OS specific font-family*/
		color:#069;
		cursor:pointer;
		font-size: 17;
	}
	#prikaz input[type=text] 
	{
		width:94%;
        float:left;
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
        transition: width 2s, height 2s, transform 2s;
	}
    #postavke img:hover
	{
		transform: rotate(180deg);
	}
    #postavke li a:hover:not(.active)
	{
		background-color: #333;
	}
	#omeni
	{
		margin-right: 557px;
		margin-top: -143px;
		height: 161px;
	}
	#omeni2
	{
		overflow: hidden;
		height: 28px;
		transition: height 2s;
	}
	#omeni2:hover
	{
		height: 120px;
		color:white;
	}
	form 
	{
		display: inline;
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
		echo "<li><a class='active' href='profil.php?ID=$kora'>Profil</a></li>";
	}
	else
	{
		echo "<li><a href='index.php'>Profil</a></li>";
	}
	echo "<li><a href='prijatelji.php'>Prijatelji</a></li>";
	
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
	if(isset($_SESSION['login_user']))
	{
		echo "<li style='float:right'><a href='logout.php'>Odjavi se</a></li>";
		echo "<div id='postavke'><li style='float:right'><a href='postavke.php'><img src='slike/postavke.png'></a></li></div>";
		if(isset($_SESSION['Trazi']))
		{
			$idaa=$_GET['ID'];
			echo "<form action='trazio.php' method='POST'><div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=2&ID=$idaa'><img src='slike/search.png'></a></li></div>";
			echo "<div id='trazi'><li style='float:right'><a><input type='text' placeholder='Upisite ime ili prezime osobe' name='trazi'></a></li></div></form>";
			unset($_SESSION['Trazi']);
		}
		else
		{
			$idaa=$_GET['ID'];
			echo "<div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=2&ID=$idaa'><img src='slike/search.png'></a></li></div>";
		}
	}
	else
	{
		echo "<li style='float:right'><a href='login.php'>Prijavi se</a></li>";
		echo "<li style='float:right'><a href='register.php'>Registriraj se</a></li>";
	}
  ?>
</ul>
</div>
<br />
<br />
<h2>Profil</h2>
<div id="main">
<div id="cover">
<?php
	$rezultat = mysqli_query($conn,"SELECT * FROM racuni WHERE ID={$_GET['ID']}") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		$cover=$redak["Cover"];
		echo "<img src='$cover'>";
	}
	if($_SESSION['ID'] == $_GET['ID'])
	{
		echo "<form action='promjeni.php' method='POST'>";
		echo "<br>";
		echo "<input type='hidden' name='vrsta' value='1'>";
		echo "<input type='submit' value='Promjenite naslovnu'>";
		echo "</form>";
		if(isset($_SESSION['Slika']))
		{
			if($_SESSION['Slika'] == 1)
			{
				echo "<div id='cova'>";
				echo "<form action='promjena.php' method='POST' enctype='multipart/form-data'>";
				echo "<input type='hidden' name='vrsta' value='1'>";
				echo "<input type='file' name='file' required='required' style='width:150px;' id='file'>";
				echo "<input type='submit'>";
				echo "</form>";
				echo "</div>";
				unset($_SESSION['Slika']);
			}
		}
	}
?>
</div>
<div id="profilna">
<?php
	$rezultat = mysqli_query($conn,"SELECT * FROM racuni WHERE ID={$_GET['ID']}") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		$prof=$redak["Profilna"];
		echo "<img src='$prof'>";
	}
	if($_SESSION['ID'] == $_GET['ID'])
	{
		echo "<form action='promjeni.php' method='POST'>";
		echo "<input type='hidden' name='vrsta' value='2'>";
		echo "<input type='submit' value='Promjenite profilnu'>";
		echo "</form>";
		if(isset($_SESSION['Slika']))
		{
			if($_SESSION['Slika'] == 2)
			{
				echo "<div id='profa'>";
				echo "<form action='promjena.php' method='POST' enctype='multipart/form-data'>";
				echo "<input type='hidden' name='vrsta' value='2'>";
				echo "<input type='file' name='file' required='required' style='width:150px;' id='file'>";
				echo "<input type='submit'>";
				echo "</form>";
				echo "</div>";
				unset($_SESSION['Slika']);
			}
		}
	}
?>
</div>
<?php
$rezultat = mysqli_query($conn,"SELECT * FROM racuni WHERE ID={$_GET['ID']}") or die("<br/><br/>".mysql_error());
while($redak = mysqli_fetch_array($rezultat))
{
	$ime=$redak["Ime"];
	$prezime=$redak["Prezime"];
	echo "<font size='6' color='white'>$ime $prezime</font>";
}
?>
<div id="dodaj">
<?php
	if($_SESSION['ID'] == $_GET['ID'])
	{
		echo "<input type='button' value='Vas profil' disabled>";
	}
	else
	{
		$rezultat = mysqli_query($conn,"SELECT * FROM prijatelji WHERE ID={$_SESSION['ID']}") or die("<br/><br/>".mysql_error());
		$prova=0;
		while($redak = mysqli_fetch_array($rezultat))
		{
			if($redak["Korisnik"]==$_GET["ID"])
			{
				echo "<form action='makni.php' method='POST'>";
				$ida=$_GET["ID"];
				echo "<input type='hidden' name='vrsta' value='1'>";
				echo "<input type='hidden' name='id' value='$ida'>";
				echo "<input type='submit' value='Obrisi iz prijatelja'><br>";
				echo "</form>";
				$prova=1;
			}
		}
		if($prova==0)
		{
			echo "<form action='dodaj.php' method='POST'>";
			$ida=$_GET["ID"];
			echo "<input type='hidden' name='id' value='$ida'>"; 
			echo "<input type='submit' value='Dodajte za prijatelja'><br>";
			echo "</form>";
		}
	}
	if($_SESSION['ID'] != $_GET['ID'])
	{
		echo "<form action='poruka.php' method='POST'>";
		$ida=$_GET["ID"];
		echo "<input type='submit' value='Posalji poruku'>";
		echo "<input type='hidden' name='id' value='$ida'>";
		echo "</form>";
		if(isset($_SESSION['Poruka']))
		{
				echo "<div id='poruk'>";
				echo "<form action='posalji.php' method='POST'>";
				echo "<input type='hidden' name='id' value='$ida'>";
				echo "<input type='hidden' name='vrsta' value='1'>";
				echo "<input type='text' name='naslov' placeholder='Naslov poruke' required='required'>";
				echo "<textarea name='tekst' required='required'></textarea>";
				echo "<input type='submit'>";
				echo "</form>";
				echo "</div>";
				unset($_SESSION['Poruka']);
		}
	}
	echo "<div id='omeni'>";
	$rezultat = mysqli_query($conn,"SELECT * FROM racuni WHERE ID={$_GET['ID']}") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		$datum=$redak["Datum"];
		$spol=$redak["Spol"];
		$sp="Nepoznato";
		$email=$redak["Email"];
		$grad=$redak["Grad"];
		$drzava=$redak["Drzava"];
		if(empty($grad))
		{
			$grad="Nepoznato";
		}
		if(empty($drzava))
		{
			$drzava="Nepoznato";
		}
		if(empty($datum))
		{
			$datum="Nepoznato";
		}
		if($spol == 1)
		{
			$sp="Musko";
		}
		else if($spol == 2)
		{
			$sp="Zensko";
		}
		echo "<div id='omeni2'>";
		echo "<font size='5' color='white'>O meni</font><br>";
		echo "<font color='white'>Datum rodjenja: $datum</font><br>";
		echo "<font color='white'>Spol: $sp</font><br>";
		echo "<font color='white'>Email: $email</font><br>";
		echo "<font color='white'>Grad: $grad</font><br>";
		echo "<font color='white'>Drzava: $drzava</font>";
		echo "</div>";
	}
	echo "</div>";
?>
</div>
</div>
<?php
$rezultat = mysqli_query($conn,"SELECT ID, Ime, Prezime, Tekst, Email, Korisnik, Lajkova
FROM post WHERE Korisnik={$_GET['ID']} order by ID desc;") or die("<br/><br/>".mysql_error());
while($redak = mysqli_fetch_array($rezultat))
{
			$ime = $redak["Ime"] . " " . $redak["Prezime"];
			$lajk=$redak["Lajkova"];
			$id=$redak["ID"];
			echo "<center>";
			echo "<div id='maina'>";
			echo "<div id='tabla'>";
			echo "<table bgcolor=white width=960 id='Koment$id'>";
			echo "<tr valign='top'><th align=left>";
			echo $ime;
			echo "</th>";
			echo "</tr>";
			echo "<tr valign='top' align=center><th colspan=2>";
			$tekst=$redak["Tekst"];
			echo htmlentities($tekst);
			echo "</th></tr>";
			echo "<tr><th colspan=2><hr></th></tr>";
			$korisn=$redak["Korisnik"];
			if(isset($_SESSION['login_user']))
			{
				if($_SESSION['login_user'] == $redak["Email"])
				{
					$id=$redak["ID"];
					echo "<tr><th align='left'><a href='uredi.php?ID=$id'><input type ='button' value='Uredi'></a><a href='izbrisi.php?ID=$id'><input type ='button' value='Obrisi'></a> Sviđa mi se: $lajk</th></tr>";
				}
				else
				{
					if(isset($_SESSION["Post$id"]))
					{
						echo "<tr><form action='unlajkaj.php?ID=$id' method='POST'><th align='left'><input type ='submit' value='Ne sviđa mi se'><input type='hidden' name='vrsta' value='2'><input type='hidden' name='Kor' value='$korisn'> Sviđa mi se: $lajk</th></form></tr>";
					}
					else
					{
						echo "<tr><form action='lajkaj.php?ID=$id' method='POST'><th align='left'><input type ='submit' value='Sviđa mi se'><input type='hidden' name='vrsta' value='2'><input type='hidden' name='Kor' value='$korisn'> Sviđa mi se: $lajk</th></form></tr>";
					}
				}
			}
	
			echo "<tr><form action='prikazi.php' method='POST'><th align='left'><div id='prikaz'><input type='submit' value='Prikazi komentare'><input type='hidden' name='id' value='$id'><input type='hidden' name='vrsta' value='2'><input type='hidden' name='prof' value='$korisn'></div></th></form></tr>";
			echo "<tr><form action='komentiraj.php' method='POST'><th colspan=2><div id='prikaz'><input type='text' placeholder='Upisite vas komentar' name='koment'></div><div id='kposalji'><input type='submit' value='Posalji'><input type='hidden' name='id' value='$id'><input type='hidden' name='vrsta' value='2'><input type='hidden' name='prof' value='$korisn'></div></th></form></tr>";
			if(isset($_SESSION["VidiKom$id"]))
			{
				echo "<tr valign='top' align=left><th colspan=2 id='OdiDo$id'>Komentari</th></tr>";
				echo "<tr><th colspan=2><hr></th></tr>";
				$rezultata = mysqli_query($conn,"SELECT * FROM komentari WHERE Post='$id' order by ID desc;");
				$rows = mysqli_num_rows($rezultata);
				if($rows == 0)
				{
					echo "<tr valign='top' align=left><th colspan=2>";
					echo "Nema komentara";
					echo "</th></tr>";
				}
				else
				{
					while($redaka = mysqli_fetch_array($rezultata))
					{
						$koris=$redaka["Korisnik"];
						$rezultataa = mysqli_query($conn,"SELECT * FROM racuni WHERE ID='$koris'");
						while($redakaa = mysqli_fetch_array($rezultataa))
						{
							echo "<tr valign='top' align=left><th colspan=2><a href='profil.php?ID=$koris'>";
							echo $redakaa["Ime"] . " " . $redakaa["Prezime"];
							echo "</a></th></tr>";
						}
						echo "<tr valign='top' align=left><th colspan=2>";
						echo htmlentities($redaka["Tekst"]);
						echo "</th></tr>";
						echo "<tr><th colspan=2><hr></th></tr>";
					}
				}
				unset($_SESSION["VidiKom$id"]);
			}
			echo "</table>";
			echo "</div>";
			echo "</div>";
			echo "</center>";
}
?>
</center>
<div id="foot">
<footer>Design by #Sikora</footer>
</div>
</body>
</html>