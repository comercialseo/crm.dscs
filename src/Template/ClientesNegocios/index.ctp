<?php
/**
 * =====================================================================
 * Vista Principal de Negocios de Clientes de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesNegociosTable $AppClientesNegocios
 * @method    \App\Model\Entity\AppClientesNegocio[]|
 * =====================================================================
*/
?>
<div class="appUsuarios index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Negocios de Clientes registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los negocios de clientes registrados en la app.
        </p>
      </div>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Razón Social: Activar el orden ascendente">Razón Social</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Tipo: Activar el orden ascendente">Tipo</th>                            
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Email: Activar el orden ascendente">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Telef. Princiapal: Activar el orden ascendente">Telef. Princiapal</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Cliente: Activar el orden ascendente">Cliente</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appClientesNegocios as $appClientesNegocio): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>                                
                                <td><?= $this->Html->link(h($appClientesNegocio->cn_razon_social), [
                                        'action' => 'ver', $appClientesNegocio->id
                                    ]) ?></td>
                                <td><?php
                                        switch ($appClientesNegocio->cn_tipo) {
                                            case 'py':
                                                echo __('Pyme');
                                            break;
                                            
                                            case 'em':
                                                echo __('Empresa');
                                            break;

                                            case 'mn':
                                                echo __('Multinacional');
                                            break;

                                            case 'au':
                                                echo __('Autónomo');
                                            break;
                                        }
                                ?></td>
                                <td><?= h($appClientesNegocio->cn_email) ?></td>
                                <td><?= h($appClientesNegocio->cn_telefono_princ) ?></td>
                                <td><?= $appClientesNegocio->has('app_cliente') ? $this->Html->link(h($appClientesNegocio->app_cliente->cl_nombre.' '.$appClientesNegocio->app_cliente->cl_apellidos), ['controller' => 'clientes', 'action' => 'ver', $appClientesNegocio->app_cliente->id]) : '' ?></td>

                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appClientesNegocio->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appClientesNegocio->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appClientesNegocio->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el negocio de cliente # {0}?', $appClientesNegocio->cn_razon_social)]) ?>
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
        <h2><i class="fa fa-align-left"></i> Añadir Nueva Línea <small>Negocios de Cliente</small></h2>
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
              <h4 class=""><i class="fa fa-plus-square"></i> Nuevo Negocio de Cliente</h4>
            </a>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="formCrearItem" aria-expanded="false" style="height: 0px;">
              <div class="panel-body">
                <div class="x_content">
                  <?= $this->Form->create($appClientesNegocio, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
                  <span class="section"><i class="fa fa-industry fa-2x"></i> Datos del nuevo Negocio del Cliente</span>
                  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cliente <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('app_clientes_id', [
                                                                  'options'  => $appClientes,
                                                                  'class'    => 'form-control col-md-7 col-xs-12',
                                                                  'label'    => false,
                                                                  'value'    => 'empty',
                                                                  'required' => 'required'
                                                                  ])
                          ?>
                        </div>
                        <?= $this->Html->link(__('Nuevo Cliente'), [
                                                                            'controller' => 'clientes',
                                                                            'action'     => 'crear'
                                                                        ],
                                                                        [
                                                                            'class' => 'btn btn-success btn-xl'
                                                                        ]) ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->select('cn_tipo', [
                                                          'empty' => '(selecciona uno...)',
                                                          'em'    => 'Empresa',
                                                          'au'    => 'Autónomo',
                                                          'py'    => 'Pyme',
                                                          'mn'    => 'Multinacional'
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
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sector <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('app_cliente_negocio_sector_id', [
                                          'options' => $appClientesNegociosSectores,
                                          'value'   => '0',
                                          'class'    => 'form-control col-md-7 col-xs-12',
                                          'label'    => false,
                                          'required' => 'required'
                                          ])
                          ?>      
                        </div>
                        <?= $this->Html->link(__('Nuevo Sector'), [
                                                                            'controller' => 'clientes-negocios-sectores',
                                                                            'action'     => 'crear'
                                                                        ],
                                                                        [
                                                                            'class' => 'btn btn-success btn-xl'
                                                                        ]) ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Razón Social <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_razon_social', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'data-validate-length-range' => '90',
                                          'value'    => false,
                                          'required'                   => 'required'
                                      ]);
                          ?> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">CIF/NIF <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cn_cif_nif', [
                                            'class'                      => 'form-control col-md-7 col-xs-12',
                                            'label'                      => false,
                                            'data-validate-length-range' => '10',
                                            'value'    => false,
                                            'required'                   => 'required'
                                        ]);
                            ?> 
                          </div>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Gerente
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_gerente', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'value'    => false,
                                          'required'                   => false
                                      ]);
                          ?> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_email', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'type'                       => 'email',
                                          'label'                      => false,
                                          'data-validate-length-range' => '90',
                                          'value'    => false,
                                          'required'                   => 'required'
                                      ]);
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Dirección <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_direccion', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'data-validate-length-range' => '70',
                                          'value'    => false,
                                          'required'                   => 'required'
                                      ]);
                          ?> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Código Postal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_codigo_postal', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'data-validate-length-range' => '5',
                                          'data-validate-type'         => 'numeric',
                                          'value'    => false,
                                          'required'                   => 'required'
                                      ]);
                          ?> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Población <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_poblacion', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'data-validate-length-range' => '50',
                                          'value'    => false,
                                          'required'                   => 'required'
                                      ]);
                          ?> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Provincia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->select('cn_provincia', [
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
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Teléfono Princ. <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_telefono_princ', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'value'    => false,
                                          'required'                   => 'required'
                                      ]);
                          ?> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Teléfono Secun.
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_telefono_secun', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'value'    => false,
                                          'required'                   => false
                                      ]);
                          ?> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Página Web</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_web', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'data-validate-length-range' => '100',
                                          'value'    => false,
                                          'required'                   => false
                                      ]);
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('cn_comentario', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'value'    => false,
                                          'required'                   => false
                                      ]);
                          ?>
                        </div>
                      </div>
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