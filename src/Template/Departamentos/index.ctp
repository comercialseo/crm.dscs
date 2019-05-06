<?php
/**
 * =====================================================================
 * Vista Principal de Departamentos de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppDepartamentosTable $AppDepartamentos
 * @method    \App\Model\Entity\AppDepartamento[]|
 * =====================================================================
*/
?>
<div class="appDepartamentos index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Departamentos registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los departamentos registrados en la app.
        </p>
      </div>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Departamento: Activar el orden ascendente">Departamento</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Descripción: Activar el orden ascendente">Descripción</th>
                            
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appDepartamentos as $appDepartamento): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td><?= $this->Html->link(h($appDepartamento->dp_departamento), [
                                        'action' => 'ver', $appDepartamento->id
                                    ]) ?></td>
                                <td><?= h($appDepartamento->dp_descripcion) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appDepartamento->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appDepartamento->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Asignar Negocio'), ['controller' => 'clientes-negocios', 'action' => 'asignar', $appDepartamento->id], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appDepartamento->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar al departamento # {0}?', $appDepartamento->dp_departamento)]) ?>
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
        <h2><i class="fa fa-align-left"></i> Añadir Nueva Línea <small>Departamentos de personal</small></h2>
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
                <h4 class=""><i class="fa fa-plus-square"></i> Nuevo Departamento</h4>
              </a>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="formCrearItem" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                  <div class="x_content">
                    <?= $this->Form->create($appDepartamento, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
                      <span class="section">Datos del nuevo Departamento</span>
                      <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Departamento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('dp_departamento', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
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
                          $this->Form->control('dp_descripcion', [
                                          'class'    => 'form-control col-md-7 col-xs-12',
                                          'label'    => false,
                                          'value'    => false,
                                          'required' => false
                                      ]);
                          ?> 
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Labores 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?=
                          $this->Form->control('dp_labores', [
                                          'class'                      => 'form-control col-md-7 col-xs-12',
                                          'label'                      => false,
                                          'data-validate-length-range' => '150',
                                          'value'                      => false,
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