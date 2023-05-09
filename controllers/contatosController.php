<?php

require_once('../models/contatos.php');

class contatosController
{

    public function index()
    {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id, nome, telefone, email, mensagem FROM contatos");
        $stmt->execute();
        $contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include_once('../views/contatos/index.php');
    }


    public function store()
    {
        if (isset($_POST['nome'])) {

            die("deu aqui");
        }
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];

        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (:nome, :email, :telefone, :mensagem)');
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':mensagem', $mensagem);
        $stmt->execute();

        header('Location: index.php?controller=contatos&action=index');
    }
}
