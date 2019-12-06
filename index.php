<?php 

	echo('<pre>');
	print_r($_GET);
	echo('</pre>');
	//die();

	

	$filmes = [
		[
			'nome' => 'Coringa',
			'duracao' => 210,
			'genero'=>'Genial',
			'ano'=>2019,
			'classificacao'=>18,
		],[
			'nome' => 'Crepúsculo',
			'duracao' => 120,
			'genero'=>'Romântico',
			'ano'=>2010,
			'classificacao'=>12,
		],[
			'nome' => 'Irlandes',
			'duracao' => 120,
			'genero'=>'Máfia',
			'ano'=>2019,
			'classificacao'=>15,
		],
	];

	$pos_destaque = $_GET['destaque'];
	$filme_destaque = $filmes[$pos_destaque];

	echo('<pre>');
	print_r($filme_destaque);
	echo('</pre>');
	
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	
	<div class="filme_destaque" style="background-color:#E0E0E0">
		<h2><?= $filme_destaque['nome']; ?></h2>
		<div class="classificacao">
			<span>Classificação: <?= $filme_destaque['classificacao']; ?> anos</span>
		</div>
		<div class="duracao">
			<span>Duração: <?= $filme_destaque['duracao']; ?> min</span>
		</div>
		<div class="genero">
			<span>Gênero: <?= $filme_destaque['genero']; ?></span>
		</div>
		<div class="ano">
			<span>Ano: <?= $filme_destaque['ano']; ?></span>
		</div>
	</div>

	<div class="lista_de_filmes">
		
		<!-- Início do foreach de filmes -->
		<?php foreach($filmes as $filme): ?>
		<div class="filme">
			<h2><?= $filme['nome'] ?></h2>
			<div class="classificacao">
				<span>Classificação: <?= $filme['classificacao'] ?> anos</span>
			</div>
			<div class="duracao">
				<span>Duração: <?= $filme['duracao'] ?> min</span>
			</div>
			<div class="genero">
				<span>Gênero: <?= $filme['genero'] ?></span>
			</div>
			<div class="ano">
				<span>Ano: <?= $filme['ano'] ?></span>
			</div>
		</div>
		<?php endforeach; ?>
		<!-- fim de foreach de filmes -->

		
	</div>
</body>
</html>