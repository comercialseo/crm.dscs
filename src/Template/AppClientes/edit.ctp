<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppCliente $appCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appCliente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appCliente->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appClientes form large-9 medium-8 columns content">
    <?= $this->Form->create($appCliente) ?>
    <fieldset>
        <legend><?= __('Edit App Cliente') ?></legend>
        <?php
            echo $this->Form->control('cl_nombre');
            echo $this->Form->control('cl_apellidos');
            echo $this->Form->control('cl_email');
            echo $this->Form->control('cl_telefono_princ');
            echo $this->Form->control('cl_telefono_secun');
            echo $this->Form->control('cl_comentario');
            echo $this->Form->control('cl_creacion');
            echo $this->Form->control('cl_modificacion', ['empty' => true]);
            echo $this->Form->control('cl_app_usuarios_id', ['options' => $appUsuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
