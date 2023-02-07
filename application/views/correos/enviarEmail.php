<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h5 class="mb-0">Listado de correos enviados</h5>
      </div>
      <!--Cierre de ventana-->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/correo/css/material.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/assets/correo/css/home.css">

    <title>Recibiendo correos</title>



<?php
$con = new mysqli("localhost","root","","epapap"); // Conectar a la BD
if (isset($_REQUEST['enviarform'])) {
    if (is_array($_REQUEST['correo_correo'])) {
        $num_countries = count($_REQUEST['correo_correo']);
        $columna   = 1;
?>
    <div class="row text-center mb-5">
        <div class="col-12">
            <p>Ha enviado un correo a: <strong>( <?php echo $num_countries; ?> )</strong> Registros <hr></p>
        </div>
    </div>
<?php
foreach ($_REQUEST['correo_correo'] as $key => $emailCorreo) {

$cliente ='EPAPAP';

$destinatario = trim($emailCorreo); //Quitamos algun espacion en blanco
$asunto       = "Bienvenido a WebDeveloper";
$cuerpo = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Envio de email de forma masiva</title>';
$cuerpo .= '
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 300;
        color: #888;
        background-color:rgba(230, 225, 225, 0.5);
        line-height: 30px;
        text-align: center;
    }
    .contenedor{
        width: 80%;
        min-height:auto;
        text-align: center;
        margin: 0 auto;
        background: #ececec;
        border-top: 3px solid #E64A19;
    }
    .btnlink{
        padding:15px 30px;
        text-align:center;
        background-color:#cecece;
        color: crimson !important;
        font-weight: 600;
        text-decoration: blue;
    }
    .btnlink:hover{
        color: #fff !important;
    }
    .imgBanner{
        width:100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding:0px;
    }
    .misection{
        color: #34495e;
        margin: 4% 10% 2%;
        text-align: center;
        font-family: sans-serif;
    }
    .mt-5{
        margin-top:50px;
    }
    .mb-5{
        margin-bottom:50px;
    }
    </style>
';

$cuerpo .= '
</head>
<body>
    <div class="contenedor">
    <img class="imgBanner" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/banner2.png">
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    <tr>
        <td style="padding: 0">
            <img style="padding: 0; display: block" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/banner.jpg" width="100%">
        </td>
    </tr>

    <tr>
        <td style="background-color: #ffffff;">
            <div class="misection">
                <h2 style="color: red; margin: 0 0 7px">Hola, '.$cliente.'</h2>
                <p style="margin: 2px; font-size: 18px">te doy la Bienvenida a WebDeveloper, un canal de Desarrollo Web y '.utf8_decode("Programación").'. </p>
            </div>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff;">
        <div class="misection">
            <h2 style="color: red; margin: 0 0 7px">Visitar Canal de Youtube</h2>
            <img style="padding: 0; display: block" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/canal.png" width="100%">
        </div>

        <div class="mb-5 misection">
          <p>&nbsp;</p>
            <a href="https://www.youtube.com/channel/UCodSpPp_r_QnYIQYCjlyVGA" class="btnlink">Visitar Canal </a>
        </div>

        </td>
    </tr>
    <tr>
        <td style="padding: 0;">
            <img style="padding: 0; display: block" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/footer.png" width="100%">
        </td>
    </tr>
</table>';

$cuerpo .= '
      </div>
    </body>
  </html>';

  //Cabecera Obligatoria
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: Epapap <jonathansanto456@gmail.com>' . "\r\n";
  $headers .= 'Cc:jonathansanto456@gmail.com' . "\r\n";
  $headers .= "Bcc:";

  //OPCIONAR
  $headers .= "Reply-To: ";
  $headers .= "Return-path:";
  $headers .= "Cc:";
  $headers .= "Bcc:";

    if(mail($destinatario,$asunto,$cuerpo,$headers)){
        $UpdateEmail = ("UPDATE correo SET notificacion_correo='1'  WHERE correo_correo='".$emailCorreo."' ");
        $resultEmail = mysqli_query($con, $UpdateEmail);
    }

        echo '<div>'. $columna. "). " .$emailCorreo.'</div>';
        $columna ++;
    }
 }
}
?>

    <div class="row text-center mt-5 mb-5">
        <div class="col-12">
            <a href="<?php echo site_url(); ?>/correos/index" class="btn btn-round btn-primary">Volver al Inicio</a>
        </div>
    </div>


<!--Cierre de ventana-->
  </div>
</div>
