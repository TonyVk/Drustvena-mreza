<?php session_start(); ?>
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
		width: 50%;
		height: auto;
	}
	#profilna img
	{
		margin-top: 8px;
		width: 220px;
		height: 147px;
		border-radius: 20px;
		border: 2px solid white;
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
	#okvir input
	{
		border: 2px solid #ccc;
		background-color: rgba(0, 0, 0, 0);
		color: white;
		margin-bottom: 8px;
	}
	#okvir input:hover
	{
		border-radius: 8px;
		border: 2px solid #ccc;
		background-color: rgba(0, 0, 0, 0);
		color: white;
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
	#okvir a
	{
		text-decoration:none;
		color: white;
	}
	#okvir a:hover
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
	#okvir 
	{
		width: 250px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.47), 0 6px 20px 0 rgba(0, 0, 0, 0.54);
		text-align: center;
		margin-top: 75px;
		margin-right: 46px;
		margin-bottom: 34px;
		float: left;
		margin-left: 11px;
	}
	#okvir img
	{
		height: 144px;
	}
	#tekst
	{
		padding: 10px;
		background-color: rgba(51, 51, 51, 0.63);
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
	echo "<li><a class='active' href='prijatelji.php'>Prijatelji</a></li>";
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
			echo "<form action='trazio.php' method='POST'><div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=3'><img src='slike/search.png'></a></li></div>";
			echo "<div id='trazi'><li style='float:right'><a><input type='text' placeholder='Upisite ime ili prezime osobe' name='trazi'></a></li></div></form>";
			unset($_SESSION['Trazi']);
		}
		else
		{
			echo "<div id='trazi'><li style='float:right'><a href='trazi.php?vrsta=3'><img src='slike/search.png'></a></li></div>";
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
<br>
<br>
<h2>Prijatelji</h2>
<?php
	$id=$_SESSION['ID'];
	$rezultat = mysqli_query($conn,"SELECT * FROM prijatelji WHERE ID={$_SESSION['ID']}") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		$ida=$redak["Korisnik"];
		$rezultata = mysqli_query($conn,"SELECT ID, Ime, Prezime, Profilna FROM racuni WHERE ID=$ida") or die("<br/><br/>".mysql_error());
		while($redaka = mysqli_fetch_array($rezultata))
		{
			$prof=$redaka["Profilna"];
			$ida=$redaka["ID"];
			$ime = $redaka["Ime"] . " " . $redaka["Prezime"];
			echo "<div id='okvir'>";
			echo "<img src='$prof' style='width:100%'>";
			echo "<div id='tekst'>";
			echo "<a href='profil.php?ID=$ida'><font size='6'>$ime</font></a>";
			echo "<p></p>";
			echo "<form action='makni.php' method='POST'>";
			echo "<input type='hidden' name='id' value='$ida'>";
			echo "<input type='hidden' name='vrsta' value='2'>";
			echo "<input type='submit' value='Obrisi iz prijatelja'>";
			echo "</form>";
			echo "</div>";
			echo "</div>";
		}
	}
?>
</center>
<div id="foot">
<footer>Design by #Sikora</footer>
</div>
</body>
