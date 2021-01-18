<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  
  require 'PHPMailer-master\PHPMailer-master\src\Exception.php';
  require 'PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
  require 'PHPMailer-master\PHPMailer-master\src\SMTP.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if (!empty($_POST['name'])) {
        $name =  $_POST['name'];
    } else {
    $name = FALSE;      
    }
 
    if (!empty($_POST['subject'])) {
            $subject = $_POST['subject'];
    } else {
    $p = FALSE;
    }
    if (!empty($_POST['body'])) {
        $body =  $_POST['body'];
    } else {
    $p = FALSE;
    }
    if($name && $subject && $body)
    {
       
        
        
        
        
        $mail = new PHPMailer(true); 
        
        try { 
            $mail->SMTPDebug = 2;                                        
            $mail->isSMTP();                                             
            $mail->Host       = 'smtp.gmail.com;';                     
            $mail->SMTPAuth   = true;                              
            $mail->Username   = 'luuduckhanharsenal@gmail.com';                  
            $mail->Password   = 'matkhaugmail';                         
            $mail->SMTPSecure = 'tls';                               
            $mail->Port       = 587;   
        
            $mail->setFrom('from@gfg.com', $name);            
            $mail->addAddress('luuduckhanharsenal@gmail.com'); 
            
            
            $mail->isHTML(true);                                   
            $mail->Subject = $subject; 
            $mail->Body    = $body; 
            $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
            $mail->send(); 
            header('location:senmail_thank.php');
        } catch (Exception $e) { 
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
        } 

    
    }
    else
    {
        echo'<h1>You have not completed the information.Please <strong><a href="index.php">Go back<a/></strong> and finish the job!</h2><br>';
        echo'';
    }  
    }
    
  
?> 



