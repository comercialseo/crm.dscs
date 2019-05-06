<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppGasto[]|\Cake\Collection\CollectionInterface $appGastos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Gasto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['controller' => 'AppProveedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['controller' => 'AppProveedores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appGastos index large-9 medium-8 columns content">
    <h3><?= __('App Gastos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_iva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_irpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_descuento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_base') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_factura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fa_factura_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ga_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_proveedores_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appGastos as $appGasto): ?>
            <tr>
                <td><?= $this->Number->format($appGasto->id) ?></td>
                <td><?= h($appGasto->ga_codigo) ?></td>
                <td><?= $this->Number->format($appGasto->ga_iva) ?></td>
                <td><?= $this->Number->format($appGasto->ga_irpf) ?></td>
                <td><?= $this->Number->format($appGasto->ga_descuento) ?></td>
                <td><?= $this->Number->format($appGasto->ga_base) ?></td>
                <td><?= $this->Number->format($appGasto->ga_total) ?></td>
                <td><?= h($appGasto->ga_factura) ?></td>
                <td><?= h($appGasto->fa_factura_url) ?></td>
                <td><?= h($appGasto->ga_creacion) ?></td>
                <td><?= h($appGasto->ga_modificacion) ?></td>
                <td><?= $appGasto->has('app_proveedore') ? $this->Html->link($appGasto->app_proveedore->id, ['controller' => 'AppProveedores', 'action' => 'view', $appGasto->app_proveedore->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appGasto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appGasto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appGasto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appGasto->id)]) ?>
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
