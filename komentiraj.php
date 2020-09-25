<?php session_start(); ?>
<?php
			include("connect_db.php");
			$tekst=$_POST["koment"];
			$id=$_SESSION["ID"];
			$ida=$_POST["id"];
			$vrsta=$_POST["vrsta"];
			$prof=$_POST["prof"];
			if (empty($tekst)) 
			{
				$_SESSION['Error'] = "Niste unjeli nikakav tekst!";
				if($vrsta == 1)
				{
					header("location: index.php#Koment$ida");
				}
				else
				{
					header("location: profil.php?ID=$prof#Koment$ida");
				}
				return 1;
			}
			mysqli_query($conn,"INSERT INTO komentari(Post, Korisnik, Tekst) VALUES ('$ida', '$id', '$tekst')");
			if($vrsta == 1)
			{
				header("location: index.php#Koment$ida");
			}
			else
			{
				header("location: profil.php?ID=$prof#Koment$ida");
			}
?>
