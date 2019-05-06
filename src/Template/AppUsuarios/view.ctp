<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppUsuario $appUsuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Usuario'), ['action' => 'edit', $appUsuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Usuario'), ['action' => 'delete', $appUsuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appUsuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Usuario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appUsuarios view large-9 medium-8 columns content">
    <h3><?= h($appUsuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Us Usuario') ?></th>
            <td><?= h($appUsuario->us_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Password') ?></th>
            <td><?= h($appUsuario->us_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Email') ?></th>
            <td><?= h($appUsuario->us_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Nombre') ?></th>
            <td><?= h($appUsuario->us_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Apellidos') ?></th>
            <td><?= h($appUsuario->us_apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Rol') ?></th>
            <td><?= h($appUsuario->us_rol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Token') ?></th>
            <td><?= h($appUsuario->us_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Token Pass') ?></th>
            <td><?= h($appUsuario->us_token_pass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appUsuario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Creacion') ?></th>
            <td><?= h($appUsuario->us_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Modificacion') ?></th>
            <td><?= h($appUsuario->us_modificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Us Valido') ?></th>
            <td><?= $appUsuario->us_valido ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
