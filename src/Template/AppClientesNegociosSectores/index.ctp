<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppClientesNegociosSectore[]|\Cake\Collection\CollectionInterface $appClientesNegociosSectores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Clientes Negocios Sectore'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appClientesNegociosSectores index large-9 medium-8 columns content">
    <h3><?= __('App Clientes Negocios Sectores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nt_sector') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appClientesNegociosSectores as $appClientesNegociosSectore): ?>
            <tr>
                <td><?= $this->Number->format($appClientesNegociosSectore->id) ?></td>
                <td><?= h($appClientesNegociosSectore->nt_sector) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appClientesNegociosSectore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appClientesNegociosSectore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appClientesNegociosSectore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appClientesNegociosSectore->id)]) ?>
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
