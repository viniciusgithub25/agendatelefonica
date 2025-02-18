<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "css/estilo.css">
    <title>Agenda Telefônica</title>
    <?php
    $parametro = filter_input (INPUT_GET, "parametro");
    $mysqllink = new mysqli("localhost", "root", "bd142536SQL$", "agenda_telefonica");//mysql_connect("localhost","root","bd14536SQL$");     mysql_select_db("agenda_telefonica");
    if($parametro){
        $dados = mysql_query("select * from contato where like nome '$parametro%' order by nome");
    } else {
        $dados = mysql_query ("select * from contato order by nome");
    }
    $linha = mysql_fetch_assoc($dados);
    $total = mysql_num_rows($dados);
    ?>
</head>
<body>
    <div id="conteudo">
        <h1> Agenda Telefônica</h1>
        <table (borde="1")>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Telefone</td>
            </tr>
            <?php
                if ($total) { do {
            ?>
            <tr>
                <td><?php echo $linha ['id'] ?> </td>
                <td><?php echo $linha['nome'] ?></td>
                <td><?php echo $linha['tIletone'] ?></td>
            </tr>
            <?php
                 } while($linha = mysql_fetch_assoc($dados));
                
                mysql_free_result ($dados);}
mysql_close($mysqllink);
                ?>

        </table>
    </div>
    
</body>
</html>