<?php
session_start();
include "connection.php";

// the data which will return to $.ajax
$data = array(
	"message" => "",
	"timeReload" => 3,
	"reload" => false,
	"action" => ""
);

if (isset($_POST["login"])) {
	$email = $mysqli->escape_string($_POST["email"]);
	$password = $mysqli->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));

	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		$user = $result->fetch_assoc();
		if (password_verify($_POST["password"], $user["password"])) {
			$_SESSION["id"] = $user["id"];
			$_SESSION["userAvatar"] = $user["img_id"];
			$_SESSION["username"] = $user["username"];
			$_SESSION["firstName"] = $user["first_name"];
			$_SESSION["lastName"] = $user["last_name"];
			$data["message"] = "Logado com sucesso!";
			$data["timeReload"] = 1;
			$data["reload"] = true;
		} else {
			$data["message"] = "E-mail ou senha não conferem.";
			$data["timeReload"] = 3;
		}
	} else {
		$data["message"] = "Dados inexistentes, crie uma conta para logar.";
		$data["timeReload"] = 3;
	}
} else if (isset($_POST["register"])) {
	$username = $mysqli->escape_string($_POST["username"]);
	$firstName = $mysqli->escape_string($_POST["first_name"]);
	$lastName = $mysqli->escape_string($_POST["last_name"]);
	$email = $mysqli->escape_string($_POST["email"]);
	$password = $mysqli->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));

	$sql = "SELECT * FROM users WHERE email='$email' OR username='$username'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		$data["message"] = "Este e-mail ou usuário já existe.";
		$data["timeReload"] = 3;
	} else {
		$sql = "INSERT INTO users (id, username, first_name, last_name, email, password, created) VALUES (NULL, '$username', '$firstName', '$lastName', '$email', '$password', CURRENT_TIMESTAMP)";

		if ($mysqli->query($sql)) {
			$data["message"] = "Sua conta foi criada com sucesso!";
			$data["action"] = "registered";
			$data["timeReload"] = 1.5;
		}
	}
} else {
	$data["message"] = "Boa tentativa ao tentar burlar o sistema... Mas não foi dessa vez :)";
	$data["timeReload"] = 1;
}

// Converts the secounds to mili secounds
$data["timeReload"] = $data["timeReload"] * 1000;

// Returns the information
exit(json_encode($data, JSON_PRETTY_PRINT));

?>
