<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public function __construct(
        public string $email,
        public string $nombre,
        public string $token
    ) {}

    public function enviarConfirmacion()
    {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('cuentas@devwebcamp.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu Cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '
                    <!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <title>Confirmar Cuenta</title>
                    </head>
                    <body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:20px;">
                            <tr>
                                <td align="center">
                                    
                                    <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden;">
                                        
                                        <!-- Header -->
                                        <tr>
                                            <td style="background-color:#007df4; padding:20px; text-align:center; color:#ffffff;">
                                                <h1 style="margin:0;">DevWebCamp</h1>
                                            </td>
                                        </tr>

                                        <!-- Body -->
                                        <tr>
                                            <td style="padding:30px; color:#333333;">
                                                <p style="font-size:18px;">
                                                    <strong>Hola ' . $this->nombre . '</strong>
                                                </p>

                                                <p>
                                                    Has registrado correctamente tu cuenta en <strong>DevWebCamp</strong>, pero es necesario confirmarla.
                                                </p>

                                                <p style="text-align:center; margin:30px 0;">
                                                    <a href="' . $_ENV['HOST'] . '/confirmar-cuenta?token=' . $this->token . '" 
                                                    style="background-color:#007df4; color:#ffffff; padding:12px 20px; text-decoration:none; border-radius:5px; display:inline-block; font-weight:bold;">
                                                        Confirmar Cuenta
                                                    </a>
                                                </p>

                                                <p style="font-size:14px; color:#666;">
                                                    Si tú no creaste esta cuenta, puedes ignorar este mensaje.
                                                </p>
                                            </td>
                                        </tr>

                                        <!-- Footer -->
                                        <tr>
                                            <td style="background-color:#f4f6f8; padding:15px; text-align:center; font-size:12px; color:#999;">
                                                © ' . date('Y') . ' DevWebCamp - Todos los derechos reservados
                                            </td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>
                        </table>

                    </body>
                    </html>
                    ';

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones()
    {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('cuentas@devwebcamp.com'); // el que envia el mensaje
        $mail->addAddress($this->email, $this->nombre); // el que lo recibe
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '
                    <!DOCTYPE html>
                    <html lang="es">
                    <head>
                        <meta charset="UTF-8">
                        <title>Reestablecer Password</title>
                    </head>
                    <body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:20px;">
                            <tr>
                                <td align="center">
                                    
                                    <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden;">
                                        
                                        <!-- Header -->
                                        <tr>
                                            <td style="background-color:#00c8c2; padding:20px; text-align:center; color:#ffffff;">
                                                <h1 style="margin:0;">Recuperar Contraseña</h1>
                                            </td>
                                        </tr>

                                        <!-- Body -->
                                        <tr>
                                            <td style="padding:30px; color:#333333;">
                                                
                                                <p style="font-size:18px;">
                                                    <strong>Hola ' . $this->nombre . '</strong>
                                                </p>

                                                <p>
                                                    Has solicitado reestablecer tu contraseña. Presiona el botón de abajo para continuar con el proceso.
                                                </p>

                                                <p style="text-align:center; margin:30px 0;">
                                                    <a href="' . $_ENV['HOST'] . '/reestablecer?token=' . $this->token . '" 
                                                    style="background-color:#00c8c2; color:#ffffff; padding:12px 20px; text-decoration:none; border-radius:5px; display:inline-block; font-weight:bold;">
                                                        Reestablecer Contraseña
                                                    </a>
                                                </p>

                                                <p style="font-size:14px; color:#666;">
                                                    Si tú no solicitaste este cambio, puedes ignorar este mensaje sin problema.
                                                </p>

                                            </td>
                                        </tr>

                                        <!-- Footer -->
                                        <tr>
                                            <td style="background-color:#f4f6f8; padding:15px; text-align:center; font-size:12px; color:#999;">
                                                © ' . date('Y') . ' DevWebCamp - Todos los derechos reservados
                                            </td>
                                        </tr>

                                    </table>

                                </td>
                            </tr>
                        </table>
                    </body>
                    </html>
                    ';

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}
