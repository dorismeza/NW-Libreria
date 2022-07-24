<?php

namespace Controllers\Sec;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Controllers\PublicController;
use Exception as GlobalException;
use PhpParser\Node\Stmt\TryCatch;
use \Utilities\Validators;
//use Exception;
require_once 'vendor/autoload.php';
class Recuperar extends PublicController
{
    private $txtEmail = "";
    private $errorEmail ="";
    private $hasErrors = false;
    public function run() :void
    {

        if ($this->isPostBack()) {
            $this->txtEmail = $_POST["txtEmail"];
            //validaciones
            if (!(Validators::IsValidEmail($this->txtEmail))) {
                $this->errorEmail = "El correo no tiene el formato adecuado";
                $this->hasErrors = true;
            }
            
            if (!$this->hasErrors) {
                try{
                    if ($dbUser = \Dao\Security\Security::getUsuarioByEmail($this->txtEmail)) {
                        if ($dbUser["userest"] != \Dao\Security\Estados::ACTIVO) {
                            $this->generalError = "¡Este usuario no esta activo!";
                            $this->hasError = true;
                             error_log(
                                 sprintf(
                                    "ERROR: %s tiene cuenta con estado %s",
                                    $dbUser["useremail"],
                                    $dbUser["userest"]
                                )
                            );
                        }else{
                            $mail = new PHPMailer(true);
                            try{
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER;//ver los mensajes del server
                                $mail->isSMTP(); //indicando que vamos a usar SMTP
                                $mail->Host = 'smtp.gmail.com'; //se busca el host
                                $mail->SMTPAuth = true; //autenticacion de smtp
                                $mail->Username = 'librerianegociosweb@gmail.com';//de donde se van a estar enviando los correos
                                $mail->Password = 'LibreriaNegocios22';
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port = 587; 

                                $mail->setFrom('librerianegociosweb@gmail.com','LIBRERIA'); // de donde se va a enviar 
                                $mail->addAddress($this->txtEmail = $_POST["txtEmail"],'YOP'); // a que correo se va enviar
                               $mail->addCC('dfulano058@gmail.com');// es una replica
                               $mail->isHTML(true);
                               $mail->Subject = 'Prueba de Correo';
                               $mail->Body = 'Esta es una prueba de <b>Recuperacion de Contrasena</b>';
                               $mail->send();
                               echo 'Correo Enviado';

                            }catch(Exception $e){
                                echo 'Mensaje'.$mail->ErrorInfo;
                            }
                            
                        }
                    }
                } catch (Error $ex){
                    die($ex);
                }
            }
        }
        $viewData = get_object_vars($this);
        \Views\Renderer::render("security/recuperar", $viewData);
    }
}
