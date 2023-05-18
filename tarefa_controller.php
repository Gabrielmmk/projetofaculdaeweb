<?php

require_once "conexao.php";
require_once "tarefa_service.php";
require_once "tarefa_model.php";



$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if($acao == "cadastrar"){
    echo"Cadastrado";
    $tarefa = new Tarefa();
    $tarefa->__set('nome', $_POST['nome']);
    $tarefa->__set('email', $_POST['email']);
    $tarefa->__set('senha', $_POST['senha']);
    $tarefa->__set('nomeUsuario', $_POST['nomeUsuario']);

    $conexao = new Conexao();
    
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService-> inserir();

}else if($acao == 'login'){
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $tarefa->__set('nomeUsuario', $_POST['nomeUsuario']);
    $tarefa->__set('senha', $_POST['senha']);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService-> login();
    $tarefa->__set('id', $_SESSION['id']);


}else if ($acao == 'novaTarefa'){
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']); 

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService-> novaTarefa();

}else if($acao == 'recuperarPendente'){
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService-> recuperar();

}else if($acao == 'remover'){
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']); 

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService-> remover();

}else if($acao == 'tarefaConcluida'){
    if(!isset($_SESSION)){
            session_start();
        }
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']); 

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService-> tarefaConcluida();
}else if ($acao == 'atualizar'){

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']); 
    $tarefa->__set('tarefa', $_POST['tarefa']);
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService-> atualizar(); 

}else if($acao == 'recuperarTodas'){
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService-> recuperar2();

}else if($acao == 'recuperarCompletas'){
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService-> recuperar3();
}


