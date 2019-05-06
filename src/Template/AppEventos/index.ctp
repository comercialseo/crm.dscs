<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppEvento[]|\Cake\Collection\CollectionInterface $appEventos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Evento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appEventos index large-9 medium-8 columns content">
    <h3><?= __('App Eventos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ev_evento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ev_comienzo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ev_final') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ev_prioridad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ev_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ev_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ev_app_usuarios_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appEventos as $appEvento): ?>
            <tr>
                <td><?= $this->Number->format($appEvento->id) ?></td>
                <td><?= h($appEvento->ev_evento) ?></td>
                <td><?= h($appEvento->ev_comienzo) ?></td>
                <td><?= h($appEvento->ev_final) ?></td>
                <td><?= h($appEvento->ev_prioridad) ?></td>
                <td><?= h($appEvento->ev_creacion) ?></td>
                <td><?= h($appEvento->ev_modificacion) ?></td>
                <td><?= $this->Number->format($appEvento->ev_app_usuarios_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appEvento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appEvento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appEvento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appEvento->id)]) ?>
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
