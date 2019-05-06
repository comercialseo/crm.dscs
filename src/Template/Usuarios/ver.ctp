<?php
/**
 * =====================================================================
 * Vista Ver Detalle de Usuarios de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppUsuariosTable $AppUsuarios
 * @method    \App\Model\Entity\AppUsuario[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al Listado de Usuarios'), ['action' => 'index'], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?> </li>
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Usuario'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>
    </ul>
</nav>
<div class="col-md-12 appUsuarios view large-9 medium-8 columns content">
<div class="x_panel">
  <div class="x_title">
    <h3>Usuario - <?= h($appUsuario->id) ?> : <?= h($appUsuario->us_usuario) ?></h3>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-hover vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td align="left"><?= h($appUsuario->us_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><a data-toggle="tooltip" data-placement="top" title="" data-original-title="El password de usuario está encriptado y no es reversible, para poder acceder a él hay que cambiarlo desde el botón EDITAR"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a><?= __(' Password') ?></th>
            <td align="left"><?= h($appUsuario->us_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td align="left"><?= h($appUsuario->us_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td align="left"><?= h($appUsuario->us_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td align="left"><?= h($appUsuario->us_apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td align="left">
            <?php 
            switch ($appUsuario->us_rol) {
                case 'sa':
                    echo __("SuperAdmin");
                break;

                case 'ad':
                    echo __("Administrador");
                break;

                case 'ed':
                    echo __("Editor");
                break;

                case 'au':
                    echo __("Autor");
                break;

                case 'us':
                    echo __("Usuario Invitado");
                break;

                case 'cl':
                    echo __("Usuario Cliente");
                break;
            }
            ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creacion') ?></th>
            <td align="left"><?= h($appUsuario->us_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ult. Modificacion') ?></th>
            <td align="left"><?= h($appUsuario->us_modificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validado') ?></th>
            <td align="left"><?= $appUsuario->us_valido ? __('<span class="btn btn-success btn-md">Sí</span>') : __('<span class="btn btn-danger btn-md">No</span>'); ?></td>
        </tr>
    </table>
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar Usuario'), ['action' => 'editar', $appUsuario->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Asignar Cliente'), ['controller' => 'clientes', 'action' => 'asignar', $appUsuario->id], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar Usuario'), ['action' => 'borrar', $appUsuario->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Confirmas que deseas borrar al Usuario # {0}?', $appUsuario->us_usuario)]) ?> </li>
    </ul>
  </div>
  <div class="related">
        <h4><?= __('Clientes Asignados') ?></h4>
        <?php if (!empty($appUsuario->app_clientes)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellidos') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($appUsuario->app_clientes as $appCliente): ?>
            <tr>
                <td align="left"><?= h($appCliente->id) ?></td>
                <td align="left"><?= h($appCliente->cl_nombre) ?></td>
                <td align="left"><?= h($appCliente->cl_apellidos) ?></td>
                <td align="left" class="actions">
                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['controller' => 'Clientes', 'action' => 'ver', $appCliente->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['controller' => 'Clientes', 'action' => 'editar', $appCliente->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['controller' => 'Clientes', 'action' => 'borrar', $appCliente->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $appCliente->id)]) ?>
                </td>
            </tr>           
            <?php endforeach; ?>
        </table>
         <?php else: ?>
            <p>Este usuario no tiene ningún cliente asignado...</p>
        <?php endif; ?>
    </div>
</div>
</div>