<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $appFacturasLinea
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Facturas Lineas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="appFacturasLineas form large-9 medium-8 columns content">
    <?= $this->Form->create($appFacturasLinea) ?>
    <fieldset>
        <legend><?= __('Add App Facturas Linea') ?></legend>
        <?php
            echo $this->Form->control('fl_cantidad');
            echo $this->Form->control('fl_creacion');
            echo $this->Form->control('fl_modificacion', ['empty' => true]);
            echo $this->Form->control('fl_productos_id');
            echo $this->Form->control('fl_negocios_id');
            echo $this->Form->control('fl_facturas_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
