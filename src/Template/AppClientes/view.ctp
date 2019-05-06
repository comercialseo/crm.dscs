<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppCliente $appCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Cliente'), ['action' => 'edit', $appCliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Cliente'), ['action' => 'delete', $appCliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appClientes view large-9 medium-8 columns content">
    <h3><?= h($appCliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cl Nombre') ?></th>
            <td><?= h($appCliente->cl_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cl Apellidos') ?></th>
            <td><?= h($appCliente->cl_apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cl Email') ?></th>
            <td><?= h($appCliente->cl_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Usuario') ?></th>
            <td><?= $appCliente->has('app_usuario') ? $this->Html->link($appCliente->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appCliente->app_usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appCliente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cl Telefono Princ') ?></th>
            <td><?= $this->Number->format($appCliente->cl_telefono_princ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cl Telefono Secun') ?></th>
            <td><?= $this->Number->format($appCliente->cl_telefono_secun) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cl Creacion') ?></th>
            <td><?= h($appCliente->cl_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cl Modificacion') ?></th>
            <td><?= h($appCliente->cl_modificacion) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Cl Comentario') ?></h4>
        <?= $this->Text->autoParagraph(h($appCliente->cl_comentario)); ?>
    </div>
</div>
