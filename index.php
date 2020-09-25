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
		text-decoration:none;
		color: black;
	}
	#tabla a:hover
	{
		text-decoration: underline;
		color: black;
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
	li.dropdown 
	{
		display: inline-block;
	}
	.dropdown-content 
	{
		display: none;
		position: absolute;
		background-color: #333;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}
	.dropdown-content a 
	{
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
	}
	.dropdown-content a:hover {background-color: #f1f1f1}
	.dropdown:hover .dropdown-content 
	{
		display: block;
	}
	li.dropdowna 
	{
		display: inline-block;
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
	.dropdown-contenta
	{
		display: none;
		position: absolute;
		right: 1px;
		background-color: #333;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}
	.dropdown-contenta a 
	{
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
	}
	.dropdown-contenta a:hover {background-color: #f1f1f1}
	.dropdowna:hover .dropdown-contenta 
	{
		display: block;
	}
	#loga input[type=text],input[type=password]
	{
		margin-left: 3px;
		margin-top: 4px;
		border-radius: 8px;
		border: 2px solid #ccc;
		height: 30px;
	}
	#loga input[type=submit] 
	{
		width: 89%;
		background-color: #FFBC00;
		color: #fff;
		border: 2px solid #FFCB00;
		padding: 8px;
		font-size: 20px;
		cursor: pointer;
		border-radius: 5px;
		margin-top: 6px;
	}
	#loga input[type=submit]:hover
	{
		background-color: #f44336;
	}
	#loga input[placeholder] 
	{
		padding: 8px;
		font-size: 16px;
		width: 174px;
	}
	#loga input[type=text]:hover,input[type=password]:hover
	{
		background-color: gray;
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
	    float:left;
        width:94%;
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
	echo "<li><a class='active' href='index.php'>Pocetna</a></li>";
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
		echo "<div id='postavke'><li style='float:right'><a href='postavke.php'><img src='slike/postavke.png'></a></li></div>";
		if(isset($_SESSION['Trazi']))
		{
			echo "<form action='trazio.php' method='POST'><div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=1'><img src='slike/search.png'></a></li></div>";
			echo "<div id='trazi'><li style='float:right'><a><input type='text' placeholder='Upisite ime ili prezime osobe' name='trazi'></a></li></div></form>";
			unset($_SESSION['Trazi']);
		}
		else
		{
			echo "<div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=1'><img src='slike/search.png'></a></li></div>";
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
	else
	{
		echo "<div id = 'loga'>";
		echo "<li class='dropdowna' style='float:right'>";
		echo "<a class='dropbtn'>Prijavi se</a>";
		echo "<div class='dropdown-contenta'>";
		echo "<form action='logina.php' method='POST'>";
		echo "<a><input type='text' placeholder='Vas email' name='email'></a>";
		echo "<a><input type='password' placeholder='Vasa lozinka' name='lozinka'></a>";
		echo "<a><input type='submit' value='Logirajte se'></a>";
		echo "</form>";
		echo "</div>";
		echo "</li>";
		echo "<li class='dropdown' style='float:right'>";
		echo "<a class='dropbtn'>Registriraj se</a>";
		echo "<div class='dropdown-content'>";
		echo "<form action='registera.php' method='POST'>";
		echo "<a><input type='text' placeholder='Vase ime' name='ime'></a>";
		echo "<a><input type='text' placeholder='Vase prezime' name='prezime'></a>";
		echo "<a><input type='text' placeholder='Vas e-mail' name='email'></a>";
		echo "<a><input type='text' placeholder='Ponovite vas e-mail' name='pemail'></a>";
		echo "<a><input type='password' placeholder='Vasa lozinka' name='lozinka'></a>";
		echo "<a><input type='password' placeholder='Ponovite vasu lozinku' name='plozinka'></a>";
		echo "<a><input type='submit' value='Registrirajte se'></a>";
		echo "</form>";
		echo "</div>";
		echo "</li>";
		echo "</div>";
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
<br>
<br>
<h2>Pocetna</h2>
<form action='postaj.php' method='POST'>
<?php
if(isset($_SESSION['login_user']))
{
	echo "<textarea placeholder='Napisite vas status ovdje' name='status'></textarea>";
}
else
{
	echo "<textarea placeholder='Prvo se logirajte ili registrirajte' name='status' disabled></textarea>";
}
echo "<br>";
if(isset($_SESSION['login_user'])){
echo "<input type='submit' value='Objavi'>";
}
else
{
	echo "<input type='submit' value='Objavi' hidden>";
}
?>
</form>
</center>
<?php
$rezultat = mysqli_query($conn,"SELECT ID, Ime, Prezime, Tekst, Email, Korisnik, Lajkova
FROM post order by ID desc;") or die("<br/><br/>".mysql_error());
while($redak = mysqli_fetch_array($rezultat))
{
	$id=$redak["ID"];
	$ime = $redak["Ime"] . " " . $redak["Prezime"];
	$kor=$redak["Korisnik"];
	$lajk=$redak["Lajkova"];
	echo "<center>";
	echo "<div id='main'>";
	echo "<div id='tabla'>";
	echo "<table bgcolor=white width=960 id='Koment$id'>";
	if(isset($_SESSION["ID"]))
	{
		echo "<tr valign='top'><th align=left><a href='profil.php?ID=$kor'>";
	}
	else
	{
		echo "<tr valign='top'><th align=left><a href='index.php'>";
	}
	echo $ime;
	echo "</a></th>";
	echo "</tr>";
	echo "<tr valign='top' align=center><th colspan=2>";
	$tekst=$redak["Tekst"];
	echo htmlentities($tekst);
	echo "</th></tr>";
	echo "<tr><th colspan=2><hr></th></tr>";
	if(isset($_SESSION['login_user']))
	{
		if($_SESSION['login_user'] == $redak["Email"])
		{
			echo "<tr><th align='left'><a href='uredi.php?ID=$id'><input type ='button' value='Uredi'></a><a href='izbrisi.php?ID=$id'><input type ='button' value='Obrisi'></a> Sviđa mi se: $lajk</th></tr>";
		}
		else
		{
			if(isset($_SESSION["Post$id"]))
			{
				echo "<tr><form action='unlajkaj.php?ID=$id' method='POST'><th align='left'><input type ='submit' value='Ne sviđa mi se'><input type='hidden' name='vrsta' value='1'> Sviđa mi se: $lajk</th></form></tr>";
			}
			else
			{
				echo "<tr><form action='lajkaj.php?ID=$id' method='POST'><th align='left'><input type ='submit' value='Sviđa mi se'><input type='hidden' name='vrsta' value='1'> Sviđa mi se: $lajk</th></form></tr>";
			}
		}
	}
	if(isset($_SESSION['login_user']))
	{
		echo "<tr><form action='prikazi.php' method='POST'><th align='left'><div id='prikaz'><input type='submit' value='Prikazi komentare'><input type='hidden' name='id' value='$id'><input type='hidden' name='vrsta' value='1'></div></th></form></tr>";
		echo "<tr><form action='komentiraj.php' method='POST'><th colspan=2 align='left'><div id='prikaz'><input type='text' placeholder='Upisite vas komentar' name='koment'></div><div id='kposalji'><input type='submit' value='Posalji'><input type='hidden' name='id' value='$id'><input type='hidden' name='vrsta' value='1'></div></th></form></tr>";
		if(isset($_SESSION["VidiKom$id"]))
		{
			echo "<tr valign='top' align=left id='OdiDo$id'><th colspan=2>Komentari</th></tr>";
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
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</center>";
}
?>
<div id="foot">
<footer>Design by #Sikora</footer>
</div>
</body>
</html>