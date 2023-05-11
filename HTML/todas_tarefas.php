<?php

  require "../../PROJETOFACULDADE/tarefa_controller.php";

  $acao = 'listar';

  if($acao == 'listar'){
    echo 'entrou aqui';
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService-> recuperar();
  }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>