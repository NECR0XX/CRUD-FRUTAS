<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="./CSS/Style.css">
    <title>El Carron's Fair</title>
</head>

<body class="listar">
    <section class="container-l">
    <h1>Carron's Fair</h1>
    <center>
<?php
$stmt = $pdo->query('SELECT * FROM cliente ORDER BY dtnasc');
$cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($cliente) == 0) {
    echo '<p>Nenhuma conta criada</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>dtnasc</th><th colspan="3">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($cliente as $clientes) {
        echo '<tr>';
        echo '<td>' . $clientes['nome'] . '</td>';
        echo '<td>' . $clientes['email'] . '</td>';
        echo '<td>' . $clientes['telefone'] . '</td>';
        echo '<td>' . date('d/m/y', strtotime($clientes['dtnasc'])) . '</td>';
        echo '<td><a Style="color:black;" href="atualizar.php?id=' . $clientes['id'] . '">Atualizar</a></td>';
        echo '<td><a Style="color:black;" href="deletar.php?id=' . $clientes['id'] . '">Deletar</a></td>';
        echo '<td><a Style="color:black;" href="indexf.php?id=' . $clientes['id'] . '">Comprar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
</center>
<form method="post" action="index.php">
    <button type="submit" >Voltar</button>
</form>
</section>
</body>
</html>