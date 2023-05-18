<?php
	if(!isset($_SESSION)){
    	session_start();
	}

  $acao = 'recuperarCompletas';
  require "../../PROJETOFACULDADE/tarefa_controller.php";
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <title>Task List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/styleListaTarefas.css">
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

     <!--Fontawesome-->
     <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>


     
     
    <link rel="icon" href="../img/icon.png">
  </head>
  <body>
  
    <h1>Task List</h1>
    <?php echo $_SESSION['id']?>
    <form class="campo-tarefa" method="post" action="../tarefa_controller.php?acao=novaTarefa">
        <div class="conteudo">
          <div>
            <?php if( isset( $_GET['erro'] ) && $_GET['erro'] == 1 ) { ?>
              <p class="tarefaInvalida">Por favor, insira uma tarefa.</p>
            <?php }?>

            <?php if( isset( $_GET['erro'] ) && $_GET['erro'] == 0 ) { ?>
              <p class="tarefaValida">A tarefa foi inserida com sucesso!</p>
            <?php }?>

            <?php if( isset( $_GET['erroAtualizar'] ) && $_GET['erroAtualizar'] == 1 ) { ?>
              <p class="tarefaInvalida">Por favor, não deixe o campo em branco.</p>
            <?php }?>

            <?php if( isset( $_GET['erro'] ) && $_GET['erro'] == 0 ) { ?>
              <p class="tarefaValida">A tarefa foi inserida com sucesso!</p>
            <?php }?>
          </div>
          <input id="tarefa" name="tarefa" type="text" placeholder="Adicione uma tarefa">
          <div class="menus">
            <div class="filtros">
              <span id="pendentes"><a href="../HTML/lista_tarefas.php">Pendentes</a></span>
              <span><a href="../HTML/listar_todas_tarefas.php">Todas</a></span>
              <span id="pendentes"><a a style="color: white">Completas</a></span>
            </div>
            <button class="add-btn">Adicionar</button>
            <button class="limpar-btn">Limpar tarefas</button>
          </div>
    </form>

      <!--Lista-->
      <div class="container">
        <ul class="caixa-tarefas row">
        <?php foreach($tarefas as $indice => $tarefa) { ?>
            <li>
              <div class="col-12 col-sm-12 mt-2 mb-2">
              <td style="color: red;"><?php echo $tarefa -> tarefa ?></td>
              </div>
            </li>
          <?php }?>
        </ul>    
      </div>
    <script src="../JS/script.js"></script>
  </body>
</html>
