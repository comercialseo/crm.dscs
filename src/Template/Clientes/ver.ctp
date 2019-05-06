<?php
/**
 * =====================================================================
 * Vista Ver Detalle de Clientes de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesTable $AppClientes
 * @method    \App\Model\Entity\AppCliente[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al Listado de Clientes'), ['action' => 'index'], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?> </li>
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Cliente'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>
    </ul>
</nav>

<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
  <div class="x_title">
    <h3>Datos del Cliente - <?= h($appCliente->id) ?> : <?= h($appCliente->cl_nombre.' '.$appCliente->cl_apellidos) ?></h3>
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
            <td align="left"><?= h($appCliente->cl_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td align="left"><?= h($appCliente->cl_apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td align="left"><?= h($appCliente->cl_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teléfono Principal') ?></th>
            <td align="left"><?= h($appCliente->cl_telefono_princ) ?></td>
        </tr>
        <?php 
            if(!empty($appCliente->cl_telefono_secun)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Teléfono Secundario') ?></th>
                <td align="left"><?= h($appCliente->cl_telefono_secun) ?></td>
            </tr>
        <?php
            }
        ?>        
        <tr>
            <th scope="row"><?= __('Creación') ?></th>
            <td align="left"><?= h($appCliente->cl_creacion) ?></td>
        </tr>
        <?php 
            if(!empty($appCliente->cl_modificacion)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Últim. Modificacion') ?></th>
                <td align="left"><?= h($appCliente->cl_modificacion) ?></td>
            </tr>
        <?php
            }
        ?>        
        <tr>
            <th scope="row"><?= __('Asignado a') ?></th>
            <td align="left"><?= $appCliente->has('app_usuario') ? $this->Html->link($appCliente->app_usuario->us_usuario, ['controller' => 'Usuarios', 'action' => 'ver', $appCliente->app_usuario->id]) : '' ?></td>
        </tr>
    </table>
    <?php 
            if(!empty($appCliente->cl_comentario)) 
            {
    ?>
                <p>
                    <b>Comentario:</b><br />
                    <?= h($appCliente->cl_comentario) ?>
                </p>
    <?php
            }
    ?>    
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar Cliente'), ['action' => 'editar', $appCliente->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?> </li>
        
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Asignar Negocio'), ['controller' => 'clientes-negocios', 'action' => 'asignar', $appCliente->id], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar Cliente'), ['action' => 'borrar', $appCliente->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar al cliente # {0}? Ten en cuenta que se borrarán todos los negocios asignados a él.', $appCliente->cl_nombre.' '.$appCliente->cl_apellidos)]) ?> </li>
    </ul>
  </div>
  <div class="related">
        <h4><?= __('Negocios Asignados') ?></h4>
        <?php if (!empty($appCliente->app_clientes_negocios)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Razón Social') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($appCliente->app_clientes_negocios as $appClientesNegocio): ?>
            <tr>
                <td align="left"><?= h($appClientesNegocio->id) ?></td>
                <td align="left"><?php
                                        switch ($appClientesNegocio->cn_tipo) {
                                            case 'py':
                                                echo __('Pyme');
                                            break;
                                            
                                            case 'em':
                                                echo __('Empresa');
                                            break;

                                            case 'mn':
                                                echo __('Multinacional');
                                            break;

                                            case 'au':
                                                echo __('Autónomo');
                                            break;
                                        }
                ?></td>
                <td align="left"><?= h($appClientesNegocio->cn_razon_social) ?></td>
                <td align="left" class="actions">
                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['controller' => 'Clientes-Negocios', 'action' => 'ver', $appClientesNegocio->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['controller' => 'Clientes-Negocios', 'action' => 'editar', $appClientesNegocio->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['controller' => 'Clientes-Negocios', 'action' => 'borrar', $appClientesNegocio->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Confirmas el borrado del Negocio? # {0}?', $appClientesNegocio->cn_razon_social)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p>Este cliente no tiene ningún negocio asignado...</p>
        <?php endif; ?>
    </div>
</div>
</div>
