<?php

//padrão quando usamos o usuario é root trabalhando localmente
$usuario = 'root';

//configuração padrão dada pelo xamp
$senha='bd142536SQL$';
//base de dados que usei no workbench
$base_de_dados='empresa'; #base de dados que usei no workbench

//host é onde está hospedado a base de dados
$hostname='localhost';
#PDO = PHP DATA OBJECT
#$conexao é instancia da classe PDO
$conexao = new PDO("mysql:host=$hostname;dbname=$base_de_dados", $usuario, $senha);
/*try {
    // Instância da classe PDO
    $conexao = new PDO("mysql:host=$hostname;dbname=$base_de_dados", $usuario, $senha);
    echo "Conectado ao Banco de Dados";
} catch (PDOException $e) {
    echo "Falha ao conectar: " . $e->getMessage();
}*/


?>