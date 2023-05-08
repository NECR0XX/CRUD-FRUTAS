<?php include 'dbf.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="./CSS/Style.css">
    <title>El Carron's Fair</title>
</head>
<body>
<section class="container-l">
    <h1>Comprar</h1>
    <center>
<?php
$stmt = $pdo->query('SELECT * FROM frutas ORDER BY preco');
$frutas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($frutas) == 0) {
    echo '<p>Nenhuma conta criada</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Tamanho</th><th>Peso</th><th>Quantidade</th><th>Preço</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($frutas as $fruta) {
        echo '<tr>';
        echo '<td>' . $fruta['nome'] . '</td>';
        echo '<td>' . $fruta['tamanho'] . '</td>';
        echo '<td>' . $fruta['peso'] . '</td>';
        echo '<td>' . $fruta['quantidade'] . '</td>';
        echo '<td>' . $fruta['preco'] . '</td>';
        echo '<td><a Style="color:black;" href="atualizarf.php?id=' . $fruta['id'] . '">Atualizar</a></td>';
        echo '<td><a Style="color:black;" href="deletarf.php?id=' . $fruta['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
</center>
<form method="post" action="indexf.php">
    <button type="submit" >Voltar</button>
</form>
</section>

</body>
</html>