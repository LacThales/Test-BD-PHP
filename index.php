<?php 
	include('config.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Teste Prova PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<?php

		if(!empty($_POST['acao'])){
			$nome = $_POST['nome'];
			$telefone = $_POST['telefone'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$email = $_POST['email'];
			$informacoes = $_POST['informacoes'];
			$categoria = $_POST['categoria'];

			$sql = $pdo->prepare("INSERT INTO `agenda` VALUES(?, ?, ?, ?, ?, ?, ?) ");
			$sql->execute(array($nome, $telefone, $cidade, $estado, $email, $informacoes, $categoria));
			echo 'sucesso!';
		}

		/* IF'S para pesquisas por nome / email / telefone */
		if(isset($_POST['pesquisas'])){
		$noome = $_POST['name'];
		$sql = $pdo->prepare("SELECT * FROM agenda WHERE nome LIKE ? ");
		$sql->execute(array($noome));
		print_r($sql->fetchAll());
	}
		if(isset($_POST['pesquisas_email'])){
		$email = $_POST['emaail'];
		$sql = $pdo->prepare("SELECT * FROM agenda WHERE email LIKE ? ");
		$sql->execute(array($email));
		print_r($sql->fetchAll());
	}
		if(isset($_POST['pesquisas_telefone'])){
		$telefone = $_POST['teleefones'];
		$sql = $pdo->prepare("SELECT * FROM agenda WHERE telefone LIKE ? ");
		$sql->execute(array($telefone));
		print_r($sql->fetchAll());
	}
	/* ---------------------------------------------------- */
?>

<form method="post">
	<table border="1">
		<tr>
			<td>
			<p id="text-center">Nome:<input type="text" name="nome"></p>
			</td>
		</tr>
		<tr>
			<td>
			<p id="text-center">Telefone:<input type="text" name="telefone"></p>
			</td>
		</tr>
		<tr>
			<td>
			<p id="text-center">Cidade:<input type="text" name="cidade"></p>
			<p id="text-center">Estado:<select name="estado">
				  <option value="SP">SP</option>
				  <option value="RJ" >RJ</option>
				  <option value="SC">SC</option>
				</select>	</p>
			</td>
		</tr>
		<tr>
			<td>
			<p id="text-center">E-mail:<input type="text" name="email"></p>
			</td>
		</tr>	
		<tr>
			<td>
			<p id="text-center">Informações:<textarea name="informacoes"></textarea></p>
			</td>
		</tr>
		<tr>
			<td>
			<p id="text-center">Categoria:
				<select name="categoria">
				  <option value="CLIENTES">CLIENTES</option>
				  <option value="FORNECEDORES" >FORNECEDORES</option>
				  <option value="FUNCIONARIOS">FUNCIONARIOS</option>
				</select></p>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="acao" value="salvar">
				<input type="submit" name="limpar" value="limpar" action="index.php">
			</td>
		</tr>
</table>
<div class="topnav">
  <div class="search-container">
      <input type="text" placeholder="Pesquisar_nome" name="name">
      <button type="submit" name="pesquisas"><i class="fa fa-search"></i></button>
      <br>
      <input type="text" placeholder="Pesquisar_email" name="emaail">
      <button type="submit" name="pesquisas_email"><i class="fa fa-search"></i></button>
      <br>
      <input type="text" placeholder="Pesquisar_telefone" name="teleefones">
      <button type="submit" name="pesquisas_telefone"><i class="fa fa-search"></i></button>
  </div><!-- topnav -->
</div><!-- search-container -->
</form>


</body>
</html>
