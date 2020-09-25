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
	#poruke
	{
		background-color: #333;
		height: 40px;
		margin-bottom: 20px;
		width: 960px;
		overflow: hidden;
		transition: height 2s;
	}
	#poruke:hover
	{
		height: 190px;
	}
	#poruke font
	{
		top: 6px;
		color: white;
		margin-left: 10px;
	}
	#poruke input
	{
		float: right;
        margin-top: -6px;
        margin-right: 60px;
        margin-left: -149px;
	}
	#brisi img
	{
		margin-top: -19px;
		margin-right: -134px;
		max-height: 12px;
	}
	#poruke img
	{
		height: 45px;
        left: 0;
        float: right;
        margin-top: -21px;
        margin-left: -45px;
		margin-right: 0px;
	}
	#tabla
	{
		top: 10px;
		position: relative;
	}
	#tabla textarea
	{
		width: 960px;
		max-width: 960px;
		height: 60px;
		max-height: 60px;
	}
	#tabla input
	{
		position: relative;
		right: 387px;
		top: 11px;
	}
	#poruke a
	{
		text-decoration:none;
		color: white;
		top: 9px;
		position: sticky;
	}
	#poruke a:hover
	{
		text-decoration: underline;
		color: white;
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
		echo "<li><a class='active' href='poruke.php'>Poruke ($count)</a></li>";
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
			echo "<form action='trazio.php' method='POST'><div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=4'><img src='slike/search.png'></a></li></div>";
			echo "<div id='trazi'><li style='float:right'><a><input type='text' placeholder='Upisite ime ili prezime osobe' name='trazi'></a></li></div></form>";
			unset($_SESSION['Trazi']);
		}
		else
		{
			echo "<div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=4'><img src='slike/search.png'></a></li></div>";
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
<br>
<br>
<h2>Poruke</h2>
<?php
	$rezultat = mysqli_query($conn,"SELECT * FROM poruke WHERE Primatelj={$_SESSION['ID']} order by ID desc;") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		$rezultata = mysqli_query($conn,"SELECT ID, Ime, Prezime FROM racuni WHERE ID={$redak["Posiljatelj"]}") or die("<br/><br/>".mysql_error());
		while($redaka = mysqli_fetch_array($rezultata))
		{
			$ida=$redak["ID"];
			$kor=$redaka["ID"];
			echo "<div id='poruke'><font size='4' id='Poruka$ida'><a href='profil.php?ID=$kor'>";
			echo $redaka["Ime"]." ";
			echo $redaka["Prezime"]."</a>";
			$nov=$redak["Novo"];
			echo "<div id='brisi'><a href='obrisi.php?ID=$ida'><img src='slike/obrisi.png'></a></div>";
            if($nov == 1)
			{
				echo "<img src='slike/new.png'>";
				mysqli_query($conn,"UPDATE poruke SET Novo='0' where ID='$ida'");
			}
			echo "</font><br>";
			echo "<font size='4'>";
			echo $redak["Naslov"];
			echo "</font>";
			echo "<form action='posalji.php' method='POST'>";
			echo "<div id='tabla'>";
			echo "<table bgcolor=white width=960>";
			echo "<tr valign='top' align=center><th>";
			echo $redak["Tekst"];
			echo "</th></tr></table>";
			$id=$redak["Posiljatelj"];
			$naslov=$redak["Naslov"];
			echo "<textarea placeholder='Upisite vas odgovor' name='tekst'></textarea><br>";
			echo "<input type='hidden' name='vrsta' value='2'>";
			echo "<input type='hidden' name='id' value='$id'>";
			echo "<input type='hidden' name='naslov' value='$naslov'>";
			echo "<input type='submit' value='Posalji'>";
			echo "</div>";
			echo "</form>";
			echo "</div>";
		}
	}
?>

<div id="foot">
<footer>Design by #Sikora</footer>
</div>
</center>
</body>
</html>