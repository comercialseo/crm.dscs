<?php
/**
 * =====================================================================
 * Vista Principal de Tipos de Proveedores de la App
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
<div class="appProveedoresTipos index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Tipos de Proveedores registrados en la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los tipos de proveedores registrados en la app.
        </p>
      </div>
      <?php if( ($usuarioActual['us_rol'] == 'sa') || ($usuarioActual['us_rol'] == 'ad') ): ?>
      <p class="large-3 medium-4 columns" id="actions-sidebar">
        <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Tipo de Proveedor'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
      </p>
      <?php endif; ?>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Tipo: Activar el orden ascendente">Tipo</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appProveedoresTipos as $appProveedorTipo): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td><?= h($appProveedorTipo->pt_tipo) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appProveedorTipo->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appProveedorTipo->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appProveedorTipo->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el tipo de proveedor # {0}?', $appProveedorTipo->pt_tipo)]) ?>
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