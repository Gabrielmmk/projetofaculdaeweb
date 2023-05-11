<?php

require_once "../PROJETOFACULDADE/conexao.php";
require_once "../PROJETOFACULDADE/tarefa_service.php";
require_once "../PROJETOFACULDADE/tarefa_model.php";


echo '<pre>';
print_r($_POST);
echo '<pre>';

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

}else if($acao == 'listar'){
    echo 'entrou aqui';
    if(!isset($_SESSION)){
        session_start();
    }
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService-> recuperar();
}


