<?php
  include_once('conexao.php');

  $id = $_POST['id'];

  $res = $db->query("SELECT * FROM mensages ORDER BY id_mensage DESC");
  $res_t = count($res);

  if($res_t > 0){
    foreach($res as $row){
      $i++;

      if($i%2==0){ $cor = ''; }else{ $cor = 'bg-f5'; }

      $msg .= '<li class="p5 '.$cor.'"><span class="c-b fs10">('.$row['data'].')</span><br />'.utf8_decode($row['mensage']).'</li>';
      $id_out = $row['id_mensage'];

      $cor = '';
    }
  }

  echo utf8_encode($msg);
?>