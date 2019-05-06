<?php
/**
 * =====================================================================
 * Vista Crear Nuevos Tipos de Proveedores de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppProveedoresTiposTable $AppProveedoresTipos
 * @method    \App\Model\Entity\AppProveedoresTipo[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?></li>
    </ul>
</nav>

<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
<div class="x_content">
  <?= $this->Form->create($appProveedoresTipo, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
  <span class="section">Datos del nuevo Tipo de Proveedor</span>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo de Proveedor <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pt_tipo', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '50',
                      'required'                   => 'required'
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