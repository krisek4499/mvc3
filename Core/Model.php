<?php
 
 require_once 'conect.php';
class Model{
   function __construct(){}
  
    public function getAll()
     {
         $instance=connect_DB::getInstance();
         $q = 'SELECT id,imie,nazwisko,zawod,nr_telefonu,data_ur,email FROM testowa ORDER BY id DESC LIMIT 1';
         $stm = $instance->prepare($q);
         $stm->execute();
         $data = $stm->fetchAll(PDO::FETCH_OBJ);
      
       
         if ($data) {
             return $data;
         }
         return null;
     }
     public function getAll2()
     {
         $instance=connect_DB::getInstance();
         $q = 'SELECT id,imie,nazwisko,zawod,nr_telefonu,data_ur,email FROM testowa ORDER BY id ';
         $stm = $instance->prepare($q);
         $stm->execute();
         $data = $stm->fetchAll(PDO::FETCH_OBJ);
      
       
         if ($data) {
             return $data;
         }
         return null;
     }
     public function getBy($id)
     {
         $instance=connect_DB::getInstance();
         $ID=$id;
         $q = "SELECT id,imie,nazwisko,zawod,nr_telefonu,data_ur,email FROM testowa Where id='$ID'";
         $stm = $instance->prepare($q);
         $stm->execute();
         $data = $stm->fetchAll(PDO::FETCH_OBJ);
      
      
         if ($data) {
             return $data;
         }
         return null;
     }
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



      