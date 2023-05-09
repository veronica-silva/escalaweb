<?php

require_once('./config.php');

class Contatos
{

	public static function getAll()
	{
		$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
		$stmt = $conn->prepare("SELECT * FROM contatos");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public static function insert($nome, $email, $telefone, $mensagem)
	{
		$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
		$stmt = $conn->prepare("INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (:nome, :email, :telefone, :mensagem)");
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':telefone', $telefone);
		$stmt->bindParam(':mensagem', $mensagem);
		return $stmt->execute();
	}
}
