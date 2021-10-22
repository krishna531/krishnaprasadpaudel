<?php

    if(isset($_POST['Submit'])){

        $to = "krishnapaudel323@gmail.com";
        $from = preg_replace("([\r\n])", "", $_POST['email']);
        $subject = preg_replace("([\r\n])", "", $_POST['subject']);
        $body = $_POST['body'];
    

        $match = "/(bcc:| cc: | content\-type:)/i";
        if (preg_match($match, $from) ||
            preg_match($match, $subject) ||
            preg_match($match, $body)){
                die("Header injection detected.");
            }

        $headers = "From: $from\r\n";
        $headers .= "Reply-to: $from\r\n";
    
        if (mail($to, $subject, $body, $headers)){
            echo "Message sent successfully!!";
        }
    
        else{
            echo "Error: Failed to sent your message!!"
        }
    }
    else{
        die("Direct access not allowed!")
    }

?>
