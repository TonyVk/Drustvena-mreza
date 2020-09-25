<?php session_start(); ?>
<?php
    if(isset($_FILES["file"]))
	{
    $formati = array('png','jpg','jpeg','gif');
    $namn = $_FILES["file"]["name"];
	$value = explode(".", $namn);
    $ext = strtolower(array_pop($value));  
    $size = $_FILES["file"]["size"];
    $tmp = $_FILES["file"]["tmp_name"];

    if(!in_array($ext,$formati))
	{
		$_SESSION['Error'] = 'Tip fajla nije dozovljen! Dozvoljeni formati su <i>PNG</i>,<i>JPG</i> i <i>GIF</i>';
		header("Location: $_SERVER[HTTP_REFERER]");
		exit();
    }
    $name = time().'.'.$ext;
    if(move_uploaded_file($tmp,"slike/".$name)){
	header("location: slike/$slika_id");
	
	die();
    }
	}else {
    $_SESSION['error'] = "Niste izabrali sliku";
	header("Location: $_SERVER[HTTP_REFERER]");
    die();
	}
?>