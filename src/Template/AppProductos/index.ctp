<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProducto[]|\Cake\Collection\CollectionInterface $appProductos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Departamentos'), ['controller' => 'AppDepartamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Departamento'), ['controller' => 'AppDepartamentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appProductos index large-9 medium-8 columns content">
    <h3><?= __('App Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_base_imponible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_departamentos_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appProductos as $appProducto): ?>
            <tr>
                <td><?= $this->Number->format($appProducto->id) ?></td>
                <td><?= h($appProducto->pr_nombre) ?></td>
                <td><?= h($appProducto->pr_tipo) ?></td>
                <td><?= $this->Number->format($appProducto->pr_base_imponible) ?></td>
                <td><?= h($appProducto->pr_creacion) ?></td>
                <td><?= h($appProducto->pr_modificacion) ?></td>
                <td><?= $appProducto->has('app_departamento') ? $this->Html->link($appProducto->app_departamento->id, ['controller' => 'AppDepartamentos', 'action' => 'view', $appProducto->app_departamento->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appProducto->id)]) ?>
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
