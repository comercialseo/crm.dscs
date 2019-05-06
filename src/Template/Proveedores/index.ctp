<?php
/**
 * =====================================================================
 * Vista Principal de Proveedores de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppProveedoresTable $AppProveedores
 * @method    \App\Model\Entity\AppProveedore[]|
 * =====================================================================
*/
?>
<div class="appProveedores index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Proveedores registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los proveedores registrados en la app.
        </p>
      </div>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Proveedor: Activar el orden ascendente">Proveedor</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Tipo: Activar el orden ascendente">Tipo</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="Telef. Principal: Activar el orden ascendente">Telef. Principal</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 48px;" aria-label="Email: Activar el orden ascendente">Email</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appProveedores as $appProveedor): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td><?= $this->Html->link(h($appProveedor->pr_nombre), [
                                        'action' => 'ver', $appProveedor->id
                                    ]) ?></td>
                                <td><?= $appProveedor->has('app_proveedores_tipo') ? $this->Html->link($appProveedor->app_proveedores_tipo->pt_tipo, ['controller' => 'Proveedores-Tipos', 'action' => 'ver', $appProveedor->app_proveedores_tipo->id]) : '' ?></td>
                                <td><?= h($appProveedor->pr_telefono_princ) ?></td>
                                <td><?= h($appProveedor->pr_email) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appProveedor->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appProveedor->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appProveedor->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el proveedor # {0}?', $appProveedor->pr_nombre)]) ?>
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
    <div class="col-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-align-left"></i> Añadir Nueva Línea <small>Proveedor</small></h2>
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
              <h4 class=""><i class="fa fa-plus-square"></i> Nuevo Proveedor</h4>
            </a>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="formCrearItem" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <div class="x_content">
                  <?= $this->Form->create($appProveedore, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
                  <span class="section"><i class="fa fa-shopping-cart fa-2x"></i> Datos del nuevo Proveedor</span>
                  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Proveedor <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_nombre', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'label'                      => false,
                                      'data-validate-words'        => '1',
                                      'data-validate-length-range' => '50',
                                      'value' => false,
                                      'required'                   => 'required'
                                  ]);
                      ?> 
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tipo <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('app_proveedores_tipo_id', [
                                                                      'options' => $appProveedoresTipos,
                                                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                                                      'label'                      => false,
                                                                      'value' => false,
                                                                      'required'                   => 'required'
                                                                      ])
                      ?>      
                    </div>
                    <?= $this->Html->link(__('Nuevo tipo de proveedor'), ['controller' => 'Proveedores-Tipos', 'action' => 'crear'], ['class' => 'btn btn-success btn-xl']) ?>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Teléfono Princ. <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_telefono_princ', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'label'                      => false,
                                      'data-validate-length-range' => '9',
                                      'value' => false,
                                      'required'                   => 'required'
                                  ]);
                      ?>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Provincia <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->select('pr_provincia', [
                                                      'empty'             => '(selecciona uno...)',
                                                      'corunna'           => 'A Coruña',
                                                      'alava'             => 'Álava',
                                                      'albacete'          => 'Albacete',
                                                      'alicante'          => 'Alicante',
                                                      'almeria'           => 'Almería',
                                                      'asturias'          => 'Asturias',
                                                      'avila'             => 'Ávila',
                                                      'badajoz'           => 'Badajoz',
                                                      'barcelona'         => 'Barcelona',
                                                      'burgos'            => 'Burgos',
                                                      'caceres'           => 'Cáceres',
                                                      'cadiz'             => 'Cádiz',
                                                      'cantabria'         => 'Cantabria',
                                                      'castellon'         => 'Castellón',
                                                      'creal'             => 'Ciudad Real',
                                                      'cordoba'           => 'Córdoba',
                                                      'cuenca'            => 'Cuenca',
                                                      'girona'            => 'Girona',
                                                      'granada'           => 'Granada',
                                                      'guadalajara'       => 'Guadalajara',
                                                      'guipozcua'         => 'Guipuzcua',
                                                      'huelva'            => 'Huelva',
                                                      'huesca'            => 'Huesca',
                                                      'isbaleares'        => 'Islas Baleares',
                                                      'iscanarias'        => 'Islas Canarias',
                                                      'jaen'              => 'Jaén',
                                                      'larioja'           => 'La Rioja',
                                                      'leon'              => 'Castilla León',
                                                      'lleida'            => 'Lleida',
                                                      'lugo'              => 'Lugo',
                                                      'madrid'            => 'Madrid',
                                                      'malaga'            => 'Málaga',
                                                      'murcia'            => 'Murcia',
                                                      'navarra'           => 'Navarra',
                                                      'orense'            => 'Orense',
                                                      'palencia'          => 'Palencia',
                                                      'pontevedra'        => 'Pontevedra',
                                                      'salamanca'         => 'Salamanca',
                                                      'segovia'           => 'Segovia',
                                                      'sevilla'           => 'Sevilla',
                                                      'soria'             => 'Soria',
                                                      'tarragona'         => 'Tarragona',
                                                      'teruel'            => 'Teruel',
                                                      'toledo'            => 'Toledo',
                                                      'valencia'          => 'Valencia',
                                                      'valladoliz'        => 'Valladoliz',
                                                      'vizcaya'           => 'Vizcaya',
                                                      'zamora'            => 'Zamora',
                                                      'zaragoza'          => 'Zaragoza',
                                                      'ceuta'             => 'Ceuta',
                                                      'melilla'           => 'Melilla'
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_email', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'type'                       => 'email',
                                      'label'                      => false,
                                      'data-validate-length-range' => '70',
                                      'value' => false,
                                      'required'                   => false
                                  ]);
                      ?>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Sitio Web
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_web', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'type'                       => 'url',
                                      'label'                      => false,
                                      'data-validate-length-range' => '100',
                                      'value' => false,
                                      'required'                   => false
                                  ]);
                      ?>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Teléfono Secun. </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_telefono_secun', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'label'                      => false,
                                      'data-validate-length-range' => '9',
                                      'value' => false,
                                      'required'                   => false
                                  ]);
                      ?>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Dirección</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_direccion', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'label'                      => false,
                                      'data-validate-length-range' => '90',
                                      'value' => false,
                                      'required'                   => false
                                  ]);
                      ?>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código Postal</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_codigo_postal', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'label'                      => false,
                                      'data-validate-length-range' => '5',
                                      'value' => false,
                                      'required'                   => false
                                  ]);
                      ?>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Población</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_poblacion', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'label'                      => false,
                                      'data-validate-length-range' => '50',
                                      'value' => false,
                                      'required'                   => false
                                  ]);
                      ?>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?=
                      $this->Form->control('pr_comentario', [
                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                      'label'                      => false,
                                      'data-validate-words'        => '3',
                                      'value' => false,
                                      'required'                   => false
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