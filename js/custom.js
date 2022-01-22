/* global $ ,alert , console * */

$ (function (){
    'use strict';

    var userError = true,
        emilError = true;

   

    $ ('.username').blur(function(){
        if ($(this).val().length < 4){

            $(this).css('border','3px solid #842029').parent().find('.custom-alert').fadeIn(200)
            .end().find('.asterisx').fadeIn(100);
            userError = true;
        }else{

            $(this).css('border','2px solid #080').parent().find('.custom-alert').fadeOut(200)
            .end().find('.asterisx').fadeOut(100);
            userError = false;
        } 
    }); 


    $ ('.email').blur(function(){
        if ($(this).val() === ''){

            $(this).css('border','3px solid #842029').parent().find('.custom-alert').fadeIn(200)
            .end().find('.asterisx').fadeIn(100);
            emilError = true;
        }else{

            $(this).css('border','2px solid #080').parent().find('.custom-alert').fadeOut(200)
            .end().find('.asterisx').fadeOut(100);
            emilError = false;
        }
    });
    
    // submit form validation
    $('.contact-form').submit(function(e){
        if (userError === true ||  emilError === true ){
        e.preventDefault();
        $('.username , .email').blur();
        }
      });

     
 
    
});
           
            

           
            
            
          
        
            
            
       
   
   

    

           
           
            
       
           

  
    

   