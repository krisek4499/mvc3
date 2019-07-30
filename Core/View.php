<?php


class View{
   protected $data = [];

    function __construct(){
  
       }
       public function Render($where,$tab){

         $User=$tab;
         $Where=$where;
      
         if($Where==="news"){
          require_once 'views/Index/news.php';
    
          $this -> page=$Where;
         }
         else if($Where==="store"){
            require_once 'views/Index/store.php';
      
            $this -> page=$Where;
           }
           else if($Where==="show"){
         
            require_once 'views/Index/show.php';
            $this -> page=$Where;
           }
           else if($Where==="delete"){
         
            require_once 'views/Index/delete.php';
            $this -> page=$Where;
           }
           else if($Where==="edit"){
         
            require_once 'views/Index/edit.php';
            $this -> page=$Where;
           }
           else if($Where==="update"){
         
            require_once 'views/Index/update.php';
            $this -> page=$Where;
           }
           else if($Where==="show_all"){
         
            require_once 'views/Index/show_all.php';
            $this -> page=$Where;
           }
           else if($Where==="email"){
         
            require_once 'views/Index/email.php';
            $this -> page=$Where;
           }
           else {
                require_once 'views/Error.php';
                }

                 $plik="";
                 if (isset($this -> controller)&&isset($this -> page))
                 $plik = 'views/' . $this ->  controller . '/' . $this -> page. '.php';
                   if(file_exists($plik)){
                    require_once $plik;
                    }
                    else{
                        $this -> message = "Nie znaleziono pliku!";
                        require_once 'views/Error.php';
                        }
       }
}