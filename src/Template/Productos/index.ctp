<?php
/**
 * =====================================================================
 * Vista Principal de Productos y Servicios de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppProductosTable $AppProductos
 * @method    \App\Model\Entity\AppProducto[]|
 * =====================================================================
*/
?>
<div class="appProductos index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Productos registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los productos y servicios registrados en la app.
        </p>
      </div>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Producto: Activar el orden ascendente">Producto</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Tipo: Activar el orden ascendente">Tipo</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Departamento: Activar el orden ascendente">Departamento</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Base Imp.: Activar el orden ascendente">Base Imp.</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appProductos as $appProducto): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td class="sorting_1"><?= $this->Html->link(h($appProducto->pr_nombre), [
                                        'action' => 'ver', $appProducto->id
                                    ]) ?></td>
                                <td><?php 
                                    switch (h($appProducto->pr_tipo)) {
                                        case 'pr':
                                           echo __('Producto');
                                        break;
                                        case 'sr':
                                           echo __('Servicio');
                                        break;
                                        case 'ot':
                                            echo __('Otros');
                                        break;
                                    }
                                ?></td>
                                <td><?= $appProducto->has('app_departamento') ? $this->Html->link($appProducto->app_departamento->dp_departamento, ['controller' => 'Departamentos', 'action' => 'ver', $appProducto->app_departamento->id]) : '' ?></td>
                                <td><?= $this->Number->format($appProducto->pr_base_imponible, ['precision' => '2']) ?>€</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appProducto->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appProducto->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appProducto->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el producto # {0}?', $appProducto->pr_nombre)]) ?>
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
        <h2><i class="fa fa-align-left"></i> Añadir Nueva Línea <small>Productos y Servicios</small></h2>
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
                <h4 class=""><i class="fa fa-plus-square"></i> Nuevo Producto</h4>
              </a>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="formCrearItem" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                  <div class="x_content">
                    <?= $this->Form->create($appProducto, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
                    <span class="section">Datos del nuevo Producto</span>
                    <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?=
                        $this->Form->control('pr_nombre', [
                                        'class'                      => 'form-control col-md-7 col-xs-12',
                                        'label'                      => false,
                                        'data-validate-words'        => '1',
                                        'data-validate-length-range' => '50',
                                        'value'                      => false, 
                                        'required'                   => 'required'
                                    ]);
                        ?> 
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Descripción
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?=
                        $this->Form->control('pr_descripcion', [
                                        'class'                      => 'form-control col-md-7 col-xs-12',
                                        'label'                      => false,
                                        'data-validate-words'        => '3',
                                        'value'                      => false,
                                        'required'                   => false
                                    ]);
                        ?> 
                      </div>
                    </div>
                    <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->select('pr_tipo', [
                                                            'empty' => '(selecciona uno...)',
                                                            'pr'    => 'Producto',
                                                            'sr'    => 'Servicio',
                                                            'ot'    => 'Otros'
                                                      ],
                                        [
                                            'value'    => 'empty',
                                            'class'    => 'form-control col-md-7 col-xs-12',
                                            'label'    => false,
                                            'required' => 'required'
                                        ]);
                            ?> 
                           </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Base Imponible <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?=
                        $this->Form->control('pr_base_imponible', [
                                        'class'                => 'form-control col-md-7 col-xs-12',
                                        'label'                => false,
                                        'data-validate-minmax' => '0,1000000',
                                        'value'                => false,
                                        'required'             => 'required'
                                    ]);
                        ?> 
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Departamento Asignado <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?=
                        $this->Form->control('app_departamentos_id', [
                                        'class'                      => 'form-control col-md-7 col-xs-12',
                                        'label'                      => false,
                                        'options'                    => $appDepartamentos,
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
            </div>
          </div>
          <!-- end of accordion -->
      </div>
    </div>
</div>