<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppUsuario $appUsuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="appUsuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($appUsuario) ?>
    <fieldset>
        <legend><?= __('Add App Usuario') ?></legend>
        <?php
            echo $this->Form->control('us_usuario');
            echo $this->Form->control('us_password');
            echo $this->Form->control('us_email');
            echo $this->Form->control('us_nombre');
            echo $this->Form->control('us_apellidos');
            echo $this->Form->control('us_rol');
            echo $this->Form->control('us_valido');
            echo $this->Form->control('us_token');
            echo $this->Form->control('us_token_pass');
            echo $this->Form->control('us_creacion');
            echo $this->Form->control('us_modificacion', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>