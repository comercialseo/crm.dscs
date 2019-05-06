<?php
/**
 * =====================================================================
 * Vista de Edición de Usuarios de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppUsuariosTable $AppUsuarios
 * @method    \App\Model\Entity\AppUsuario[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?></li>
        <li class="pdd-laterales-10"><?= $this->Form->postLink(
                __('<i class="fa fa-trash-o"></i> Borrar Usuario'),
                ['action' => 'borrar', $appUsuario->id],
          ['confirm' => __('¿Confirmas que deseas borrar a este usuairo # {0}?', $appUsuario->id), 
           'class' => 'btn btn-danger btn-xs', 'escape' => false
        ]
            )
        ?></li>
    </ul>
</nav>

<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
<div class="x_content">
  <?= $this->Form->create($appUsuario, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
  <span class="section">Formulario de Edición de Datos de Usuario <small><?= $appUsuario->us_usuario ?></small></span>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="El nombre de usuario tiene que estar compuesto por una palabra sin acentos, mayúsculas ni la letra eñe"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a> Usuario <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('us_usuario', [
                      'class'       => 'form-control col-md-7 col-xs-12',
                      'label'       => false,
                      'required'    => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
      <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Si no deseas cambiar el password del usuario puedes dejar este campo en blanco"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
      Password
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('us_password', [
                                                'label'        => false,
                                                'class'       => 'form-control col-md-7 col-xs-12',
                                                'value'        => '',
                                                'type'         => 'password',
                                                'autocomplete' => 'new-password',
                                                'required'    => false
                                            ]);

      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('us_email', [
                      'class'       => 'form-control col-md-7 col-xs-12',
                      'type'        => 'email',
                      'label'       => false,
                      'required'    => 'required'
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('us_nombre', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '6',
                      'data-validate-words'        => '2',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellidos</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('us_apellidos', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '6',
                      'data-validate-words'        => '2',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nivel de Acceso <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->select('us_rol', [
                                              'sa' => 'SuperAdmin',
                                              'ad' => 'Administrador',
                                              'ed' => 'Editor',
                                              'au' => 'Autor',
                                              'us' => 'Invitado',
                                              'cl' => 'Cliente'
                                             ],
                                             [
                                              'id'       => 'us-rol',
                                              'class'    => 'form-control col-md-7 col-xs-12',
                                              'multiple' => false,
                                              'value'    => [$appUsuario->us_rol],
                                              'label'    => false,
                                              'required' => false
                                              ]
                                                                    
                                            );
      ?>
    </div>
  </div>
  <div class="item form-group" id="us-asociado" style="display: none;">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Usuario Asociado a la Cuenta <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      XXXXXXXXXXXXXXXXXXX
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><a data-toggle="tooltip" data-placement="top" title="" data-original-title="Si este campo está marcado el usuario podrá acceder al sistema, de lo contrario no podrá"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a> Validado <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('us_valido', [
                                         'class' => 'form-control', 'label' => false
      ]);
      ?>
    </div>
  </div>

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="submit" class="btn btn-primary">Cancelar</button>
      <button id="send" type="submit" class="btn btn-success">Enviar</button>
    </div>
  </div>
 <?= $this->Form->end() ?>
</div>
</div>
</div>
