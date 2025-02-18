<?php
// função para obter uma variável externa pelo seu
$parametro = filter_input(INPUT_GET, "parametro");
$mysqli = new mysqli("localhost", "root", "bd142536SQL$", "agenda_telefonica");

// Verifica a conexão
if ($mysqli->connect_errno) {
    echo "Falha ao conectar ao MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

if ($parametro) {
    $query = "SELECT * FROM contato WHERE nome LIKE '$parametro%' ORDER BY nome";
} else {
    $query = "SELECT * FROM contato ORDER BY nome";
}

if ($result = $mysqli->query($query)) {
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Agenda Telefônica</title>
</head>
<body>
    <div id="conteudo">
        <h1>Agenda Telefônica</h1>
        
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Telefone</td>
            </tr>
            <?php
            // retorna uma array associativo
                while ($linha = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $linha['id'] ?></td>
                <td><?php echo $linha['nome'] ?></td>
                <td><?php echo $linha['telefone'] ?></td>
            </tr>
            <?php
                }
                $result->free();
            ?>
        </table>
    </div>
</body>
</html>
<?php
} else {
    echo "Erro na consulta: " . $mysqli->error;
}

$mysqli->close();
?>
