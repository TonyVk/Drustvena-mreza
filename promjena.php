<?php session_start(); ?>
<?php
		include("connect_db.php");
		$formati = array('png','jpg','jpeg','gif');
		$namn = $_FILES["file"]["name"];
		$value = explode(".", $namn);
		$ext = strtolower(array_pop($value));  
		$size = $_FILES["file"]["size"];
		$tmp = $_FILES["file"]["tmp_name"];

		if(!in_array($ext,$formati))
		{
			$_SESSION['Error'] = 'Tip fajla nije dozovljen! Dozvoljeni formati su <i>PNG</i>,<i>JPG</i>,<i>GIF</i>';
			header("Location: index.php");
			exit();
		}
		$name = time().'.'.$ext;
		if(move_uploaded_file($tmp,"slike/".$name))
		{
			$vrsta=$_POST["vrsta"];
			$lok="slike/".$name;
			if($vrsta==1)
			{
				mysqli_query($conn,"UPDATE racuni SET Cover='$lok' WHERE ID={$_SESSION['ID']}");
			}
			else
			{	
				mysqli_query($conn,"UPDATE racuni SET Profilna='$lok' WHERE ID={$_SESSION['ID']}");
			}
			$kora=$_SESSION["ID"];
			header("location: profil.php?ID=$kora");
			die();
		}
?>
