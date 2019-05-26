<?php
	session_start();

	if(isset($_SESSION['idUsuario']))
	{
		session_destroy();
		echo "Tchau!";
		header("Refresh:2; url=inicial.html");
	}
?>
