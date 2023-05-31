<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>TaskList</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	

		<script src="https://kit.fontawesome.com/c4bf745026.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="../CSS/styleCadastro.css">
	</head>
	<body>

		<div class="container">

			<div id="lc">
				<a class="loginCadastro" href="index.php">Login</a>
				<a class="loginCadastro" href="cadastro.php" >Cadastro</a>
			</div>

				<div id="logo">
					<h1 class="titulo" >TaskList</h1>
				</div>

				<?php if( isset( $_GET['erro'] ) && $_GET['erro'] == 0 ) { ?>
					<p class="tarefaValida">Cadastrado com sucesso!.</p>
				<?php }?>
			<!-- formulário -->
			<form method="post" action="../tarefa_controller.php?acao=cadastrar"> 

					<div class="single-input">
						<input required class="input" type="text" name="nome" id="name">
						<label for="name">Nome completo</label>
					</div>
					<div class="single-input">
						<input required class="input" type="text" name="nomeUsuario" id="name">
						<label for="name">Nome do usuário</label>
					</div>

					<div class="single-input">
						<input required class="input" type="email" name="email" id="email">
						<label for="email">Email</label>
					</div>

					<div class="single-input">

						<input required class="input" type="password" name="senha" id="password">
						<label for="password">Senha</label>
						<i class="fa-solid fa-eye" id="btnSenha" onclick="showHide()"></i>
						
					</div>

					<button class="btn botaoC">Cadastrar</button>
					
			</form><!-- fim formulário -->

		</div>

		<script src="../JS/script.js"></script>

	</body>
</html>
		