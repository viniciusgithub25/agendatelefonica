<?php
$nome = filter_input(INPUT_GET,'nome');
$telefone = filter_input(INPUT_GET, "telefone");

$link = new mysqli("localhost", "root", "bd142536SQL$", "agenda_telefonica");
if ($link){
    $query = mysqli_query($link, "insert into contato values(null, '$nome', '$telefone');");
    if($query){
        header("Location: indexfiltropesquisa.php");
    } else {
        die("Erro:".mysqli_error($link));
    }
} else {
    die("Erro:". mysqli_error($link));
    /*A função die() é usada para imprimir uma mensagem e terminar o script PHP imediatamente. Quando combinada com mysqli_error(), ela é frequentemente usada para lidar com erros durante operações de banco de dados, especialmente durante o desenvolvimento e teste de um aplicativo.*/
}

?>