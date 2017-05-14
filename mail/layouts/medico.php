<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 16/02/17
 * Time: 00:32
 */
use yii\helpers\Url;

?>
<table align="center" border="1" cellpadding="0" cellspacing="0" width="600">
    <tr>
        <td bgcolor="#70bbd9" style="color: white; text-align: center">
            <img src="<?= Url::base()?>/img/heart.png" style="width: 200px;height: 200px">
            <h2>Sistema homeopático</h2>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff">
            <h3>¡Bienvenido!</h3>
            <hr>
            <p>Se te acaba de dar de alta al sistema, con los siguientes datos podrás accesar a tu cuenta y no olvides completar tu registro de usuario</p>

            <h5>Datos de la cuenta</h5>

            <p><b>Nombre usuario: </b> <?= $data['name']; ?></p>
            <p><b>Correo electrónico: </b> <?= $data['email'];?></p>
            <p><b>contraseña: </b> <?= $data['password']?></p>
            <p>
               <a href="<?= Url::base()?>">Iniciar sesión</a>
            </p>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ee4c50" style="text-align: center">
            <p>Sistema homeopático - Desarrollado por alumnos del ipn</p>
        </td>
    </tr>
</table>
