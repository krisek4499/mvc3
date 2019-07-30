<?php
require_once 'conect.php';

class Index_model extends Model {
    protected $table = 'testowa';
    public function __construct(){
       parent::__construct();
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
    
   
   
    /*public function Valid($user){
      $User=$user;
      $valid=true;
      $error="brak";

     
     $imie = $User[0];
      
  

     if ($imie==null)  $valid=false;

     $nazwisko = $User[1];
     if($nazwisko==null) $valid=false;

     $zawod = $User[2];
     if($zawod==null) $valid=false;
     
     $nr_telefonu = $User[3];
     if($nr_telefonu==null) $valid=false;
     
     $data_ur = $User[4];
     if($data_ur==null) $valid=false;

     $email = $User[5];
     if($email==null) $valid=false;

     $sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
     $zm=0;
                            if (!preg_match($sprawdz, $email)) 
                                 {
                                  $zm=$zm+1;
                                  } 
        if($email==null) {$error="wypełnij wszystkie pola";  }     
                   
        else if($zm>0)   {$error="niepoprawny email";
        }
       if (strlen($nr_telefonu)!=9 && !is_int($nr_telefonu)) {$error="niepoprawny numer telefonu";}

        If($valid==true&&$error=="brak")$result="Poprawnie wypełniony formularz";
        else{
          if($error=="niepoprawny email"){
            $result="niepoprawny email";
          }
          else if($error=="niepoprawny numer telefonu"){
            $result="niepoprawny numer telefonu";
          }
          else{  $result="wypełnij wszystkie pola";}
        }

    return $result;
   
    }*/
}