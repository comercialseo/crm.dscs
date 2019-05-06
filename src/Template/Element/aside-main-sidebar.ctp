<?php
use Settings\Core\Setting;
?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0; margin-bottom: 50px">
    <?php $logo = 'logosistema/'.Setting::read('App.Logo'); ?>
    <?= $this->Html->image($logo, [
                                  'alt' => 'Logo Empresa',
                                  'style' => '
                                                  max-width: 300px;
                                                  padding: 15px;
                                                  background-color: #fff;
                                                  width: 100%;
                                                  display: block;
                                  ',
                                  'url' => ['controller' => 'Webroot', 'action' => 'display', 'home']
                                ]) 
    ?>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <!--
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="img/login-w-icon.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenido,</span>
        <h2>Usuario</h2>
      </div>
    </div>
    -->
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-coffee"></i> DEPARTAMENTOS <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><?= $this->Html->link(__('Listado de Departamentos'), ['controller' => 'Departamentos', 'action' => 'index']) ?>
              </li>
              <li><?= $this->Html->link(__('Equipos de Trabajo'), ['controller' => 'Equipos', 'action' => 'index']) ?>
              </li>
            </ul>
          </li>          
        </ul>
      </div>
      <div class="menu_section">
        <h3>Salidas</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-truck"></i> PROVEEDORES <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><?= $this->Html->link(__('Listado de Proveedores'), ['controller' => 'Proveedores', 'action' => 'index']) ?>
                <ul class="nav child_menu" style="display: block;">
                  <li class="sub_menu"><?= $this->Html->link(__('Admin. Tipos'), ['controller' => 'Proveedores-Tipos', 'action' => 'index']) ?>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a><i class="fa fa-user"></i> GASTOS <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><?= $this->Html->link(__('Listado de Gastos'), ['controller' => 'Gastos', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('Informes Ejercicio'), ['controller' => 'Gastos', 'action' => 'informes-ejercicio']) ?></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Entradas</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-user"></i> CLIENTES <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><?= $this->Html->link(__('Listado de Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('Listado de Negocios'), ['controller' => 'Clientes-Negocios', 'action' => 'index']) ?>
                <ul class="nav child_menu" style="display: block;">
                  <li class="sub_menu"><?= $this->Html->link(__('Admin. Sectores'), ['controller' => 'Clientes-Negocios-Sectores', 'action' => 'index']) ?>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a><i class="fa fa-product-hunt"></i> PROD.&SERV. <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><?= $this->Html->link(__('Listado de Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('Informes Ejercicio'), ['controller' => 'Productos', 'action' => 'informes-ejercicio']) ?></li>
            </ul>
          </li>
          <li><a><i class="fa fa-file"></i> FACTURACIÓN <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><?= $this->Html->link(__('Líneas de Ingresos'), ['controller' => 'Facturas', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('Listado Facturas'), ['controller' => 'Facturas', 'action' => 'informes-ejercicio']) ?></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Gráficas</h3>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <?php if( ($usuarioActual['us_rol'] == 'sa') ): ?>
      <?= $this->Html->link(__('<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>'), [
        'controller' => 'opciones', 'action' => 'index'
      ], [
          'class' => '', 
          'escape' => false, 
          'data-toggle' => 'tooltip', 
          'data-placement' => 'top',
          'title' => 'Opciones'
      ]) ?>
      <?php endif; ?>
      <?= $this->Html->link(__('<span class="fa fa-book" aria-hidden="true"></span>'), [
        'controller' => 'agendas', 'action' => 'index'
      ], [
          'class' => '', 
          'escape' => false, 
          'data-toggle' => 'tooltip', 
          'data-placement' => 'top',
          'title' => 'Contactos'
      ]) ?>
      <?= $this->Html->link(__('<span class="fa fa-calendar" aria-hidden="true"></span>'), [
        'controller' => '', 'action' => ''
      ], [
          'class' => '', 
          'escape' => false, 
          'data-toggle' => 'tooltip', 
          'data-placement' => 'top',
          'title' => 'Agenda'
      ]) ?>
      <?= $this->Html->link(__('<span class="glyphicon glyphicon-off" aria-hidden="true"></span>'), [
        'controller' => 'webroot', 'action' => 'logout'
      ], [
          'class' => '', 
          'escape' => false, 
          'data-toggle' => 'tooltip', 
          'data-placement' => 'top',
          'title' => 'Logout'
      ]) ?>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>