<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppFactura $appFactura
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Facturas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes Negocios'), ['controller' => 'AppClientesNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Clientes Negocio'), ['controller' => 'AppClientesNegocios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appFacturas form large-9 medium-8 columns content">
    <?= $this->Form->create($appFactura) ?>
    <fieldset>
        <legend><?= __('Add App Factura') ?></legend>
        <?php
            echo $this->Form->control('fc_codigo');
            echo $this->Form->control('fc_periodo');
            echo $this->Form->control('fc_iva_estipulado');
            echo $this->Form->control('fc_iva');
            echo $this->Form->control('fc_irpf_estipulado');
            echo $this->Form->control('fc_irpf');
            echo $this->Form->control('fc_base_imponible');
            echo $this->Form->control('fc_descuento');
            echo $this->Form->control('fc_total');
            echo $this->Form->control('fc_entregada');
            echo $this->Form->control('fc_abonada');
            echo $this->Form->control('fc_comentarios');
            echo $this->Form->control('fc_fecha_facturacion');
            echo $this->Form->control('fc_creacion');
            echo $this->Form->control('fc_modificacion', ['empty' => true]);
            echo $this->Form->control('fc_app_negocios_id', ['options' => $appClientesNegocios]);
            echo $this->Form->control('fc_app_usuarios_id', ['options' => $appUsuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
