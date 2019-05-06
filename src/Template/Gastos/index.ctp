<?php
/**
 * =====================================================================
 * Vista Principal de Gastos de la App
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
<div class="appGastos index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Facturas Gastos registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los gastos registrados en la app.
        </p>
      </div>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                      Columnas visibles: <?= $this->Html->link('ID', 
                        [ 
                          'action' => ''
                        ],
                        [
                          'class' => 'toggle-vis',
                          'data-column' => '0'
                        ]) ?> - <?= $this->Html->link('Código', 
                        [ 
                          'action' => ''
                        ],
                        [
                          'class' => 'toggle-vis',
                          'data-column' => '1'
                        ]) ?> - <?= $this->Html->link('Proveedor', 
                        [ 
                          'action' => ''
                        ],
                        [
                          'class' => 'toggle-vis',
                          'data-column' => '2'
                        ]) ?> - <?= $this->Html->link('Periodo', 
                        [ 
                          'action' => ''
                        ],
                        [
                          'class' => 'toggle-vis',
                          'data-column' => '8'
                        ]) ?>
                    </div>
                    <table id="datatable-index-gastos" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 104px;" aria-sort="ascending" aria-label="ID: Activar el orden ascendente">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Código: Activar el orden ascendente">Código</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Proveedor: Activar el orden ascendente">Proveedor</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="IVA: Activar el orden ascendente">IVA</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="IRPF: Activar el orden ascendente">IRPF</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="Decuent.: Activar el orden ascendente">Descuent.</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="Base Imp.: Activar el orden ascendente">Base Imp.</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="Total: Activar el orden ascendente">Total</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 48px;" aria-label="Periodo: Activar el orden ascendente">Periodo</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appGastos as $appGasto): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td><?= $this->Number->format($appGasto->id) ?></td>
                                <td><?= $this->Html->link(h($appGasto->ga_codigo), [
                                        'action' => 'ver', $appGasto->id
                                    ]) ?></td>
                                <td><?= $appGasto->has('app_proveedore') ? $this->Html->link($appGasto->app_proveedore->pr_nombre, ['controller' => 'Proveedores', 'action' => 'ver', $appGasto->app_proveedore->id]) : '' ?></td>
                                <td><?= $this->Number->toPercentage($appGasto->ga_iva) ?></td>
                                <td><?= $this->Number->toPercentage($appGasto->ga_irpf) ?></td>
                                <td><?= $this->Number->format($appGasto->ga_descuento, ['precision' => '2']) ?>€</td>
                                <td><?= $this->Number->format($appGasto->ga_base, ['precision' => '2']) ?>€</td>
                                <td><?= $this->Number->format($appGasto->ga_total, ['precision' => '2']) ?>€</td>
                                <td><?= $this->Number->format($appGasto->ga_periodo) ?>T</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appGasto->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appGasto->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appGasto->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el gasto # {0}?', $appGasto->ga_codigo)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<div class="col-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-align-left"></i> Añadir Nueva Línea <small>Líneas de Gastos</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <!-- start accordion -->
        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel">
            <a class="btn btn-success btn-xs" role="tab" id="formCrearItem" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              <h4 class=""><i class="fa fa-plus-square"></i> Nuevo Gasto</h4>
            </a>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="formCrearItem" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <div class="x_content">
                  <?= $this->Form->create($appGastoForm, ['class' => 'form-horizontal form-label-left', 'type' => 'file', 'novalidate']) ?>
                  <span class="section"><i class="fa fa-credit-card fa-2x"></i> Datos del nuevo Gasto</span>
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
                                  'value'                      => false,
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
                                      'value'                => '0',
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
                                      'value'                => '0',
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
                                      'value'                => false,
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
                        $this->Form->input('ga_factura', ['type' => 'file', 'label' => false])
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
                                      'value'               => false,
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
          </div>
        </div>
        <!-- end of accordion -->
      </div>
    </div>
</div>