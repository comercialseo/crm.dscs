<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppGasto $appGasto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appGasto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appGasto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Gastos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['controller' => 'AppProveedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['controller' => 'AppProveedores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appGastos form large-9 medium-8 columns content">
    <?= $this->Form->create($appGasto) ?>
    <fieldset>
        <legend><?= __('Edit App Gasto') ?></legend>
        <?php
            echo $this->Form->control('ga_codigo');
            echo $this->Form->control('ga_iva');
            echo $this->Form->control('ga_irpf');
            echo $this->Form->control('ga_descuento');
            echo $this->Form->control('ga_base');
            echo $this->Form->control('ga_total');
            echo $this->Form->control('ga_factura');
            echo $this->Form->control('fa_factura_url');
            echo $this->Form->control('ga_comentario');
            echo $this->Form->control('ga_creacion');
            echo $this->Form->control('ga_modificacion', ['empty' => true]);
            echo $this->Form->control('app_proveedores_id', ['options' => $appProveedores]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
