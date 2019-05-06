<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingsConfiguration $settingsConfiguration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $settingsConfiguration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $settingsConfiguration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Settings Configurations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="settingsConfigurations form large-9 medium-8 columns content">
    <?= $this->Form->create($settingsConfiguration) ?>
    <fieldset>
        <legend><?= __('Edit Settings Configuration') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('value');
            echo $this->Form->control('description');
            echo $this->Form->control('type');
            echo $this->Form->control('editable');
            echo $this->Form->control('weight');
            echo $this->Form->control('autoload');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
