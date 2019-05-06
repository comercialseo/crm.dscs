<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProveedoresTipo $appProveedoresTipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appProveedoresTipo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appProveedoresTipo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Proveedores Tipos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Proveedores'), ['controller' => 'AppProveedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['controller' => 'AppProveedores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appProveedoresTipos form large-9 medium-8 columns content">
    <?= $this->Form->create($appProveedoresTipo) ?>
    <fieldset>
        <legend><?= __('Edit App Proveedores Tipo') ?></legend>
        <?php
            echo $this->Form->control('pt_tipo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
