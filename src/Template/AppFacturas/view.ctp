<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppFactura $appFactura
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Factura'), ['action' => 'edit', $appFactura->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Factura'), ['action' => 'delete', $appFactura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appFactura->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Facturas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Factura'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Clientes Negocios'), ['controller' => 'AppClientesNegocios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Clientes Negocio'), ['controller' => 'AppClientesNegocios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appFacturas view large-9 medium-8 columns content">
    <h3><?= h($appFactura->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fc Codigo') ?></th>
            <td><?= h($appFactura->fc_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Periodo') ?></th>
            <td><?= h($appFactura->fc_periodo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Clientes Negocio') ?></th>
            <td><?= $appFactura->has('app_clientes_negocio') ? $this->Html->link($appFactura->app_clientes_negocio->id, ['controller' => 'AppClientesNegocios', 'action' => 'view', $appFactura->app_clientes_negocio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Usuario') ?></th>
            <td><?= $appFactura->has('app_usuario') ? $this->Html->link($appFactura->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appFactura->app_usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appFactura->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Iva Estipulado') ?></th>
            <td><?= $this->Number->format($appFactura->fc_iva_estipulado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Iva') ?></th>
            <td><?= $this->Number->format($appFactura->fc_iva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Irpf Estipulado') ?></th>
            <td><?= $this->Number->format($appFactura->fc_irpf_estipulado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Irpf') ?></th>
            <td><?= $this->Number->format($appFactura->fc_irpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Base Imponible') ?></th>
            <td><?= $this->Number->format($appFactura->fc_base_imponible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Descuento') ?></th>
            <td><?= $this->Number->format($appFactura->fc_descuento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Total') ?></th>
            <td><?= $this->Number->format($appFactura->fc_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Fecha Facturacion') ?></th>
            <td><?= h($appFactura->fc_fecha_facturacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Creacion') ?></th>
            <td><?= h($appFactura->fc_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Modificacion') ?></th>
            <td><?= h($appFactura->fc_modificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Entregada') ?></th>
            <td><?= $appFactura->fc_entregada ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fc Abonada') ?></th>
            <td><?= $appFactura->fc_abonada ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Fc Comentarios') ?></h4>
        <?= $this->Text->autoParagraph(h($appFactura->fc_comentarios)); ?>
    </div>
</div>
