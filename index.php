<?php
	function __autoload($class_name){
		require_once 'classes/' . $class_name . '.php';
	}
?>
<?php
$usuario = new User();

$messageDelete = '';
if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
	$id = (int)$_GET['id'];
	if($usuario->delete($id)){
		$messageDelete = "Deletado com sucesso!";
	}

endif;
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	   <title>CRUD PHP</title>
	   <link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<header class="masthead">
				<h1 class="muted">CRUD PHP</h1>
			</header>

			<?=$messageDelete?>
			<?php
				include_once('new.php');
				include_once('edit.php');
			?>

			<table class="table table-hover">				
				<thead>
					<tr>
						<th>#</th>
						<th>Nome:</th>
						<th>E-mail:</th>
						<th>Ações:</th>
					</tr>
				</thead>
				
				<?php foreach($usuario->findAll() as $key => $value): ?>

				<tbody>
					<tr>
						<td><?php echo $value->id; ?></td>
						<td><?php echo $value->name; ?></td>
						<td><?php echo $value->email; ?></td>
						<td>
							<?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
							<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
						</td>
					</tr>
				</tbody>

				<?php endforeach; ?>

			</table>

		</div>
	</body>
</html>