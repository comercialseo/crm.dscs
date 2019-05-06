<?php
/**
 * =====================================================================
 * Vista Principal de Opciones de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppOpcionesTable $AppOpciones
 * @method    \App\Model\Entity\AppOpcione[]|
 * =====================================================================
*/
?>
<div class="appOpciones index col-md-12 col-sm-12 col-xs-12 columns content">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Tabla de Opciones de la Aplicación') ?></h2>
        <div class="clearfix"></div>
        <p class="text-muted font-13 m-b-30">
            Esta es la tabla de las opciones de la app.
        </p>
      </div>
      <div class="x_content">
        <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-index" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline jambo_table bulk_action" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Or: Activar el orden ascendente">Or</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 103px;" aria-label="Meta: Activar el orden ascendente">Opción</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 210px;" aria-label="Valor: Activar el orden ascendente">Valor</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Descripción: Activar el orden ascendente">Descripción</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;" aria-label="Tipo: Activar el orden ascendente">Tipo</th>
                            <th class="" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" style="width: 99px;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($appOpciones as $appOpcion): 
                                if($i%2 == 0) {
                                    echo ('<tr role="row" class="odd">');
                                }else {
                                    echo ('<tr role="row" class="even">');
                                }
                            $i++;
                            ?>
                                <td tabindex="0" class="sorting_1"><?= $this->Number->format($appOpcion->weight) ?></td>
                                <td><?php 
                                        switch ($appOpcion->name) {
                                            case 'App.RazSoc':
                                                echo __('Razón Social');
                                            break;
                                            
                                            case 'App.Direc':
                                                echo __('Dirección');
                                            break;

                                            case 'App.CodPos':
                                                echo __('Código Postal');
                                            break;

                                            case 'App.Poblac':
                                                echo __('Población');
                                            break;

                                            case 'App.Provin':
                                                echo __('Provincia');
                                            break;

                                            case 'App.Telef':
                                                echo __('Teléfono');
                                            break;

                                            case 'App.TelefMov':
                                                echo __('Teléfono Móvil');
                                            break;

                                            case 'App.Email':
                                                echo __('Email');
                                            break;

                                            case 'App.Logo':
                                                echo __('Archivo Logotipo');
                                            break;

                                            case 'App.IVA':
                                                echo __('IVA');
                                            break;

                                            case 'App.IRPF':
                                                echo __('IRPF');
                                            break;
                                        }
                                ?></td>
                                <td>
                                    <?php
                                        if( ($appOpcion->name == 'App.IVA' || $appOpcion->name == 'App.IRPF') ) 
                                        {
                                            echo h($appOpcion->value).'%';
                                        }else {
                                            echo h($appOpcion->value);
                                        }
                                    ?>
                                </td>
                                <td><?= h($appOpcion->description) ?></td>
                                <td><?php 
                                        switch ($appOpcion->type) {
                                            case 'sistema':
                                                echo __('Sistema');
                                            break;
                                            
                                            case 'ususarios':
                                                echo __('Usuarios');
                                            break;
                                        }
                                ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar'), ['action' => 'editar', $appOpcion->id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>
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