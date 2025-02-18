<?php
    //padrão quando usamos o usuario é root trabalhando localmente
    $usuario= 'root';

    //configuração padrão dada pelo xamp ou a senha que criou
    $senha= 'bd142536SQL$';

    //host é onde está hospedado a base de dados
    $hostname='localhost';

    //base de dados que usei no workbench
    $base_de_dados= 'empresa'; #base de dados que usei no workbench

                
           
    //$conexao é instancia da classe 
    $conexao= new mysqli($hostname, $usuario, $senha,$base_de_dados);
    if ($conexao->connect_errno) {
        echo "falha ao conectar:(" . $conexao->connect_errno . ")" .  $conexao->connect_errno;
       }
       else
           echo "Conectado ao Banco de Dados";
   
?>