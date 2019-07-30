<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"

  "http://www.w3.org/TR/html4/strict.dtd">

<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formularz</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">-->
	<!--<script src="js/jquery-1.11.1.min.js"><script>-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
     
      
     <div class="row">
  <div class="col-sm-12">

/*<*/?php  if($User){
  echo '<form action="/mvc3/Index/Update" method="post">

     <input type="hidden" name="id" value="'.$User[0]->id.'" />
         imie:<br />
     <input type="text" name="imie"
       value="'.$User[0]->imie.'" /><br />
       nazwisko:<br />
     <input type="text" name="nazwisko"
       value="'.$User[0]->nazwisko.'" /><br />
       zawod:<br />
     <input type="text" name="zawod"
       value="'.$User[0]->zawod.'" /><br />
       numer telefonu:<br />
     <input type="text" name="nr_telefonu"
       value="'.$User[0]->nr_telefonu.'" /><br />
       data urodzenia:<br />
     <input type="date" name="data_ur"
       value="'.$User[0]->data_ur.'" /><br />
       email:<br/>
     <input type="text" name="email"
       value="'.$User[0]->email.'" /><br />
       
     <input type="submit" class="btn btn-success" value="popraw" />
         </form>';}
    else {
           echo '<form action="/mvc/Index/" method="post">

          <input type="submit" class="btn btn-success" value="powrót do formularza" />
              </form>';
         }
   ?>
    

  




</div>
 </div>
    </div>
</body>

</html>-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"

  "http://www.w3.org/TR/html4/strict.dtd">

<html lang="pl">
 <head>
   <title>Formularz ajax</title>
   <meta charset="utf-8">
   <link href="../css/bootstrap.min.css" rel="stylesheet">
   <link href="../css/aps.css" rel="stylesheet">
   <script type="text/javascript" src="../js/jquery-3.4.1.js"></script>
   <script src="../js/validations.js" type="text/javascript"></script>
 </head>

 <body>

    <div class="top"> </div>
    <div class="TRESC">
      <div class="navbar-nav">
        <div class="list-group">
           <a href="/mvc3/Index/show_all" class="list-group-item list-group-item-action ">Wyświetl użytkowników</a>
    
           <a href="/mvc3/Index/news" class="list-group-item list-group-item-action active">Formularz</a>
          </div>
        </div>
      </div>
    <div class="container">
        <div class="jumbotron">
         <h1 class="headerSection">Skontaktuj się z nami</h1>
        </div>
      
     <form action="/mvc3/Index/store" method="post">
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label text-primary bg_info" >Imie </label>  
            <div class="col-sm-10">
              <input type="text" name="name"  class="form-control" required="required"  placeholder="Wpisz tu swoje Imie" onkeyup="this.setAttribute('value', this.value);" value=<?=$User[0]->imie?> />
            </div>
        </div>

        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label text-primary">Nazwisko </label>
            <div class="col-sm-10">
              <input type="text" name="surname" class="form-control" required="required" placeholder="Wpisz tu swoje Nazwisko" onkeyup="this.setAttribute('value', this.value);" value=<?=$User[0]->nazwisko?> />
            </div>
        </div>

        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label text-primary">Numer</label>
            <div class="col-sm-10">  
             <input type="text" name="number" class="form-control" required="required" placeholder="Wpisz tu swój numer telefonu" onkeyup="this.setAttribute('value', this.value);" value=<?=$User[0]->nr_telefonu?> pattern="[0-9]*[0-9]{8}"/>
            </div>
        </div>
     
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label text-primary">Zawód</label>
            <div class="col-sm-10">  
             <input type="text" name="trade" class="form-control" required="required"  placeholder="Wpisz tu swój zawód"onkeyup="this.setAttribute('value', this.value);" value=<?=$User[0]->zawod?> >
            </div>
        </div>
        
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label text-primary">Data</label>
            <div class="col-sm-10">  
             <input type="date" name="date" class="form-control" required="required" placeholder="Wpisz tu swoją date urodzenia" onkeyup="this.setAttribute('value', this.value);" value=<?=$User[0]->data_ur?> >
            </div>
        </div>
        
        <div class="form-group row">
            <label for="text" class="col-sm-2 col-form-label text-primary">Email</label>
            <div class="col-sm-10">  
             <input type="email" name="email" class="form-control" required="required" placeholder="Wpisz tu swój Email" value=<?=$User[0]->email?> >
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">  </div>
          <div class="col-sm-10">  
           <div class="emailFormAlert"></div>
          </div>
        </div>

        <div class="form-group row"></div>
          <div class="col-sm-12">  
            <input id="submit" type="submit" value="Wyślij" class="btn btn-primary w-25"/>
           </form>
         </div>
        </div>
      </form>
   </div>
   <div class="STOPKA"> </div>
 </body>
</html>