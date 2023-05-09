<?php
require_once('../../models/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (:nome, :email, :telefone, :mensagem)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':mensagem', $mensagem);

    if ($stmt->execute()) {
        header('Location: index.php?controller=contatos&action=index');
        exit;
    } else {
        $error = "Error adding contato";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Add contato</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<h1>Adicionar contato</h1>
		<form method="post" action="index.php?controller=contatos&action=store">
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" id="nome" name="nome" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="telefone">Telefone:</label>
				<input type="text" class="form-control" id="telefone" name="telefone" required>
			</div>
			<div class="form-group">
				<label for="mensagem">Mensagem:</label>
				<textarea class="form-control" id="mensagem" name="mensagem" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Salvar</button>
			<a href="index.php?controller=contatos&action=index" class="btn btn-default">Cancelar</a>
		</form>
	</div>
</body>

</html>