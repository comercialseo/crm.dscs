<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppDepartamento $appDepartamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Departamentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="appDepartamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($appDepartamento) ?>
    <fieldset>
        <legend><?= __('Add App Departamento') ?></legend>
        <?php
            echo $this->Form->control('dp_departamento');
            echo $this->Form->control('dp_descripcion');
            echo $this->Form->control('dp_labores');
            echo $this->Form->control('dp_creacion');
            echo $this->Form->control('dp_modificacion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
