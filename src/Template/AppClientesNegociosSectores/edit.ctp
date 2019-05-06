<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppClientesNegociosSectore $appClientesNegociosSectore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appClientesNegociosSectore->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appClientesNegociosSectore->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Clientes Negocios Sectores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="appClientesNegociosSectores form large-9 medium-8 columns content">
    <?= $this->Form->create($appClientesNegociosSectore) ?>
    <fieldset>
        <legend><?= __('Edit App Clientes Negocios Sectore') ?></legend>
        <?php
            echo $this->Form->control('nt_sector');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
