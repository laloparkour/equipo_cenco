<?php 
	
	session_start();

	include('configdb.php');

	if (isset($_SESSION['usuaria'])) {
		header('Location: index.php');
	}

	$errores = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$password = hash('sha512', $password);

		$sql = 'SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password';
		$statement = $conexion->prepare($sql);
		$statement->execute(array(
			':usuario' => $usuario,
			':password' => $password
		));

		$resultado = $statement->fetch();
		if ($resultado !== false) {
			$_SESSION['usuario'] = $usuario;
			header('Location: index.php');
		} else {
			$errores .= '<li>Datos Incorrectos</li>';
		}
	}

	require 'views/login.view.php';

?>