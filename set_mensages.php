<?php
  include_once('conexao.php');

  $nome = anti_injection(utf8_decode($_POST['nome']));
  $mensage = anti_injection(utf8_decode($_POST['msg']));

  if($nome){
    if($mensage){
      $mensage = utf8_encode('<strong>'.$nome.':</strong> '.$mensage);
      //mysql_query("INSERT INTO chat_mensages (mensage, data) VALUE ('$mensage', NOW())");
      $data = date("d/m/Y G:i:s");
      $db->exec("INSERT INTO mensages (mensage, data) VALUES ('$mensage', '$data')");

    }else{ echo 'Informe uma mensage'; }
  }else{ echo 'Informe o nome'; }

?>