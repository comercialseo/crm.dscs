<?php
/**
 * =====================================================================
 * Vista de Edición de Clientes de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesTable $AppClientes
 * @method    \App\Model\Entity\AppCliente[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?></li>
        <li class="pdd-laterales-10"><?= $this->Form->postLink(
                __('<i class="fa fa-trash-o"></i> Borrar Cliente'),
                ['action' => 'borrar', $appCliente->id],
          ['escape' => false, 'confirm' => __('¿Confirmas que deseas borrar a este Cliente # {0}? Ten en cuenta que se borrarán todos los negocios asignados a él.', $appCliente->cl_nombre.' '.$appCliente->cl_apellidos), 
           'class' => 'btn btn-danger btn-xs'
        ]
            )
        ?></li>
    </ul>
</nav>
<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
<div class="x_content">
  <?= $this->Form->create($appCliente, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
  <span class="section">Formulario de Edición de Datos de Cliente <small><?= h($appCliente->cl_nombre.' '.$appCliente->cl_apellidos) ?></small></span>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cl_nombre', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-words'        => '1',
                      'data-validate-length-range' => '50',
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
      Apellidos <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cl_apellidos', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-words'        => '2',
                      'data-validate-length-range' => '50',
                      'required'                   => 'required'
                  ]);

      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
      Email <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cl_email', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'type'                       => 'email',
                      'label'                      => false,
                      'data-validate-length-range' => '90',
                      'required'                   => 'required'
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Teléfono Principal <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cl_telefono_princ', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '9',
                      'required'                   => 'required'
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Teléfono Secundario
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cl_telefono_secun', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '9',
                      'required'                   => 'required'
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Comentario
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cl_comentario', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-words'        => '3',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <?php
  if( ($usuarioActual['us_rol'] == 'sa') || ($usuarioActual['us_rol'] == 'ad') ):
  ?>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Asignado a
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cl_app_usuarios_id', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'options'                    => $appUsuarios,
                      'required'                   => 'required'
      ])
      ?>
    </div>
  </div>
  <?php
  else:
    echo $this->Form->hidden('cl_app_usuarios_id', ['value' => $usuarioActual['id']]);
  endif;
  ?>
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
