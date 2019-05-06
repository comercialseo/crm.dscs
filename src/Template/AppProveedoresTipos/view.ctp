<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProveedoresTipo $appProveedoresTipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Proveedores Tipo'), ['action' => 'edit', $appProveedoresTipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Proveedores Tipo'), ['action' => 'delete', $appProveedoresTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appProveedoresTipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Proveedores Tipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Proveedores Tipo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['controller' => 'AppProveedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['controller' => 'AppProveedores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appProveedoresTipos view large-9 medium-8 columns content">
    <h3><?= h($appProveedoresTipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pt Tipo') ?></th>
            <td><?= h($appProveedoresTipo->pt_tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appProveedoresTipo->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related App Proveedores') ?></h4>
        <?php if (!empty($appProveedoresTipo->app_proveedores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pr Nombre') ?></th>
                <th scope="col"><?= __('Pr Direccion') ?></th>
                <th scope="col"><?= __('Pr Codigo Postal') ?></th>
                <th scope="col"><?= __('Pr Poblacion') ?></th>
                <th scope="col"><?= __('Pr Provincia') ?></th>
                <th scope="col"><?= __('Pr Telefono Princ') ?></th>
                <th scope="col"><?= __('Pr Telefono Secun') ?></th>
                <th scope="col"><?= __('Pr Email') ?></th>
                <th scope="col"><?= __('Pr Creacion') ?></th>
                <th scope="col"><?= __('Pr Modificacion') ?></th>
                <th scope="col"><?= __('App Proveedores Tipo Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appProveedoresTipo->app_proveedores as $appProveedores): ?>
            <tr>
                <td><?= h($appProveedores->id) ?></td>
                <td><?= h($appProveedores->pr_nombre) ?></td>
                <td><?= h($appProveedores->pr_direccion) ?></td>
                <td><?= h($appProveedores->pr_codigo_postal) ?></td>
                <td><?= h($appProveedores->pr_poblacion) ?></td>
                <td><?= h($appProveedores->pr_provincia) ?></td>
                <td><?= h($appProveedores->pr_telefono_princ) ?></td>
                <td><?= h($appProveedores->pr_telefono_secun) ?></td>
                <td><?= h($appProveedores->pr_email) ?></td>
                <td><?= h($appProveedores->pr_creacion) ?></td>
                <td><?= h($appProveedores->pr_modificacion) ?></td>
                <td><?= h($appProveedores->app_proveedores_tipo_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppProveedores', 'action' => 'view', $appProveedores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppProveedores', 'action' => 'edit', $appProveedores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppProveedores', 'action' => 'delete', $appProveedores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appProveedores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
