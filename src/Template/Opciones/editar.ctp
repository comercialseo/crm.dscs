<?php
/**
 * =====================================================================
 * Vista de Edición de Opciones de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppOpcionesTable $AppOpciones
 * @method    \App\Model\Entity\AppOpcione[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?></li>
    </ul>
</nav>

<div class="x_content">
  <?php
  if($appOpcione->name == 'App.Logo')
  {
  ?>
  <?= $this->Form->create($appOpcione, ['class' => 'form-horizontal form-label-left', 'enctype' => 'multipart/form-data', 'novalidate']) ?>
  <?php
  }else {
  ?>
  <?= $this->Form->create($appOpcione, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
  <?php
  }
  ?>
  <span class="section">Formulario de Edición de Opciones de la App <small>
    <?php 
                                            switch ($appOpcione->name) {
                                            case 'App.RazSoc':
                                                echo __('Razón Social');
                                            break;
                                            
                                            case 'App.Direc':
                                                echo __('Dirección');
                                            break;

                                            case 'App.CodPos':
                                                echo __('Código Postal');
                                            break;

                                            case 'App.Poblac':
                                                echo __('Población');
                                            break;

                                            case 'App.Provin':
                                                echo __('Provincia');
                                            break;

                                            case 'App.Telef':
                                                echo __('Teléfono');
                                            break;

                                            case 'App.TelefMov':
                                                echo __('Teléfono Móvil');
                                            break;

                                            case 'App.Email':
                                                echo __('Email');
                                            break;

                                            case 'App.Logo':
                                                echo __('Archivo Logotipo');
                                            break;

                                            case 'App.IVA':
                                                echo __('IVA');
                                            break;

                                            case 'App.IRPF':
                                                echo __('IRPF');
                                            break;
                                        }
    ?>
    </small></span>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
  <?php
  if($appOpcione->name == 'App.Logo')
  {
    $logo = h('logosistema/'.$appOpcione->value);
  ?>
  <?= $this->Html->image($logo, [
                                  'style' => 'max-width: 300px'
                                ]) 
  ?>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Logotipo <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?= $this->Form->input('logo', [
                                      'type'     => 'file',
                                      'class'    => 'form-control col-md-7 col-xs-12',
                                      'label'    => false,
                                      'required' => 'required'
                                      ])
      ?>
    </div>
  </div>
  <?php
  }else {
  ?>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('value', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <?php
    }
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
