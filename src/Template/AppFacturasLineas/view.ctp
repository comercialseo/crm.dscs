<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $appFacturasLinea
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Facturas Linea'), ['action' => 'edit', $appFacturasLinea->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Facturas Linea'), ['action' => 'delete', $appFacturasLinea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appFacturasLinea->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Facturas Lineas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Facturas Linea'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appFacturasLineas view large-9 medium-8 columns content">
    <h3><?= h($appFacturasLinea->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appFacturasLinea->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fl Cantidad') ?></th>
            <td><?= $this->Number->format($appFacturasLinea->fl_cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fl Productos Id') ?></th>
            <td><?= $this->Number->format($appFacturasLinea->fl_productos_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fl Negocios Id') ?></th>
            <td><?= $this->Number->format($appFacturasLinea->fl_negocios_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fl Facturas Id') ?></th>
            <td><?= $this->Number->format($appFacturasLinea->fl_facturas_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fl Creacion') ?></th>
            <td><?= h($appFacturasLinea->fl_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fl Modificacion') ?></th>
            <td><?= h($appFacturasLinea->fl_modificacion) ?></td>
        </tr>
    </table>
</div>
