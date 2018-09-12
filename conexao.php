<?php

  $db = new PDO("sqlite:db/chate.db");

  function anti_injection($sql){
    $sql = preg_replace(sql_regcase("/(http|www|wget|from|select|insert|delete|where|.dat|.txt|.gif|drop table|show tables| or |#|\*|--|\\\\)/"),"",$sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    return $sql;
  }

  function data_hora($valor){
    if($valor != '0000-00-00 00:00:00'){
      $data = date("d/m/Y", strtotime($valor));
      $hora = date("G:i:s", strtotime($valor));
      return $data . ' ' .$hora;
    }else{
      return '-';
    }
  }

?>