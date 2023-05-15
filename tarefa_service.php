<?php 




class TarefaService{

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this -> conexao = $conexao->conectar();
        $this -> tarefa = $tarefa;
    }

    public function login(){
        $host = 'localhost';
        $dbname = 'usuario';
        $user = 'root';
        $pass = '';
    
        // Cria a conexão com o banco de dados
        $mysqli = new mysqli($host, $user, $pass, $dbname);
        if ($mysqli->connect_errno) {
            die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
        }
    
        // Obtém os dados do formulário
        $nomeUsuario = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    
        // Prepara a consulta SQL para evitar SQL Injection
        $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE nomeUsuario = ? AND senha = ?");
        $stmt->bind_param("ss", $nomeUsuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Verifica se o usuário existe no banco de dados
        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();
            echo 'ENTROU NO BD';
            session_start();
            $_SESSION['id'] = $usuario['id'];
            header('Location: HTML/lista_tarefas.php');
            // Fazer algo com os dados do usuário...
        } else {
            header('Location: HTML/index.php?login=0');
            echo 'Usuário não encontrado';
    }
}



    public function inserir(){ //create Usuario

        $query = "INSERT INTO usuario(nome, email, senha, nomeUsuario) values (:nome, :email, :senha, :nomeUsuario)";
        $stmt = $this->conexao->prepare($query);
        $stmt -> bindValue(':nome', $this -> tarefa->__get('nome'));
        $stmt -> bindValue(':email', $this -> tarefa->__get('email'));
        $stmt -> bindValue(':senha', $this -> tarefa->__get('senha'));
        $stmt -> bindValue(':nomeUsuario', $this -> tarefa->__get('nomeUsuario'));
        $stmt->execute();
    }

    public function novaTarefa() {
        try{
            if (empty($_POST['tarefa'])){
                header ('Location: HTML/lista_tarefas.php?erro=1');
                echo "O INPUT ESTÀ VAZIO";
            }else{
                echo $_SESSION['id'];
                $query = "INSERT INTO tarefas(id_usuario, tarefa, sts) values (:id_usuario, :tarefa, 'Pendente')";
                $stmt = $this->conexao->prepare($query);
                $stmt -> bindValue(':id_usuario', $_SESSION['id']);
                $stmt -> bindValue(':tarefa', $this -> tarefa->__get('tarefa'));
                $stmt->execute();
                header ('Location: HTML/lista_tarefas.php?erro=0');
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
    public function remover(){ //remove

    }

    public function atualizar(){ //update

    }

    public function recuperar(){ //read
        $query = 'select * from `tarefas` where id_usuario = :id_usuario ;';
        $stmt = $this->conexao->prepare($query);
        $stmt -> bindValue(':id_usuario', $_SESSION['id'] );
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_OBJ);
       
    }





}