<?php

  $acao = 'listar';
  require "../../PROJETOFACULDADE/tarefa_controller.php";

  echo '<pre>';
    print_r($tarefas);
  echo '<pre>';

  
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

    <?php foreach($tarefas as $indice => $tarefa) { ?>
            <tr>
                <td><?php echo $tarefa -> tarefa ?></td>
                <td><?php echo $tarefa -> sts ?></td>
            </tr>
    <?php }?>
  
</body>
</html>