<?php session_start(); ?>
<?php
// Dali string sadrzi slova?
function _s_has_letters( $string ) {
    return preg_match( '/[a-zA-Z]/', $string );
}
// Dali string sadrzi brojeve?
function _s_has_numbers( $string ) {
    return preg_match( '/\d/', $string );
}
// Dali string sadrzi znakove?
function _s_has_special_chars( $string ) {
    return preg_match('/[^a-zA-Z\d]/', $string);
}
include("connect_db.php");
$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$email = $_POST["email"];
$pemail = $_POST["pemail"];
$lozinka = $_POST["lozinka"];
$plozinka = $_POST["plozinka"];
if(_s_has_special_chars($ime))
{
	$_SESSION['Error'] = "Ime sadrzi nedozvoljene znakove!";
	header("location: index.php");
	return 1;
}
if(_s_has_special_chars($prezime))
{
	$_SESSION['Error'] = "Prezime sadrzi nedozvoljene znakove!";
	header("location: index.php");
	return 1;
}
if(_s_has_special_chars($lozinka))
{
	$_SESSION['Error'] = "Lozinka sadrzi nedozvoljene znakove!";
	header("location: index.php");
	return 1;
}
if (empty($ime) || empty($prezime) || empty($email) || empty($pemail) || empty($lozinka) || empty($plozinka)) 
{
	$_SESSION['Error'] = "Niste unjeli sve potrebne podatke!";
	header("location: index.php");
	return 1;
}
if($email != $pemail)
{
	$_SESSION['Error'] = "Email adrese se ne poklapaju!";
	header("location: index.php");
	return 1;
}
if($lozinka != $plozinka)
{
	$_SESSION['Error'] = "Sifre se ne poklapaju!";
	header("location: index.php");
	return 1;
}
$rezultat = mysqli_query($conn,"SELECT Email
FROM racuni order by ID desc;") or die("<br/><br/>".mysql_error());
while($redak = mysqli_fetch_array($rezultat))
{
	if($redak["Email"] == $email)
	{
		$_SESSION['Error'] = "Ovaj email vec postoji u nasoj bazi podataka!";
		header("location: index.php");
		return 1;
	}
}
$query = mysqli_query($conn,"INSERT INTO racuni(Ime, Prezime, Lozinka, Email, Cover, Profilna)
VALUES ('$ime', '$prezime', '$lozinka', '$email', 'slike/cover.jpg', 'slike/profilna.jpg')");
$_SESSION['login_user']=$email;
$_SESSION['login_ime']=$ime;
$_SESSION['login_prezime']=$prezime;

$rezultata = mysqli_query($conn,"SELECT ID FROM racuni WHERE Email='$email'") or die("<br/><br/>".mysql_error());
while($redaka = mysqli_fetch_array($rezultata))
{
	$_SESSION['ID']=$redaka["ID"];
}
header("location: index.php");
?>