<?php
//Redirect to home page after 5 seconds
header('Refresh: 5; URL=/');
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    //contact form submission code
    $name = !empty($_POST['nom'])?$_POST['nom']:'';
    $prenom = !empty($_POST['prenom'])?$_POST['prenom']:'';
    $email = !empty($_POST['mail'])?$_POST['mail']:'';
    $message = !empty($_POST['message'])?$_POST['message']:'';
    
    $to = 'contact@enviro-consult.fr';
    $subject = 'Un nouveau formulaire à été soumis';
    $htmlContent = "
        <h1>Details du formulaire</h1>
        <p><b>Nom: </b>".$name."</p>
        <p><b>Prenom: </b>".$prenom."</p>
        <p><b>E-Mail: </b>".$email."</p>
        <p><b>Message: </b>".$message."</p>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
    //send email and shut errors
    @mail($to,$subject,$htmlContent,$headers);
    
    echo '<h2>✔️ Envoi réussi vous allez être redirigé vers la page d\'accueil dans 5 secondes</h2>';
else:
    echo '<h2>✖️ Echec de la requète vous allez être redirigé vers la page d\'accueil dans 5 secondes</h2>';
endif;
?>
