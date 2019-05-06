<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppClientesNegocio[]|\Cake\Collection\CollectionInterface $appClientesNegocios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Clientes Negocio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes Negocios Sectores'), ['controller' => 'AppClientesNegociosSectores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Clientes Negocios Sectore'), ['controller' => 'AppClientesNegociosSectores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes'), ['controller' => 'AppClientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Cliente'), ['controller' => 'AppClientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appClientesNegocios index large-9 medium-8 columns content">
    <h3><?= __('App Clientes Negocios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_razon_social') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_cif_nif') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_codigo_postal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_poblacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_provincia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_gerente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_telefono_princ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_telefono_secun') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_comentario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_creacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cn_modificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_cliente_negocio_sector_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_clientes_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appClientesNegocios as $appClientesNegocio): ?>
            <tr>
                <td><?= $this->Number->format($appClientesNegocio->id) ?></td>
                <td><?= h($appClientesNegocio->cn_tipo) ?></td>
                <td><?= h($appClientesNegocio->cn_razon_social) ?></td>
                <td><?= h($appClientesNegocio->cn_cif_nif) ?></td>
                <td><?= h($appClientesNegocio->cn_direccion) ?></td>
                <td><?= $this->Number->format($appClientesNegocio->cn_codigo_postal) ?></td>
                <td><?= h($appClientesNegocio->cn_poblacion) ?></td>
                <td><?= h($appClientesNegocio->cn_provincia) ?></td>
                <td><?= h($appClientesNegocio->cn_gerente) ?></td>
                <td><?= $this->Number->format($appClientesNegocio->cn_telefono_princ) ?></td>
                <td><?= $this->Number->format($appClientesNegocio->cn_telefono_secun) ?></td>
                <td><?= h($appClientesNegocio->cn_email) ?></td>
                <td><?= $this->Number->format($appClientesNegocio->cn_comentario) ?></td>
                <td><?= h($appClientesNegocio->cn_creacion) ?></td>
                <td><?= h($appClientesNegocio->cn_modificacion) ?></td>
                <td><?= $appClientesNegocio->has('app_clientes_negocios_sectore') ? $this->Html->link($appClientesNegocio->app_clientes_negocios_sectore->id, ['controller' => 'AppClientesNegociosSectores', 'action' => 'view', $appClientesNegocio->app_clientes_negocios_sectore->id]) : '' ?></td>
                <td><?= $appClientesNegocio->has('app_cliente') ? $this->Html->link($appClientesNegocio->app_cliente->id, ['controller' => 'AppClientes', 'action' => 'view', $appClientesNegocio->app_cliente->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appClientesNegocio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appClientesNegocio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appClientesNegocio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appClientesNegocio->id)]) ?>
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
