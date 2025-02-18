<?php
$id = filter_input(INPUT_GET, "id");

$link = new mysqli("localhost", "root", "bd142536SQL$", "agenda_telefonica");

if ($link){
    $query = mysqli_query($link, "delete from contato where id= '$id'");
    if ($query) {
        header("Location: indexfiltropesquisa.php");
    }else {
        die("Erro: " . mysqli_error($link));
    }
}else{
    die("Erro:  " . mysqli_error($link));
}
?>