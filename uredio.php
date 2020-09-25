<?php
	include("connect_db.php");
    $result = mysqli_query($conn,"UPDATE post SET Tekst='$_POST[tekst]' where ID='$_POST[id]'");
	header("location: index.php");
?>
