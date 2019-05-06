<?php
/**
 * =====================================================================
 * Vista Ver Detalle de Proveedores de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppProveedoresTable $AppProveedores
 * @method    \App\Model\Entity\AppProveedore[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al Listado de Proveedores'), ['action' => 'index'], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?> </li>
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Proveedor'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>
    </ul>
</nav>

<div class="col-md-12 appProveedore view large-9 medium-8 columns content">
<div class="x_panel">
  <div class="x_title">
    <h3>Datos del Proveedor - <?= h($appProveedore->id) ?> : <?= h($appProveedore->pr_nombre) ?></h3>
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
            <td align="left"><?= h($appProveedore->pr_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td align="left"><?= $appProveedore->has('app_proveedores_tipo') ? $this->Html->link($appProveedore->app_proveedores_tipo->pt_tipo, ['controller' => 'Proveedores-Tipos', 'action' => 'ver', $appProveedore->app_proveedores_tipo->id]) : '' ?></td>
        </tr>
        <?php 
            if(!empty($appProveedore->pr_email)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td align="left"><?= h($appProveedore->pr_email) ?></td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <th scope="row"><?= __('Teléfono Principal') ?></th>
            <td align="left"><?= h($appProveedore->pr_telefono_princ) ?></td>
        </tr>
        <?php 
            if(!empty($appProveedore->pr_telefono_secun)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Teléfono Secundario') ?></th>
                <td align="left"><?= h($appProveedore->pr_telefono_secun) ?></td>
            </tr>
        <?php
            }
        ?>
        <?php 
            if(!empty($appProveedore->pr_direccion)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Dirección') ?></th>
                <td align="left"><?= h($appProveedore->pr_direccion) ?></td>
            </tr>
        <?php
            }
        ?>
        <?php 
            if(!empty($appProveedore->pr_codigo_postal)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Código Postal') ?></th>
                <td align="left"><?= h($appProveedore->pr_codigo_postal) ?></td>
            </tr>
        <?php
            }
        ?>
        <?php 
            if(!empty($appProveedore->pr_poblacion)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Población') ?></th>
                <td align="left"><?= h($appProveedore->pr_poblacion) ?></td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td align="left">
                <?php
                                    switch ($appProveedore->pr_provincia) {
                                        case 'corunna':
                                            echo __('A Coruña');
                                        break;   
                                        case 'alava':
                                            echo __('Álava');
                                        break;   
                                        case 'albacete':
                                            echo __('Albacete');
                                        break;   
                                        case 'alicante':
                                            echo __('Alicante');
                                        break; 
                                        case 'almeria':
                                            echo __('Almería');
                                        break; 
                                        case 'asturias':
                                            echo __('Asturias');
                                        break; 
                                        case 'avila':
                                            echo __('Ávila');
                                        break; 
                                        case 'badajoz':
                                            echo __('Badajoz');
                                        break; 
                                        case 'barcelona':
                                            echo __('Barcelona');
                                        break; 
                                        case 'burgos':
                                            echo __('Burgos');
                                        break; 
                                        case 'caceres':
                                            echo __('Cáceres');
                                        break; 
                                        case 'cadiz':
                                            echo __('Cádiz');
                                        break; 
                                        case 'cantabria':
                                            echo __('Cantabria');
                                        break; 
                                        case 'castellon':
                                            echo __('Castellón');
                                        break; 
                                        case 'creal':
                                            echo __('Ciudad Real');
                                        break; 
                                        case 'cordoba':
                                            echo __('Córdoba');
                                        break; 
                                        case 'cuenca':
                                            echo __('Cuenca');
                                        break; 
                                        case 'girona':
                                            echo __('Girona');
                                        break; 
                                        case 'granada':
                                            echo __('Granada');
                                        break; 
                                        case 'guadalajara':
                                            echo __('Guadalajara');
                                        break; 
                                        case 'guipozcua':
                                            echo __('Guipuzcua');
                                        break; 
                                        case 'huelva':
                                            echo __('Huelva');
                                        break; 
                                        case 'huesca':
                                            echo __('Huesca');
                                        break; 
                                        case 'isbaleares':
                                            echo __('Islas Baleares');
                                        break; 
                                        case 'isCanarias':
                                            echo __('Islas Canarias');
                                        break; 
                                        case 'jaen':
                                            echo __('Jaén');
                                        break; 
                                        case 'larioja':
                                            echo __('La Rioja');
                                        break; 
                                        case 'leon':
                                            echo __('León');
                                        break; 
                                        case 'lleida':
                                            echo __('Lleida');
                                        break; 
                                        case 'lugo':
                                            echo __('Lugo');
                                        break; 
                                        case 'madrid':
                                            echo __('Madrid');
                                        break; 
                                        case 'malaga':
                                            echo __('Málaga');
                                        break; 
                                        case 'murcia':
                                            echo __('Murcia');
                                        break; 
                                        case 'navarra':
                                            echo __('Navarra');
                                        break; 
                                        case 'orense':
                                            echo __('Orense');
                                        break; 
                                        case 'palencia':
                                            echo __('Palencia');
                                        break; 
                                        case 'pontevedra':
                                            echo __('Pontevedra');
                                        break; 
                                        case 'salamanca':
                                            echo __('Salamanca');
                                        break; 
                                        case 'segovia':
                                            echo __('Segovia');
                                        break; 
                                        case 'sevilla':
                                            echo __('Sevilla');
                                        break; 
                                        case 'soria':
                                            echo __('Soria');
                                        break; 
                                        case 'tarragona':
                                            echo __('Tarragona');
                                        break; 
                                        case 'teruel':
                                            echo __('Teruel');
                                        break; 
                                        case 'toledo':
                                            echo __('Toledo');
                                        break; 
                                        case 'valencia':
                                            echo __('Valencia');
                                        break; 
                                        case 'valladoliz':
                                            echo __('Valladoliz');
                                        break; 
                                        case 'vizcaya':
                                            echo __('Vizcaya');
                                        break; 
                                        case 'zamora':
                                            echo __('Zamora');
                                        break; 
                                        case 'zaragoza':
                                            echo __('Zaragoza');
                                        break; 
                                        case 'ceuta':
                                            echo __('Ceuta');
                                        break; 
                                        case 'melilla':
                                            echo __('Melilla');
                                        break;                                     
                                    }
            ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creación') ?></th>
            <td align="left"><?= h($appProveedore->pr_creacion) ?></td>
        </tr>
        <?php 
            if(!empty($appProveedore->pr_modificacion)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Últim. Modificacion') ?></th>
                <td align="left"><?= h($appProveedore->pr_modificacion) ?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    <?php 
            if(!empty($appProveedore->pr_comentario)) 
            {
    ?>
                <p>
                    <b>Comentario:</b><br />
                    <?= h($appProveedore->pr_comentario) ?>
                </p>
    <?php
            }
    ?>
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar Proveedor'), ['action' => 'editar', $appProveedore->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar Proveedor'), ['action' => 'borrar', $appProveedore->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar al proveedor # {0}?', $appProveedore->pr_nombre)]) ?> </li>
    </ul>
  </div>
</div>
</div>
