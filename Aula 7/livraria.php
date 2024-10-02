<?php

// conexao
$servidor = 'localhost';
$banco = 'livraria';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `livro` (`id`, `titulo`, `idioma`, `quantidadePaginas`, `editora`, `dataPublicacao`, `ISBN`) VALUES (NULL, :ti , :id , :qua , :ed , :dt , :isb);";

try {
    $comando = $conexao->prepare($codigoSQL);

    $pre = str_replace('/' , '' , $_GET['da']);

    $resultado = $comando->execute(array('ti' => $_GET['tit'], 'id' => $_GET['id'], 'qua' => $_GET['qua'], 'ed' => $_GET['ed'], 'dt' => $pre, 'isb' => $_GET['is'],));

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