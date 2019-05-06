<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppEquipo $appEquipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Equipos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appEquipos form large-9 medium-8 columns content">
    <?= $this->Form->create($appEquipo) ?>
    <fieldset>
        <legend><?= __('Add App Equipo') ?></legend>
        <?php
            echo $this->Form->control('eq_nombre');
            echo $this->Form->control('eq_descripcion');
            echo $this->Form->control('eq_creacion');
            echo $this->Form->control('eq_modificacion', ['empty' => true]);
            echo $this->Form->control('app_usuarios_id');
            echo $this->Form->control('app_usuarios._ids', ['options' => $appUsuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
