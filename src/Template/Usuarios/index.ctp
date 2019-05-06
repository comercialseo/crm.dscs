<?php
/**
 * =====================================================================
 * Vista Principal de Usuarios de la App
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
<div class="appUsuarios index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Usuarios de la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de los usuarios administradores de la app.
        </p>
      </div>
      <p class="large-3 medium-4 columns" id="actions-sidebar">
        <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Usuario'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
      </p>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Usuario: Activar el orden ascendente">Usuario</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="Email: Activar el orden ascendente">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Rol: Activar el orden ascendente">Rol</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 48px;" aria-label="Creación: Activar el orden ascendente">Creación</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Modificación: Activar el orden ascendente">Ult. Modificación</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appUsuarios as $appUsuario): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td><?= $this->Html->link(h($appUsuario->us_usuario), ['action' => 'ver', $appUsuario->id]) ?></td>
                                <td><?= h($appUsuario->us_email) ?></td>
                                <td>
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
                                <td><?= h($appUsuario->us_creacion) ?></td>
                                <td><?= h($appUsuario->us_modificacion) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-folder"></i> Ver'), ['action' => 'ver', $appUsuario->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appUsuario->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
                                    <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Asignar Cliente'), ['controller' => 'clientes', 'action' => 'asignar', $appUsuario->id], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar'), ['action' => 'borrar', $appUsuario->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar el usuario # {'.h($appUsuario->us_usuario).'}?', $appUsuario->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>