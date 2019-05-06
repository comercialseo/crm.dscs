<?php
/**
 * =====================================================================
 * Vista de Edición de Gastos de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppGastosTable $AppGastos
 * @method    \App\Model\Entity\AppGasto[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?></li>
        <li class="pdd-laterales-10"><?= $this->Form->postLink(
                __('<i class="fa fa-trash-o"></i> Borrar Gasto'),
                ['action' => 'borrar', $appGastoForm->id],
          ['escape' => false, 'confirm' => __('¿Confirmas que deseas borrar el Gasto # {0}? ', $appGastoForm->ga_codigo), 
           'class' => 'btn btn-danger btn-xs'
        ]
            )
        ?></li>
    </ul>
</nav>
<div class="col-md-12 appGastos view large-9 medium-8 columns content">
<div class="x_panel">
<div class="x_content">
  <?= $this->Form->create($appGastoForm, ['class' => 'form-horizontal form-label-left', 'type' => 'file', 'novalidate']) ?>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Proveedor <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('app_proveedores_id', [
                      'class'    => 'form-control col-md-7 col-xs-12',
                      'label'    => false,
                      'options'  => $appProveedores,
                      'required' => 'required'
                  ]);
      ?>
    </div>
    <?= $this->Html->link(__('Nuevo proveedor'), ['controller' => 'Proveedores', 'action' => 'crear'], ['class' => 'btn btn-success btn-xl']) ?>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->data('ga_codigo', [
                  'class'                      => 'form-control col-md-7 col-xs-12',
                  'label'                      => false,
                  'data-validate-length-range' => '100',
                  'required'                   => false
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">IVA <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('ga_iva', [
                      'class'                => 'form-control col-md-7 col-xs-12',
                      'label'                => false,
                      'data-validate-minmax' => '0,100',
                      'required'             => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">IRPF
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('ga_irpf', [
                      'class'                => 'form-control col-md-7 col-xs-12',
                      'label'                => false,
                      'data-validate-minmax' => '0,100',
                      'required'             => false
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Descuento
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('ga_descuento', [
                      'class'                => 'form-control col-md-7 col-xs-12',
                      'label'                => false,
                      'data-validate-minmax' => '0,1000000',
                      'required'             => false
                  ]);
      ?> 
    </div>
  </div>

  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Base Imponible <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('ga_base', [
                      'class'                => 'form-control col-md-7 col-xs-12',
                      'label'                => false,
                      'data-validate-minmax' => '0,1000000',
                      'required'             => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group" id="ontime-total"></div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Periodo de Facturación <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->select('ga_periodo', [
                                              'empty' => '(selecciona uno...)',
                                              '1' => '1º Trimestre',
                                              '2' => '2º Trimestre',
                                              '3' => '3º Trimestre',
                                              '4' => '4º Trimestre'
                                        ],
                          [
                              'class'    => 'form-control col-md-7 col-xs-12',
                              'label'    => false,
                              'required' => 'required'
                          ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Factura
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
        $this->Form->input('ga_factura', ['type' => 'file', 'label' => false, 'value' => $appGastoForm->ga_factura])
      ?> 
      <?php
      if (!empty($appGastoForm->ga_factura)) {
                echo $appGastoForm->ga_factura;
      }
      ?>
    </div>
  </div>    

  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('ga_comentario', [
                      'class'               => 'form-control col-md-7 col-xs-12',
                      'label'               => false,
                      'data-validate-words' => '3',
                      'required'            => false
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
