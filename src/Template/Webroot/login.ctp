<?php
/**
 * =====================================================================
 * Página de Acceso al CRM App
 * =====================================================================
 * @author    ComercialSEO CRM GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.AltaEmpresas.es v-1.01
 * @since     3.7
 * @see       Pública 
 * =====================================================================
*/
use Settings\Core\Setting;
$this->layout = false;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRM DSCS</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="layout/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="layout/font-awesome/css/font-awesome.min.css"/>
    <!-- NProgress -->
    <link rel="stylesheet" href="layout/nprogress/nprogress.css"/>
    <!-- Animate.css -->
    <link rel="stylesheet" href="layout/animate.css/animate.min.css"/>

    <!-- Custom Theme Style -->
    <?= $this->Html->css(['custom.min']) ?>
  </head>

  <body class="login">
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= $this->Form->create() ?>
              <h1>Acceso al CRM</h1>
              <div>
                <?= $this->Form->control('us_usuario', [
                      'type'        => 'text',
                      'class'       => 'form-control',
                      'placeholder' => 'Usuario *',
                      'label'       => false,
                      'required'    => true
                ]) ?>
              </div>
              <div>
                <?= $this->Form->control('us_password', [
                      'type'        => 'password',
                      'class'       => 'form-control',
                      'placeholder' => 'Password *',
                      'label'       => false,
                      'autocomplete' => 'off',
                      'required'    => true
                ]) ?>
              </div>
              <div>
                <?= $this->Form->button('Login', [
                    'class'       => 'btnSubmit'
                ]) ?>
                <a class="reset_pass" href="#">Recordar Password de Acceso</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1>CRM de Gestión Interna<br /><br /><?= h(Setting::read('App.RazSoc')) ?></h1>
                  <p>©<?= date('Y') ?> Todos los derechos reservados</p>
                </div>
              </div>
            <?= $this->Form->end() ?>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            XXXXXXXXXXXXXXXXXXX
          </section>
        </div>
      </div>
    </div>
  </body>
</html>