<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppClientesNegociosSectore $appClientesNegociosSectore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Clientes Negocios Sectore'), ['action' => 'edit', $appClientesNegociosSectore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Clientes Negocios Sectore'), ['action' => 'delete', $appClientesNegociosSectore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appClientesNegociosSectore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Clientes Negocios Sectores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Clientes Negocios Sectore'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appClientesNegociosSectores view large-9 medium-8 columns content">
    <h3><?= h($appClientesNegociosSectore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nt Sector') ?></th>
            <td><?= h($appClientesNegociosSectore->nt_sector) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appClientesNegociosSectore->id) ?></td>
        </tr>
    </table>
</div>
