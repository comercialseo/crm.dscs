<?php
/**
 * =====================================================================
 * Vista Ver Detalle de Negocio de Cliente de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesNegociosTable $AppClientesNegocios
 * @method    \App\Model\Entity\AppClientesNegocio[]|
 * =====================================================================
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al Listado de Negocios de Clientes'), ['action' => 'index'], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?> </li>
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Negocio de Cliente'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?> </li>
    </ul>
</nav>

<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
  <div class="x_title">
    <?php $cl = $appClientesNegocio->app_cliente->cl_nombre.' '.$appClientesNegocio->app_cliente->cl_apellidos; ?>
    <h3>Datos del Negocio de Cliente - <?= $this->Html->link(h($cl), ['controller' => 'Clientes', 'action' => 'ver', $appClientesNegocio->app_cliente->id]) ?><br /> Negocio ID <?= h($appClientesNegocio->id) ?> : <?= h($appClientesNegocio->cn_razon_social) ?></h3>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-hover vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo de Negocio') ?></th>
            <td align="left"><?php
                                    switch ($appClientesNegocio->cn_tipo) {
                                        case 'py':
                                            echo __('Pyme');
                                        break;   
                                        case 'em':
                                            echo __('Empresa');
                                        break;   
                                        case 'au':
                                            echo __('Autónomo');
                                        break;   
                                        case 'mn':
                                            echo __('Multinacional');
                                        break;                                        
                                    }
            ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sector') ?></th>
            <td align="left"><?= $appClientesNegocio->has('app_clientes_negocios_sectore') ? $this->Html->link($appClientesNegocio->app_clientes_negocios_sectore->nt_sector, ['controller' => 'Clientes-Negocios-Sectores', 'action' => 'ver', $appClientesNegocio->app_clientes_negocios_sectore->id]) : '' ?></td>
        </tr>
        <?php 
            if(!empty($appClientesNegocio->cn_gerente)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Gerente') ?></th>
                <td align="left"><?= h($appClientesNegocio->cn_gerente) ?></td>
            </tr>
        <?php
            }
        ?>        
        <tr>
            <th scope="row"><?= __('Razón Social') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_razon_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CIF / NIF') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_cif_nif) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teléfono Principal') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_telefono_princ) ?></td>
        </tr>
        <?php 
            if(!empty($appClientesNegocio->cn_telefono_secun)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Teléfono Secundario') ?></th>
                <td align="left"><?= h($appClientesNegocio->cn_telefono_secun) ?></td>
            </tr>
        <?php
            }
        ?>        
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dirección') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Código Postal') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_codigo_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Población') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_poblacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td align="left"><?php
                                    switch ($appClientesNegocio->cn_provincia) {
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
            ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asignado a') ?></th>
            <td align="left"><?= $appClientesNegocio->has('app_cliente') ? $this->Html->link(h($appClientesNegocio->app_cliente->cl_nombre.' '.$appClientesNegocio->app_cliente->cl_apellidos), ['controller' => 'clientes', 'action' => 'ver', $appClientesNegocio->app_cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creación') ?></th>
            <td align="left"><?= h($appClientesNegocio->cn_creacion) ?></td>
        </tr>
        <?php 
            if(!empty($appClientesNegocio->cn_modificacion)) 
            {
        ?>
            <tr>
                <th scope="row"><?= __('Últ. Modificación') ?></th>
                <td align="left"><?= h($appClientesNegocio->cn_modificacion) ?></td>
            </tr>
        <?php
            }
        ?>        
    </table>
    <?php 
            if(!empty($appClientesNegocio->cn_comentario)) 
            {
    ?>
                <p>
                    <b>Comentario:</b><br />
                    <?= h($appClientesNegocio->cn_comentario) ?>
                </p>
    <?php
            }
    ?>    
    <ul class="side-nav ds-flex lst-sty-n">
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-pencil"></i> Editar Negocio de Cliente'), ['action' => 'editar', $appClientesNegocio->id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?> </li>

        <li class="pdd-laterales-10"><?= $this->Form->postLink(__('<i class="fa fa-trash-o"></i> Borrar Negocio de Cliente'), ['action' => 'borrar', $appClientesNegocio->id], ['class' => 'btn btn-danger btn-xs', 'escape' => false, 'confirm' => __('¿Seguro que deseas borrar al cliente # {0}?', $appClientesNegocio->cn_razon_social)]) ?> </li>
    </ul>
  </div>
</div>
</div>