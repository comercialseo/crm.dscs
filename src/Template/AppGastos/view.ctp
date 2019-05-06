<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppGasto $appGasto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Gasto'), ['action' => 'edit', $appGasto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Gasto'), ['action' => 'delete', $appGasto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appGasto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Gastos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Gasto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['controller' => 'AppProveedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['controller' => 'AppProveedores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appGastos view large-9 medium-8 columns content">
    <h3><?= h($appGasto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ga Codigo') ?></th>
            <td><?= h($appGasto->ga_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Factura') ?></th>
            <td><?= h($appGasto->ga_factura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fa Factura Url') ?></th>
            <td><?= h($appGasto->fa_factura_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Proveedore') ?></th>
            <td><?= $appGasto->has('app_proveedore') ? $this->Html->link($appGasto->app_proveedore->id, ['controller' => 'AppProveedores', 'action' => 'view', $appGasto->app_proveedore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appGasto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Iva') ?></th>
            <td><?= $this->Number->format($appGasto->ga_iva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Irpf') ?></th>
            <td><?= $this->Number->format($appGasto->ga_irpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Descuento') ?></th>
            <td><?= $this->Number->format($appGasto->ga_descuento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Base') ?></th>
            <td><?= $this->Number->format($appGasto->ga_base) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Total') ?></th>
            <td><?= $this->Number->format($appGasto->ga_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Creacion') ?></th>
            <td><?= h($appGasto->ga_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ga Modificacion') ?></th>
            <td><?= h($appGasto->ga_modificacion) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Ga Comentario') ?></h4>
        <?= $this->Text->autoParagraph(h($appGasto->ga_comentario)); ?>
    </div>
</div>
