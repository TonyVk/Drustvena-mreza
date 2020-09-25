<?php
	include("connect_db.php");
	$rezultat = mysqli_query($conn,"DELETE FROM post WHERE ID={$_GET['ID']} LIMIT 1") or die("<br/><br/>".mysql_error());
	header("location: index.php");
?>