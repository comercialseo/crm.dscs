<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppUsuariosAppCliente $appUsuariosAppCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appUsuariosAppCliente->app_cliente_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appUsuariosAppCliente->app_cliente_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Usuarios App Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes'), ['controller' => 'AppClientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Cliente'), ['controller' => 'AppClientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appUsuariosAppClientes form large-9 medium-8 columns content">
    <?= $this->Form->create($appUsuariosAppCliente) ?>
    <fieldset>
        <legend><?= __('Edit App Usuarios App Cliente') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
