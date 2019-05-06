<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppAgenda $appAgenda
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appAgenda->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appAgenda->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Agenda'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appAgenda form large-9 medium-8 columns content">
    <?= $this->Form->create($appAgenda) ?>
    <fieldset>
        <legend><?= __('Edit App Agenda') ?></legend>
        <?php
            echo $this->Form->control('ag_nombre');
            echo $this->Form->control('ag_apellidos');
            echo $this->Form->control('ag_contacto');
            echo $this->Form->control('ag_telefono_princ');
            echo $this->Form->control('ag_telefono_secun');
            echo $this->Form->control('ag_email');
            echo $this->Form->control('ag_direccion');
            echo $this->Form->control('ag_codigo_postal');
            echo $this->Form->control('ag_poblacion');
            echo $this->Form->control('ag_provincia');
            echo $this->Form->control('ag_cumpleannos', ['empty' => true]);
            echo $this->Form->control('ag_twitter');
            echo $this->Form->control('ag_facebook');
            echo $this->Form->control('ag_foto');
            echo $this->Form->control('ag_foto_url');
            echo $this->Form->control('ag_web');
            echo $this->Form->control('ag_creacion');
            echo $this->Form->control('ag_modificacion', ['empty' => true]);
            echo $this->Form->control('app_usuario_id', ['options' => $appUsuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
