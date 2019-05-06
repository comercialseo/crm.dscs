<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppAgenda[]|\Cake\Collection\CollectionInterface $appAgenda
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Agenda'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Usuarios'), ['controller' => 'AppUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Usuario'), ['controller' => 'AppUsuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appAgenda index large-9 medium-8 columns content">
    <h3><?= __('App Agenda') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_apellidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_contacto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_telefono_princ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_telefono_secun') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_codigo_postal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_poblacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_provincia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_cumpleannos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_twitter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_facebook') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_foto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_foto_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_web') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ag_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_usuario_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appAgenda as $appAgenda): ?>
            <tr>
                <td><?= $this->Number->format($appAgenda->id) ?></td>
                <td><?= h($appAgenda->ag_nombre) ?></td>
                <td><?= h($appAgenda->ag_apellidos) ?></td>
                <td><?= h($appAgenda->ag_contacto) ?></td>
                <td><?= $this->Number->format($appAgenda->ag_telefono_princ) ?></td>
                <td><?= $this->Number->format($appAgenda->ag_telefono_secun) ?></td>
                <td><?= h($appAgenda->ag_email) ?></td>
                <td><?= h($appAgenda->ag_direccion) ?></td>
                <td><?= $this->Number->format($appAgenda->ag_codigo_postal) ?></td>
                <td><?= h($appAgenda->ag_poblacion) ?></td>
                <td><?= h($appAgenda->ag_provincia) ?></td>
                <td><?= h($appAgenda->ag_cumpleannos) ?></td>
                <td><?= h($appAgenda->ag_twitter) ?></td>
                <td><?= h($appAgenda->ag_facebook) ?></td>
                <td><?= h($appAgenda->ag_foto) ?></td>
                <td><?= h($appAgenda->ag_foto_url) ?></td>
                <td><?= h($appAgenda->ag_web) ?></td>
                <td><?= h($appAgenda->ag_creacion) ?></td>
                <td><?= h($appAgenda->ag_modificacion) ?></td>
                <td><?= $appAgenda->has('app_usuario') ? $this->Html->link($appAgenda->app_usuario->id, ['controller' => 'AppUsuarios', 'action' => 'view', $appAgenda->app_usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appAgenda->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appAgenda->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appAgenda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appAgenda->id)]) ?>
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
