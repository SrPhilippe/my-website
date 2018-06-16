<?php
session_start();
include "connection.php";

	$data = array(
		"status" => "",
		"message" => "",
		"uploaded" => false
	);

	if (isset($_FILES["avatar"])) {
		$file = $_FILES["avatar"];
		$fileSize = $file["size"];
		$fileError = $file["error"];
		$fileTmp = $file["tmp_name"];
		$fileExt = "jpeg";
		$token = md5(uniqid(rand(), true));
		$fileKind = $token . "." . $fileExt;

		if ($fileError == UPLOAD_ERR_INI_SIZE) {
			$data["message"] = "Arquivo ultra GIGANTE!";
		} else if ($fileSize <= 307200) {
			if (isset($_SESSION["id"])) {
				$id = $_SESSION["id"];
				$sql = "SELECT * FROM users WHERE id='$id'";
				$result = $mysqli->query($sql);
				if ($result) {
					$user = $result->fetch_assoc();
					$img_id_old = $user["img_id"];
				}
				$sql = "UPDATE users SET img_id='$fileKind' WHERE id='$id'";
				$result = $mysqli->query($sql);
				if ($result) {
					$_SESSION["userAvatar"] = $fileKind;
					if ($img_id_old != "default.png") {
						unlink("uploads/" . $img_id_old);
					}
					move_uploaded_file($fileTmp, "uploads/" . $_SESSION["userAvatar"]);
					$data["message"] = "UPLOAD CONCLUÍDO!";
					$data["uploaded"] = true;
					$data["status"] = $file;
				} else {
					$data["message"] = "Não retornou resposta com BD";
					$data["status"] = $mysqli->error;
				}
			} else {
				$data["message"] = "Não existe a session[id]";
			}
		} else {
			$data["message"] = "Arquivo muito grande!";
		}

	} else {
		$data["message"] = "Erro ao processar";
	}

	// Returns the informations
	exit(json_encode($data, JSON_PRETTY_PRINT));