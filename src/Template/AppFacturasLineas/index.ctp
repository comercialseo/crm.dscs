<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $appFacturasLineas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Facturas Linea'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appFacturasLineas index large-9 medium-8 columns content">
    <h3><?= __('App Facturas Lineas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fl_cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fl_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fl_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fl_productos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fl_negocios_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fl_facturas_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appFacturasLineas as $appFacturasLinea): ?>
            <tr>
                <td><?= $this->Number->format($appFacturasLinea->id) ?></td>
                <td><?= $this->Number->format($appFacturasLinea->fl_cantidad) ?></td>
                <td><?= h($appFacturasLinea->fl_creacion) ?></td>
                <td><?= h($appFacturasLinea->fl_modificacion) ?></td>
                <td><?= $this->Number->format($appFacturasLinea->fl_productos_id) ?></td>
                <td><?= $this->Number->format($appFacturasLinea->fl_negocios_id) ?></td>
                <td><?= $this->Number->format($appFacturasLinea->fl_facturas_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appFacturasLinea->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appFacturasLinea->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appFacturasLinea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appFacturasLinea->id)]) ?>
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
