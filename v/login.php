<?php
session_start(); // Inicia a sessão

// Verifica se o usuário já está logado, se estiver, redireciona para a página principal
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: agenda.php");
    exit;
}

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário e senha foram preenchidos
    if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Tenta autenticar o usuário no MySQL
        $mysqli = new mysqli("localhost", "root", "bd142536SQL$"); // Conecta ao MySQL sem especificar um banco de dados

        // Verifica a conexão
        if ($mysqli->connect_errno) {
            echo "Falha ao conectar ao MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            exit();
        }

        // Consulta para autenticar o usuário no MySQL
        $query = "SELECT User FROM mysql.user WHERE User='$usuario' AND authentication_string=PASSWORD('$senha')";

        $result = $mysqli->query($query);

        if ($result->num_rows == 1) {
            // Autenticação bem-sucedida, inicia a sessão e redireciona para a página principal
            $_SESSION['loggedin'] = true;
            header("Location: indexfiltropesquisa.php");
            exit;
        } else {
            $erro = "Usuário ou senha incorretos.";
        }
    } else {
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form {
            margin: 50px auto;
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Login</h2>
        <?php if(isset($erro)) { echo '<p class="error">'.$erro.'</p>'; } ?>
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <input type="submit" value="Login">
    </form>
</body>
</html>
