<?php
/**
 * =====================================================================
 * Vista Ver Detalle de Tipos de Proveedores de la App
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
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al Listado de Tipos de Proveedores'), ['action' => 'index'], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?> </li>
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Tipo de Proveedor'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>
    </ul>
</nav>

<div class="col-md-12 appProveedoresTipo view large-9 medium-8 columns content">
<div class="x_panel">
  <div class="x_title">
    <h3>Datos del Tipo de Proveedor - <?= h($appProveedoresTipo->id) ?> : <?= h($appProveedoresTipo->pt_tipo) ?></h3>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-hover vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td align="left"><?= h($appProveedoresTipo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td align="left"><?= h($appProveedoresTipo->pt_tipo) ?></td>
        </tr>
    </table>
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar Proveedor'), ['action' => 'editar', $appProveedoresTipo->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar Proveedor'), ['action' => 'borrar', $appProveedoresTipo->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar al tipo de proveedor # {0}?', $appProveedoresTipo->pt_tipo)]) ?> </li>
    </ul>
  </div>
</div>
<div class="related">
        <h4><?= __('Proveedores Asignados') ?></h4>
        <?php if (!empty($appProveedoresTipo->app_proveedores)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Proveedor') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($appProveedoresTipo->app_proveedores as $appProveedores): ?>
            <tr>
                <td align="left"><?= h($appProveedores->id) ?></td>
                <td align="left"><?= h($appProveedores->pr_nombre) ?></td>
                <td align="left" class="actions">
                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['controller' => 'Proveedores', 'action' => 'ver', $appProveedores->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['controller' => 'Proveedores', 'action' => 'editar', $appProveedores->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['controller' => 'Proveedores', 'action' => 'borrar', $appProveedores->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Confirmas el borrado del Proveedor?', $appProveedores->pr_nombre)]) ?>
                </td>
            </tr>           
            <?php endforeach; ?>
        </table>
         <?php else: ?>
            <p>Este tipo no tiene ningún proveedor asignado...</p>
        <?php endif; ?>
</div>
</div>
