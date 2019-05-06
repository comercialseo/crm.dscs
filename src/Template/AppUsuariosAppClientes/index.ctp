<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppUsuariosAppCliente[]|\Cake\Collection\CollectionInterface $appUsuariosAppClientes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Usuarios App Cliente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes'), ['controller' => 'AppClientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Cliente'), ['controller' => 'AppClientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appUsuariosAppClientes index large-9 medium-8 columns content">
    <h3><?= __('App Usuarios App Clientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('app_cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_usuarios_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appUsuariosAppClientes as $appUsuariosAppCliente): ?>
            <tr>
                <td><?= $appUsuariosAppCliente->has('app_cliente') ? $this->Html->link($appUsuariosAppCliente->app_cliente->id, ['controller' => 'AppClientes', 'action' => 'view', $appUsuariosAppCliente->app_cliente->id]) : '' ?></td>
                <td><?= $appUsuariosAppCliente->has('app_usuario') ? $this->Html->link($appUsuariosAppCliente->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appUsuariosAppCliente->app_usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appUsuariosAppCliente->app_cliente_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appUsuariosAppCliente->app_cliente_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appUsuariosAppCliente->app_cliente_id], ['confirm' => __('Are you sure you want to delete # {0}?', $appUsuariosAppCliente->app_cliente_id)]) ?>
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
