<?php
/**
 * =====================================================================
 * Vista Principal de Clientes de la App
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
<div class="appUsuarios index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Clientes registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los clientes registrados en la app.
        </p>
      </div>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Nombre: Activar el orden ascendente">Nombre</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Email: Activar el orden ascendente">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="Telef. Principal: Activar el orden ascendente">Telef. Principal</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 48px;" aria-label="Creación: Activar el orden ascendente">Creación</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Modificación: Activar el orden ascendente">Ult. Modificación</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Usuario: Activar el orden ascendente">Usuario</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appClientes as $appCliente): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td class="sorting_1"><?= $this->Html->link(h($appCliente->cl_nombre), [
                                        'action' => 'ver', $appCliente->id
                                    ]) ?></td>
                                <td><?= h($appCliente->cl_email) ?></td>
                                <td><?= h($appCliente->cl_telefono_princ) ?></td>
                                <td><?= $appCliente->cl_creacion ?></td>
                                <td><?= $appCliente->cl_modificacion ?></td>
                                <td><?= $appCliente->has('app_usuario') ? $this->Html->link($appCliente->app_usuario->us_usuario, ['controller' => 'Usuarios', 'action' => 'ver', $appCliente->app_usuario->id]) : '' ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appCliente->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appCliente->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Asignar Negocio'), ['controller' => 'clientes-negocios', 'action' => 'asignar', $appCliente->id], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appCliente->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar al cliente # {0}? Ten en cuenta que se borrarán todos los negocios asignados a él.', $appCliente->cl_nombre.' '.$appCliente->cl_apellidos)]) ?>
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
        <h2><i class="fa fa-align-left"></i> Añadir Nueva Línea <small>Clientes Registrados</small></h2>
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
                <h4 class=""><i class="fa fa-plus-square"></i> Nuevo Cliente</h4>
              </a>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="formCrearItem" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                  <div class="x_content">
                        <?= $this->Form->create($appCliente, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
                        <span class="section"><i class="fa fa-user fa-2x"></i> Datos del nuevo Cliente</span>
                        <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cl_nombre', [
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Apellidos <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cl_apellidos', [
                                            'class'                      => 'form-control col-md-7 col-xs-12',
                                            'label'                      => false,
                                            'data-validate-words'        => '2',
                                            'data-validate-length-range' => '50',
                                            'value'                      => false,
                                            'required'                   => 'required'
                                        ]);
                            ?> 
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cl_email', [
                                            'class'                      => 'form-control col-md-7 col-xs-12',
                                            'type'                       => 'email',
                                            'label'                      => false,
                                            'data-validate-length-range' => '90',
                                            'value'                      => false,
                                            'required'                   => 'required'
                                        ]);
                            ?>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telef. Principal <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cl_telefono_princ', [
                                            'class'                      => 'form-control col-md-7 col-xs-12',
                                            'label'                      => false,
                                            'data-validate-length-range' => '9',
                                            'value'                      => false,
                                            'required'                   => 'required'
                                        ]);
                            ?>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telef. Secundario</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cl_telefono_secun', [
                                            'class'                      => 'form-control col-md-7 col-xs-12',
                                            'label'                      => false,
                                            'data-validate-length-range' => '9',
                                            'value'                      => false,
                                            'required'                   => false
                                        ]);
                            ?>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cl_comentario', [
                                            'class'               => 'form-control col-md-7 col-xs-12',
                                            'label'               => false,
                                            'data-validate-words' => '3',
                                            'value'               => false,
                                            'required'            => false
                                        ]);
                            ?>
                          </div>
                        </div>
                        <?php
                        if( ($usuarioActual['us_rol'] == 'sa') || ($usuarioActual['us_rol'] == 'ad') ):
                        ?>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Usuario Asignado <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <?=
                            $this->Form->control('cl_app_usuarios_id', [
                                            'class'    => 'form-control col-md-7 col-xs-12',
                                            'label'    => false,
                                            'options'  => $appUsuarios,
                                            'required' => 'required'
                                        ]);
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
            </div>
          </div>
          <!-- end of accordion -->
      </div>
    </div>
</div>
