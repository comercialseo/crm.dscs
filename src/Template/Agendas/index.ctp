<?php
/**
 * =====================================================================
 * Vista Principal de Agendas de la App
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
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Contactos</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Escribe aquí tu búsqueda...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">BUSCAR</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <ul class="pagination pagination-split">
                  <li><a href="#">A</a></li>
                  <li><a href="#">B</a></li>
                  <li><a href="#">C</a></li>
                  <li><a href="#">D</a></li>
                  <li><a href="#">E</a></li>
                  <li>...</li>
                  <li><a href="#">W</a></li>
                  <li><a href="#">X</a></li>
                  <li><a href="#">Y</a></li>
                  <li><a href="#">Z</a></li>
                </ul>
              </div>
              <p class="large-3 medium-4 columns" id="actions-sidebar">
                <?= $this->Html->link(__('<i class="fa fa-plus-square"></i> Nuevo Contacto'), ['action' => 'crear'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>
              </p>
              <div class="clearfix"></div>
              <?php foreach($appAgendas as $appAgenda): ?>
              <?php 
                $direccion = $appAgenda->ag_direccion.'<br />'.$appAgenda->ag_codigo_postal.' '.$appAgenda->ag_poblacion.' '.$appAgenda->ag_provincia;
                if($appAgenda->ag_foto == NULL)
                {
                  $imagen = 'contactos/AppAgendas/ag_foto/user.png';
                }else
                {
                  $imagen = 'contactos/AppAgendas/ag_foto/'.$appAgenda->ag_foto;
                }
                
              ?>
              <div class="col-md-6 col-sm-6 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i><?= h($appAgenda->ag_contacto) ?></i></h4>
                    <div class="left col-xs-7">
                      <h2><?= h($appAgenda->ag_nombre.' '.$appAgenda->ag_apellidos) ?></h2>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-phone"></i> <?= h($appAgenda->ag_telefono_princ) ?></li>
                        <li><i class="fa fa-at"></i> <?= h($appAgenda->ag_email) ?></li>
                        <li><i class="fa fa-building"></i> <?= $direccion ?></li>                        
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      <?= $this->Html->image($imagen, [
                                                              'class' => 'img-circle img-responsive',
                                                              'alt' => h($appAgenda->ag_contacto),
                                                              'url' => ['controller' => 'Agendas', 'action' => 'ver', $appAgenda->id]
                                                              ])
                      ?>
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <p class="ratings">
                        <a>4.0</a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star-o"></span></a>
                      </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                        </i> <i class="fa fa-comments-o"></i> </button>
                      <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i> View Profile
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>