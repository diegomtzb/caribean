<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="jquery.colorbox-min.js"></script>
<?php
if(isset($_POST['email'])) {

    // CHANGE THE TWO LINES BELOW
    //$email_to = "direccioncomercial@caribeanservice.com";
    $email_to = "asistentegerencia@caribeanservice.com";
    $email_to_cco = "diegomtzb@hotmail.com";

    $email_subject = utf8_decode ("Reserva Página Web Caribean");

    function died($error) {
        // your error code can go here
        echo "Lo sentimos, pero hay algunos errores con el formulario enviado.";
        //echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        //echo "These errors appear below.<br /><br />";
        echo "Estos errores se muestran a continuación.<br /><br />";
        echo $error."<br /><br />";
        //echo "Please go back and fix these errors.<br /><br />";
        echo "Por favor vuelva para arreglar estos errores.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['city']) ||
        !isset($_POST['email']) ||
        !isset($_POST['tel'])) {
        died('Lo sentimos, pero hay algunos errores con el formulario enviado.');
    }

    $name = $_POST['name']; // required
    $city = $_POST['city']; // required
    $email = $_POST['email']; // required
    $tel= $_POST['tel']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email)) {
        $error_message .= 'El Correo Electrónico ingresado no parece ser válido.<br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$name)) {
        $error_message .= 'El Nombre ingresado no parece ser válido.<br />';
    }
    if(strlen($error_message) > 0) {
        died($error_message);
    }
    $email_message = "Los datos del mensaje se muestran a continuación.\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message .= "Nombre: ".clean_string($name)."\n";
    $email_message .= "Ciudad: ".clean_string($city)."\n";
    $email_message .= "Correo Electrónico: ".clean_string($email)."\n";
    $email_message .= "Teléfono: " . clean_string(tel)."\n";


// create email headers
    $headers = 'From: '.$email."\r\n";
    $headers .= 'Bcc: ' . $email_to_cco . "\r\n".
        'Reply-To: '.$email."\r\n" .
        'MIME-Version: 1.0'."\r\n" .
        'Content-Type: text/plain; charset=UTF-8'."\r\n".
        'X-Mailer: PHP/' . phpversion();
    $mail_status = mail($email_to, $email_subject, $email_message, $headers);

    if ($mail_status) { ?>
        <script language="javascript" type="text/javascript">
            // Print a message
            //alert('Gracias por su mensaje. Nos pondremos en contacto con usted muy pronto.');
            // Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
            //window.location = 'index.php';
            $("#cboxClose").click();
        </script>
    <?php
    }else { ?>
        <script language="javascript" type="text/javascript">
            // Print a message
            alert('Su mensaje no pudo ser enviado. Puede contactarse directamente con nosotros a direccioncomercial@caribeanservice.com');
            // Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
            //window.location = 'index.php';
            $("#cboxClose").click();
        </script>
    <?php
    }?>


    <!-- place your own success html below -->

    Gracias por contactarnos. Nos pondremos en contacto con usted muy pronto.


<?php

}
die();
?>
