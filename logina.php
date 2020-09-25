<?php session_start(); ?>
<?php
include("connect_db.php");
if (empty($_POST['email']) || empty($_POST['lozinka'])) 
{
	$_SESSION['Error'] = "Niste unjeli sve potrebne podatke!";
	header("location: index.php");
	return 1;
}
else
{
$email = $_POST["email"];
$lozinka = $_POST["lozinka"];
$query = mysqli_query($conn,"select * from racuni where Email='$email' AND Lozinka='$lozinka'");
$rows = mysqli_num_rows($query);
if ($rows == 1) 
{
	$_SESSION['login_user']=$email;
	while($redak = mysqli_fetch_array($query))
	{
		$_SESSION['login_ime']=$redak["Ime"];
		$_SESSION['login_prezime']=$redak["Prezime"];
		$_SESSION['ID']=$redak["ID"];
	}
	$rezultata = mysqli_query($conn,"SELECT * FROM lajkovi") or die("<br/><br/>".mysql_error());
	while($redaka = mysqli_fetch_array($rezultata))
	{
		if($redaka["Korisnik"] == $_SESSION['ID'])
		{
			$ida=$redaka["Post"];
			$_SESSION["Post$ida"] = 1;
		}
	}
	header("location: index.php");
} 
else 
{
	$_SESSION['Error'] = "Email ili sifra nisu tocni!";
	header("location: index.php");
	return 1;
}
mysqli_close($conn);
}
?>