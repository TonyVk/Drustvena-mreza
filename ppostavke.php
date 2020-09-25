<?php
	session_start();
	include("connect_db.php");
	$rezultat = mysqli_query($conn,"SELECT * FROM racuni WHERE ID={$_SESSION['ID']}") or die("<br/><br/>".mysql_error());
	while($redak = mysqli_fetch_array($rezultat))
	{
		if($redak["Lozinka"] == $_POST["trenutna"])
		{
			if(!empty($_POST['lozinka']))
			{
				if($_POST["lozinka"] != $_POST["plozinka"])
				{
					$_SESSION['Error'] = "Nova sifra se ne podudara sa ponovitom!";
					header("location: postavke.php");
					return 1;
				}
				else
				{
					mysqli_query($conn,"UPDATE racuni SET Lozinka='$_POST[lozinka]' where ID='$_SESSION[ID]'");
				}
			}
			if(!empty($_POST['datum']))
			{
				mysqli_query($conn,"UPDATE racuni SET Datum='$_POST[datum]' where ID='$_SESSION[ID]'");
			}
			if(!empty($_POST['grad']))
			{
				mysqli_query($conn,"UPDATE racuni SET Grad='$_POST[grad]' where ID='$_SESSION[ID]'");
			}
			if(!empty($_POST['drzava']))
			{
				mysqli_query($conn,"UPDATE racuni SET Drzava='$_POST[drzava]' where ID='$_SESSION[ID]'");
			}
			if(empty($_POST['ime']))
			{
				$_SESSION['Error'] = "Ime ne moze ostati prazno!";
				header("location: postavke.php");
				return 1;
			}
			if(empty($_POST['prezime']))
			{
				$_SESSION['Error'] = "Prezime ne moze ostati prazno!";
				header("location: postavke.php");
				return 1;
			}
			if(empty($_POST['email']))
			{
				$_SESSION['Error'] = "Email ne moze ostati prazan!";
				header("location: postavke.php");
				return 1;
			}
			mysqli_query($conn,"UPDATE racuni SET Ime='$_POST[ime]', Prezime='$_POST[prezime]', Email='$_POST[email]', Spol='$_POST[odabir]' where ID='$_SESSION[ID]'");
			header("location: postavke.php");
		}
		else
		{
			$_SESSION['Error'] = "Trenutna sifra se ne podudara sa vasom pravom sifrom!";
			header("location: postavke.php");
			return 1;
		}
	}
	header("location: postavke.php");
?>
