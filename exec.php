<?php

require_once("model/Pessoa.php");

$tipo = $_GET['tipo'];
$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];
$idade = $_GET['idade'];

if ($tipo == "A") {

    echo "Array";

}elseif ($tipo == "C") {
    
    echo "Classe<br>";
    $pessoa = new Pessoa;
    $pessoa->setNome($nome);
    $pessoa->setSobrenome($sobrenome);
    $pessoa->setIdade($idade);
    
    echo("Nome Completo: " . $pessoa->getNome() . $pessoa->getSobrenome() . "<br>Idade: " . $pessoa->getIdade());
        
}else {
    echo "Erro: O tipo não existe ou ele é diferente de A ou C";
}