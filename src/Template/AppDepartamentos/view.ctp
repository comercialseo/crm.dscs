<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppDepartamento $appDepartamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Departamento'), ['action' => 'edit', $appDepartamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Departamento'), ['action' => 'delete', $appDepartamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appDepartamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Departamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Departamento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appDepartamentos view large-9 medium-8 columns content">
    <h3><?= h($appDepartamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dp Departamento') ?></th>
            <td><?= h($appDepartamento->dp_departamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appDepartamento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dp Labores') ?></th>
            <td><?= $this->Number->format($appDepartamento->dp_labores) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dp Creacion') ?></th>
            <td><?= h($appDepartamento->dp_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dp Modificacion') ?></th>
            <td><?= h($appDepartamento->dp_modificacion) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Dp Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($appDepartamento->dp_descripcion)); ?>
    </div>
</div>
