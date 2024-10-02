<?php

// conexao
$servidor = 'localhost';
$banco = 'produto';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `produtos` (`id`, `nome`, `url` , `descricao` , `preco`) VALUES (NULL, :nm, :ur , :de, :pre)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $pre = (float) str_replace(',' , '.' , $_GET['prec']);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'ur' => $_GET['url'], 'de' => $_GET['desc'], 'pre' => $pre));

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