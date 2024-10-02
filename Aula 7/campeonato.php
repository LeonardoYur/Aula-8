<?php

// conexao
$servidor = 'localhost';
$banco = 'campeonato';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `times` (`id`, `nome`, `pontos`) VALUES (NULL, :nm, :pt)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $qtd = (float) str_replace(',' , '.' , $_GET['ponto']);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'pt' => $qtd));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>