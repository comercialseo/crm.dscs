<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppUsuario[]|\Cake\Collection\CollectionInterface $appUsuarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appUsuarios index large-9 medium-8 columns content">
    <h3><?= __('App Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_apellidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_rol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_valido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_token_pass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('us_modificacion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appUsuarios as $appUsuario): ?>
            <tr>
                <td><?= $this->Number->format($appUsuario->id) ?></td>
                <td><?= h($appUsuario->us_usuario) ?></td>
                <td><?= h($appUsuario->us_password) ?></td>
                <td><?= h($appUsuario->us_email) ?></td>
                <td><?= h($appUsuario->us_nombre) ?></td>
                <td><?= h($appUsuario->us_apellidos) ?></td>
                <td><?= h($appUsuario->us_rol) ?></td>
                <td><?= h($appUsuario->us_valido) ?></td>
                <td><?= h($appUsuario->us_token) ?></td>
                <td><?= h($appUsuario->us_token_pass) ?></td>
                <td><?= h($appUsuario->us_creacion) ?></td>
                <td><?= h($appUsuario->us_modificacion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appUsuario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appUsuario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appUsuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appUsuario->id)]) ?>
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
