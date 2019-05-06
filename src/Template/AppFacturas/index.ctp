<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppFactura[]|\Cake\Collection\CollectionInterface $appFacturas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Factura'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes Negocios'), ['controller' => 'AppClientesNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Clientes Negocio'), ['controller' => 'AppClientesNegocios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appFacturas index large-9 medium-8 columns content">
    <h3><?= __('App Facturas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_periodo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_iva_estipulado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_iva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_irpf_estipulado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_irpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_base_imponible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_descuento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_entregada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_abonada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_fecha_facturacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_app_negocios_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fc_app_usuarios_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appFacturas as $appFactura): ?>
            <tr>
                <td><?= $this->Number->format($appFactura->id) ?></td>
                <td><?= h($appFactura->fc_codigo) ?></td>
                <td><?= h($appFactura->fc_periodo) ?></td>
                <td><?= $this->Number->format($appFactura->fc_iva_estipulado) ?></td>
                <td><?= $this->Number->format($appFactura->fc_iva) ?></td>
                <td><?= $this->Number->format($appFactura->fc_irpf_estipulado) ?></td>
                <td><?= $this->Number->format($appFactura->fc_irpf) ?></td>
                <td><?= $this->Number->format($appFactura->fc_base_imponible) ?></td>
                <td><?= $this->Number->format($appFactura->fc_descuento) ?></td>
                <td><?= $this->Number->format($appFactura->fc_total) ?></td>
                <td><?= h($appFactura->fc_entregada) ?></td>
                <td><?= h($appFactura->fc_abonada) ?></td>
                <td><?= h($appFactura->fc_fecha_facturacion) ?></td>
                <td><?= h($appFactura->fc_creacion) ?></td>
                <td><?= h($appFactura->fc_modificacion) ?></td>
                <td><?= $appFactura->has('app_clientes_negocio') ? $this->Html->link($appFactura->app_clientes_negocio->id, ['controller' => 'AppClientesNegocios', 'action' => 'view', $appFactura->app_clientes_negocio->id]) : '' ?></td>
                <td><?= $appFactura->has('app_usuario') ? $this->Html->link($appFactura->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appFactura->app_usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appFactura->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appFactura->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appFactura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appFactura->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
