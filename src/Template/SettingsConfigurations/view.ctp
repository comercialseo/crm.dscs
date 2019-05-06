<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingsConfiguration $settingsConfiguration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Settings Configuration'), ['action' => 'edit', $settingsConfiguration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Settings Configuration'), ['action' => 'delete', $settingsConfiguration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settingsConfiguration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Settings Configurations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Settings Configuration'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="settingsConfigurations view large-9 medium-8 columns content">
    <h3><?= h($settingsConfiguration->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($settingsConfiguration->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($settingsConfiguration->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($settingsConfiguration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($settingsConfiguration->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($settingsConfiguration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($settingsConfiguration->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editable') ?></th>
            <td><?= $settingsConfiguration->editable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autoload') ?></th>
            <td><?= $settingsConfiguration->autoload ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Value') ?></h4>
        <?= $this->Text->autoParagraph(h($settingsConfiguration->value)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($settingsConfiguration->description)); ?>
    </div>
</div>
