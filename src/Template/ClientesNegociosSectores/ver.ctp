<?php
/**
 * =====================================================================
 * Vista Ver Detalle de Sector de Negocio de Cliente de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesNegociosSectoresTable $AppClientesNegociosSectores
 * @method    \App\Model\Entity\AppClientesNegociosSectore[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?> </li>
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Sector de Negocios'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>
    </ul>
</nav>

<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
  <div class="x_title">
    <h3>Datos del Sector de Negocio de Cliente - <?= h($appClientesNegociosSectore->nt_sector) ?></h3>
  </div>
  <div class="x_content">
    <table class="table table-hover vertical-table">
        <tr>
            <th scope="row"><?= __('Sector') ?></th>
            <td align="left"><?= h($appClientesNegociosSectore->nt_sector) ?></td>
        </tr>
    </table>
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar Sector de Negocio'), ['action' => 'editar', $appClientesNegociosSectore->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar Sector de Negocio'), ['action' => 'borrar', $appClientesNegociosSectore->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el Sector de Negocios # {0}?', $appClientesNegociosSectore->nt_sector)]) ?> </li>
    </ul>
  </div>
</div>
<div class="related">
        <h4><?= __('Negocios Asignados') ?></h4>
        <?php if (!empty($appClientesNegociosSectore->app_clientes_negocios)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Razón Social') ?></th>
                <th scope="col"><?= __('Gerente') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($appClientesNegociosSectore->app_clientes_negocios as $appClientesNegocio): ?>
            <tr>
                <td align="left"><?= h($appClientesNegocio->id) ?></td>
                <td align="left"><?= h($appClientesNegocio->cn_razon_social) ?></td>
                <td align="left"><?= h($appClientesNegocio->cn_gerente) ?></td>
                <td align="left" class="actions">
                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['controller' => 'Clientes-Negocios', 'action' => 'ver', $appClientesNegocio->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['controller' => 'Clientes-Negocios', 'action' => 'editar', $appClientesNegocio->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['controller' => 'Clientes-Negocios', 'action' => 'borrar', $appClientesNegocio->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Confirmas el borrado del Negocio?', $appClientesNegocio->cn_razon_social)]) ?>
                </td>
            </tr>           
            <?php endforeach; ?>
        </table>
         <?php else: ?>
            <p>Este sector no tiene ningún negocio asignado...</p>
        <?php endif; ?>
</div>
</div>