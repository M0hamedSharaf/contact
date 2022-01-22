<?php
// check if user coming from A recuset

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    // Assign variables
   //$data = $user $mail $cell $msg;
  
   
  
    $user=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $mail=filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $cell=filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT); 
    $msg=filter_var( $_POST['message'], FILTER_SANITIZE_STRING);

 
   // cvrailng Array of Errors

     $formErros=array();

     if(strlen($user) <= 3 ){

         $formErros[]='username must be larger than <strong>3</strong> charaters';
     }
     if(strlen($mail) < 10 ){
        
         $formErros[]='message can\'t be less than <strong>10</strong> charaters';
     }

    // if no errors send the Email
     
    // $header='form:'.$mail.'\r\n';
    //  $myEmail='sazxsazx987987@gmail.com';
    //  $subject='contact form';

    if(empty($formErros)){
    
        // mail($myEmail, $subject,$msg,$header);
       $data=[
        $user,
        $mail,
        $cell,
        $msg ];
      file_put_contents("DATA.txt", $data);

        $user='';
        $mail='';
        $cell='';
        $msg='';


        $success='<div class="alert alert-success">We have recieved</div>';



    }
     
   
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@700;900&display=swap">
    <title>contact form</title>
</head>
<body>

<!-- start form -->
<div class="container">
    <h2 class="text-center">Contact Me</h2>
    
    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            
                <?php if(! empty ($formErros)){ ?>
                    <div class="alert alert-danger alert-dismissible " role="start">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <?php
                    foreach($formErros as $error){

                        echo $error."<br>";
                    }
                ?>
                    </div >

               <?php } ?>
               
             <?php if(isset($success)) { echo $success;} ?> 
               
        <div class="form-group">
                <input 
                    class="username form-control"
                    type="text" 
                    name="username" 
                    value="<?php if(isset($user)) {echo $user ; } ?>"
                    placeholder="type your user name">
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                username must be larger than <strong>3</strong> charaters
                </div>
        </div>
        <div class="form-group">
                <input 
                    class="email form-control" 
                    type="email"  
                    name="email"
                    value="<?php if(isset($mail)){echo $mail ;} ?>" 
                    placeholder="please type valid Email">

                <i class="fa fa-envelope fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                Email can't Be <strong>Empty</strong>
                </div>
         </div>
        <input 
            class="form-control" 
            type="text" 
            name="cellphone" 
            value="<?php if(isset($cell)){echo $cell ;} ?>" 
            placeholder="Type your cellphone">

         <i class="fa fa-phone fa-fw"></i>

        <textarea 
            class="form-control"  
            placeholder="Your message !"
            name="message"><?php if(isset($msg)){echo $msg ;} ?></textarea>
            
        <input
            class="btn btn-success" 
            type="submit" 
            value="send message">

         <i class="fa fa-send fa-fw send-icon"></i>

    </form> 

</div>



<!-- End form -->





<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>