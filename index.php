<?php

	session_start();

	if (isset($_SESSION['usuaria'])) {
		header('Location: contenido.php');
	} else {
		header('Location: registrate.php');
	}

?>