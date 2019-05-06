<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProveedore $appProveedore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Proveedore'), ['action' => 'edit', $appProveedore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Proveedore'), ['action' => 'delete', $appProveedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appProveedore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Proveedores Tipos'), ['controller' => 'AppProveedoresTipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Proveedores Tipo'), ['controller' => 'AppProveedoresTipos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appProveedores view large-9 medium-8 columns content">
    <h3><?= h($appProveedore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pr Nombre') ?></th>
            <td><?= h($appProveedore->pr_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Direccion') ?></th>
            <td><?= h($appProveedore->pr_direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Poblacion') ?></th>
            <td><?= h($appProveedore->pr_poblacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Provincia') ?></th>
            <td><?= h($appProveedore->pr_provincia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Email') ?></th>
            <td><?= h($appProveedore->pr_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Proveedores Tipo') ?></th>
            <td><?= $appProveedore->has('app_proveedores_tipo') ? $this->Html->link($appProveedore->app_proveedores_tipo->id, ['controller' => 'AppProveedoresTipos', 'action' => 'view', $appProveedore->app_proveedores_tipo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appProveedore->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Codigo Postal') ?></th>
            <td><?= $this->Number->format($appProveedore->pr_codigo_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Telefono Princ') ?></th>
            <td><?= $this->Number->format($appProveedore->pr_telefono_princ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Telefono Secun') ?></th>
            <td><?= $this->Number->format($appProveedore->pr_telefono_secun) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Creacion') ?></th>
            <td><?= h($appProveedore->pr_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Modificacion') ?></th>
            <td><?= h($appProveedore->pr_modificacion) ?></td>
        </tr>
    </table>
</div>
