<?php

    include('conexao.php');
    /*problema com as aspas dentro da string. Quando usamos aspas duplas para delimitar a string do PHP ("), elas entram em conflito com as aspas duplas usadas para o estilo CSS dentro da tag HTML. Para resolver isso, podemos escapar as aspas do estilo CSS ou usar aspas simples para delimitar a string do PHP. conforme as duas formas abaixo:
   /*1-Escapando as aspas do estilo CSS:*/
   $texto = "\n<h1 style=\"color:blue\"> VOCÊ ESTÁ CONECTADO AO BANCO PARABÉNS! </h1>";
   /*2-Usando aspas simples para delimitar a string do PHP:*/
  // $texto = '<br> <h1 style="color:red"> VOCÊ ESTÁ CONECTADO AO BANCO PARABÉNS! </h1>';
    echo nl2br/*função embutida do php para pular linha*/ ($texto);

?>

