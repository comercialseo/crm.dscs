<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppEvento $appEvento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Eventos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="appEventos form large-9 medium-8 columns content">
    <?= $this->Form->create($appEvento) ?>
    <fieldset>
        <legend><?= __('Add App Evento') ?></legend>
        <?php
            echo $this->Form->control('ev_evento');
            echo $this->Form->control('ev_descripcion');
            echo $this->Form->control('ev_comienzo');
            echo $this->Form->control('ev_final');
            echo $this->Form->control('ev_prioridad');
            echo $this->Form->control('ev_creacion');
            echo $this->Form->control('ev_modificacion');
            echo $this->Form->control('ev_app_usuarios_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
