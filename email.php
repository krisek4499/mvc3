<?php

require_once 'conect.php';
class send{
  function __construct(){}
    public function Inf($em) {
    $emails=$em;
    $instance=connect_DB::getInstance();
    $q = "SELECT email FROM testowa where email='$emails'";
    $stm = $instance->prepare($q);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
    if($data!=null) $jest="tak";
    else $jest="Formularz wypelniony pomyslnie";
    return $jest;
  }
}
$emails=$_POST['email'];
$info=send::Inf($emails);
echo json_encode($info);
