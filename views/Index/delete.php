<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"

  "http://www.w3.org/TR/html4/strict.dtd">

<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formularz</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 </head>
 <body>
    <div class="container">
     <div class="row">
       <div class="col-sm-12">
         <?php
         if($User) {?>
          <br><i>Usunąłeś swoje dane: <?= $User ?></i></br>
            <form action="/mvc3/Index/news" method="post">
             <input type="submit" class="btn btn-success" value="powrót do formularza" />
            </form>
          <?php } else{?>
         <div class="row">
            <div class="col-md-12 text-center">
              <h3>Nie udało sie usunac uzytkownika.</h3>
            </div>
          </div>
         <?php }?>
       </div>
     </div>
   </div>
 </body>
</html>