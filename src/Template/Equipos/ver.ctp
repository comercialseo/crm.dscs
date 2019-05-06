<?php
/**
 * =====================================================================
 * Vista Ver Detalle de Equipos de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppEquiposTable $AppEquipos
 * @method    \App\Model\Entity\AppEquipo[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al Listado de Equipos'), ['action' => 'index'], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?> </li>
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Equipo'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>
    </ul>
</nav>

<div class="col-md-12 appEquipos view large-9 medium-8 columns content">
<div class="x_panel">
  <div class="x_title">
    <h3>Datos del Equipo - <?= h($appEquipo->id) ?> : <?= h($appEquipo->eq_nombre) ?></h3>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-hover vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td align="left"><?= h($appEquipo->eq_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td align="left"><?= h($appEquipo->eq_descripcion) ?></td>
        </tr>        
        <tr>
            <th scope="row"><?= __('Creación') ?></th>
            <td align="left"><?= h($appEquipo->eq_creacion) ?></td>
        </tr>
        <?php 
            if(!empty($appEquipo->eq_modificacion)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Últim. Modificacion') ?></th>
                <td align="left"><?= h($appEquipo->eq_modificacion) ?></td>
            </tr>
        <?php
            }
        ?>        
        <tr>
            <th scope="row"><?= __('Asignado a') ?></th>
            <td align="left"></td>
        </tr>
    </table>    
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar Equipo'), ['action' => 'editar', $appEquipo->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?> </li>
        
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Asignar Miembros'), ['controller' => 'equipos-miembros', 'action' => 'asignar', $appEquipo->id], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar Equipo'), ['action' => 'borrar', $appEquipo->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar al cliente # {0}?', $appEquipo->eq_nombre)]) ?> </li>
    </ul>
  </div>
  <div class="related">
        <h4><?= __('Miembros Asignados') ?></h4>
        <?php if (!empty($appEquipo->app_usuarios)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Usuario') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($appEquipo->app_usuarios as $appUsuarios): ?>
            <tr>
                <td align="left" class="sorting_1"><?= h($appUsuarios->us_usuario) ?></td>
                <td align="left" class="actions">
                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['controller' => 'Usuarios', 'action' => 'ver', $appUsuarios->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['controller' => 'Usuarios', 'action' => 'editar', $appUsuarios->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-exchange"></i> Quitar'), 
                                                    ['controller' => 'Equipos', 
                                                    'action' => 'quitar', $appEquipo->id, $appUsuarios->id
                                                    ],
                                                    [
                                                     'escape' => false,
                                                     'class' => 'btn btn-xs',
                                                     'confirm' => __('¿Seguro que deseas quitar del equipo al usuario # {0}?', $appUsuarios->us_usuario)
                                                    ]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p>Este equipo no tiene ningún miembro asignado...</p>
        <?php endif; ?>
    </div>
</div>
</div>