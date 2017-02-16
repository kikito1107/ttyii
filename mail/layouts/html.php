<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<body>
    <table align="center" border="1" cellpadding="0" cellspacing="0" width="600">
        <tr>
            <td bgcolor="#70bbd9" style="color: white; text-align: center">
                <img src="http://sistemahomeopatico.local/img/heart.png" style="width: 200px;height: 200px">
                <h2>Sistema homeopático</h2>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff">
                <p>¡Bienvenido!</p>
                <hr>
                <p>Datos de la cuenta</p>

                <p><b>Nombre:</b> <?= $data['name']; ?></p>
                <p><b>Correo electrónico:</b> <?= $data['email'];?></p>
                <p>
                    Gracias por registrate a sitio.web para terminar da clic en el siguiente enlace y poder iniciar sesión -
                    <?php print '<a href="http://sistemahomeopatico.local/paciente/activate?id='.$data['id'].'">Validar cuenta</a>'?>
                </p>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ee4c50" style="text-align: center">
                <p>Sistema homeopático - Desarrollado por alumnos del ipn</p>
            </td>
        </tr>
    </table>
</body>
