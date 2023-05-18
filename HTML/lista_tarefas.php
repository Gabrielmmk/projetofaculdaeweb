<?php
	if(!isset($_SESSION)){
    	session_start();
	}

  $acao = 'recuperarPendente';
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
    <script>

      function editar(id, txt_tarefa){
        let form = document.createElement('form');
        form.action = '../tarefa_controller.php?acao=atualizar';
        form.method = 'post';
        form.className = 'row';
        form.style.marginBottom = '5px'
        
        let inputTarefa = document.createElement('input');
        inputTarefa.type = 'text';
        inputTarefa.name = 'tarefa';
        inputTarefa.className = 'col-9 col-md-9 form-control';
        inputTarefa.style.width = '60%';
        inputTarefa.style.height = '30px';
        inputTarefa.style.paddingLeft = '2px';
        inputTarefa.value = txt_tarefa

        let inputId = document.createElement('input');
        inputId.type = 'hidden';
        inputId.name = 'id';
        inputId.value = id;
        
        let button = document.createElement('button');
        button.type = 'submit';
        button.className = 'col-3 col-md-3 btn btn-info btn-sm';
        button.innerHTML = 'Atualizar';
        
        form.appendChild(inputTarefa);
        form.appendChild(inputId);
        form.appendChild(button);
        console.log(form);
        
        
        let tarefa = document.getElementById('tarefa_'+id);
        
        tarefa.innerHTML = '';

        tarefa.insertBefore(form, tarefa[0]);
      }
      
      function remover(id){
        location.href = 'lista_tarefas.php?acao=remover&id='+id;
      }
      
      function tarefaConcluida(id){
        location.href = 'lista_tarefas.php?acao=tarefaConcluida&id='+id;
      }
    </script>
  </head>
  <body>
  
    <h1>Task List</h1>
    <form class="campo-tarefa" method="post" action="../tarefa_controller.php?acao=novaTarefa">
        <div class="conteudo">
          <div>
            <?php if( isset( $_GET['erro'] ) && $_GET['erro'] == 1 ) { ?>
              <p class="tarefaInvalida">Por favor, insira uma tarefa.</p>
            <?php }?>

            <?php if( isset( $_GET['erro'] ) && $_GET['erro'] == 0 ) { ?>
              <p class="tarefaValida">A tarefa foi inserida com sucesso!</p>
            <?php }?>

            <?php if( isset( $_GET['concluida'] ) && $_GET['concluida'] == 1 ) { ?>
              <p class="tarefaValida">A tarefa foi concluida!</p>
            <?php }?>

            <?php if( isset( $_GET['removida'] ) && $_GET['removida'] == 1 ) { ?>
              <p class="tarefaValida">A tarefa foi removida com sucesso!</p>
            <?php }?>

            <?php if( isset( $_GET['erroAtualizar'] ) && $_GET['erroAtualizar'] == 1 ) { ?>
              <p class="tarefaInvalida">Por favor, não deixe o campo em branco.</p>
            <?php }?>

            <?php if( isset( $_GET['erroAtualizar'] ) && $_GET['erroAtualizar'] == 0 ) { ?>
              <p class="tarefaValida">A tarefa foi atualizada com sucesso!</p>
            <?php }?>
          </div>
          <input id="tarefa" name="tarefa" type="text" placeholder="Adicione uma tarefa">
          <div class="menus">
            <div class="filtros">
              <span style="color: white">Pendentes</span>
              <span id="pendentes"><a href="../HTML/listar_todas_tarefas.php">Todas</a></span>
              <span id="pendentes"><a href="../HTML/listar_tarefas_concluidas.php">Completas</a></span>
            </div>
            <button class="add-btn" type="submit">Adicionar</button>
            <button class="limpar-btn">Limpar tarefas</button>
          </div>
    </form>

      <!--Lista-->
      <div class="container">
        <ul class="caixa-tarefas row">
        <?php foreach($tarefas as $indice => $tarefa) { ?>
            <li>
              <div class="col-10 col-sm-9" id="tarefa_<?php echo $tarefa->id; ?>">
              <td style="color:white;"><?php echo $tarefa -> tarefa ?></td>
              </div>
              <div class="col-1 col-sm-1">
                <button class="btnIcone" title="Marcar como concluida" onclick="tarefaConcluida(<?php echo $tarefa->id; ?>); return false;">
                  <i  class="fas fa-check" style="color: #00f53d;"></i>
                </button>
              </div>
              <div class="col-1 col-sm-1" >
              <button class="btnIcone" title="Remover tarefa" onclick="remover(<?php echo $tarefa->id; ?>); return false;">
                  <i  class="fas fa-times" style="color: #ff0000;"></i>
                </button>
              </div>
              <div class="col-1 col-sm-1" >
                <button class="btnIcone" type="button" title="Editar tarefa" onclick="editar(<?php echo $tarefa->id ?>, '<?php echo $tarefa -> tarefa ?>')">
                  <i class="far fa-edit" style="color: #fff700;"></i>
                </button>
              </div>
            </li>
          <?php }?>
        </ul>    
      </div>
      
    



    <script src="../JS/script.js"></script>
  </body>
</html>
