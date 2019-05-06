<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppClientesNegocio $appClientesNegocio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appClientesNegocio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appClientesNegocio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Clientes Negocios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes Negocios Sectores'), ['controller' => 'AppClientesNegociosSectores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Clientes Negocios Sectore'), ['controller' => 'AppClientesNegociosSectores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Clientes'), ['controller' => 'AppClientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Cliente'), ['controller' => 'AppClientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appClientesNegocios form large-9 medium-8 columns content">
    <?= $this->Form->create($appClientesNegocio) ?>
    <fieldset>
        <legend><?= __('Edit App Clientes Negocio') ?></legend>
        <?php
            echo $this->Form->control('cn_tipo');
            echo $this->Form->control('cn_razon_social');
            echo $this->Form->control('cn_cif_nif');
            echo $this->Form->control('cn_direccion');
            echo $this->Form->control('cn_codigo_postal');
            echo $this->Form->control('cn_poblacion');
            echo $this->Form->control('cn_provincia');
            echo $this->Form->control('cn_gerente');
            echo $this->Form->control('cn_telefono_princ');
            echo $this->Form->control('cn_telefono_secun');
            echo $this->Form->control('cn_email');
            echo $this->Form->control('cn_comentario');
            echo $this->Form->control('cn_creacion');
            echo $this->Form->control('cn_modificacion', ['empty' => true]);
            echo $this->Form->control('app_cliente_negocio_sector_id', ['options' => $appClientesNegociosSectores]);
            echo $this->Form->control('app_clientes_id', ['options' => $appClientes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
