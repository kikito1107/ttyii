<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Medico;
use app\models\Paciente;
use auth\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\citas;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="messaging">
    <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--suppress HtmlUnknownTarget -->
    <script src="<?php echo Url::base() ?>/js/main.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,100,300' rel='stylesheet' type='text/css'>
    <link href='css/source.css' rel='stylesheet' type='text/css'>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC81Qn9292OklIJhdtjPPGknJuJEy9woJ4&libraries=places"></script>
        <link href="bower_components/angular-bootstrap-calendar/dist/css/angular-bootstrap-calendar.min.css" rel="stylesheet">
        <script src="bower_components/angular-bootstrap-calendar/dist/js/angular-bootstrap-calendar-tpls.min.js"></script>
</head>
<body class="theme-4">
<?php $this->beginBody() ?>

<script type="text/javascript">
    Messaging = {
        baseUrl: '<?php echo Url::base() ?>/'
    };
</script>
<div class="layout-container" ng-controller="MainController">
    <header class="header-container blue-grey darken-4">
        <nav>
            <ul>
                <li class="visible-xs visible-sm hidden-md">
                    <a href="javascript:void(0);" id="sidebar-toggler" class="menu-link menu-link-slide"><span><em></em></span></a>
                </li>
            </ul>
            <h2 class="header-title"><?= Yii::t('app', 'Sistema Homeopático') ?></h2>
            <?php if(!\Yii::$app->user->isGuest): ?>
            <ul class="pull-right">
                <li uib-dropdown class="dropdown">
                    <a uib-dropdown-toggle href="javascript:void(0);" class="dropdown-toggle ripple" aria-haspopup="true" aria-expanded="false">
                        <em class="fa fa-cog"></em>
                        <span class="md-ripple"></span>
                    </a>
                    <ul dropdown-menu class="dropdown-menu dropdown-menu-right md-dropdown-menu">
<!--                        <li class="ripple ripple-block">-->
<!--                            <a href="--><?php //echo Url::to(['/auth/profile/view']) ?><!--">-->
<!--                                <em class="fa fa-home"></em>-->
<!--                                --><?php //echo Yii::t('app', 'Mi perfil') ?>
<!--                            </a>-->
<!--                            <span class="md-ripple"></span>-->
<!--                        </li>-->
                        <li role="presentation" class="divider"></li>
                        <li class="ripple ripple-block">
                            <a href="<?php echo Url::to(['/auth/default/logout']) ?>">
                                <em class="fa fa-sign-out"></em>
                                <?php echo Yii::t('app', 'Cerrar sesión') ?>
                            </a>
                            <span class="md-ripple"></span>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php endif; ?>
        </nav>
    </header>
    <?php if(!\Yii::$app->user->isGuest) {
        echo '<aside class="sidebar-container teal lighten-1">';
    } else {
        echo '<aside class="sidebar-container" style="background: #eceff1"> ';
    }?>
            <div class="sidebar-header text-center ">
            <a href="<?= Url::to(['/site/index']) ?>">
                <!--suppress HtmlUnknownTarget -->
                <em style="font-size: 47px;margin-top: 10px;" class="fa fa-heartbeat white-text "></em>
            </a>
        </div>
        <?php if (!\Yii::$app->user->isGuest): ?>
        <div class="sidebar-content">
            <nav class="sidebar-nav">
                <ul>
                    <?php $id = \Yii::$app->user->getId();?>

<!-----------------------------------------------PACIENTE--------------------------------------------------->

                    <?php if(Paciente::find()->where(['user_id' => $id])->one() != null): ?>
                        <?php $paciente = Paciente::find()->where(['user_id' =>$id])->one();?>
                        <!-- < ?php Cita::find()->where(['paciente_id' => $paciente->id])->one;?> -->
                        <li><strong><p class="text-center">Paciente</p></strong></li>
                        <li>
                            <a href="<?= Url::to(['/paciente/profile', 'id' => $paciente->id]) ?>" class="ripple">
                                <em class="fa fa-user-md"></em>
                                <span><?= Yii::t('app', 'Perfil') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/cita']) ?>" class="ripple">
                                <em class="fa fa-calendar"></em>
                                <span><?= Yii::t('app', 'Gestión de citas') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/receta']) ?>" class="ripple">
                                <em class="fa fa-list-alt"></em>
                                <span><?= Yii::t('app', 'Ver receta') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>

<!-----------------------------------MEDICO---------------------------------------------------------------------------->
                    <?php elseif (Medico::find()->where(['user_id' =>$id])->one() != null): ?>
                        <?php $medico = Medico::find()->where(['user_id' =>$id])->one();?>
                        <?php $info = $medico->validateData()?>
                        <li><strong><p class="text-center">Médico</p></strong></li>
                        <li>
                            <a href="<?= Url::to(['/medico/view', 'id' => $medico->id]) ?>" class="ripple">
                                <em class="fa fa-user-md"></em>
                                <span>
                                    <?php if($info == false): ?>
                                        <?= Yii::t('app', 'Perfil
                                            <span data-tooltip="Debes de completar tu perfil" style="position: absolute;
                                                top: 27px;
                                                height: 4px;
                                                right: 100px;
                                                
                                                width: 30px;">
                                                <label class="label label-danger" style="position: relative;
                                                    top: -29px;
                                                    padding: 5px 46px 5px 6px;
                                                    text-align: center;">
                                                    <span class="glyphicon glyphicon-info-sign">&nbsp;</span>
                                                </label>
                                             </span>
                                        ') ?>
                                    <?php else: ?>
                                        <?= Yii::t('app', 'Perfil') ?>
                                    <?php endif;?>


                                </span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/paciente', 'id' =>$medico->id]) ?>" class="ripple">
                                <em class="fa fa-wheelchair"></em>
                                <span><?= Yii::t('app', 'Pacientes') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/']) ?>" class="ripple">
                                <em class="fa fa-stethoscope"></em>
                                <span><?= Yii::t('app', 'Realizar consulta') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/cita/index-m', 'id' => $medico->id]) ?>" class="ripple">
                                <em class="fa fa-calendar"></em>
                                <span><?= Yii::t('app', 'Gestión de citas') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/repertorio']) ?>" class="ripple">
                                <em class="fa fa-book"></em>
                                <span><?= Yii::t('app', 'Modificar repertorio') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                    <?php else: ?>
<!----------------------------------------------------ADMIN---------------------------------------------------->
                        <!--Layout de ADMIN-->
                        <li><strong><p class="text-center">Administrador</p></strong></li>
                        <li>
                            <a href="<?= Url::to(['/auth/profile/view']) ?>" class="ripple">
                                <em class="fa fa-medkit"></em>
                                <span><?= Yii::t('app', 'Administración') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/medico']) ?>" class="ripple">
                                <em class="fa fa-user-md"></em>
                                <span><?= Yii::t('app', 'Médicos') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/paciente']) ?>" class="ripple">
                                <em class="fa fa-wheelchair"></em>
                                <span><?= Yii::t('app', 'Pacientes') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/repertorio']) ?>" class="ripple">
                                <em class="fa fa-book"></em>
                                <span><?= Yii::t('app', 'Repertorio') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/notificaciones']) ?>" class="ripple">
                                <em class="fa fa-feed"></em>
                                <span><?= Yii::t('app', 'Notificaciones') ?></span>
                                <span class="md-ripple"></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <!--<? //= Paciente::findOne(\Yii::$app->user->getId())->user_type ?> -->
                </ul>
            </nav>
        </div>
        <?php endif;?>
    </aside>
    <div class="sidebar-layout-obfuscator"></div>
    <main class="main-container">
        <section>
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <?= $content ?>

            </div>
        </section>
    </main>
    <footer class=" blue-grey darken-2" style="position:fixed;bottom:0px;left:0px;right:0px;margin-bottom:0px;">
        <div class="container white-text">
            <div class="col-md-5">
                <p> Desarrollado por <a class="orange-text text-lighten-3" href="">Alumnos de la Escuela Superior de Cómputo</a></p>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>