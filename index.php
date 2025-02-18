<?php
/*session_start(); // Inicia a sessão

// Verifica se o usuário não está logado, se não estiver, redireciona para a página de login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}*/

// função filter_input para obter uma variável externa pelo formulário ou url
$parametro = filter_input(INPUT_GET, "parametro");
$mysqli = new mysqli("localhost", "root", "bd142536SQL$", "agenda_telefonica");

// Verifica a conexão
if ($mysqli->connect_errno) {
    echo "Falha ao conectar ao MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}
/* % Essa é uma maneira flexível de fazer uma pesquisa, permitindo que você encontre valores com base em uma parte deles, não apenas em correspondências exatas.*/
/*
if ($parametro) {
    $query = "SELECT * FROM contato WHERE nome LIKE '$parametro%' ORDER BY nome";
    
} else {
    $query = "SELECT * FROM contato ORDER BY nome";
}
*/

$query = "SELECT * FROM contato";

// Se o parâmetro de pesquisa não estiver vazio, adiciona a condição WHERE dinâmica
if ($parametro) {
    $query .= " WHERE nome LIKE '%$parametro%' OR telefone LIKE '%$parametro%'"; // Adicione aqui as outras colunas que deseja pesquisar
}

$query .= " ORDER BY nome";
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
        <!-- Adicionando Filtro de pesquisa-->
        <p> 
            <form action="<?php echo $_SERVER['PHP_SELF']; ?> "> <!--vai apontar o arquivo php vai receber a requisição--> 
                <!-- o nome do input vai ser o mesmo do parametro acima --> 
                <input type = "text" name = "parametro"> 
                <input type = "submit" value = "Buscar">
            </form>
        </p>
        <p> 
            <a href="novocontato.html">Adicioniar novo</a>
        </p>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Alterar</td>
                <td>Exluir</td>
            </tr>
            <?php
            // retorna uma array associativo
                while ($linha = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $linha['id'] ?></td>
                <td><?php echo $linha['nome'] ?></td>
                <td><?php echo $linha['telefone'] ?></td>
                <td><a href= "<?php echo "paginaalterar.php?id=" . $linha['id'] . "&nome=" . $linha['nome'] . "&telefone=" . $linha['telefone'] ?>">Alterar</td>
                <td><a href= "<?php echo "excluir.php?id=" . $linha['id']?>">Excluir</a></td>
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
