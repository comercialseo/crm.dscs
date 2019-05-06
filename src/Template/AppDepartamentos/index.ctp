<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppDepartamento[]|\Cake\Collection\CollectionInterface $appDepartamentos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Departamento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appDepartamentos index large-9 medium-8 columns content">
    <h3><?= __('App Departamentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dp_departamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dp_labores') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dp_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dp_modificacion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appDepartamentos as $appDepartamento): ?>
            <tr>
                <td><?= $this->Number->format($appDepartamento->id) ?></td>
                <td><?= h($appDepartamento->dp_departamento) ?></td>
                <td><?= $this->Number->format($appDepartamento->dp_labores) ?></td>
                <td><?= h($appDepartamento->dp_creacion) ?></td>
                <td><?= h($appDepartamento->dp_modificacion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appDepartamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appDepartamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appDepartamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appDepartamento->id)]) ?>
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
