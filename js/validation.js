$(function(){

  'use strict';
  const name = document.getElementsByName('name')[0];
  const surname = document.getElementsByName('surname')[0];
  const trade = document.getElementsByName('trade')[0];
  const number = document.getElementsByName('number')[0];
  const date = document.getElementsByName('date')[0];
  const email = document.getElementsByName('email')[0];

  const formAlert = document.querySelector(".emailFormAlert");
   const contactForm = $('#contact');
   

 function toggleContactForm(state) {
   if (typeof state !== 'boolean') return TypeError('State must be a boolean');

    if (state === true) {
      contactForm.fadeIn();
    
    }
    else {
      contactForm.fadeOut();
      name.value='';
      surname.value='';
      trade.value='';
      number.value='';
      date.value='';
      email.value='';
      formAlert.innerHTML='';
  
    }
  }

  const closeContactBtn = $('#close-contact-btn');
  const openContactBtn = $('#open-contact-btn');

 openContactBtn.click(function () {
    toggleContactForm(true);
  });

  closeContactBtn.click(function () {
    toggleContactForm(false);
  });

  $('.btn ').click(function (event) {
 
    formAlert.innerHTML='<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>';
    if(event.preventDefault!=false){
    event.preventDefault();}
      const isValid = validateEmailForm();
      
     // var formData = $(form).serialize();

   if(isValid===true ){
      const sendEmail = $.ajax({
            type: "POST",
            url: "../email.php",
    
       
            data: //formData,
               {'name' : name.value,
                'surname' : surname.value,
                'trade' : trade.value,
                'number' : number.value,
                'date' : date.value,
                'email' : email.value
                },
        
             success:function(json_data) {
              var data = $.parseJSON(json_data);
               if(data=="tak"){
                                //alert("Niestety twój email jest zajęty"); 
                                WrongInput(email,"Email zajęty");
                                wrongElement.classList.add('WrongInput');
                                }
               
else {

 $('.btn ').unbind('click');
event.currentTarget.click();
}
                                },
                 error: function(blad) {
                 alert( "Wystąpił błąd");
                 console.log(blad);
                    }
                    });
     
                      
                           
      sendEmail.fail(function(error) {
        formAlert.innerHTML='Coś poszło nie tak :( '+error.responseText;
      });

      sendEmail.done(function(response){
        formAlert.innerHTML=response.text;
      });
   }
 });


   function validateEmailForm(){
 
      if(email.validity.valueMissing){
       WrongInput(email,"Podaj email!");
      }
      else if(email.validity.valid===false){
       WrongInput(email,"Podaj poprawny email!");
      }
      else if (name.validity.valueMissing){
        WrongInput(name,"Wpisz jakieś imie");
      }
      else if (surname.validity.valueMissing){
       WrongInput(surname,"Wpisz jakieś nazwisko!");
      }
      else if (trade.validity.valueMissing){
       WrongInput(trade,"Wpisz jakiś zawód,może być zmyślony!");
      }
      else if (number.validity.valueMissing){
       WrongInput(number,"Wpisz jakiś numer telefonu,może być ładnej sąsiadki!");
      }
      else if (number.validity.patternMismatch){
        WrongInput(number,"Wpisz ciąg znaków składajacy sie z minimum 8 cyfr!");
      }
      else if (date.validity.valueMissing){
       WrongInput(date,"Podaj date urodzenia!");
      }
      else return true;
    
    }
  
    function WrongInput(wrongElement,alert){
      formAlert.innerHTML=alert;
      if (wrongElement!=null){
	  wrongElement.classList.add('WrongInput');}
    else{
  
	  this.classList.remove('WrongInput')}
      wrongElement.addEventListener("blur", function (){this.classList.remove('WrongInput')});
    }
 });

