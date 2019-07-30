<?php
require_once 'conect.php';
class Index extends Controller{
    function __construct($params){
     parent::__construct();

     $this -> view -> controller = "Index";
     $this -> view -> page = $params[1];
     require_once 'models/Index_model.php';
     $this -> model = new Index_model();


  
     $action=$params;
     if(isset($params[1])) $action = ucfirst($params[1]);

     $this -> news =$params[1];
     if(isset($params[2])) $this -> date = ucfirst($params[2]);
     $this -> user ="formularz";
     if(isset($params[3])) $this-> time = ucfirst($params[3]);
     $this -> $action($this -> news, $this -> user);
    }

    private function News($news, $user){
   
        $this -> view -> Render($news,$user);
    }
  

    private function Show(){
        $user= new Model();
        $user = $user->getAll();
        $this -> view -> User = $user;
        $this -> view -> Render($show,$user);
        return $user;
        
    }

    private function Store(){
       
        $imie=$_POST["name"];

        $nazwisko=$_POST["surname"];

        $zawod=$_POST["trade"]; 
       
        $nr_telefonu=$_POST["number"]; 
       
        $data_ur=$_POST["date"];
       
        $email=$_POST["email"];
        $imie = htmlentities($imie,ENT_QUOTES,"UTF-8" );
        $tab[0]=$imie;
        $nazwisko = htmlentities($nazwisko,ENT_QUOTES,"UTF-8" );
        $tab[1]=$nazwisko;
        $zawod = htmlentities($zawod,ENT_QUOTES,"UTF-8" );
        $tab[2]=$zawod;
        $nr_telefonu = htmlentities($nr_telefonu,ENT_QUOTES,"UTF-8" );
        $tab[3]=$nr_telefonu;
        $tab[4]=$data_ur;
        $email = htmlentities($email,ENT_QUOTES,"UTF-8" );
        $tab[5]=$email;
        /*$zm= new Index_model();
        $foo=$zm -> Valid($tab);*/
      
        //if($foo=="Poprawnie wypełniony formularz"){
          $instance=connect_DB::getInstance();
         $query="INSERT INTO testowa values ('',?,?,?,?,?,?)";
       //$query="INSERT INTO testowa values ('','$imie','$nazwisko','$zawod','$nr_telefonu','$data_ur','$email')";
          $stmt = $instance->prepare($query);
          $stmt->bindParam(1, $imie,  PDO::PARAM_STR,12);
          $stmt->bindParam(2, $nazwisko, PDO::PARAM_STR, 12);
          $stmt->bindParam(3, $zawod, PDO::PARAM_STR, 12);
          $stmt->bindParam(4, $nr_telefonu, PDO::PARAM_INT);
          $stmt->bindParam(5, $data_ur, PDO::PARAM_LOB);
          $stmt->bindParam(6, $email, PDO::PARAM_STR,12);
          $stmt->execute();
          $store="store";
 
          $user= new Model();
          $user = $user->getAll();
         

           $this -> view -> Render($store,$user);
       // }
          /* else{
               $user=$foo;
               $store="store";
            $this -> view -> Render($store,$user);
           }*/
    }

    private function Delete(){
       
        $value=$_POST["id"];
        $user= new Model();
        $user = $user->getBy($value);
        $instance=connect_DB::getInstance();
        $q = "SELECT imie FROM testowa WHERE id='$value'";
        $data = $instance->query($q);
        $row = $data->fetch();
        $user=$row['imie'];

      
        $query="DELETE FROM testowa  WHERE id= '$value'";
          $stm = $instance->prepare($query);
          $stm->execute();
        $delete="delete";

        $this -> view -> Render($delete,$user);
    }

    private function Edit(){
       
        $value=$_POST["id"];
        $user= new Model();
        $user = $user->getBy($value);
        $edit="edit";

        $this -> view -> Render($edit,$user);
    }
    private function Update(){
       
        $id=$_POST["id"];
        $imie=$_POST["imie"];
        $imie = htmlentities($imie,ENT_QUOTES,"UTF-8" );
        $nazwisko=$_POST["nazwisko"];
        $nazwisko = htmlentities($nazwisko,ENT_QUOTES,"UTF-8" );
        $zawod=$_POST["zawod"];
        $zawod = htmlentities($zawod,ENT_QUOTES,"UTF-8" );
        $nr_telefonu=$_POST["nr_telefonu"];
        $nr_telefonu = htmlentities($nr_telefonu,ENT_QUOTES,"UTF-8" );
        $data_ur=$_POST["data_ur"];
        $email=$_POST["email"];
        $email = htmlentities($email,ENT_QUOTES,"UTF-8" );

        $instance=connect_DB::getInstance();
        //$query="UPDATE testowa SET imie='$imie', nazwisko='$nazwisko',zawod='$zawod',nr_telefonu='$nr_telefonu',data_ur='$data_ur' ,email='$email' WHERE id='$id'";
        $query="UPDATE testowa SET imie=?, nazwisko=?,zawod=?,nr_telefonu=?,data_ur=?,email=? WHERE id='$id'";
        $stmt = $instance->prepare($query);
        $stmt->bindParam(1, $imie,  PDO::PARAM_STR,12);
        $stmt->bindParam(2, $nazwisko, PDO::PARAM_STR, 12);
        $stmt->bindParam(3, $zawod, PDO::PARAM_STR, 12);
        $stmt->bindParam(4, $nr_telefonu, PDO::PARAM_INT);
        $stmt->bindParam(5, $data_ur, PDO::PARAM_LOB);
        $stmt->bindParam(6, $email, PDO::PARAM_STR,12);
        $stmt->execute();

        $user= new Model();
        $user = $user->getBy($id);
      
        $update="update";
        $this -> view -> Render($update,$user);
    }
    private function Show_all(){
       
     
        $user= new Model();
        $user = $user->getAll2();
        $show_all="show_all";

        $this -> view -> Render($show_all,$user);
    }
 public function Email(){
       
     
        $user= new Index_model();
        $user = $user->Inf();
        $email="email";

        $this -> view -> Render($email,$user);
    }

}