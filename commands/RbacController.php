<?php
namespace app\commands {
    use Yii;
    use yii\console\Controller;

    /**
     * Created by PhpStorm.
     * User: wsense
     * Date: 22/04/16
     * Time: 13:03
     */
    class RbacController extends Controller
    {
        /**
         * Identificador de administrador, por default siempre será el primer registro
         */
        const ID_ADMIN = 1;

        /**
         * Este comando genera los roles de usuario y agrega los permisos
         */
        public function actionInit(){
            $auth = Yii::$app->authManager;
            $auth->removeAll();

            // Permiso para administrar el sitio
            $management = $auth->createPermission('management');
            $auth->add($management);
            // Permiso para consumir API el cliente
            $customers = $auth->createPermission('customers');
            $auth->add($customers);
            // Permiso para consumir la API el operador
            $operators = $auth->createPermission('operators');
            $auth->add($operators);
            // Permiso para consumir la API el supervisor
            $direction = $auth->createPermission('direction');
            $auth->add($direction);

            // Cliente
            $client = $auth->createRole('client');
            $auth->add($client);

            // Operador de la ruta
            $operator = $auth->createRole('operator');
            $auth->add($operator);

            // Supervisor
            $supervisor = $auth->createRole('supervisor');
            $auth->add($supervisor);

            // Administrador del sistema
            $administrator = $auth->createRole('administrator');
            $auth->add($administrator);

            // Agregamos permisos de administrador
            $auth->addChild($administrator, $management);
            // Agregamos permisos del cliente
            $auth->addChild($client, $customers);
            // Agregamos permiso a operadores
            $auth->addChild($operator, $operators);
            // Agregamos permiso a Supervisores
            $auth->addChild($supervisor, $direction);


            $auth->assign($administrator, $this::ID_ADMIN);
        }
    }
}