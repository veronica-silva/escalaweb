<!DOCTYPE html>
<html>

<head>
	<title>Lista de Contatos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<h1>Lista de Contatos</h1>
		<p><a href="criar.php">Adicionar</a></p>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>nome</th>
					<th>Email</th>
					<th>telefone</th>
					<th>mensagem</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include '../../models/config.php';
				$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
				$stmt = $conn->prepare("SELECT * FROM contatos");
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['nome']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['telefone']; ?></td>
						<td><?php echo $row['mensagem']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

</html>