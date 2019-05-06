<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppClientesNegocio $appClientesNegocio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Clientes Negocio'), ['action' => 'edit', $appClientesNegocio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Clientes Negocio'), ['action' => 'delete', $appClientesNegocio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appClientesNegocio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Clientes Negocios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Clientes Negocio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Clientes Negocios Sectores'), ['controller' => 'AppClientesNegociosSectores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Clientes Negocios Sectore'), ['controller' => 'AppClientesNegociosSectores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Clientes'), ['controller' => 'AppClientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Cliente'), ['controller' => 'AppClientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appClientesNegocios view large-9 medium-8 columns content">
    <h3><?= h($appClientesNegocio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cn Tipo') ?></th>
            <td><?= h($appClientesNegocio->cn_tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Razon Social') ?></th>
            <td><?= h($appClientesNegocio->cn_razon_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Cif Nif') ?></th>
            <td><?= h($appClientesNegocio->cn_cif_nif) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Direccion') ?></th>
            <td><?= h($appClientesNegocio->cn_direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Poblacion') ?></th>
            <td><?= h($appClientesNegocio->cn_poblacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Provincia') ?></th>
            <td><?= h($appClientesNegocio->cn_provincia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Gerente') ?></th>
            <td><?= h($appClientesNegocio->cn_gerente) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Email') ?></th>
            <td><?= h($appClientesNegocio->cn_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Clientes Negocios Sectore') ?></th>
            <td><?= $appClientesNegocio->has('app_clientes_negocios_sectore') ? $this->Html->link($appClientesNegocio->app_clientes_negocios_sectore->id, ['controller' => 'AppClientesNegociosSectores', 'action' => 'view', $appClientesNegocio->app_clientes_negocios_sectore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Cliente') ?></th>
            <td><?= $appClientesNegocio->has('app_cliente') ? $this->Html->link($appClientesNegocio->app_cliente->id, ['controller' => 'AppClientes', 'action' => 'view', $appClientesNegocio->app_cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appClientesNegocio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Codigo Postal') ?></th>
            <td><?= $this->Number->format($appClientesNegocio->cn_codigo_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Telefono Princ') ?></th>
            <td><?= $this->Number->format($appClientesNegocio->cn_telefono_princ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Telefono Secun') ?></th>
            <td><?= $this->Number->format($appClientesNegocio->cn_telefono_secun) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Comentario') ?></th>
            <td><?= $this->Number->format($appClientesNegocio->cn_comentario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Creacion') ?></th>
            <td><?= h($appClientesNegocio->cn_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cn Modificacion') ?></th>
            <td><?= h($appClientesNegocio->cn_modificacion) ?></td>
        </tr>
    </table>
</div>
