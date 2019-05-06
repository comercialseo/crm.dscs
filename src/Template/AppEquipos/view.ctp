<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppEquipo $appEquipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Equipo'), ['action' => 'edit', $appEquipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Equipo'), ['action' => 'delete', $appEquipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appEquipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Equipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Equipo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appEquipos view large-9 medium-8 columns content">
    <h3><?= h($appEquipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Eq Nombre') ?></th>
            <td><?= h($appEquipo->eq_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appEquipo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Usuarios Id') ?></th>
            <td><?= $this->Number->format($appEquipo->app_usuarios_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Eq Creacion') ?></th>
            <td><?= h($appEquipo->eq_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Eq Modificacion') ?></th>
            <td><?= h($appEquipo->eq_modificacion) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Eq Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($appEquipo->eq_descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Usuarios') ?></h4>
        <?php if (!empty($appEquipo->app_usuarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Us Usuario') ?></th>
                <th scope="col"><?= __('Us Password') ?></th>
                <th scope="col"><?= __('Us Email') ?></th>
                <th scope="col"><?= __('Us Nombre') ?></th>
                <th scope="col"><?= __('Us Apellidos') ?></th>
                <th scope="col"><?= __('Us Rol') ?></th>
                <th scope="col"><?= __('Us Valido') ?></th>
                <th scope="col"><?= __('Us Token') ?></th>
                <th scope="col"><?= __('Us Token Pass') ?></th>
                <th scope="col"><?= __('Us Foto') ?></th>
                <th scope="col"><?= __('Us Foto Url') ?></th>
                <th scope="col"><?= __('Us Creacion') ?></th>
                <th scope="col"><?= __('Us Modificacion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appEquipo->app_usuarios as $appUsuarios): ?>
            <tr>
                <td><?= h($appUsuarios->id) ?></td>
                <td><?= h($appUsuarios->us_usuario) ?></td>
                <td><?= h($appUsuarios->us_password) ?></td>
                <td><?= h($appUsuarios->us_email) ?></td>
                <td><?= h($appUsuarios->us_nombre) ?></td>
                <td><?= h($appUsuarios->us_apellidos) ?></td>
                <td><?= h($appUsuarios->us_rol) ?></td>
                <td><?= h($appUsuarios->us_valido) ?></td>
                <td><?= h($appUsuarios->us_token) ?></td>
                <td><?= h($appUsuarios->us_token_pass) ?></td>
                <td><?= h($appUsuarios->us_foto) ?></td>
                <td><?= h($appUsuarios->us_foto_url) ?></td>
                <td><?= h($appUsuarios->us_creacion) ?></td>
                <td><?= h($appUsuarios->us_modificacion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppUsuarios', 'action' => 'view', $appUsuarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppUsuarios', 'action' => 'edit', $appUsuarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppUsuarios', 'action' => 'delete', $appUsuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appUsuarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
