<?php
			include("connect_db.php");
			session_start();
			$tekst=$_POST["tekst"];
			$id=$_SESSION["ID"];
			$ida=$_POST["id"];
			$vrsta=$_POST["vrsta"];
			$naslov=$_POST["naslov"];
			mysqli_query($conn,"INSERT INTO poruke(Posiljatelj, Primatelj, Tekst, Naslov, Novo) VALUES ('$id', '$ida', '$tekst', '$naslov', '1')");
			if($vrsta == 1)
			{
				header("location: profil.php?ID=$ida");
			}
			else
			{
				header("location: poruke.php");
			}
?>
