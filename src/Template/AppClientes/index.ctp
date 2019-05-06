<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppCliente[]|\Cake\Collection\CollectionInterface $appClientes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Cliente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appClientes index large-9 medium-8 columns content">
    <h3><?= __('App Clientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_apellidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_telefono_princ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_telefono_secun') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cl_app_usuarios_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appClientes as $appCliente): ?>
            <tr>
                <td><?= $this->Number->format($appCliente->id) ?></td>
                <td><?= h($appCliente->cl_nombre) ?></td>
                <td><?= h($appCliente->cl_apellidos) ?></td>
                <td><?= h($appCliente->cl_email) ?></td>
                <td><?= $this->Number->format($appCliente->cl_telefono_princ) ?></td>
                <td><?= $this->Number->format($appCliente->cl_telefono_secun) ?></td>
                <td><?= h($appCliente->cl_creacion) ?></td>
                <td><?= h($appCliente->cl_modificacion) ?></td>
                <td><?= $appCliente->has('app_usuario') ? $this->Html->link($appCliente->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appCliente->app_usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appCliente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appCliente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appCliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCliente->id)]) ?>
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
