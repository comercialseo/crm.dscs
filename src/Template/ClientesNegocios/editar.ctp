<?php
/**
 * =====================================================================
 * Vista de Edición de Negocios de Clientes de la App
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
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?></li>
        <li class="pdd-laterales-10"><?= $this->Form->postLink(
                __('<i class="fa fa-trash-o"></i> Borrar Cliente'),
                ['action' => 'borrar', $appClientesNegocio->id],
          ['escape' => false, 'confirm' => __('¿Confirmas que deseas borrar a este Cliente # {0}?', $appClientesNegocio->cn_razon_social), 
           'class' => 'btn btn-danger btn-xs'
        ]
            )
        ?></li>
    </ul>
</nav>

<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
<div class="x_content">
  <?= $this->Form->create($appClientesNegocio, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
  <span class="section">Formulario de Edición de Datos de Negocio de Cliente <small><?= h($appClientesNegocio->cn_razon_social) ?></small></span>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cliente <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('app_clientes_id', [
                                              'options' => $appClientes,
                                              'class'    => 'form-control col-md-7 col-xs-12',
                                              'label'    => false,
                                              'required' => 'required'
                                              ])
      ?>
    </div>
    <?= $this->Html->link(__('Nuevo Cliente'), [
                                                        'controller' => 'clientes',
                                                        'action'     => 'crear'
                                                        ],
                                                      [
                                                        'class' => 'btn btn-success btn-xl'
                                                        ]) ?>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->select('cn_tipo', [
                                      'em'    => 'Empresa',
                                      'au'    => 'Autónomo',
                                      'py'    => 'Pyme',
                                      'mn'    => 'Multinacional'
                                ],
                  [
                      'value'    => $appClientesNegocio->cn_tipo,
                      'class'    => 'form-control col-md-7 col-xs-12',
                      'label'    => false,
                      'required' => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sector <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('app_cliente_negocio_sector_id', [
                      'options' => $appClientesNegociosSectores,
                      'class'    => 'form-control col-md-7 col-xs-12',
                      'label'    => false,
                      'required' => 'required'
                      ])
      ?>      
    </div>
    <?= $this->Html->link(__('Nuevo Sector'), [
                                                        'controller' => 'clientes-negocios-sectores',
                                                        'action'     => 'crear'
                                                        ],
                                                      [
                                                        'class' => 'btn btn-success btn-xl'
                                                        ]) ?>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Razón Social <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_razon_social', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '90',
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">CIF/NIF <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_cif_nif', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '10',
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Dirección <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_direccion', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '70',
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Código Postal <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_codigo_postal', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '5',
                      'data-validate-type'         => 'numeric',
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Población <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_poblacion', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '50',
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Provincia <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->select('cn_provincia', [
                                      'corunna'           => 'A Coruña',
                                      'alava'             => 'Álava',
                                      'albacete'          => 'Albacete',
                                      'alicante'          => 'Alicante',
                                      'almeria'           => 'Almería',
                                      'asturias'          => 'Asturias',
                                      'avila'             => 'Ávila',
                                      'badajoz'           => 'Badajoz',
                                      'barcelona'         => 'Barcelona',
                                      'burgos'            => 'Burgos',
                                      'caceres'           => 'Cáceres',
                                      'cadiz'             => 'Cádiz',
                                      'cantabria'         => 'Cantabria',
                                      'castellon'         => 'Castellón',
                                      'creal'             => 'Ciudad Real',
                                      'cordoba'           => 'Córdoba',
                                      'cuenca'            => 'Cuenca',
                                      'girona'            => 'Girona',
                                      'granada'           => 'Granada',
                                      'guadalajara'       => 'Guadalajara',
                                      'guipozcua'         => 'Guipuzcua',
                                      'huelva'            => 'Huelva',
                                      'huesca'            => 'Huesca',
                                      'isbaleares'        => 'Islas Baleares',
                                      'iscanarias'        => 'Islas Canarias',
                                      'jaen'              => 'Jaén',
                                      'larioja'           => 'La Rioja',
                                      'leon'              => 'Castilla León',
                                      'lleida'            => 'Lleida',
                                      'lugo'              => 'Lugo',
                                      'madrid'            => 'Madrid',
                                      'malaga'            => 'Málaga',
                                      'murcia'            => 'Murcia',
                                      'navarra'           => 'Navarra',
                                      'orense'            => 'Orense',
                                      'palencia'          => 'Palencia',
                                      'pontevedra'        => 'Pontevedra',
                                      'salamanca'         => 'Salamanca',
                                      'segovia'           => 'Segovia',
                                      'sevilla'           => 'Sevilla',
                                      'soria'             => 'Soria',
                                      'tarragona'         => 'Tarragona',
                                      'teruel'            => 'Teruel',
                                      'toledo'            => 'Toledo',
                                      'valencia'          => 'Valencia',
                                      'valladoliz'        => 'Valladoliz',
                                      'vizcaya'           => 'Vizcaya',
                                      'zamora'            => 'Zamora',
                                      'zaragoza'          => 'Zaragoza',
                                      'ceuta'             => 'Ceuta',
                                      'melilla'           => 'Melilla'
                                ],
                  [
                      'value'    => $appClientesNegocio->cn_provincia,
                      'class'    => 'form-control col-md-7 col-xs-12',
                      'label'    => false,
                      'required' => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Gerente
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_gerente', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'required'                   => false
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Teléfono Princ. <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_telefono_princ', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Teléfono Secun.
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_telefono_secun', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'required'                   => false
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_email', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'type'                       => 'email',
                      'label'                      => false,
                      'data-validate-length-range' => '90',
                      'required'                   => 'required'
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Página Web</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_web', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '100',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('cn_comentario', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>  
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="submit" class="btn btn-primary">Cancelar</button>
      <button id="send" type="submit" class="btn btn-success">Enviar</button>
    </div>
  </div>
 <?= $this->Form->end() ?>
</div>
</div>
</div>
