<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProveedore $appProveedore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Proveedores Tipos'), ['controller' => 'AppProveedoresTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Proveedores Tipo'), ['controller' => 'AppProveedoresTipos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appProveedores form large-9 medium-8 columns content">
    <?= $this->Form->create($appProveedore) ?>
    <fieldset>
        <legend><?= __('Add App Proveedore') ?></legend>
        <?php
            echo $this->Form->control('pr_nombre');
            echo $this->Form->control('pr_direccion');
            echo $this->Form->control('pr_codigo_postal');
            echo $this->Form->control('pr_poblacion');
            echo $this->Form->control('pr_provincia');
            echo $this->Form->control('pr_telefono_princ');
            echo $this->Form->control('pr_telefono_secun');
            echo $this->Form->control('pr_email');
            echo $this->Form->control('pr_creacion');
            echo $this->Form->control('pr_modificacion', ['empty' => true]);
            echo $this->Form->control('app_proveedores_tipo_id', ['options' => $appProveedoresTipos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
