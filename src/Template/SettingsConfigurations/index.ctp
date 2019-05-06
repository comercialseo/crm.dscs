<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingsConfiguration[]|\Cake\Collection\CollectionInterface $settingsConfigurations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Settings Configuration'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="settingsConfigurations index large-9 medium-8 columns content">
    <h3><?= __('Settings Configurations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('editable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autoload') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($settingsConfigurations as $settingsConfiguration): ?>
            <tr>
                <td><?= $this->Number->format($settingsConfiguration->id) ?></td>
                <td><?= h($settingsConfiguration->name) ?></td>
                <td><?= h($settingsConfiguration->type) ?></td>
                <td><?= h($settingsConfiguration->editable) ?></td>
                <td><?= $this->Number->format($settingsConfiguration->weight) ?></td>
                <td><?= h($settingsConfiguration->autoload) ?></td>
                <td><?= h($settingsConfiguration->created) ?></td>
                <td><?= h($settingsConfiguration->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $settingsConfiguration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $settingsConfiguration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $settingsConfiguration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settingsConfiguration->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
