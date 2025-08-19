<?php
if (!isset($_GET['nome_livro'])) {
	header("Location: index_logado.php");
	exit;
}

$nome = "%".trim($_GET['nome_livro'])."%";

	$host='localhost';
	$username = 'root';
	$password = '';
	$db = 'acervo';
	$dbh = new PDO("mysql:host=$host;dbname=$db", $username , $password);

$sth = $dbh->prepare('SELECT * FROM `livro` WHERE `titulo` LIKE :titulo');
$sth->bindParam(':titulo', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultado da busca</title>
</head>
<body>
<h2>Resultado da busca</h2>
<?php
if (count($resultados)) {
	foreach($resultados as $Resultado) {
?>

<label><?php echo $Resultado['isbn']; ?> - <?php echo $Resultado['titulo']; ?></label>
<br>
<?
} } else {
?>
<label>Não foram encontrados resultados pelo título buscado.</label>
<?php
}
?>
</body>
</html>
