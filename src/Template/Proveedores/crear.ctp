<?php
/**
 * =====================================================================
 * Vista Crear Nuevos Proveedores de la App
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
        <li class="pdd-laterales-10"><?= $this->Html->link(__('<i class="fa fa-undo"></i> Volver al listado'), ['action' => 'index'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?></li>
    </ul>
</nav>

<div class="col-md-12 appClientes view large-9 medium-8 columns content">
<div class="x_panel">
<div class="x_content">
  <?= $this->Form->create($appProveedore, ['class' => 'form-horizontal form-label-left', 'novalidate']) ?>
  <span class="section">Datos del nuevo Proveedor</span>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Proveedor <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_nombre', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-words'        => '1',
                      'data-validate-length-range' => '50',
                      'required'                   => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tipo <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('app_proveedores_tipo_id', [
                                                      'options' => $appProveedoresTipos,
                                                      'class'                      => 'form-control col-md-7 col-xs-12',
                                                      'label'                      => false,
                                                      'required'                   => 'required'
                                                      ])
      ?>      
    </div>
    <?= $this->Html->link(__('Nuevo tipo de proveedor'), ['controller' => 'Proveedores-Tipos', 'action' => 'crear'], ['class' => 'btn btn-success btn-xl']) ?>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Teléfono Princ. <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_telefono_princ', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '9',
                      'required'                   => 'required'
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Provincia <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->select('pr_provincia', [
                                      'empty'             => '(selecciona uno...)',
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
                      'value'    => 'empty',
                      'class'    => 'form-control col-md-7 col-xs-12',
                      'label'    => false,
                      'required' => 'required'
                  ]);
      ?> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_email', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'type'                       => 'email',
                      'label'                      => false,
                      'data-validate-length-range' => '70',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Sitio Web
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_web', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'type'                       => 'url',
                      'label'                      => false,
                      'data-validate-length-range' => '100',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Teléfono Secun. </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_telefono_secun', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '9',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Dirección</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_direccion', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '90',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código Postal</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_codigo_postal', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '5',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Población</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_poblacion', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-length-range' => '50',
                      'required'                   => false
                  ]);
      ?>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?=
      $this->Form->control('pr_comentario', [
                      'class'                      => 'form-control col-md-7 col-xs-12',
                      'label'                      => false,
                      'data-validate-words'        => '3',
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