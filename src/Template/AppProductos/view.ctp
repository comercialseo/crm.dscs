<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProducto $appProducto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Producto'), ['action' => 'edit', $appProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Producto'), ['action' => 'delete', $appProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Departamentos'), ['controller' => 'AppDepartamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Departamento'), ['controller' => 'AppDepartamentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appProductos view large-9 medium-8 columns content">
    <h3><?= h($appProducto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pr Nombre') ?></th>
            <td><?= h($appProducto->pr_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Tipo') ?></th>
            <td><?= h($appProducto->pr_tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Departamento') ?></th>
            <td><?= $appProducto->has('app_departamento') ? $this->Html->link($appProducto->app_departamento->id, ['controller' => 'AppDepartamentos', 'action' => 'view', $appProducto->app_departamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Base Imponible') ?></th>
            <td><?= $this->Number->format($appProducto->pr_base_imponible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Creacion') ?></th>
            <td><?= h($appProducto->pr_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pr Modificacion') ?></th>
            <td><?= h($appProducto->pr_modificacion) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Pr Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($appProducto->pr_descripcion)); ?>
    </div>
</div>
