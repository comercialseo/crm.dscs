<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AppEvento $appEvento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Evento'), ['action' => 'edit', $appEvento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Evento'), ['action' => 'delete', $appEvento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appEvento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Eventos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Evento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appEventos view large-9 medium-8 columns content">
    <h3><?= h($appEvento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ev Evento') ?></th>
            <td><?= h($appEvento->ev_evento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ev Prioridad') ?></th>
            <td><?= h($appEvento->ev_prioridad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appEvento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ev App Usuarios Id') ?></th>
            <td><?= $this->Number->format($appEvento->ev_app_usuarios_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ev Comienzo') ?></th>
            <td><?= h($appEvento->ev_comienzo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ev Final') ?></th>
            <td><?= h($appEvento->ev_final) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ev Creacion') ?></th>
            <td><?= h($appEvento->ev_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ev Modificacion') ?></th>
            <td><?= h($appEvento->ev_modificacion) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Ev Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($appEvento->ev_descripcion)); ?>
    </div>
</div>
