<?php 
namespace Classes;
use Dotenv\Dotenv as Dotenv;
$dotenv = Dotenv::createImmutable('../includes/.env');
$dotenv->safeLoad();
use PHPMailer\PHPMailer\PHPMailer;

Class Email{

    public $email;
    public $nombre;
    public $token;
    

    public function __construct($email,$nombre,$token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){
        //Crear el obj de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['PORT'];
        $mail->Username = $_ENV['USER'];
        $mail->Password = $_ENV['PASS'];
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('yrk.27.medina@gmail.com');
        $mail->addAddress('yrk.27.medina@gmail.com','Appsalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ".$this->nombre."</strong> Has creado tu cuenta en AppSalon, solo debes confirmarla presionando el siguiente enlace.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['SERVER_HOST'] . "confirmar-cuenta?token=". $this->token ."'>Confirmar Cuenta</a></p>";//http://localhost:3000
        $contenido .= '<p>Si no solicitaste esta cuenta, puedes ignorar el mensaje</p>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();

        /**MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=fbce7677b12432
MAIL_PASSWORD=1d8f9c16198f32
MAIL_ENCRYPTION=tls */
    }

    public function enviarInstrucciones(){
        //Crear el obj de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['PORT'];
        $mail->Username = $_ENV['USER'];
        $mail->Password = $_ENV['PASS'];
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('yrk.27.medina@gmail.com');
        $mail->addAddress('yrk.27.medina@gmail.com','Appsalon.com');
        $mail->Subject = 'Reestablece tu contraseña';


        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ".$this->nombre."</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['SERVER_HOST'] . "recuperar?token=". $this->token ."'>Reestablecer Contraseña</a></p>";
        $contenido .= '<p>Si no solicitaste reestablecer tu contraseña, puedes ignorar el mensaje</p>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}

?>

