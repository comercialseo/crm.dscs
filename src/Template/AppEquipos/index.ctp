<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppEquipo[]|\Cake\Collection\CollectionInterface $appEquipos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Equipo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appEquipos index large-9 medium-8 columns content">
    <h3><?= __('App Equipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('eq_nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('eq_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('eq_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_usuarios_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appEquipos as $appEquipo): ?>
            <tr>
                <td><?= $this->Number->format($appEquipo->id) ?></td>
                <td><?= h($appEquipo->eq_nombre) ?></td>
                <td><?= h($appEquipo->eq_creacion) ?></td>
                <td><?= h($appEquipo->eq_modificacion) ?></td>
                <td><?= $this->Number->format($appEquipo->app_usuarios_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appEquipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appEquipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appEquipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appEquipo->id)]) ?>
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
