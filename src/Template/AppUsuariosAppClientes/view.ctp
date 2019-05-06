<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppUsuariosAppCliente $appUsuariosAppCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Usuarios App Cliente'), ['action' => 'edit', $appUsuariosAppCliente->app_cliente_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Usuarios App Cliente'), ['action' => 'delete', $appUsuariosAppCliente->app_cliente_id], ['confirm' => __('Are you sure you want to delete # {0}?', $appUsuariosAppCliente->app_cliente_id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Usuarios App Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Usuarios App Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Clientes'), ['controller' => 'AppClientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Cliente'), ['controller' => 'AppClientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appUsuariosAppClientes view large-9 medium-8 columns content">
    <h3><?= h($appUsuariosAppCliente->app_cliente_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('App Cliente') ?></th>
            <td><?= $appUsuariosAppCliente->has('app_cliente') ? $this->Html->link($appUsuariosAppCliente->app_cliente->id, ['controller' => 'AppClientes', 'action' => 'view', $appUsuariosAppCliente->app_cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Usuario') ?></th>
            <td><?= $appUsuariosAppCliente->has('app_usuario') ? $this->Html->link($appUsuariosAppCliente->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appUsuariosAppCliente->app_usuario->id]) : '' ?></td>
        </tr>
    </table>
</div>
