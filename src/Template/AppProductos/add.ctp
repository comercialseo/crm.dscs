<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProducto $appProducto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Productos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Departamentos'), ['controller' => 'AppDepartamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Departamento'), ['controller' => 'AppDepartamentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appProductos form large-9 medium-8 columns content">
    <?= $this->Form->create($appProducto) ?>
    <fieldset>
        <legend><?= __('Add App Producto') ?></legend>
        <?php
            echo $this->Form->control('pr_nombre');
            echo $this->Form->control('pr_descripcion');
            echo $this->Form->control('pr_tipo');
            echo $this->Form->control('pr_base_imponible');
            echo $this->Form->control('pr_creacion');
            echo $this->Form->control('pr_modificacion');
            echo $this->Form->control('app_departamentos_id', ['options' => $appDepartamentos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
