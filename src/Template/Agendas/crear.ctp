<?php
/**
 * =====================================================================
 * Vista Crear Nuevos Contactos de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppAgendasTable $AppAgendas
 * @method    \App\Model\Entity\AppAgenda[]|
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
  <?= $this->Form->create($appAgenda, ['class' => 'form-horizontal form-label-left', 'type' => 'file', 'novalidate']) ?>
  <span class="section">Datos del nuevo Contacto</span>
  <p><small>Los campos marcados con <span class="required">*</span> son necesarios.</small></p>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Etiquetas <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Tag->control([
                            'class'                      => 'form-control col-md-7 col-xs-12 select2-selection__rendered',
                            'label'                      => false,
                            'required'                   => 'required'
                        ]);
            ?> 
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contacto <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_contacto', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-words'        => '1',
                            'data-validate-length-range' => '50',
                            'required'                   => 'required'
                        ]);
            ?> 
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telef. Principal <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_telefono_princ', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '9',
                            'required'                   => 'required'
                        ]);
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_nombre', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-words'        => '1',
                            'data-validate-length-range' => '50',
                            'required'                   => false
                        ]);
            ?> 
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellidos 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_apellidos', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-words'        => '2',
                            'data-validate-length-range' => '50',
                            'required'                   => false
                        ]);
            ?> 
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foto
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_foto', ['type' => 'file', 'value' => 'user.png', 'label' => false])
            ?> 
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fech. Nacimiento</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->dateTime('ag_cumpleannos', [
                                                      'minYear' => 1930,
                                                      'maxYear' => date('Y'),
                                                      'monthNames' => false,
                                                      'empty' => [
                                                        'day' => 'Eslige el día...',
                                                        'month' => 'Eslige el mes...',
                                                        'year' => 'Eslige el año...'
                                                      ],
                                                      'day' =>  [
                                                      'class' => 'form-control form-fecha'
                                                      ],
                                                      'month' =>  [
                                                      'class' => 'form-control form-fecha'
                                                      ],
                                                      'year' => [
                                                      'class' => 'form-control form-fecha'
                                                      ],
                                                      'minute' => false,
                                                      'hour' => false,
                                                      'meridian' => false
                                                  ])
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_email', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'type'                       => 'email',
                            'label'                      => false,
                            'data-validate-length-range' => '90',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telef. Secundario</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_telefono_secun', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '9',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Dirección</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_direccion', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '70',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código Postal</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_codigo_postal', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '5',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Población</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_poblacion', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '50',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Provincia</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_provincia', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '50',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Usuario Twitter</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_twitter', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '50',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Usuario Facebook</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_facebook', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '50',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Usuario Instagram</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_instagram', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '50',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Página Web</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?=
            $this->Form->control('ag_web', [
                            'class'                      => 'form-control col-md-7 col-xs-12',
                            'label'                      => false,
                            'data-validate-length-range' => '100',
                            'required'                   => false
                        ]);
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?=
        $this->Form->control('ag_comentario', [
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