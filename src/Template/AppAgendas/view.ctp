<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppAgenda $appAgenda
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Agenda'), ['action' => 'edit', $appAgenda->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Agenda'), ['action' => 'delete', $appAgenda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appAgenda->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Agenda'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Agenda'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appAgenda view large-9 medium-8 columns content">
    <h3><?= h($appAgenda->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ag Nombre') ?></th>
            <td><?= h($appAgenda->ag_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Apellidos') ?></th>
            <td><?= h($appAgenda->ag_apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Contacto') ?></th>
            <td><?= h($appAgenda->ag_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Email') ?></th>
            <td><?= h($appAgenda->ag_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Direccion') ?></th>
            <td><?= h($appAgenda->ag_direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Poblacion') ?></th>
            <td><?= h($appAgenda->ag_poblacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Provincia') ?></th>
            <td><?= h($appAgenda->ag_provincia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Twitter') ?></th>
            <td><?= h($appAgenda->ag_twitter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Facebook') ?></th>
            <td><?= h($appAgenda->ag_facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Foto') ?></th>
            <td><?= h($appAgenda->ag_foto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Foto Url') ?></th>
            <td><?= h($appAgenda->ag_foto_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Web') ?></th>
            <td><?= h($appAgenda->ag_web) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Usuario') ?></th>
            <td><?= $appAgenda->has('app_usuario') ? $this->Html->link($appAgenda->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appAgenda->app_usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appAgenda->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Telefono Princ') ?></th>
            <td><?= $this->Number->format($appAgenda->ag_telefono_princ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Telefono Secun') ?></th>
            <td><?= $this->Number->format($appAgenda->ag_telefono_secun) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Codigo Postal') ?></th>
            <td><?= $this->Number->format($appAgenda->ag_codigo_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Cumpleannos') ?></th>
            <td><?= h($appAgenda->ag_cumpleannos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Creacion') ?></th>
            <td><?= h($appAgenda->ag_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ag Modificacion') ?></th>
            <td><?= h($appAgenda->ag_modificacion) ?></td>
        </tr>
    </table>
</div>
