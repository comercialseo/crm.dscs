<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProveedoresTipo[]|\Cake\Collection\CollectionInterface $appProveedoresTipos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Proveedores Tipo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['controller' => 'AppProveedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['controller' => 'AppProveedores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appProveedoresTipos index large-9 medium-8 columns content">
    <h3><?= __('App Proveedores Tipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pt_tipo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appProveedoresTipos as $appProveedoresTipo): ?>
            <tr>
                <td><?= $this->Number->format($appProveedoresTipo->id) ?></td>
                <td><?= h($appProveedoresTipo->pt_tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appProveedoresTipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appProveedoresTipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appProveedoresTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appProveedoresTipo->id)]) ?>
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
