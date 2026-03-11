<?php
require_once("model/Pessoa.php");

if (isset($_GET['tipo']) && isset($_GET['nome']) && isset($_GET['sobrenome']) && isset($_GET['idade'])) {

    $tipo = $_GET['tipo'];
    $nome = $_GET['nome'];
    $sobrenome = $_GET['sobrenome'];
    $idade = $_GET['idade'];

    if ($tipo == "A") {

        echo "Array<br><br>";

        $pessoa = [
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "idade" => $idade
        ];

        echo("Nome completo: " . $pessoa["nome"] . " " . $pessoa["sobrenome"] . "<br>Idade: " . $pessoa['idade']);

    } elseif ($tipo == "C") {

        echo "Classe<br><br>";
        $pessoa = new Pessoa;
        $pessoa->setNome($nome);
        $pessoa->setSobrenome($sobrenome);
        $pessoa->setIdade($idade);

        echo ("Nome Completo: " . $pessoa->getNome() . " " . $pessoa->getSobrenome() . "<br>Idade: " . $pessoa->getIdade());

    } else {

        echo "Erro: O tipo é diferente de A ou C";

    }
}else {
    echo "Dados Inválidos";
}