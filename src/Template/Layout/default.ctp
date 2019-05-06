<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$metas['crmTitle']       = 'Zona Privada del CRM de Administración Empresarial';
$metas['crmDescription'] = 'CRM Administración Empresarial';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= isset($metas['crmTitle']) ? h($metas['crmTitle']) : 'Sin metatitle' ?></title>
    <meta name='description' content="<?= isset($metas['crmDescription']) ? h($metas['crmDescription']) : 'Sin metadescription' ?>" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://crm.dscs.es/layout/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://crm.dscs.es/layout/font-awesome/css/font-awesome.min.css"/> 
    <!-- NProgress -->
    <link rel="stylesheet" href="http://crm.dscs.es/layout/nprogress/nprogress.css"/>
    <!-- iCheck -->
    <link rel="stylesheet" href="http://crm.dscs.es/layout/iCheck/skins/flat/green.css"/>

    <!-- Asignación de las Datatables -->
    <?php
    if ( 
        (
            ($this->request->getAttribute('here') == '/usuarios/') ||
            ($this->request->getAttribute('here') == '/usuarios') ||
            ($this->request->getAttribute('here') === '/clientes/') || 
            ($this->request->getAttribute('here') === '/clientes') || 
            ($this->request->getAttribute('here') === '/clientes-negocios/') || 
            ($this->request->getAttribute('here') === '/clientes-negocios') || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores/') || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores') ||
            ($this->request->getAttribute('here') === '/opciones/') || 
            ($this->request->getAttribute('here') === '/opciones')  || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores/')  || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores') || 
            ($this->request->getAttribute('here') === '/proveedores-tipos/') || 
            ($this->request->getAttribute('here') === '/proveedores-tipos') || 
            ($this->request->getAttribute('here') === '/proveedores/') || 
            ($this->request->getAttribute('here') === '/proveedores') || 
            ($this->request->getAttribute('here') === '/gastos/') || 
            ($this->request->getAttribute('here') === '/gastos') || 
            ($this->request->getAttribute('here') === '/departamentos/') || 
            ($this->request->getAttribute('here') === '/departamentos') || 
            ($this->request->getAttribute('here') === '/equipos/') || 
            ($this->request->getAttribute('here') === '/equipos') || 
            ($this->request->getAttribute('here') === '/productos/') || 
            ($this->request->getAttribute('here') === '/productos')
        )
      )
    {
    ?>
    <!-- Datatables -->
    <link rel="stylesheet" href="http://crm.dscs.es/layout/datatables.net-bs/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="http://crm.dscs.es/layout/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"/>
    <link rel="stylesheet" href="http://crm.dscs.es/layout/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"/>
    <link rel="stylesheet" href="http://crm.dscs.es/layout/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"/>
    <link rel="stylesheet" href="http://crm.dscs.es/layout/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"/>
    <?php
    }
    ?>
    <!-- END Asignación de las Datatables -->

    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="http://crm.dscs.es/layout/bootstrap-daterangepicker/daterangepicker.css"/>

    <!-- PNotify -->
    <link href="http://crm.dscs.es/layout/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="http://crm.dscs.es/layout/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="http://crm.dscs.es/layout/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Anton|Rubik|Russo+One|Staatliches" rel="stylesheet">
    <!--
    font-family: 'Rubik', sans-serif;
    font-family: 'Anton', sans-serif;
    font-family: 'Russo One', sans-serif;
    font-family: 'Staatliches', cursive;
    -->

    <!-- Custom Theme Style -->
    <?= $this->Html->css('custom.min.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Left side column. contains the sidebar -->
        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- top navigation -->
        <?= $this->element('top-navigation') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php echo $this->element('footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery
    <script src="http://crm.dscs.es/layout/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap
    <script src="http://crm.dscs.es/layout/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <?=  $this->AssetCompress->script('jquerybootstrap-combo') ?>
    <!-- FastClick -->
    <script src="http://crm.dscs.es/layout/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="http://crm.dscs.es/layout/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="http://crm.dscs.es/layout/iCheck/icheck.min.js"></script>
    <!-- Asignación de las Datatables -->
    <?php
    if ( 
        (
            ($this->request->getAttribute('here') == '/usuarios/') ||
            ($this->request->getAttribute('here') == '/usuarios') ||
            ($this->request->getAttribute('here') === '/clientes/') || 
            ($this->request->getAttribute('here') === '/clientes') || 
            ($this->request->getAttribute('here') === '/clientes-negocios/') || 
            ($this->request->getAttribute('here') === '/clientes-negocios') || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores/') || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores') ||
            ($this->request->getAttribute('here') === '/opciones/') || 
            ($this->request->getAttribute('here') === '/opciones')  || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores/')  || 
            ($this->request->getAttribute('here') === '/clientes-negocios-sectores') || 
            ($this->request->getAttribute('here') === '/proveedores-tipos/') || 
            ($this->request->getAttribute('here') === '/proveedores-tipos') || 
            ($this->request->getAttribute('here') === '/proveedores/') || 
            ($this->request->getAttribute('here') === '/proveedores') || 
            ($this->request->getAttribute('here') === '/gastos/') || 
            ($this->request->getAttribute('here') === '/gastos') || 
            ($this->request->getAttribute('here') === '/departamentos/') || 
            ($this->request->getAttribute('here') === '/departamentos') || 
            ($this->request->getAttribute('here') === '/equipos/') || 
            ($this->request->getAttribute('here') === '/equipos') || 
            ($this->request->getAttribute('here') === '/productos/') || 
            ($this->request->getAttribute('here') === '/productos')
        )
      )
    {
    ?>    
    <!-- Datatables -->
    <script src="http://crm.dscs.es/layout/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="http://crm.dscs.es/layout/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="http://crm.dscs.es/layout/jszip/dist/jszip.min.js"></script>
    <script src="http://crm.dscs.es/layout/pdfmake/build/pdfmake.min.js"></script>
    <script src="http://crm.dscs.es/layout/pdfmake/build/vfs_fonts.js"></script>
    <!-- Index DataTable (Genérico) -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#datatable-index').DataTable( {
          stateSave: true,
          "scrollY":        "600px",
          "scrollCollapse": true,
          "scrollX": true,
          "lengthMenu": [[10, 50, 150, -1], [10, 50, 150, "Todo"]],
          "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
        } );        
      });
    </script>
    <!-- Gastos>Index DataTable -->
    <script type="text/javascript">
      $(document).ready(function() {
        var table = $('#datatable-index-gastos').DataTable( {
          stateSave: true,
          "scrollY":        "600px",
          "scrollCollapse": true,
          "scrollX": true,
          "lengthMenu": [[10, 50, 150, -1], [10, 50, 150, "Todo"]],
          "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
        }); 
         
            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );      
      });
    </script>
    <?php
    }
    if ( 
        (
            ($this->request->getAttribute('here') === '/gastos/') || 
            ($this->request->getAttribute('here') === '/gastos')
        )
      )
    {
    ?>
    <script type="text/javascript">
        $(function(){
             var rs = "";
             $("#ga-base").blur(function (e) {
              e.preventDefault();
              var iva = $("#ga-iva").val();
              var irpf = $("#ga-irpf").val();
              var descuento = $("#ga-descuento").val();
              var base = $("#ga-base").val();

              var ivacalc  = (base * iva) / 100;
              var irpfcalc  = (base * irpf) / 100;

              var total = (( (base - descuento) + ivacalc) - irpfcalc); 
              var prita = document.getElementById("ontime-total");
              prita.innerHTML = 'Total '+total+'€';
                  if (!window.__cfRLUnblockHandlers) return false; 
                  new PNotify({
                      title: 'Resultado de tu Ingreso',
                      text: 'Total : '+total+'€',
                      type: 'info',
                      styling: 'bootstrap3',
                      addclass: 'dark'
                  });
             });
             $("#ga-iva").blur(function (e) {
              e.preventDefault();
              var iva = $("#ga-iva").val();
              var irpf = $("#ga-irpf").val();
              var descuento = $("#ga-descuento").val();
              var base = $("#ga-base").val();

              var ivacalc  = (base * iva) / 100;
              var irpfcalc  = (base * irpf) / 100;

              var total = (( (base - descuento) + ivacalc) - irpfcalc); 
              var prita = document.getElementById("ontime-total");
              prita.innerHTML = 'Total '+total+'€';
                  if (!window.__cfRLUnblockHandlers) return false; 
                  new PNotify({
                      title: 'Resultado de tu Ingreso',
                      text: 'Total : '+total+'€',
                      type: 'info',
                      styling: 'bootstrap3',
                      addclass: 'dark'
                  });
             });
             $("#ga-irpf").blur(function (e) {
              e.preventDefault();
              var iva = $("#ga-iva").val();
              var irpf = $("#ga-irpf").val();
              var descuento = $("#ga-descuento").val();
              var base = $("#ga-base").val();

              var ivacalc  = (base * iva) / 100;
              var irpfcalc  = (base * irpf) / 100;

              var total = (( (base - descuento) + ivacalc) - irpfcalc); 
              var prita = document.getElementById("ontime-total");
              prita.innerHTML = 'Total '+total+'€';
                  if (!window.__cfRLUnblockHandlers) return false; 
                  new PNotify({
                      title: 'Resultado de tu Ingreso',
                      text: 'Total : '+total+'€',
                      type: 'info',
                      styling: 'bootstrap3',
                      addclass: 'dark'
                  });
             });
             $("#ga-descuento").blur(function (e) {
              e.preventDefault();
              var iva = $("#ga-iva").val();
              var irpf = $("#ga-irpf").val();
              var descuento = $("#ga-descuento").val();
              var base = $("#ga-base").val();

              var ivacalc  = (base * iva) / 100;
              var irpfcalc  = (base * irpf) / 100;

              var total = (( (base - descuento) + ivacalc) - irpfcalc); 
              var prita = document.getElementById("ontime-total");
              prita.innerHTML = 'Total '+total+'€';
                  if (!window.__cfRLUnblockHandlers) return false; 
                  new PNotify({
                      title: 'Resultado de tu Ingreso',
                      text: 'Total : '+total+'€',
                      type: 'info',
                      styling: 'bootstrap3',
                      addclass: 'dark'
                  });
             });
        })
    </script>
    <?php
    }
    ?>
    <!-- END Asignación de las Datatables -->

    <!-- PNotify -->
    <script src="http://crm.dscs.es/layout/pnotify/dist/pnotify.js" type="ae8199d83796697cd7f3b616-text/javascript"></script>
    <script src="http://crm.dscs.es/layout/pnotify/dist/pnotify.buttons.js" type="ae8199d83796697cd7f3b616-text/javascript"></script>
    <script src="http://crm.dscs.es/layout/pnotify/dist/pnotify.nonblock.js" type="ae8199d83796697cd7f3b616-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="ae8199d83796697cd7f3b616-|49" defer=""></script>

    <!-- Chart.js -->
    <script src="http://crm.dscs.es/layout/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="http://crm.dscs.es/layout/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="http://crm.dscs.es/layout/Flot/jquery.flot.js"></script>
    <script src="http://crm.dscs.es/layout/Flot/jquery.flot.pie.js"></script>
    <script src="http://crm.dscs.es/layout/Flot/jquery.flot.time.js"></script>
    <script src="http://crm.dscs.es/layout/Flot/jquery.flot.stack.js"></script>
    <script src="http://crm.dscs.es/layout/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="http://crm.dscs.es/layout/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="http://crm.dscs.es/layout/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="http://crm.dscs.es/layout/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="http://crm.dscs.es/layout/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="http://crm.dscs.es/layout/moment/min/moment.min.js"></script>

    <!-- validator -->
    <script src="http://crm.dscs.es/layout/validator/validator.js"></script>
    
    <!-- Custom Theme Scripts -->
    <?= $this->Html->script(['custom.min.js']) ?>

    <!-- Script para View Usuarios->Crear / Usuarios->Editar -->
    <script type="text/javascript">
      $(document).ready(function(){
          $("#us-rol").change(function(){
              var selectedRol = $(this).children("option:selected").val();
              if(selectedRol == 'cl') {
                $("#us-asociado").css("display", "block");
                if (!window.__cfRLUnblockHandlers) return false; 
                  new PNotify({
                      title: 'El Usuario tipo Cliente',
                      text: 'El usuario del tipo cliente se tiene que asociar con una cuenta de cliente previamente registrada. Si este usuario tipo cliente todavía no tiene cuenta como cliente nuevo no se podrá crear hasta que no la tenga.',
                      type: 'info',
                      styling: 'bootstrap3',
                      addclass: 'dark'
                  });
              }
          });

          $("#us-rol").change(function(){
              var selectedRol = $(this).children("option:selected").val();
              if(selectedRol !== 'cl') {
                $("#us-asociado").css("display", "none");
              }
          });
      });
    </script>

    <!-- Scripts avisos genéricos -->
    <script type="text/javascript">
      
      $("#formCrearItem").click(function(){
                if (!window.__cfRLUnblockHandlers) return false; 
                  new PNotify({
                      title: 'Formulario Nuevo Item',
                      text: 'En la parte inferior tienes el formulario para igresar un nuevo item a la tabla.',
                      type: 'info',
                      styling: 'bootstrap3',
                      addclass: 'dark'
                  });
          });
    </script>

    <?= $this->fetch('script') ?>
  </body>
</html>