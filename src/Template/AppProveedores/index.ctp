<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppProveedore[]|\Cake\Collection\CollectionInterface $appProveedores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Proveedore'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Proveedores Tipos'), ['controller' => 'AppProveedoresTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Proveedores Tipo'), ['controller' => 'AppProveedoresTipos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appProveedores index large-9 medium-8 columns content">
    <h3><?= __('App Proveedores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_codigo_postal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_poblacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_provincia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_telefono_princ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_telefono_secun') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pr_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_proveedores_tipo_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appProveedores as $appProveedore): ?>
            <tr>
                <td><?= $this->Number->format($appProveedore->id) ?></td>
                <td><?= h($appProveedore->pr_nombre) ?></td>
                <td><?= h($appProveedore->pr_direccion) ?></td>
                <td><?= $this->Number->format($appProveedore->pr_codigo_postal) ?></td>
                <td><?= h($appProveedore->pr_poblacion) ?></td>
                <td><?= h($appProveedore->pr_provincia) ?></td>
                <td><?= $this->Number->format($appProveedore->pr_telefono_princ) ?></td>
                <td><?= $this->Number->format($appProveedore->pr_telefono_secun) ?></td>
                <td><?= h($appProveedore->pr_email) ?></td>
                <td><?= h($appProveedore->pr_creacion) ?></td>
                <td><?= h($appProveedore->pr_modificacion) ?></td>
                <td><?= $appProveedore->has('app_proveedores_tipo') ? $this->Html->link($appProveedore->app_proveedores_tipo->id, ['controller' => 'AppProveedoresTipos', 'action' => 'view', $appProveedore->app_proveedores_tipo->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appProveedore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appProveedore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appProveedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appProveedore->id)]) ?>
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
