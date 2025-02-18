<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefônica | Alterar</title>
    <link rel="stylesheet" href="css/novocontato.css">
    <?php
        $id = filter_input(INPUT_GET,"id");
        $nome = filter_input(INPUT_GET,"nome");
        $telefone = filter_input(INPUT_GET,"telefone");
    ?>
</head>
<body>
    <div id="conteudo">
        <h1>Alterar Contato </h1>
        <p>
            <form action ="alterar.php">
                <!--os campos do tipo hidden não são exibidos na interface do usuário. Eles são úteis para incluir dados que precisam ser enviados com o formulário, mas que o usuário não precisa ver ou interagir -->
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <label for= "nome">Nome:</label> 
                <input type="text" name="nome" value="<?php echo $nome ?>"><br>
                <label for= "telefone">Telefone:</label> 
                <input type="text" name="telefone" value="<?php echo $telefone ?>"><br>
                <input type="submit" value="Alterar">

            </form>
        
        </p>
    </div>
    
</body>
</html>