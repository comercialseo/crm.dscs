<?php
/**
 * =====================================================================
 * Vista Principal de Equipos de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppEquiposTable $AppEquipos
 * @method    \App\Model\Entity\AppEquipo[]|
 * =====================================================================
*/
?>
<div class="appEquipos index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Equipos registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los equipos registrados en la app.
        </p>
      </div>
      <?php if( ($usuarioActual['us_rol'] == 'sa') || ($usuarioActual['us_rol'] == 'ad') ): ?>
      <p class="large-3 medium-4 columns" id="actions-sidebar">
        <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Equipo'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
      </p>
      <?php endif; ?>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Nombre: Activar el orden ascendente">Nombre</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Departamento: Activar el orden ascendente">Departamento</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Team Leader: Activar el orden ascendente">Team Leader</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Miembros: Activar el orden ascendente">Miembros</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appEquipos as $appEquipo): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td class="sorting_1"><?= $this->Html->link(h($appEquipo->eq_nombre), [
                                        'action' => 'ver', $appEquipo->id
                                    ]) ?></td>
                                <td><?= $appEquipo->has('app_departamento') ? $this->Html->link($appEquipo->app_departamento->dp_departamento, ['controller' => 'Departamentos', 'action' => 'ver', $appEquipo->app_departamento->id]) : '' ?></td>
                                <td><?= h($appEquipo->eq_leader) ?></td>
                                <td>
                                    <?php if (!empty($appEquipo->app_usuarios)): ?>
                                        <table cellpadding="0" cellspacing="0" class="table table-striped">
                                            <?php foreach ($appEquipo->app_usuarios as $appUsuarios): ?>
                                            <tr>
                                                <td align="left"><?= $this->Html->link(__('<i class="fa fa-user"></i> '.$appUsuarios->us_usuario),
                                                [
                                                  'controller' => 'Usuarios',
                                                  'action' => 'ver'                                                  
                                                ],
                                                [
                                                  'class' => 'btn btn-primary btn-xs',
                                                  'escape' => false
                                                ]) ?></td>
                                                <td align="left" class="actions">                                                    
                                                    <?= $this->Html->link(__('<i class="fa fa-exchange"></i> Quitar'), 
                                                    ['controller' => 'Equipos', 
                                                    'action' => 'quitar', $appEquipo->id, $appUsuarios->id
                                                    ],
                                                    [
                                                     'escape' => false,
                                                     'class' => 'btn btn-xs',
                                                     'confirm' => __('¿Seguro que deseas quitar del equipo al usuario # {0}?', $appUsuarios->us_usuario)
                                                    ]) ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    <?php else: ?>
                                        <p>Este equipo no tiene ningún miembro asignado...</p>
                                    <?php endif; ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appEquipo->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appEquipo->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Asignar Miembros'), ['controller' => 'equipos-miembros', 'action' => 'asignar', $appEquipo->id], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appEquipo->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el equipo # {0}?', $appEquipo->eq_nombre)]) ?>
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